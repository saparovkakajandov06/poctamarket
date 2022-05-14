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
                        <a href="{{ route('admin_colors_new') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius">Новый цвет</a>
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
                                <table id="color_config" class="table table-striped table-bordered display no-wrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <td style="max-width: 30px">#</td>
                                            <td></td>
                                            <td>Цвет</td>
                                            <td></td>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($colors as $c)
                                        <tr>
                                            <td style="vertical-align:middle">{{ $c->id }}</td>
                                            <td align="center"><span class="alert" style="background:{{ $c->color }}">{{ $c->color }}</span></td>
                                            <td align="center" style="vertical-align:middle">{{ $c->color_tk }}</td>
                                            <td align="center" style="vertical-align:middle">
                                                @if($c->color != 'transparent')
                                                <a href="{{ route('admin_colors_edit',['id'=>$c->id]) }}" title="Изменить"><i class="fas fa-edit"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <td style="max-width: 50px">#</td>
                                            <td></td>
                                            <td>Цвет</td>
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
            $('#color_config').DataTable({
                stateSave: true,
                "pageLength": 100
            });
        })
    </script>
@endsection
