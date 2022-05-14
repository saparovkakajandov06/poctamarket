@extends('layouts.admin')

@section('style')
    <link href="{{asset('admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('content')


    <div class="page-wrapper" style="display:block">

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
                                        <td>Товар</td>
                                        <td>Отзывы и вопросы</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($otzyw as $otzyw)
                                        <tr>
                                            <td style="vertical-align:middle">{{ $otzyw->id }}</td>
                                            <td style="vertical-align:middle">{{ $otzyw->product->name_tk }}</td>

                                            <td align="center" style="vertical-align:middle">{{ ($otzyw->otzyw) }}</td>

                                            <td align="center" style="vertical-align:middle">
                                                <form action="{{ route('admin_otzyw_delete',['id'=>$otzyw->id]) }}" class="delete-product-form" method="post" enctype="multipart/form-data" style="display:inline-block">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
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