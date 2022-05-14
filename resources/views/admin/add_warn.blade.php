@extends('layouts.admin')

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
                            <form action="{{ route('admin_warn_new') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Kategoriya</label>
                                            <select class="custom-select mr-sm-2" name="category_id">
                                                @foreach($categories as $category)
                                                    @if($category->status == 1)
                                                        @if($category->has_children)
                                                            <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>{{ $category->name_tk }}</option>
                                                            @endif
                                                        @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Prosent</label>
                                                <input type="text" name="prosent" value="{{ old('prosent') }}" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Выберите изображение</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">

                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" name="img" class="" id="fileInput1">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="row">

                                         <div class="col-md-3">
                                             <div class="form-group">
                                                 <label style="opacity:0">Iki uly</label>
                                                 <div class="custom-control custom-checkbox">
                                                     <input type="checkbox"  name="is_big" class="custom-control-input" id="customCheck5">
                                                     <label class="custom-control-label" for="customCheck5">Iki uly</label>
                                                 </div>

                                             </div>
                                         </div>



                                     </div>--}}

                                    <div class="row">
                                        <button type="submit" class="btn btn-info m-2">Отправить</button>
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
