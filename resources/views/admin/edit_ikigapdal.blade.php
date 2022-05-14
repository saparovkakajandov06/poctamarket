@extends('layouts.admin')

@section('style')
@endsection

@section('content')
    <div class="page-wrapper" style="display:block">

        <div class="page-breadcrumb">
            <div class="row">

                <div class="col-2 justify-content-start">
                    <div class="customize-input float-left">
                        <a href="{{ route('admin_ikigapdal') }}" class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius px-5">Назад</a>
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
                            <form action="{{ route('admin_ikigapdal_edit',['id'=>$old->id]) }}" method="post" enctype="multipart/form-data">
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Прядок отображения</label>
                                                <input type="number" step="1" name="sort_order" value="{{ $old->sort_order }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ссылка</label>
                                                <input type="text" name="link" value="{{ $old->link }}" class="form-control" required>
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