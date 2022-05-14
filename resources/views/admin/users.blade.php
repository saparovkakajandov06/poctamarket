@extends('layouts.admin')

@section('style')
    <link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
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
                <div class="col-3 align-self-center">
                    <div class="customize-input float-right">
                        <a href="{{ route('users.create') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius">Добавить</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="my_order" class="table table-striped table-bordered"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Логин</td>
                                        <td>Имя</td>
                                        <td>Фамилия</td>
                                        <td>Email</td>
                                        <td>Телефон</td>
                                        <td>Роль</td>
                                        <td>Добавлен</td>
                                        
                                        <td></td>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->login }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->surname }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        
                                        <td align="center">
                                            <a href="{{ route('users.edit', ['user'=>$item->id]) }}" title="Изменить"><i class="fas fa-edit"></i></a>

                                            <form action="{{ route('users.destroy', ['user'=>$item->id]) }}" class="delete-product-form" method="post" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-transparent border-0 p-0" title="Удалить">
                                                    
                                                    <a href="#"><i class="far fa-times-circle delete-button">
                                                    </i></a>
                                                </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                    [1, "asc"]
                ],
                stateSave: true
            });
        })
    </script>
@endsection