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
                        <a href="{{ route('admin_ikigapdal_new') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius">Новый блок</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered display no-wrap"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td></td>
                                        <td>Текст</td>
                                        <td>Порядок</td>
                                        <td>Ссылка</td>
                                        <td></td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($old as $old)
                                        <tr>
                                            <td style="vertical-align:middle">{{ $old->id }}</td>
                                            <td align="center"><img src="{{ asset($old->img) }}" height="90" alt=""></td>

                                            <td align="center" style="vertical-align:middle">{{ ($old->title) }}</td>
                                            <td align="center" style="vertical-align:middle">{{ $old->sort_order }}</td>
                                            <td align="center" style="vertical-align:middle"><a href="{{ ($old->link) }}">{{ ($old->link) }}</a></td>
                                            <td align="center" style="vertical-align:middle">
                                                <a href="{{ route('admin_ikigapdal_edit',['id'=>$old->id]) }}" title="Изменить"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin_ikigapdal_edit', ['id'=>$old->id]) }}" class="delete-product-form" method="post" style="display:inline-block">
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
                                    <tfoot>
                                    <tr>
                                        <td>#</td>
                                        <td></td>
                                        <td>Порядок</td>
                                        <td>Текст</td>
                                        <td>Ссылка</td>
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
@endsection