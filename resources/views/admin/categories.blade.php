@extends('layouts.admin')

@section('style')
    <style>
        .row-for-single-category:hover .col-8.alert,
         .row-for-single-category:hover .col-1.alert {
            background: #f0f0f0;
        }
    </style>
@endsection

@section('content')
    

    <div class="page-wrapper" style="display:block">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-9">
                   
                </div>
                <div class="col-3 align-self-center">
                    <div class="customize-input float-right">
                        <a href="{{ route('admin_categories_new') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius">Новая категория</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('inc.admincategories')
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
   
@endsection