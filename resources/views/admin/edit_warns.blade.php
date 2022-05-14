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
                            <form action="{{ route('admin_warn_edit',['id'=>$old->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="div">
                                                    <img src="{{ asset($old->img) }}" width="1000">
                                                    <input type="hidden" name="img" value="{{ $old->img }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select class="custom-select mr-sm-2" name="category_id">
                                                    <option value="" class="none-opt-in-cats">{{$old->category->name_tk}}</option>
                                                    @foreach($categories as $category)
                                                        @if($category->status == 1)
                                                            @if($category->has_children)
                                                                <option value="{{ $category->id }}" {{ ($old->id == $category->id) ? 'selected' : '' }}>{{ $category->name_tk }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Prosent</label>
                                                <input type="text" name="prosent" value="{{ ($old->prosent) ? $old->prosent : '' }}" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
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
