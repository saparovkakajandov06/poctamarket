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
                        <a href="{{ route('admin_slider_new') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius">Новый слайд</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">

        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a href="#slider1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                    <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">Слайдер 1</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#slider2" data-toggle="tab" aria-expanded="false" class="nav-link">
                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                    <span class="d-none d-lg-block">Слайдер 2</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show active" id="slider1">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td></td>
                                                <td>Заголовок</td>
                                                <td>Ссылка</td>
                                                <td>Описание</td>
                                                <td>Порядок</td>
                                                <td>Статус</td>
                                                <td></td>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($slides as $s)
                                            @if($s->slider_id == 1)
                                            <tr>
                                                <td style="vertical-align:middle">{{ $s->id }}</td>
                                                <td align="center"><img src="{{ asset($s->img) }}" height="90" alt=""></td>
                                                <td>{{ ($s->title) ? $s->title : '' }}</td>
                                                <td>{{ ($s->url) ? $s->url : '' }}</td>
                                                <td>{{ ($s->description) ? $s->description : '' }}</td>
                                                <td align="center" style="vertical-align:middle">{{ $s->sort_order }}</td>
                                                <td align="center" style="vertical-align:middle"><span class="alert {{ ($s->is_shown) ? 'alert-success' : 'alert-danger' }}">{{ ($s->is_shown) ? 'Отображается' : 'Не отображается' }}</span></td>
                                                <td align="center" style="vertical-align:middle">
                                                    <a href="{{ route('admin_slider_edit',['id'=>$s->id]) }}" title="Изменить"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('admin_slider_edit',['id'=>$s->id]) }}" class="delete-product-form" method="post" enctype="multipart/form-data" style="display:inline-block">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="bg-transparent border-0 p-0" title="Удалить">
                                                            
                                                            <a href="#"><i class="far fa-times-circle delete-button">
                                                            </i></a>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <td>#</td>
                                                <td></td>
                                                <td>Заголовок</td>
                                                <td>Ссылка</td>
                                                <td>Описание</td>
                                                <td>Порядок</td>
                                                <td>Статус</td>
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
            <div class="tab-pane" id="slider2">
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
                                                <td>Заголовок</td>
                                                <td>Ссылка</td>
                                                <td>Описание</td>
                                                <td>Порядок</td>
                                                <td>Статус</td>
                                                <td></td>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($slides as $s)
                                            @if($s->slider_id == 2)
                                            <tr>
                                                <td style="vertical-align:middle">{{ $s->id }}</td>
                                                <td align="center"><img src="{{ asset($s->img) }}" height="70" alt=""></td>
                                                <td>{{ ($s->title) ? $s->title : '' }}</td>
                                                <td>{{ ($s->url) ? $s->url : '' }}</td>
                                                <td>{{ ($s->description) ? $s->description : '' }}</td>
                                                <td align="center" style="vertical-align:middle">{{ $s->sort_order }}</td>
                                                <td align="center" style="vertical-align:middle"><span class="alert {{ ($s->is_shown) ? 'alert-success' : 'alert-danger' }}">{{ ($s->is_shown) ? 'Отображается' : 'Не отображается' }}</span></td>
                                                <td align="center" style="vertical-align:middle">
                                                    <a href="{{ route('admin_slider_edit',['id'=>$s->id]) }}" title="Изменить"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('admin_slider_edit',['id'=>$s->id]) }}" class="delete-product-form" method="post" enctype="multipart/form-data" style="display:inline-block">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="bg-transparent border-0 p-0" title="Удалить">
                                                            
                                                            <a href="#"><i class="far fa-times-circle delete-button">
                                                            </i></a>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <td>#</td>
                                                <td></td>
                                                <td>Заголовок</td>
                                                <td>Ссылка</td>
                                                <td>Описание</td>
                                                <td>Порядок</td>
                                                <td>Статус</td>
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