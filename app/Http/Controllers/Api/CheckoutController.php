<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Http\Resources\ProductResource;
use App\Order;
use App\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{


    public function store(Request $request)
    {
        $validator = Validator::make($request->post(), [
            'products' => 'required|array',
            'products.*.id' => 'required|integer',
            'products.*.quantity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'message' => 'Validation error',
            ], 400);
        }



        $productsArr = [];
        foreach($request->products as $e){
            $product = Product::where('id', $e['id'])->first();
            array_push($productsArr, [
                $product->id => [
                    'id' => $product->id,
                    'amount' => $e['quantity'],
                    'name_tk' => $product->name_tk,
                    'code' => $product->code,
                    'price' => $product->price,
                    'img' => $product->img,
                    "color_tk" => "",
                    "size" => null,
                ],
            ]);
        }

        $paymenttypes = [
            [
                'id' => 1,
                'name' => [
                    'tk' => 'Nagt tölemek',
                    'en' => 'Cash payment',
                    'ru' => 'Оплата наличными',
                ],
                'slug' => 'Nagt tölemek',
            ],
            [
                'id' => 3,
                'name' => [
                    'tk' => 'Bank tölegi',
                    'en' => 'Bank payment',
                    'ru' => 'Банковский платеж',
                ],
                'slug' => 'Bank tölegi',
            ],
        ];

        $total_price = 0;
        foreach($request->products as $e){
            $product = Product::where('id', $e['id'])->first();
            $sum = $e['quantity'] * $product->price;
            $total_price=$total_price+$sum;
        }

        $order = new Order();

        $order->user_id = $request->user()->id;
        $order->user_name = $request->user()->name;
        $order->user_surname = $request->user()->surname;
        $order->email = $request->user()->email;
        $order->user_phone = $request->user()->phone;
        $order->address = $request->user()->address;
        $order->products = $request->products = json_encode((object) $productsArr);
        $order->delivery = $request->delivery = intval($request->input('delivery'));

        $order->total_price = $total_price +
            (intval($request->input('delivery')) == 30 ? floatval($request->input('delivery_sum')) : 30);

        $order->paymenttype = 0;
        $order->status = -1;
        $order->save();



        return response([
            'success' => true,
            'message' => [
                'tk' => 'Sargyt üstünlikli döredildi',
                'en' => 'Order successfully created',
                'ru' => 'Заказ успешно создан',
            ],
            'order_id' => $order->id,
            'final_price' => $order->total_price,
            'payment_methods' => $paymenttypes
        ]);
    }


    public function save(Request $request)
    {
        $validator = Validator::make($request->post(), [
            'order_id' => 'required|exists:orders,id',
            'address' => 'required|string',
            'comments' => 'nullable|string',
            'payment_method' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'message' => 'Validation error',
            ], 400);
        }

        $order = Order::find($request->order_id);

        if ($order->status == 0) {
            return response([
                'success' => false,
                'message' => [
                    'tk' => 'Sargyt eýýäm tassyklandy',
                    'en' => 'The order has already been approved',
                    'ru' => 'Заказ уже одобрен',
                ],
            ], 400);
        }

        $order->update([
            'address' => $request->address,
            'comment' => $request->comment,
            'paymenttype' => $request->payment_method,
        ]);


        if ($request->payment_method == 1) {
            $order->update([
                'status' => 0
            ]);

            return response()->json([
                'success' => true,
                'message' => [
                    'tk' => 'Sargyt üstünlikli tassyklandy',
                    'en' => 'Order has been successfully approved',
                    'ru' => 'Заказ был успешно одобрен',
                ],
            ]);
        } elseif ($request->payment_method == 3) {
            return $this->onlinePayment($request, $order);
        } else {
            $order->forceDelete();
            return response([
                'success' => false,
                'message' => [
                    'tk' => 'Nädogry töleg usuly',
                    'en' => 'Wrong payment method',
                    'ru' => 'Неверный способ оплаты',
                ]
            ], 401);
        }
    }


    public function onlinePayment(Request $request, Order $order)
    {

        $returnURL = route('payment_success', ['id' => $order->id]);

        //  $returnURL = $this->paymentDone($request,  $order->id); 

//         $client = new Client();
         $client = new Client(['verify'=>false]);
         $response = $client->post('https://mpi.gov.tm/payment/rest/register.do', [
             'verify' => false,
             'form_params' => [
                 //OLD credentials
                 //'password' => 'D1K2S5r26757',
                 //'userName' => '103161020074',
                 'password' => 'G3h35D1t2Err',
                 'userName' => '1031610200743',
                 'pageView' => 'MOBILE',
                 'sessionTimeoutSecs' => 600,
                 'description' => 'turkmenpostmarket',
                 'orderNumber' => $order->id,
                 'amount' => str_replace([",", "."], "", strval($order->total_price)),
                 'currency'     => '934',
                 'language'       => 'ru',
                 'returnUrl'       => url($returnURL),
                 'failUrl'       => url($returnURL),
             ],
         ]);


  $response = json_decode($response->getBody(), true);

        //  if (isset($response['errorCode'])) {
        //     return response([
        //         'success' => false,
        //         'message' => [
        //             'tk' => $response['errorMessage'],
        //             'en' => $response['errorMessage'],
        //             'ru' => $response['errorMessage'],
        //         ]
        //     ], 401);
        // }

        
        
        // else {
            $order->update([
                'online_payment' => 3
            ]);

            $order->update([
                'paymenttype' => 3
            ]);

            return response([
                'success' => true,
                'message' => [
                    'tk' => 'Sargyt üstünlikli tassyklandy',
                    'en' => 'Order has been successfully approved',
                    'ru' => 'Заказ был успешно одобрен',
                ],
                'link' => $response['formUrl']

            ]);
        // }

    }


    public function paymentDone($id){
        //$d = $this->decrypt($id,'ssjdfuereu%$jedfnsjd*&ejrfh@');
        //dd(substr($d, 5));
        if($id){
            //$d = substr($d, 5);

            $order = \App\Order::where(['id' => $id, 'online_payment' => 0])->first();


            if($order){
                // $client  = new Client();
                $client = new Client(['verify'=>false]);
                $response = $client->post('https://mpi.gov.tm/payment/rest/getOrderStatus.do', [
                    'form_params' => [
                        'password' => 'G3h35D1t2Err',
                        'userName' => '1031610200743',
                        'orderId' => $order->desc,
                        'language'       => 'ru',
                    ],
                    // 'verify' => false,
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

                    return response([
                        'success' => true,
                        'message' => [
                            'tk' => 'Sargydyňyz kabul edildi',
                            'en' => 'Order has been successfully accepted',
                            'ru' => 'Заказ был успешно принято',
                        ],
                        'link' => $response['formUrl']
                    ]);


                }else{
                    return response([
                        'success' => false,
                        'message' => [
                            'tk' => 'Nädogry töleg usuly',
                            'en' => 'Wrong payment method',
                            'ru' => 'Неверный способ оплаты',
                        ]
                    ], 401);
                }


            }

            return redirect()->back();
        }
        return redirect()->back();
    }

    // public function onlinePayment(Request $request, Order $order)
    // {

    //      $returnURL = route('payment_success', ['id' => $order->id]);

    //     //  $client = new Client();
    //      $client = new Client(['verify'=>false]);
    //      $response = $client->post('https://mpi.gov.tm/payment/rest/register.do', [
    //          'form_params' => [
    //              //OLD credentials
    //              //'password' => 'D1K2S5r26757',
    //              //'userName' => '103161020074',
    //              'password' => 'G3h35D1t2Err',
    //              'userName' => '1031610200743',
    //              'pageView' => 'MOBILE',
    //              'sessionTimeoutSecs' => 600,
    //              'description' => 'turkmenpostmarket',
    //              'orderNumber' => $order->id,
    //              'amount' => str_replace([",", "."], "", strval($order->total_price)),
    //              'currency'     => '934',
    //              'language'       => 'ru',
    //              'returnUrl'       => url($returnURL),
    //              'failUrl'       => url($returnURL),
    //          ],
    //          'verify' => false,
    //      ]);



    //      if (isset($response['errorCode'])) {
    //         return response([
    //             'success' => false,
    //             'message' => [
    //                 'tk' => $response['errorMessage'],
    //                 'en' => $response['errorMessage'],
    //                 'ru' => $response['errorMessage'],
    //             ]
    //         ], 401);
    //     } else {
    //         $order->update([
    //             'online_payment' => $response['orderId']
    //         ]);

    //         $order->update([
    //             'paymenttype' => 3
    //         ]);

    //         return response([
    //             'success' => true,
    //             'message' => [
    //                 'tk' => 'Sargyt üstünlikli tassyklandy',
    //                 'en' => 'Order has been successfully approved',
    //                 'ru' => 'Заказ был успешно одобрен',
    //             ],
    //             'link' => $response['formUrl']
    //         ]);
    //     }
    // }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->post(), [
    //         'products' => 'required|array',
    //         'products.*.id' => 'required|integer',
    //         'products.*.amount' => 'required|integer',
    //     ]);

    //     if ($validator->fails()) {
    //         return response([
    //             'error' => $validator->errors(),
    //             'message' => 'Validation error',
    //         ], 400);
    //     }

    //     $productsArr = array();

    //     if($request->input('id')) $productsArr['id'] = $request->input('id');
    //     if($request->input('amount')) $productsArr['amount'] = $request->input('amount');

    //     $order = Order::create([
    //         'user_id' => $request->user()->id,
    //         'user_name' => $request->user()->name,
    //         'user_surname' => $request->user()->surname,
    //         'email' => $request->user()->email,
    //         'user_phone' => $request->user()->phone,
    //         'address' => $request->user()->address,
    //         'products' => $request->products = json_encode((object) $productsArr),
    //         'delivery' => $request->delivery = intval($request->input('delivery')),
    //         'total_price' => $request->total_price = $this->superGetTotalPrice($this->getProductsFromCart($request)) +
    //             (intval($request->input('delivery')) == 0 ? floatval($request->input('delivery_sum')) : 0),
    //         'paymenttype' => $request->paymenttype,
    //     ]);

        

    //     return response([
    //         'success' => true,
    //         'message' => [
    //             'tk' => 'Sargyt üstünlikli döredildi',
    //             'en' => 'Order successfully created',
    //             'ru' => 'Заказ успешно создан',
    //         ],
    //         'order_id' => $order->id,
    //         'final_price' => $order->total_price,
    //         'paymenttype' => $order->paymenttype

    //     ]);
    // }


    // public function save(Request $request)
    // {
    //     $validator = Validator::make($request->post(), [
    //         'order_id' => 'required|exists:orders,id',
    //         'street' => 'required',
    //         'house' => 'required',
    //         'region' => 'required',
    //         'city' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response([
    //             'error' => $validator->errors(),
    //             'message' => 'Käbir maglumatlar deňeşdirmede gabat gelýär.',
    //         ], 400);
    //     }

    //     $order = Order::find($request->order_id);

    //     if ($order->status == 1) {
    //         return response([
    //             'success' => false,
    //             'message' => 'Заказ уже одобрен',
    //         ], 400);
    //     }

    //     $order->update([
    //         'region' => $request->region,
    //         'city' => $request->city,
    //         'street' => $request->street,
    //         'house' => $request->house,
    //         'comments' => $request->comments,
    //     ]);


    //     if ($request->paymenttype == 1) {
    //         $order->update([
    //             'status' => true
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Заказ был успешно одобрен',
    //             'qr_code' => asset('images/rysgal-pay.png')
    //         ]);

    //     }

    //     elseif ($request->paymenttype == 3) {
    //         return $this->onlinePayment($request, $order);
    //     }


    //     else {
    //         $order->forceDelete();
    //         return response([
    //             'success' => false,
    //         'message' => 'Неверный способ оплаты',
    //         ], 401);
    //     }

    // }


    // public function onlinePayment(Request $request, Order $order)
    // {
    //     $data = [
    //         'userName' => config('online-payment.userName'),
    //         'password' => config('online-payment.password'),
    //         'orderNumber' => $order->id,
    //         'amount' => str_replace([",", "."], "", strval($order->total_price)),
    //         'currency' => 934,
    //         'returnUrl' => config('app.url') . '/payment'
    //     ];

    //     $response = Http::withOptions([
    //         'verify' => false,
    //     ])->get('https://agn.rysgalbank.tm/epg/rest/register.do', $data);

    //     if (isset($response['errorCode'])) {
    //         return response([
    //             'success' => false,
    //             'message' => [
    //                 'tk' => $response['errorMessage'],
    //                 'en' => $response['errorMessage'],
    //                 'ru' => $response['errorMessage'],
    //             ]
    //         ], 401);
    //     } else {
    //         $order->create([
    //             'online_payment' => $response['orderId']
    //         ]);

    //         $order->update([
    //             'status' => true
    //         ]);

    //         return response([
    //             'success' => true,
    //             'message' => [
    //                 'tk' => 'Sargyt üstünlikli tassyklandy',
    //                 'en' => 'Order has been successfully approved',
    //                 'ru' => 'Заказ был успешно одобрен',
    //             ],
    //             'link' => $response['formUrl']
    //         ]);
    //     }
    // }

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

}
