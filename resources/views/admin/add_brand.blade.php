@extends('layouts.admin')

@section('style')
@endsection

@section('content')
    <div class="page-wrapper" style="display:block">
        <div class="page-breadcrumb">
            <div class="row">

                <div class="col-2 justify-content-start">
                    <div class="customize-input float-left">
                        <a href="{{ route('admin_brand') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius px-5">Назад</a>
                    </div>
                </div>
                <div class="col-10">
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
                            <form action="{{ route('admin_brand_new') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Заголовок</label>
                                                <input type="text" name="title"  class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Выберите изображение</label>
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" name="img" required id="fileInput1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label style="opacity:0">Показать</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="1"  name="is_shown" class="custom-control-input" id="customCheck4">
                                                    <label class="custom-control-label" for="customCheck4">Отображается</label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info m-2">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        @include('inc.footer')

    </div>
@endsection

@section('scripts')
@endsection