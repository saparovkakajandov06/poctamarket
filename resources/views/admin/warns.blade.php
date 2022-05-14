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
                        <a href="{{ route('admin_warn_new') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius">Добавить Popup</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="default_order" class="table table-striped table-bordered"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Kategoriya</td>
                                    <td>Prosent</td>
                                    <td>Surat</td>

                                    <td></td>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($warns as $warns)
                                    <tr>
                                        <td>{{ $warns->id }}</td>
                                        <td>{{ $warns->category->name_tk }}</td>
                                        <td>{{ $warns->prosent }}</td>
                                        <td align="center"><img src="{{ asset($warns->img) }}" height="100" alt=""></td>

                                        <td align="center">

                                            <a href="{{ route('admin_warn_edit', ['id'=>$warns->id]) }}" title="Изменить"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin_warn_edit', ['id'=>$warns->id]) }}" class="delete-product-form" method="post" style="display:inline-block">
                                                @csrf
                                                @method('DELETE');
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
@endsection