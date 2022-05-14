@extends('layouts.admin')

@section('style')
<link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
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
                <div class="col-2">
                    <button><a href="{{route('admin_order_edit', ['id' =>$order->id ])}}">Edit</a></button>
                    <button><a href="{{route('getPdf', ['id' =>$order->id ])}}">PDF</a></button>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="jumbotron">
                                <h1 class="display-4">Заказ # {{ $order->id }}</h1>
                                <p class="lead"><span class="font-weight-bold">Дата заказа:</span> {{ $order->created_at }} </p>
                                <p class="lead"> <span class="font-weight-bold">ФИО: &nbsp;</span> 
                                    @if($order->user_id != null)
                                        {{ $order->user->name . ' ' . $order->user->surname }}
                                    @else
                                        {{ $order->user_name . ' ' . $order->user_surname }}
                                    @endif
                                </p>
                                <p class="lead"><span class="font-weight-bold">Телефон: &nbsp;</span>
                                    @if($order->user_id != null)
                                        +993 {{ $order->user->phone }}
                                    @else
                                        +993 {{ $order->user_phone }}
                                    @endif
                                </p>

                                <p class="lead"><span class="font-weight-bold">Email: &nbsp;</span>
                                    @if($order->user_id != null)
                                        {{ $order->user->email }}
                                    @else
                                        {{ ($order->email) ? $order->email : '' }}
                                    @endif
                                </p>

                                <p class="lead"><span class="font-weight-bold">Адрес: &nbsp;</span>
                                    @isset(json_decode($order->address)->region) 
                                        {{ 'вел. ' . json_decode($order->address)->region }}
@endisset
@isset(json_decode($order->address)->region) 
                                         {{ ', г. ' . json_decode($order->address)->city }}
                                         @endisset
                                         @isset(json_decode($order->address)->street) 
                                        {{ ', ул. ' . json_decode($order->address)->street }} 
@endisset
                                         @isset(json_decode($order->address)->house) 

                                        {{ ', д. '.json_decode($order->address)->house}}
                                        @endisset
                                        @isset(json_decode($order->address)->apartment) 
                                        {{', кв. ' . json_decode($order->address)->apartment}} <br>
                                        @endisset
                                        @isset(json_decode($order->address)->korpus) 
                                        {{', корп. ' . json_decode($order->address)->korpus}} <br>
                                        @endisset
                                </p>

                                

                                <hr class="my-4">
                                <p class="lead"><span class="font-weight-bold">Получение: &nbsp;</span>
                                    {{ $order->delivery == 0 ? 'Курьер' : 'Самовывоз'  }}
                                </p>
                                <p class="lead"><span class="font-weight-bold">Оплата: &nbsp;</span>
                                    @switch($order->paymenttype)
                                        @case(0)
                                            Nagt töleg
                                            @break
                                        @case(1)
                                            Nagt töleg
                                            @break

                                        @case(2)
                                            Çapara kart bilen töleg
                                            @break
                                        @case(3)
                                            Onlaýn töleg
                                            @break
                                    @endswitch
                                </p>
                                <p class="lead"><span class="font-weight-bold">Комментарии к заказу: &nbsp;</span>
                                    {{ ($order->comments) ? $order->comments : ''  }}
                                </p>
                                <p class="lead  alert td-for-status-in-admin-1 
                                        @switch($order->status)
                                            @case(0)
                                                alert-danger
                                            @case(1)
                                                alert-warning
                                                @break
                                            @case(2)
                                                alert-success
                                                @break
                                            @case(3)
                                                alert-custom-red
                                                @break
                                        @endswitch
                                    "><span class="font-weight-bold">Статус: &nbsp;</span>
                                        @switch($order->status)
                                            @case(0)
                                                Новый
                                                @break
                                            @case(1)
                                                В обработке
                                                @break
                                            @case(2)
                                                Закрыт
                                                @break
                                            @case(3)
                                                Отменен
                                                @break
                                        @endswitch

                                        <p>
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                Изменить статус
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                                <form action="{{ route('admin_orders_editstatus',['id'=>$order->id]) }}" method="post" class="p-3 form-for-status-in-admin">
                                                    @csrf 
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="0" {{$order->status == 0 ? 'checked' : ''}} id="customRadio1{{ $order->id }}" name="status" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1{{ $order->id }}">Новый</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="1" {{$order->status == 1 ? 'checked' : ''}} id="customRadio2{{ $order->id }}" name="status" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio2{{ $order->id }}">В обработке</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="2" {{$order->status == 2 ? 'checked' : ''}} id="customRadio3{{ $order->id }}" name="status" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio3{{ $order->id }}">Закрыт</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="3" {{$order->status == 3 ? 'checked' : ''}} id="customRadio4{{ $order->id }}" name="status" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio4{{ $order->id }}">Отменен</label>
                                                    </div>
                                                    <div class="mt-3">
                                                        <input type="submit" class="btn btn-primary btn-sm" value="Изменить статус">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        {{--
                                        <p class="lead"><span class="font-weight-bold">Комментарий администратора:</span></p>
                                        <form action="#">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-info">Оставить (Изменить) комментарий</button>
                                                </div>
                                            </div>
                                        </form> --}}
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productsInOrder as $prod)
                                        <tr>
                                            <td><img src="{{ asset('images/products/little/' . $prod->img) }}" height="158" alt=""></td>
                                            <td>{{ $prod->code }}</td>
                                            <td><span class="h2"><a href="{{route('oneProduct', ['id' => $prod->id])}}">{{ $prod->name_tk }}</a></span> <br>
                                                <span class="font-weight-bold">Reňki: </span>{{ $prod->color_tk }} <br>
                                                <span class="font-weight-bold">Ölçegi: </span>{{ $prod->size }}
                                            </td>
                                            <td>{{ number_format($prod->price,2,'.','') }}</td>
                                            <td>{{ $prod->amount }}</td>
                                            <td>{{ number_format($prod->price * $prod->amount,2,'.','') }}</td>
                                            <td align="center">
                                                <a href="{{ route('admin_products_detailed',['id'=>$prod->id]) }}" title="Детально"><i class="fas fa-eye"></i></a>
                                            </td>
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
    <script src="{{asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endsection
