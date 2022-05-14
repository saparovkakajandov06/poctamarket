<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class CartController extends SiteController
{
    public function plus(Request $request, $id) {
        $productsInCart = $this->getProductsFromCart($request);

        if(!$productsInCart) $productsInCart = array();

        // Проверяем есть ли уже такой товар в корзине
        if (array_key_exists($id, $productsInCart)) {
            // Если такой товар есть в корзине, но был добавлен еще раз, увеличим количество на 1
            $productsInCart[$id]['amount']++;
        } else {
            // Если нет, добавляем id нового товара в корзину с количеством 1
            $productsInCart[$id]['amount'] = 1;
            $product = \App\Product::where('id',$id)->first();
            $productsInCart[$id]['price'] = $product->price;
            $productsInCart[$id]['name_tk'] = $product->name_tk;
            $productsInCart[$id]['img'] = json_decode($product->img)->main;
        }

        $request->session()->put('products',$productsInCart);

        $totalPrice = $this->superGetTotalPrice($productsInCart);

        return \Response::json([
            'cartCount'=>$this->countItems($request),
            'prodByIdCount'=>$productsInCart[$id]['amount'],
            'oneProdTotalPrice'=>$productsInCart[$id]['amount'] * $productsInCart[$id]['price'],
            'totalPrice'=>$totalPrice
        ]);

        exit();
    }

    public function add(Request $request, $id) {

        $color = $request->session()->get('currentColor', null);
        $size = $request->session()->get('currentSize', null);

        $uniqueIdInCart = $id . "_" . $color . "_" . $size;

        $id = intval($id); //product id

        $color = ($color) ? intval($color) : null; //color id

        $productsInCart = $this->getProductsFromCart($request);

        if(!$productsInCart) $productsInCart = array();

        // Проверяем есть ли уже такой товар в корзине
        if (array_key_exists($uniqueIdInCart, $productsInCart)) {
            // Если такой товар есть в корзине, но был добавлен еще раз, увеличим количество на 1
            $productsInCart[$uniqueIdInCart]['amount']++;
        } else {
            // Если нет, добавляем id нового товара в корзину с количеством 1
            $productsInCart[$uniqueIdInCart]['amount'] = 1;

            $product = \App\Product::where('id',$id)->first();
            $colorFromDb = $product->colors()->where('id',$color)->first();

            $productsInCart[$uniqueIdInCart]['id'] = $product->id;
            $productsInCart[$uniqueIdInCart]['name_tk'] = $product->name_tk;
            $productsInCart[$uniqueIdInCart]['code'] = $product->code;
            $productsInCart[$uniqueIdInCart]['price'] = $product->price;
            $productsInCart[$uniqueIdInCart]['img'] = json_decode($product->img)->main;
            $productsInCart[$uniqueIdInCart]['color_tk'] = ($colorFromDb) ? $colorFromDb->color_tk : '';
            $productsInCart[$uniqueIdInCart]['size'] = $size;
        }

        $request->session()->put('products',$productsInCart);

        $totalPrice = $this->superGetTotalPrice($productsInCart);

        // $product = \App\Product::where('id',$id)->first();

        return \Response::json([
            'cartCount'=>$this->countItems($request),
            'prodByIdCount'=>$productsInCart[$uniqueIdInCart]['amount'],
            'oneProdTotalPrice'=>$productsInCart[$uniqueIdInCart]['amount'] * $productsInCart[$uniqueIdInCart]['price'],
            'totalPrice'=>$totalPrice
        ]);

        exit();
    }


    public function getProductsFromCart(Request $request) {
        $p = $request->session()->get('products','default');
        if($p != 'default') return $p;
        return false;
    }

    public function superGetTotalPrice($productsInCart) {
        if($productsInCart) {
            $productsIds = array_keys($productsInCart);

            return $this->getTotalPrice($productsInCart);
        } else return 0;
    }

    public function getTotalPrice($productsInCart) {

        $total = 0;

        foreach($productsInCart as $item) {
            $total += $item['price'] * $item['amount'];
        }

        return $total;
    }

    public function index(Request $request) {

        $all_products = \App\Product::all();

        $productsInCart = $this->getProductsFromCart($request);

        if($productsInCart) {
            $totalPrice = $this->getTotalPrice($productsInCart);
        } else {
            $totalPrice = null;
        }

        return view('site.cart',compact(
            'productsInCart','totalPrice', 'all_products'
        ))->with([
            'cartCount'=>$this->countItems($request),
            'categories'=>$this->categories,
            'currentUser'=>\Auth::user()
        ]);
    }


    public function check_list(Request $request) {

        $productsInCart = $this->getProductsFromCart($request);

        if($productsInCart) {
            $totalPrice = $this->getTotalPrice($productsInCart);
        } else {
            $totalPrice = null;
        }

        return view('site.checkout',compact(
            'productsInCart','totalPrice'
        ))->with([
            'cartCount'=>$this->countItems($request),
            'categories'=>$this->categories,
            'currentUser'=>\Auth::user()
        ]);
    }

    public function subtract(Request $request,$id) {

        $productsInCart = $this->getProductsFromCart($request);

        if(!$productsInCart) $productsInCart = array();

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]['amount']--;

            if($productsInCart[$id]['amount'] < 1)  {
                unset($productsInCart[$id]);
                $c = 0;
                $p = 0;
            } else {
                $c = $productsInCart[$id]['amount'];
                $p = $productsInCart[$id]['price'];
            }
        }

        $request->session()->put('products',$productsInCart);

        $totalPrice = $this->superGetTotalPrice($productsInCart);

        return \Response::json([
            'cartCount'=>$this->countItems($request),
            'prodByIdCount'=>$c,
            'oneProdTotalPrice'=>$c * $p,
            'totalPrice'=>$totalPrice
        ]);

        exit();
    }


         public function delete(Request $request, $id) {
         $products = session('products');
             foreach ($products as $key=>$value)
             {
                 if ($value['id'] == $id)
                 {
                     unset($products [$key]);
                 }
             }

        $productsInCart = $this->getProductsFromCart($request);
        if($productsInCart) $request->session()->put('products',$products);

        return redirect()->route('cart')->with([
            'status'=>'Sebet arassalandy!'
        ]);
    }




    public function checkout(Request $request) {
        try{
            $result = $request->all();

            $currentUser = \Auth::user();

            $validator = null;

            if($currentUser == null) { //guest
                $validator = \Validator::make($result,[
                    'name'=>'required',
                    'surname'=>'required',
                    'phone'=>'required|min:8',
                    'street'=>'required',
                    'house'=>'required',
                    'region'=>'required', //types:Ahal,Balkan,Lebap,Dashoguz,Mary,Asghabat
                    'city'=>'required',
                    'paymenttype' => 'required|min:1|max:3'
                ]);
            } else { //authenticated
                $validator = \Validator::make($result,[
                    'street'=>'required',
                    'house'=>'required',
                    'region'=>'required', //types:Ahal,Balkan,Lebap,Dashoguz,Mary,Asghabat
                    'city'=>'required',
                    'paymenttype' => 'required|min:1|max:3',
                ]);
            }
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $order = new \App\Order();
            if($currentUser) {
                $order->user_id = $currentUser->id;
                 $order->user_name = $currentUser->name;
                 $order->user_surname = $currentUser->surname;
                // $order->address = $currentUser->address;
                 $order->email = $currentUser->email;
                 $order->user_phone = $currentUser->phone;
            } else {
                $order->user_name = $request->input('name');
                $order->user_surname = $request->input('surname');
                $order->email = $request->input('email');
                $order->user_phone = $request->input('phone');
            }

            $addressArr = array();

            if($request->input('region')) $addressArr['region'] = $request->input('region');
            if($request->input('city')) $addressArr['city'] = $request->input('city');
            if($request->input('street')) $addressArr['street'] = $request->input('street');
            if($request->input('house')) $addressArr['house'] = $request->input('house');
            if($request->input('apartment')) $addressArr['apartment'] = $request->input('apartment');
            if($request->input('korpus')) $addressArr['korpus'] = $request->input('korpus');


            $order->address = json_encode((object) $addressArr);

            $order->comments = $request->input('comments');
            $order->products = json_encode($this->getProductsFromCart($request),JSON_UNESCAPED_SLASHES);
            $order->delivery = intval($request->input('delivery'));
            $order->paymenttype = intval($request->input('paymenttype'));
            $order->total_price = $this->superGetTotalPrice($this->getProductsFromCart($request)) +
                (intval($request->input('delivery')) == 0 ? floatval($request->input('delivery_sum')) : 0);
            $order->delivery_sum = intval($request->input('delivery')) == 0 ? floatval($request->input('delivery_sum')) : 0;
            $order->desc = "market";
            if($currentUser) $currentUser->orders()->save($order);
            else $order->save();



           /* Mail::send('mail.order',['data'=>$order,'user'=>$currentUser],function($message) use($order,$currentUser) {
                $message->from('market.order@online.tm', 'turkmenpostmarket.tm');
                $message->to('post.market@online.tm')->subject('Täze sargyt TürkmenPost Market');
            });*/

            $response = Http::withHeaders([
                'Content-Type' => 'application/json'

            ])->post('http://217.174.227.29/auth/jwt/create', [
                'username' => 'inetmarket',
                'password' => 'InternetMarket-2020',
            ])->throw()->json();

            $accessToken = $response['access'];



            if(intval($request->input('paymenttype')) == 3){
                $amount = $order->total_price * 100;


                $returnURL = route('payment_success', ['id' => $order->id]);

                $client = new Client();
                $response = $client->post('https://mpi.gov.tm/payment/rest/register.do', [
                    'form_params' => [
                        //OLD credentials
                        //'password' => 'D1K2S5r26757',
                        //'userName' => '103161020074',
                        'password' => 'G3h35D1t2Err',
                        'userName' => '1031610200743',
                        'pageView' => 'DESKTOP',
                        'sessionTimeoutSecs' => 600,
                        'description' => 'turkmenpostmarket',
                        'orderNumber' => $order->id,
                        'amount'   => $amount,
                        'currency'     => '934',
                        'language'       => 'ru',
                        'returnUrl'       => url($returnURL),
                        'failUrl'       => url($returnURL),
                    ],
                    'verify' => false,
                ]);
                $arr = json_decode($response->getBody(), true);
                if ($arr['errorCode'] == 0) {

                    $order->desc = $arr['orderId'];
                    $order->save();
                    $this->clear($request);
                    return redirect()->away($arr['formUrl']);

                } else {
                    return redirect()->back()->with('answer', 'Bank bilen ýalňyşlyk ýüze çykdy');

                }

            }
            else{
                $client = new Client([
                    'headers' => [ 'Authorization' => 'JWT '.$accessToken ]
                ]);

                $response = $client->post('http://217.174.227.29/api/send-message/',
                    ['form_params' =>
                        [
                            'phone' => '993'.$order->user_phone, 'message' => 'Hormatly musderi! Sizin sargydynyz kabul edildi'
                        ]
                    ]
                );
            }
            $this->clear($request);
            return redirect()->route('cart')->with([
                'status'=>'Sargydyňyz kabul edildi'
            ]);
        }

        catch(Exception $e) {
            return redirect()->back()->with('error','Ошибка ' . $e->getMessage());
        }
    }


