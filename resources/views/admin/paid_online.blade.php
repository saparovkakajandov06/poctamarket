@extends('layouts.admin')

@section('style')
    <link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <style>
        form.form-for-status-in-admin {
            background: #fff;
            color: #7c8798;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
            top: 0;
            left: 100%;
            display: none;
            /* width: 100%; */
            border: 3px solid #e8eef3;
        }
        td.td-for-status-in-admin-1 {
            position: relative;
            cursor: pointer;
        }
        td.td-for-status-in-admin-1:hover {
            background: #fff;
            color: #000;
        }
        td.td-for-status-in-admin-1:hover form.form-for-status-in-admin
        {
            display: block;
            
        }
        .alert-custom-red {
            background-color: red;
            color: #fff;
        }
        .alert-custom-blue {
            background-color: rgb(21, 134, 187);
            color: #fff;
        }
        .refund-parent{
            display: flex;
            justify-content: center;
        }
        .refund {
            /* display: inline-block; */
            margin: 1px auto; 
        }
    </style>
@endsection

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session()->has('success') && session()->has('msg') || session()->has('error'))
{{ $msg = session()->get('msg')}}
@if(session()->get('success')==1)
<script>
//     alert(session()->get('msg'))
swal("{{$msg}}", "", "success");
// swal("!", "You clicked the button!", "error");
// swal({
//     title: "Good job!",
//     text: "{{$msg}}",
//     icon: "success",
//     button: "ok!",
//   });
  </script>
@else
<script>    
    swal("{{$msg}}", "", "error");
</script>
@endif
@endif

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
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="my_order" class="table table-striped table-bordered display no-wrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>ФИО</td>
                                            <td>Получение</td>
                                            <td>Оплата</td>
                                            <td>Статус</td>
                                            <td>Yzyna gecirmek</td>
                                            <td>Дата заказа</td>
                                            <td></td>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $ord)
                                        <tr>
                                            <td>{{ $ord->id }}</td>
                                            <td>
                                                @if($ord->user != null)
                                                    {{ $ord->user->name . ' ' . $ord->user->surname }}
                                                @else
                                                    {{ $ord->user_name . ' ' . $ord->user_surname }}
                                                @endif
                                            </td>
                                            <td>{{ $ord->delivery == 0 ? 'Курьер' : 'Самовывоз' }}</td>
                                            <td class="alert
                                                        bg-secondary text-white
                                            ">
                                                    Onlaýn töleg
                                            </td>
                                            <td class=" alert td-for-status-in-admin-1
                                                @switch($ord->status)
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
                                                    @case(9)
                                                        alert-custom-blue
                                                        @break
                                                @endswitch
                                            ">
                                                
                                                @switch($ord->status)
                                                @case(0)
                                                        <span style="opacity:0">0</span>Новый
                                                        @break
                                                    @case(1)
                                                        <span style="opacity:0">1</span>В обработке
                                                        @break
                                                    @case(2)
                                                        <span style="opacity:0">2</span>Закрыт
                                                        @break
                                                    @case(3)
                                                        <span style="opacity:0">3</span>Отменен
                                                        @break
                                                    @case(9)
                                                        <span style="opacity:0">9</span>Возврат
                                                        @break
                                                @endswitch
                                                <form action="{{ route('admin_orders_editstatus',['id'=>$ord->id]) }}" method="post" class="p-3 form-for-status-in-admin">
                                                    @csrf 
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="0" {{$ord->status == 0 ? 'checked' : ''}} id="customRadio1{{ $ord->id }}" name="status" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1{{ $ord->id }}">Новый</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="1" {{$ord->status == 1 ? 'checked' : ''}} id="customRadio2{{ $ord->id }}" name="status" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio2{{ $ord->id }}">В обработке</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="2" {{$ord->status == 2 ? 'checked' : ''}} id="customRadio3{{ $ord->id }}" name="status" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio3{{ $ord->id }}">Закрыт</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="3" {{$ord->status == 3 ? 'checked' : ''}} id="customRadio4{{ $ord->id }}" name="status" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio4{{ $ord->id }}">Отменен</label>
                                                    </div>
                                                    <div class="mt-3">
                                                        <input type="submit" class="btn btn-primary btn-sm" value="Изменить статус">
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="refund-parent"><a class="refund" href="{{route('refund', ['id'=>$ord->id])}}" onclick="return confirm('Siz hakykatdanam geçirilen puly yzyna geçirmek isleýärsiňizmi?')">Yzyna gecir</a></td>
                                            <td>{{ $ord->created_at }}</td>
                                            <td align="center">
                                                <a href="{{ route('admin_orders_detailed',['id'=>$ord->id]) }}" title="Детально"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>#</td>
                                            <td>ФИО</td>
                                            <td>Получение</td>
                                            <td>Оплата</td>
                                            <td>Статус</td>
                                            <td>Дата заказа</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
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

    <script>
        jQuery(document).ready(function($) {
            $('#my_order').DataTable({
                "order": [
                    [4, "asc"]
                ],
                "pageLength": 50
            });
        })
    </script>
@endsection
