@extends('layouts.admin')

@section('style')
@endsection

@section('content')
    <div class="page-wrapper" style="display:block">

        <div class="container-fluid">

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

        <a href="{{ route('admin_slider') }}" class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h3 class="text-dark mb-1 font-weight-medium">Слайдеры</h3>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('admin_adblocks') }}" class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h3 class="text-dark mb-1 font-weight-medium">Рекламные блоки</h3>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('admin_bottomblocks') }}" class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h3 class="text-dark mb-1 font-weight-medium">Блоки над футером</h3>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>

            <a href="{{ route('admin_ikigapdal') }}" class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h3 class="text-dark mb-1 font-weight-medium">Gapdalky bloklar</h3>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin_obraz') }}" class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h3 class="text-dark mb-1 font-weight-medium">Ваши Образы В GJ</h3>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


            <a href="{{ route('admin_brand') }}" class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h3 class="text-dark mb-1 font-weight-medium">Бренды</h3>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


            <a href="{{ route('admin_skidka') }}" class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h3 class="text-dark mb-1 font-weight-medium">Баннер для Скидки</h3>
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
    
@endsection