//  isleya   public function checkout(Request $request) {
//        try{
//            $result = $request->all();
//
//            $currentUser = Auth::user();
//
//            $validator = null;
//
//            if($currentUser == null) { //guest
//                $validator = Validator::make($result,[
//                    'name'=>'required',
//                    'surname'=>'required',
//                    'phone'=>'required|min:8',
//                    'street'=>'required',
//                    'house'=>'required',
//                    'region'=>'required', //types:Ahal,Balkan,Lebap,Dashoguz,Mary,Asghabat
//                    'city'=>'required',
//                    'paymenttype' => 'required|min:1|max:3'
//                ]);
//            } else { //authenticated
//                $validator = Validator::make($result,
//                    [
//                        'street'=>'required',
//                        'house'=>'required',
//                        'region'=>'required', //types:Ahal,Balkan,Lebap,Dashoguz,Mary,Asghabat
//                        'city'=>'required',
//                        'paymenttype' => 'required|min:1|max:3',
//                    ]);
//            }
//            if($validator->fails()) {
//                return redirect()->back()->withErrors($validator)->withInput();
//            }
//
//            $order = new Order();
//            if($currentUser) {
//                $order->user_id = $currentUser->id;
//                 $order->user_name = $currentUser->name;
//                 $order->user_surname = $currentUser->surname;
//                // $order->address = $currentUser->address;
//                 $order->email = $currentUser->email;
//                 $order->user_phone = $currentUser->phone;
//            }
//            else {
//                $order->user_name = $request->input('name');
//                $order->user_surname = $request->input('surname');
//
//
//                $order->email = $request->input('email');
//                $order->user_phone = $request->input('phone');
//            }
//
//            $addressArr = array();
//
//            if($request->input('region')) $addressArr['region'] = $request->input('region');
//            if($request->input('city')) $addressArr['city'] = $request->input('city');
//            if($request->input('street')) $addressArr['street'] = $request->input('street');
//            if($request->input('house')) $addressArr['house'] = $request->input('house');
//            if($request->input('apartment')) $addressArr['apartment'] = $request->input('apartment');
//            if($request->input('korpus')) $addressArr['korpus'] = $request->input('korpus');
//
//
//            $order->address = json_encode((object) $addressArr);
//
//            $order->comments = $request->input('comments');
//            $order->products = json_encode($this->getProductsFromCart($request),JSON_UNESCAPED_SLASHES);
//            $order->delivery = intval($request->input('delivery'));
//            $order->paymenttype = intval($request->input('paymenttype'));
//            $order->total_price = $this->superGetTotalPrice($this->getProductsFromCart($request)) +
//                (intval($request->input('delivery')) == 0 ? floatval($request->input('delivery_sum')) : 0);
//            $order->delivery_sum = intval($request->input('delivery')) == 0 ? floatval($request->input('delivery_sum')) : 0;
//            $order->desc = "market";
//            if($currentUser) $currentUser->orders()->save($order);
//            else $order->save();
//
//
//
//            /*  Mail::send('mail.order',['data'=>$order,'user'=>$currentUser],function($message) use($order,$currentUser) {
//                  $message->from('market.order@online.tm', 'turkmenpostmarket.tm');
//                  $message->to('post.market@online.tm')->subject('Täze sargyt TürkmenPost Market');
//              });*/
//
//            /* $response = Http::withHeaders([
//                 'Content-Type' => 'application/json'
//
//             ])->post('http://217.174.227.29/auth/jwt/create', [
//                                                     'username' => 'inetmarket',
//                                                     'password' => 'InternetMarket-2020',
//                                                 ])->throw()->json();
//
//             $accessToken = $response['access'];*/
//
//
//
//            /*if(intval($request->input('paymenttype')) == 3){
//                $amount = $order->total_price * 100;
//            // Str::random(5).
//            // $d = $this->encrypt($order->id, 'ssjdfuereu%$jedfnsjd*&ejrfh@');
//
//            $returnURL = route('payment_success', ['id' => $order->id]);
//
//            $client = new Client();
//            $response = $client->post('https://mpi.gov.tm/payment/rest/register.do', [
//                            'form_params' => [
//				//OLD credentials
//                                //'password' => 'D1K2S5r26757',
//                                //'userName' => '103161020074',
//				'password' => 'G3h35D1t2Err',
//				'userName' => '1031610200743',
//                                'pageView' => 'DESKTOP',
//                                'sessionTimeoutSecs' => 600,
//                                'description' => 'turkmenpostmarket',
//                                'orderNumber' => $order->id,
//                                'amount'   => $amount,
//                                'currency'     => '934',
//                                'language'       => 'ru',
//                                'returnUrl'       => url($returnURL),
//                                'failUrl'       => url($returnURL),
//                            ],
//                        ]);
//            $arr = json_decode($response->getBody(), true);
//
//            if ($arr['errorCode'] == 0) {
//
//               $order->desc = $arr['orderId'];
//               $order->save();
//               $this->clear($request);
//                return redirect()->away($arr['formUrl']);
//
//            } else {
//               return redirect()->back()->with('answer', 'Bank bilen ýalňyşlyk ýüze çykdy');
//
//            }
//
//
//
//
//            }
//            else{
//                $client = new Client([
//                'headers' => [ 'Authorization' => 'JWT '.$accessToken ]
//                ]);
//
//                $response = $client->post('http://217.174.227.29/api/send-message/',
//                    ['form_params' =>
//                        [
//                            'phone' => '993'.$order->user_phone, 'message' => 'Hormatly musderi! Sizin sargydynyz kabul edildi'
//                    ]
//                ]
//                );
//            }*/
//
//            $this->clear($request);
//            return redirect()->route('cart')->with([
//                'status'=>'Sargydyňyz kabul edildi'
//            ]);
//        }
//
//        catch(Exception $e) {
//            return redirect()->back()->with('error','Ошибка ' . $e->getMessage());
//        }
//    }



    public function refund($id){
        try {
            if($id){
                $order = \App\Order::where(['id' => $id])->first();
            // dd($order);

            if($order){
                $client  = new Client();
                $response = $client->post('https://mpi.gov.tm/payment/rest/refund.do', [
                    'form_params' => [
                        'password' => 'G3h35D1t2Err',
                        'userName' => '1031610200743',
                        'orderId' => $order->desc,
                        'currency' => '934',
                        'amount' => $order->total_price * 100,
                        'language'       => 'ru',
                    ],
                    'verify' => false,
                    // 'proxy' => 'socks5://127.0.0.1:1212'
                ]);

                $arr = json_decode($response->getBody(), true);
                // dd($arr);
                if ($arr['errorCode'] == 0) {
                    $order->status = 9;
                    $order->save();
                                    $response = Http::withHeaders([
                                        'Content-Type' => 'application/json'

                                    ])->post('http://217.174.227.29/auth/jwt/create', [
                                                                            'username' => 'inetmarket',
                                                                            'password' => 'InternetMarket-2020',
                                                                        ])->throw()->json();
                                    $accessToken = $response['access'];
                                    $client = new Client([
                                        'headers' => [ 'Authorization' => 'JWT '.$accessToken ]
                                        ]);

                                        $response = $client->post('http://217.174.227.29/api/send-message/',
                                            ['form_params' =>
                                                [
                                                    'phone' => '993'.$order->user_phone, 'message' => 'Hormatly musderi! Sizin sargydynyz goýbolsun edildi we puluňyz yzyna geçirildi!'
                                            ]
                                        ]
                                        );
                    // return response()->json(['status'=>1, 'msg'=>'successfully refunded'], 200);
                    return redirect()->back()->with(['success'=>1, 'msg'=>'Üstünlikli yzyna geçirildi!'], 200);

                    } else if ($arr['ErrorCode'] == 6){
                    return response()->json(['success'=>0, 'msg'=>'Bu zakaz id ýok!'],422);
                } else {
                    return response()->json(['success'=>0, 'msg'=>'Garaşylmadyk ýalňyşlyk täzeden barlap görüň'],500);
                }
                }
            }
            return response()->json(['success'=>0, 'msg'=>'Garaşylmadyk talap!'],400);

        }
            catch(Exception $e) {
            return redirect()->back()->with('error','Ошибка ' . $e->getMessage());
        }
    }

    public function clear(Request $request) {
        $emptyCart = array();
        $productsInCart = $this->getProductsFromCart($request);
        if($productsInCart) $request->session()->put('products',$emptyCart);
        return redirect()->route('cart')->with([
            'status'=>'Sebet arassalandy!'
        ]);
    }


    public function encrypt($data, $password){
        $iv = substr(sha1(mt_rand()), 0, 16);
        $password = sha1($password);

        $salt = sha1(mt_rand());
        $saltWithPassword = hash('sha256', $password.$salt);

        $encrypted = openssl_encrypt(
          "$data", 'aes-256-cbc', "$saltWithPassword", null, $iv
        );
        $msg_encrypted_bundle = "$iv:$salt:$encrypted";
        return $msg_encrypted_bundle;
    }


    public function decrypt($msg_encrypted_bundle, $password){
        $password = sha1($password);

        $components = explode( ':', $msg_encrypted_bundle );;
        $iv            = $components[0];
        $salt          = hash('sha256', $password.$components[1]);
        $encrypted_msg = $components[2];

        $decrypted_msg = openssl_decrypt(
          $encrypted_msg, 'aes-256-cbc', $salt, null, $iv
        );

        if ( $decrypted_msg === false )
            return false;

        $msg = substr( $decrypted_msg, 41 );
        return $decrypted_msg;
    }

    public function paymentDone($id){
        //$d = $this->decrypt($id,'ssjdfuereu%$jedfnsjd*&ejrfh@');
        //dd(substr($d, 5));
        if($id){
            //$d = substr($d, 5);

            $order = \App\Order::where(['id' => $id, 'online_payment' => 0])->first();


            if($order){
                $client  = new Client();
                $response = $client->post('https://mpi.gov.tm/payment/rest/getOrderStatus.do', [
                    'form_params' => [
                        'password' => 'G3h35D1t2Err',
                        'userName' => '1031610200743',
                        'orderId' => $order->desc,
                        'language'       => 'ru',
                    ],
                    'verify' => false,
                    // 'proxy' => 'socks5://127.0.0.1:1212'
                ]);

                $arr = json_decode($response->getBody(), true);
                if ($arr['ErrorCode'] == 0 && $arr['OrderStatus']  == 2) {
                $order->online_payment = 1;
                $order->save();

                $response = Http::withHeaders([
                    'Content-Type' => 'application/json'

                ])->post('http://217.174.227.29/auth/jwt/create', [
                                                        'username' => 'inetmarket',
                                                        'password' => 'InternetMarket-2020',
                                                    ])->throw()->json();

                $accessToken = $response['access'];

                $client = new Client([
                'headers' => [ 'Authorization' => 'JWT '.$accessToken ]
                ]);

                $response = $client->post('http://217.174.227.29/api/send-message/',
                    ['form_params' =>
                        [
                            'phone' => '993'.$order->user_phone, 'message' => 'Hormatly musderi! Sizin sargydynyz kabul edildi'
                    ]
                ]
                );


                return redirect()->route('cart')->with([
                    'status'=>'Sargydyňyz kabul edildi'
                ]);
                }else{
                    return redirect()->route('cart')->with('error', 'Toleg amala asyrylmady');
                }


            }

            return redirect()->back();
        }
            return redirect()->back();
    }
}
