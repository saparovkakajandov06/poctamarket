@extends('layouts.admin')

@section('style')
<!--<link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">-->
<link href="{{asset('admin/dist/css/select.css')}}" rel="stylesheet">

<style>
    .alert-custom-red {
        background-color: red;
        color: #fff;
    }
</style>
@endsection

@section('content')
<div class="page-wrapper" style="display:block">

<div class="page-breadcrumb">
            <div class="row">
                <div class="col-9">
                    @if(session('status'))
                    <div class="alert alert-success mt-3">
                    {{ session('status') }}
                    </div>
                    @endif

                    @if(count($errors))
                    <div class="alert alert-danger mt-3">
                    <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
                </div>
              
            </div>
        </div>
        
        <div class="container-fluid">
            <form method="post" id="father">
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="jumbotron">
                                <h1 class="display-4">Заказ # {{ $order->id }}</h1>
                                <p class="lead"> <span class="font-weight-bold">Name: &nbsp;</span>

                                    @if($order->user_id != null)
                                    <input type="text" name="user_name" value="{{ $order->user->name}}" required> 
                                        
                                    @else
                                    <input type="text" name="user_name" value="{{ $order->user_name}}" required> 
                                        
                                    @endif
                                </p>
                                 <p class="lead"> <span class="font-weight-bold">Surname: &nbsp;</span>

                                    @if($order->user_id != null)
                                    <input type="text" name="surname" value="{{ $order->user->surname }}" required> 
                                        
                                    @else
                                    <input type="text" name="surname" value="{{ $order->user_surname }}" required> 
                                        
                                    @endif
                                </p>
                                <p class="lead"><span class="font-weight-bold">Телефон: &nbsp;</span>
                                    @if($order->user_id != null)
                                    <input type="text" name="phone" value="{{ $order->user->phone }}" required>
                                        
                                    @else
                                    <input type="text" name="phone" value="{{ $order->user_phone }}" required>
                                       
                                    @endif
                                </p>

                                <p class="lead"><span class="font-weight-bold">Email: &nbsp;</span>
                                    @if($order->user_id != null)
                                    <input type="email" name="email" value="{{ $order->user->email }}">
                                        
                                    @else
                                    <input type="email" name="email" value="{{ ($order->email) ? $order->email : '' }}">

                                        
                                    @endif
                                </p>

                                <p class="lead"><span class="font-weight-bold">Регион: &nbsp;</span>
                                   
                                    <input type="text" name="region" value="{{ json_decode($order->address)->region }}">
                                </p>

                                <p class="lead"><span class="font-weight-bold">City: &nbsp;</span>
                                   
                                    <input type="text" name="city" value="{{ json_decode($order->address)->city }}">
                                </p>

                                <p class="lead"><span class="font-weight-bold">street: &nbsp;</span>
                                   
                                    <input type="text" name="street" value="{{ json_decode($order->address)->street }}">
                                </p>

                                 <p class="lead"><span class="font-weight-bold">house: &nbsp;</span>
                                  
                                    <input type="text" name="house" value="{{ json_decode($order->address)->house }}">
                                    
                                </p>

                                <p class="lead"><span class="font-weight-bold">apartment: &nbsp;</span>
                                   @isset(json_decode($order->address)->apartment) 
                                    <input type="text" name="apartment" value="{{ json_decode($order->address)->apartment }}">
                                    @else
                                    <input type="text" name="apartment" value="">
                                    @endisset
                                </p>

                                <p class="lead"><span class="font-weight-bold">korpus: &nbsp;</span>
                                   @isset(json_decode($order->address)->korpus) 
                                    <input type="text" name="korpus" value="{{ json_decode($order->address)->korpus }}">
                                    @else
                                    <input type="text" name="korpus" value="">
                                    @endisset
                                </p>

                                

                                

                                <hr class="my-4">
                                <p class="lead"><span class="font-weight-bold">Получение: &nbsp;</span>
                                    <select name="delivery">
                                        <option value="0" @if($order->delivery == 0) selected @endif>Курьер</option>
                                        <option value="1" @if($order->delivery == 1) selected @endif>Самовывоз</option>
                                    </select>
                                    
                                </p>
                                <p class="lead"><span class="font-weight-bold">Оплата: &nbsp;</span>
                                    <select name="pay_method">
                                        <option value="0" @if($order->paymenttype == 0) selected @endif>Nagt töleg</option>
                                        <option value="1" @if($order->paymenttype == 1) selected @endif>Nagt töleg</option>
                                        <option value="2" @if($order->paymenttype == 2) selected @endif>Çapara kart bilen töleg</option>
                                        <option value="3" @if($order->paymenttype == 3) selected @endif>Onlaýn töleg</option>
                                    </select>
                                    
                                </p>
                                <p class="lead"><span class="font-weight-bold">Комментарии к заказу: &nbsp;</span>
                                    <textarea name="comment">{{($order->comments)?$order->comments:''}}</textarea>
                                    
                                </p>
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered display no-wrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <td>Фото</td>
                                            <td>Арикул</td>
                                            <td>Товар</td>
                                            <td>Стоимость</td>
                                            <td>Кол-во</td>
                                            <td>Цена</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productsInOrder as $key => $prod)
                                        <tr id="{{$key}}">
                                            <td><img src="{{ asset('images/products/little/' . $prod->img) }}" height="158" alt=""></td>
                                            <td>{{ $prod->code }}</td>
                                            <td><span class="h2"><a href="{{route('oneProduct', ['id' => $prod->id])}}">{{ $prod->name_tk }}</a></span> <br>
                                                <span class="font-weight-bold">Reňki: </span>{{ $prod->color_tk }} <br>
                                                <span class="font-weight-bold">Ölçegi: </span>{{ $prod->size }}
                                            </td>
                                            <td>{{ number_format($prod->price,2,'.','') }}</td>
                                            <td><input type="number" name="{{$key}}" value="{{ $prod->amount }}"></td>
                                            <td>{{ number_format($prod->price * $prod->amount,2,'.','') }}</td>
                                            <td align="center">
                                                <a href="{{ route('admin_products_detailed',['id'=>$prod->id]) }}" title="Детально"><i class="fas fa-eye"></i></a>
                                            </td>
                                            <td><p class="btn btn-danger" onclick="confirm('Are you sure you want to delete this product?') ? deleteProduct('{{$key}}') : ''">delete</p></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Фото</td>
                                            <td>Арикул</td>
                                            <td>Товар</td>
                                            <td>Стоимость</td>
                                            <td>Кол-во</td>
                                            <td>Цена</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="pr" class="row"> 
                                <div class="form-group px-4">
                                    <select name="prod_name_add" id="prod_name" class="selectpicker" data-live-search="true">
                                        <option value="0">Haryt saylan</option>
                                        @foreach($products as $item)
                                        <option value="{{$item->id}}">{{$item->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group pr-4">
                                    <select class="form-control" name="color_prod" id="color_prod">
                                        <option>Ilki onum saylan</option>
                                    </select>
                                </div>
                                <div class="form-group pr-4">
                                    <select class="form-control" name="size_prod" id="size_prod">
                                        <option>Ilki renk saylan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="number" name="count">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="jumbotron">
                                @if($order->delivery == 0)
                                <p class="lead"> <span class="font-weight-bold"> Доставка: &nbsp;</span> 
                                    {{ $order->delivery_sum ?? '20' }} TMT
                                </p>
                                @endif
                                <p class="lead"><span class="font-weight-bold">Общая стоимость: &nbsp;</span>
                                    {{ number_format($order->total_price,2,'.','') }}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit">Save</button>
            </form>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include('inc.footer')
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection

@section('scripts')
    <!--<script src="{{asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>-->
    <script src="{{asset('admin/dist/js/select.js')}}"></script>

    <script type="text/javascript">
        function deleteProduct(id){
            $('#'+id).remove();
            $('#father').submit();
            
           
        }
    </script>
    <script type="text/javascript">
        $( "#prod_name" ).change(function() {
          
          $.ajax({
            url: "/administrator/get_color_ajax/"+$(this).val(), 
            success: function(result){
            $("#color_prod").html(result);
         
          }});
        });

        $( "#color_prod" ).change(function() {
          
          $.ajax({
            url: "/administrator/get_size_ajax/"+$( "#prod_name" ).val()+"/"+$(this).val(), 
            success: function(result){
            $("#size_prod").html(result);
         
          }});
        });

    </script>
@endsection
