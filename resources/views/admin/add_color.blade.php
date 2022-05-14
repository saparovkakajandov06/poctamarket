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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_colors_new') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Цвет (наименование)</label>
                                            <input type="text" name="color_tk" value="{{ old('color_tk') }}" class="form-control" placeholder="Цвет (наименование)" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Цвет</label>
                                            <input type="color" name="color" class="form-control" value="{{ old('color') }}" required>
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