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
                        <form action="{{ route('admin_categories_edit',['id'=>$old->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                            @if($parent)
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Родительская категория</label>
                                            <input type="text" disabled value="{{ $parent->name_tk }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            @endif
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Название категории</label>
                                            <input type="text" name="name_tk" value="{{ $old->name_tk }}" class="form-control" placeholder="Название категории" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="" style="opacity:0">asjnkas</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" value="{{ $old->status }}" {{ ($old->status == 1) ? 'checked' : '' }} name="status" class="custom-control-input av-rec-new-st-check" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">Отображается</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(!$old->category_id)
                                <div class="row">
                                    <div class="col-4 d-flex">
                                        <div class="customize-input float-right">
                                            <p class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius add-subcat" style="cursor:pointer">
                                                <i class="fas fa-plus mr-2"></i>Добавить подкатегорию
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @for ($i = 0; $i < 10; $i++)
                                    <div class="row daughter-categories is-hidden" style="display:none">
                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <i class="far fa-times-circle delete-subcat" style="cursor:pointer;display:none"></i>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Название подкатегории</label>
                                                <input type="text" name="subcatname[{{$i}}]" value="{{ old('') }}" class="form-control subcat-input" placeholder="Название подкатегории">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="" style="opacity:0">asjnkas</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" value="1" name="subcatstatus[{{$i}}]" class="custom-control-input subcat-checkbox" id="customCheck{{$i}}">
                                                <label class="custom-control-label" for="customCheck{{$i}}">Отображается</label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                                
                                
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
    <script>
        $('.add-subcat').click(function() {
            $currentRow = $('.daughter-categories.is-hidden').eq($('.daughter-categories.is-hidden').length-1)
            $('.daughter-categories.is-hidden').eq($('.daughter-categories.is-hidden').length-1).css('display','flex').toggleClass('is-hidden');
            $('.delete-subcat').css('display','none');
            $currentRow.find('.delete-subcat').css('display','inline-block');

        })

        $('.delete-subcat').click(function() {
            $('.delete-subcat').css('display','none');
            $(this).parent().parent().next().find('.delete-subcat').css('display','inline-block');

            $(this).parent().parent().css('display','none').toggleClass('is-hidden');
            $(this).parent().next().find('.subcat-input').val('');
            $(this).parent().next().next().find('.subcat-checkbox').prop('checked',false);

            

        })
    </script>

    <script>
        $( ".av-rec-new-st-check" ).change(function() {
            var checked = $(this).is(':checked');
            if (checked) {
                $(this).val(1);
            } else {
                $(this).val(0);
            }
        });
    </script>
@endsection