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
                        <form action="{{ route('admin_products_new') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Наименование</label>
                                            <input type="text" name="name_tk" value="{{ old('name_tk') }}" class="form-control" placeholder="Наименование">
                                        </div>
                                        <div class="form-group">
                                            <label>Наименование (ru)</label>
                                            <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control" placeholder="Наименование (ru)">
                                        </div>
                                        <div class="form-group">
                                            <label>Наименование (en)</label>
                                            <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control" placeholder="Наименование (en)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Артикул</label>
                                            <input type="text" name="code" value="{{ old('code') }}" class="form-control" placeholder="Артикул">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Стоимость</label>
                                            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="form-control" placeholder="Стоимость, tmt">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Категория</label>
                                            <select class="custom-select mr-sm-2" name="category_id">
                                                @foreach($categories as $category)
                                                    @if($category->status == 1)
                                                        @if($category->has_children)
                                                            <optgroup label="{{ $category->name_tk }}" style="margin-top: 20px">
                                                                @foreach($category->childrenCategories as $childCategory)
                                                                    @include('inc.child_category_option', ['child_category' => $childCategory])
                                                                @endforeach
                                                            </optgroup>
                                                        @else
                                                            <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>{{ $category->name_tk }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 d-flex">
                                        <div class="customize-input float-right">
                                            <p class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius additional-cat" style="cursor:pointer">
                                                <i class="fas fa-plus mr-2"></i>Дополнительная категория
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="row additional-categories is-hidden" style="display:none">
                                        <div class="col-1 d-flex align-items-center justify-content-center">
                                            <i class="far fa-times-circle delete-additional-cat" style="cursor:pointer;display:none"></i>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <select class="custom-select mr-sm-2" name="additionalcat[{{ $i }}]">
                                                    <option value="" selected class="none-opt-in-cats">None</option>
                                                    @foreach($categories as $category)
                                                        @if($category->status == 1)
                                                            @if($category->has_children)
                                                                <optgroup label="{{ $category->name_tk }}" style="margin-top: 20px">
                                                                    @foreach($category->childrenCategories as $childCategory)
                                                                        @include('inc.child_category_option', ['child_category' => $childCategory])
                                                                    @endforeach
                                                                </optgroup>
                                                            @else
                                                                <option value="{{ $category->id }}">{{ $category->name_tk }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Производитель</label>
                                            <input type="text" name="brand" value="{{ old('brand') }}" class="form-control" placeholder="Производитель">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Цвета</label>
                                                @foreach($colors as $color)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="{{ $color->id }}" name="colors[]" 
                                                        {{ ( is_array(old('colors')) && in_array($color->id, old('colors')) ) ? 'checked ' : '' }}
                                                     class="custom-control-input color-checkbox" id="{{$color->color}}">
                                                    <label class="custom-control-label d-flex mt-2 mb-2" for="{{$color->color}}"
                                                        
                                                    > 
                                                        <span class="mr-2"
                                                            style="height:20px; width:20px; background:{{$color->color}};
                                                            border-radius: 50%; display:inline-block;
                                                            border: 1px solid #b8c3d5"
                                                        ></span>{{ ($color->color == 'transparent') ? 'Без цвета' : $color->color_tk }}
                                                    </label> 
                                                    <div class="form-group">
                                                        <label for="">Размеры</label>
                                                        <div class="d-flex">
                                                            <?php 

                                                            ?>
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="" class="form-control m-2 size-input" placeholder="">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div> <!-- end custom accordions-->
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Дополнительные параметры</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="1" {{ (old('availability') == 1) ? 'checked' : '' }} name="availability" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">В наличии</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="1" {{ (old('new') == 1) ? 'checked' : '' }} name="new" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Новинка</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="1" {{ (old('recommended') == 1) ? 'checked' : '' }} name="recommended" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Рекомендуемoе</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="1" {{ (old('status') == 1) ? 'checked' : '' }} name="status" class="custom-control-input" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4">Отображается</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Детальное описание</label>
                                            <textarea class="form-control" name="description_tk" rows="1">{{ old('description_tk') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Выберите основное изображение</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="main_img" class="" id="fileInput1">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Выберите дополнительные изображения (зажав CTRL можно выбрать несколько)</label>
                                            <input type="file" name="other_imgs[]" class="form-control-file" multiple id="inputGroupFile01">
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
    <script>
        $('.additional-cat').click(function() {
            $currentRow = $('.additional-categories.is-hidden').eq($('.additional-categories.is-hidden').length-1)
            $('.additional-categories.is-hidden').eq($('.additional-categories.is-hidden').length-1).css('display','flex').toggleClass('is-hidden');
            $('.delete-additional-cat').css('display','none');
            $currentRow.find('.delete-additional-cat').css('display','inline-block');

        })

        $('.delete-additional-cat').click(function() {
            $('.delete-additional-cat').css('display','none');
            $(this).parent().parent().next().find('.delete-additional-cat').css('display','inline-block');

            $(this).parent().parent().css('display','none').toggleClass('is-hidden');
            
            $(this).parent().next().find('.none-opt-in-cats').prop('selected',true);
        })
    </script>
    <script>
        $('.color-checkbox').parent().find('.size-input').attr('disabled',true);
        $('.color-checkbox:checked').parent().find('.size-input').attr('disabled',false);
        
        $('.color-checkbox').change(function() {
            var checked = $(this).is(':checked');
            if (checked) {
                $(this).parent().find('.size-input').attr('disabled',false);
            } else {
                $(this).parent().find('.size-input').attr('disabled',true);
                $(this).parent().find('.size-input').val('');
            }
        })      
    </script>
@endsection