@extends('layouts.admin')

@section('style')
@endsection

@section('content')
    <div class="page-wrapper" style="display:block">

        <div class="page-breadcrumb">
            <div class="row">

                <div class="col-2 justify-content-start">
                    <div class="customize-input float-left">
                        <a href="{{ route('admin_obraz') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius px-5">Назад</a>
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
                            <form action="{{ route('admin_obraz_edit',['id'=>$old->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <img src="{{ asset($old->img) }}" height="315">
                                                <input type="hidden" name="old_img" value="{{ $old->img }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Выберите изображение</label>
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" name="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Текст</label>
                                                <input type="text" name="title" value="{{ $old->title }}" class="form-control">
                                            </div>
                                        </div>

                                    </div>



                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label style="opacity:0">Показать</label>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="{{ $old->is_shown }}" {{ ($old->is_shown == 1) ? 'checked' : '' }} name="is_shown" class="custom-control-input av-rec-new-st-check" id="customCheck4">
                                                    <label class="custom-control-label" for="customCheck4">Отображается</label>
                                                </div>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="{{ $old->is_elder }}" {{ ($old->is_elder == 1) ? 'checked' : '' }} name="is_elder" class="custom-control-input av-rec-new-st-check" id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">Взрослые</label>
                                                </div>


                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="{{ $old->is_kid }}" {{ ($old->is_kid == 1) ? 'checked' : '' }} name="is_kid" class="custom-control-input av-rec-new-st-check" id="customCheck6">
                                                    <label class="custom-control-label" for="customCheck6">Дети</label>
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