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
                                        @foreach($bottomblocks as $bb)
                                        <tr>
                                            <td style="vertical-align:middle">{{ $bb->id }}</td>
                                            <td align="center"><img src="{{ asset($bb->img) }}" height="90" alt=""></td>
                                            
                                            <td align="center" style="vertical-align:middle">{{ ($bb->title) }}</td>
                                            <td align="center" style="vertical-align:middle">{{ $bb->sort_order }}</td>
                                            <td align="center" style="vertical-align:middle"><a href="{{ ($bb->link) }}">{{ ($bb->link) }}</a></td>
                                            <td align="center" style="vertical-align:middle">
                                                <a href="{{ route('admin_bottomblocks_edit',['id'=>$bb->id]) }}" title="Изменить"><i class="fas fa-edit"></i></a>
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