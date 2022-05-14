@extends('layouts.admin')

@section('style')
    <link href="{{asset('admin/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="page-wrapper" style="display:block">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- *************************************************************** -->
            <!-- Start First Cards -->
            <!-- *************************************************************** -->
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{$cntProds}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Товаров</h6>
                            </div>
                            <a href="{{ route('admin_products_new') }}" class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-plus mr-2"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $cntCategories }}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Категорий
                                </h6>
                            </div>
                            <a href="{{ route('admin_categories_new') }}" class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-plus mr-2"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $cntColors }}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Цветов</h6>
                            </div>
                            <a href="{{ route('admin_colors_new') }}" class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-plus mr-2"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $cntSlides }}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Слайдов</h6>
                            </div>
                            <a href="{{ route('admin_slider_new') }}" class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-plus mr-2"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin_orders') }}" class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">{{$orderYearCount}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Заказов</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">{{$sumYearOrder}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Сумма Заказовов</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        @include('inc.footer')
        
    </div>
@endsection

@section('scripts')
    <script src="{{asset('admin/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/dashboards/dashboard1.min.js')}}"></script>
@endsection