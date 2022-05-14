@extends('layouts.admin')

@section('style')
    <style>

    </style>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_news_edit', ['id'=>$wantednews->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" name="title" value="{{ old('title', $wantednews->title) }}" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Short Title</label>
                                            <input type="text" name="short_title" value="{{ old('short_title', $wantednews->short_title) }}" class="form-control" placeholder="Short Title">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <textarea name="news_body" rows="10" class="form-control">{{old('news_body',$wantednews->news_body)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                         
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="/images/my_news/little/{{$wantednews->image}}">
                                    <div class="form-group">
                                        <label>Выберите изображение</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="" id="fileInput1">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--  <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="{{ $wantednews->is_big }}" {{ ($wantednews->is_big == 1) ? 'checked' : '' }} name="is_big" class="custom-control-input av-rec-new-st-check" id="customCheck6">
                                    <label class="custom-control-label" for="customCheck6">Iki uly</label>
                                </div>
                                    </div>
                                </div>
                            </div>--}}

                            <div class="row">
                                <button type="submit" class="btn btn-info m-2">Редактировать</button>
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
