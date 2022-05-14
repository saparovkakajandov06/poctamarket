@extends('layouts.admin')

@section('style')
@endsection

@section('content')
    <div class="page-wrapper" style="display:block">
        <div class="page-breadcrumb">
            <div class="row">
                
                <div class="col-2 justify-content-start">
                    <div class="customize-input float-left">
                        <a href="{{ route('admin_slider') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius px-5">Назад</a>
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
                        <form action="{{ route('admin_slider_new') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Заголовок</label>
                                            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ссылка</label>
                                            <input type="text" name="url" value="{{ old('url') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Oписание</label>
                                            <textarea class="form-control" name="description" rows="1">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
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
                                            <label style="opacity:0">scscascasc</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" value="1" {{ (old('status') == 1) ? 'checked' : '' }} name="is_shown" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">Отображается</label>
                                            </div>
                                            <div class="mt-5">
                                                <div class="form-group">
                                                    <label>Куда добавить?</label>
                                                
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="slider_id" value="1"
                                                            class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="customRadio1">Первый слайдер</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="slider_id" value="2"
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio2">Второй слайдер</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Прядок отображения</label>
                                            <input type="number" step="1" name="sort_order" value="{{ old('sort_order') }}" class="form-control">
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