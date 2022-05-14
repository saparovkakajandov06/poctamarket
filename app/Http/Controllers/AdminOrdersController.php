<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Exports\OrdersExport;
use App\Exports\OrdersThisMonthExport;
use App\Exports\OrdersLastMonthExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Product;
use DB;

class AdminOrdersController extends SiteController
{
    public function index() {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher') {
            $users = User::all();
            return view('admin.orders')->with(
                [
		    'orders'=>\App\Order::whereIn('paymenttype', [0, 1, 2])->orWhere(function($query) {
                	$query->where('paymenttype', 3)
                      	->where('online_payment', 1);
            		})->orderBy('created_at','desc')->get(),
                    'page_title'=>'Заказы',
                    'users' => $users,

                ]
            );
        } else {
            abort(403);
        }
    }

    public function detailed($id) {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher') {
            return view('admin.detailed_order')->with([
                'page_title' => 'Детальная информация о заказе',
                'order' => \App\Order::find($id),
                'productsInOrder' => json_decode(\App\Order::find($id)->products),
            ]);
        } else {
            abort(403);
        }
    }
    
    public function editstatus(Request $request, $id) {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher') {
        try{
            $order = \App\Order::find($id);
            $order->status = intval($request->input('status'));
            $order->update();
            return redirect()->back()->with('status','Статус заказа изменен');
        }
        catch(Exception $e) {
            return redirect()->back()->with('error','Ошибка изменения: ' . $e->getMessage());
        }
        } else {
            abort(403);
        }
    }

    public function getPaidOnline() {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher') {
            return view('admin.paid_online')->with(
                [
                    'orders'=>\App\Order::where('online_payment',1)->get(),
                    'page_title'=>'Оплата (онлайн)'
                ]
            );
        } else {
            abort(403);
        }

    }

    public function excelWholePeriod() {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher') {
        return Excel::download(new OrdersExport, 'orders.xlsx');
        } else {
            abort(403);
        }
    }

    public function excelThisMonth() {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher') {
        return Excel::download(new OrdersThisMonthExport, 'orders.xlsx');
        } else {
            abort(403);
        }
    }

    public function excelLastMonth() {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher') {
        return Excel::download(new OrdersLastMonthExport, 'orders.xlsx');
        } else {
            abort(403);
        }
    }

    public function editOrder(Request $request, $id){
        $order = \App\Order::find($id);
        if($request->isMethod('get')){
            if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher') {
                return view('admin.edit_order')->with([
                    'page_title' => 'Детальная информация о заказе',
                    'order' => $order,
                    'productsInOrder' => json_decode($order->products),
                    'products' => Product::where('availability', 1)->get(),
                ]);
            } else {
                abort(403);
            }
        }
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher') {
            $total_price = 0;
            $productsInOrder = json_decode($order->products);

            foreach($productsInOrder as $key => $prod){
                if($request->get($key)){
                    $prod->amount = $request->get($key);
            $total_price = $total_price + ($request->get($key) * $prod->price);
                    
                }else{
                    unset($productsInOrder->$key);
                }

            }

            $prod = Product::where('id', $request->get('prod_name_add'))->first();
            if($prod != null) {
                if ($request->get('color_prod') != 0 && $request->get('size_prod') != ""){
                $total_price = $total_price + ($request->get('count') * $prod->price);


                    $uniqueIdInCart = $prod->id . "_" . $request->get('color_prod') . "_" . $request->get('size_prod');
                
                    $productsInOrder->{$uniqueIdInCart}['amount'] = $request->get('count');

                            
                    $colorFromDb = $prod->colors()->where('id',$request->get('color_prod'))->first();

                    $productsInOrder->{$uniqueIdInCart}['id'] = $prod->id;
                    $productsInOrder->{$uniqueIdInCart}['name_tk'] = $prod->name_tk;
                    $productsInOrder->{$uniqueIdInCart}['code'] = $prod->code;
                    $productsInOrder->{$uniqueIdInCart}['price'] = $prod->price;
                    $productsInOrder->{$uniqueIdInCart}['img'] = json_decode($prod->img)->main;
                    $productsInOrder->{$uniqueIdInCart}['color_tk'] = ($colorFromDb) ? $colorFromDb->color_tk : '';
                    $productsInOrder->{$uniqueIdInCart}['size'] = $request->get('size_prod'); 
                }
            }

            $order->user_name = $request->get('user_name');
            $order->user_surname = $request->get('surname');
            $order->user_phone = $request->get('phone');
            $order->email = $request->get('email');
            $order->comments = $request->get('comment');
            
            $order->delivery = $request->get('delivery');
            $order->paymenttype = $request->get('pay_method');
            $order->products = json_encode($productsInOrder);


            $addressArr = array();
                        
            if($request->input('region')) $addressArr['region'] = $request->input('region');
            if($request->input('city')) $addressArr['city'] = $request->input('city');
            if($request->input('street')) $addressArr['street'] = $request->input('street');
            if($request->input('house')) $addressArr['house'] = $request->input('house');
            if($request->input('apartment')) $addressArr['apartment'] = $request->input('apartment');
            if($request->input('korpus')) $addressArr['korpus'] = $request->input('korpus');

            $order->address = json_encode((object) $addressArr);
            
            $order->total_price = $total_price;
            $order->save();

            return redirect()->back();

        }
    }

    public function getPdf($id){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher') {
        $productsInOrder = json_decode(\App\Order::find($id)->products);
        $total = 0;
        foreach ($productsInOrder as $key => $prod) {
            $total = $total + $prod->price * $prod->amount;
        }
            $data = ['order' => \App\Order::where('id', $id)->first(), 'productsInOrder' => $productsInOrder, 'total' => $total];

            $pdf = PDF::loadView('pdf', $data);
            return $pdf->download('invoice.pdf');
        }else{
            abort('403');
        }
    }


    public function ajaxColor($prod_id){
        $prod = Product::where('id',$prod_id)->first();
        $colors = $prod->colors()->get();

        $answer = "<option>Renki saylan</option>";

        foreach ($colors as $key => $value) {
            $answer = $answer .'<option value="'.$value->id.'">'.$value->color_tk.'</option>';
        }

        return $answer;
    }

    public function ajaxSize($prod_id, $color_id){
        $prod_id = intval($prod_id);
        $color_id = intval($color_id);

        $sizes = DB::table('color_product')->where([
            ['product_id', '=', $prod_id],
            ['color_id', '=', $color_id],
        ])->get();

        $answer = "";
        foreach ($sizes as $value) {
        
            foreach (json_decode($value->sizes) as $key => $item) {
                $answer = $answer .'<option value="'.$key.'">'.$key.'</option>';
            }
        }   
        return $answer;
    }


}
