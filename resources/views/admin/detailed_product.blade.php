@extends('layouts.admin')

@section('style')
    <style>
        .review-div {
            background-color: #e9ecef;
            border-radius: 2px;
            padding: 6px 12px;
        }
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
                        <form action="{{ route('admin_products_edit',['id'=>$old->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Наименование (tk)</label>
                                            <input type="text" name="name_tk" value="{{ $old->name_tk }}" class="form-control" placeholder="Наименование (tk)">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Артикул</label>
                                            <input type="text" name="code" value="{{ $old->code }}" class="form-control" placeholder="Артикул">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Стоимость</label>
                                            <input type="number" step="0.01" name="price" value="{{ number_format($old->price,2,'.','') }}" class="form-control" placeholder="Стоимость, tmt">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Категории</label>
                                            @foreach($old_categories as $c)
                                                @if($c->has_children == 0)
                                                    @if($c->category_id)
                                                        <input type="text" class="form-control" value="{{ $old->categories()->where('id',$c->category_id)->first()->name_tk }}">
                                                        <input type="text" class="form-control pl-5" value="{{$c->name_tk}}">
                                                    @else
                                                        <input type="text" class="form-control" value="{{$c->name_tk}}">
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Производитель</label>
                                            <input type="text" name="brand" value="{{ $old->brand }}" class="form-control" placeholder="Производитель">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Цвета</label>
                                                @foreach($colors as $color)
                                                <div class="custom-control">
                                                    <label class=" d-flex mt-2 mb-2" for="{{$color->color}}"
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
                                                            <input type="text" name="{{ $color->id }}[]" value="{{ isset($sizes_arr[$color->id][0]) ? $sizes_arr[$color->id][0] : '' }}" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="{{ isset($sizes_arr[$color->id][1]) ? $sizes_arr[$color->id][1] : '' }}" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="{{ isset($sizes_arr[$color->id][2]) ? $sizes_arr[$color->id][2] : '' }}" class="form-control m-2 size-input" placeholder="">
                                                            <input type="text" name="{{ $color->id }}[]" value="{{ isset($sizes_arr[$color->id][3]) ? $sizes_arr[$color->id][3] : '' }}" class="form-control m-2 size-input" placeholder="">
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
                                            <input type="checkbox" value="{{ $old->availability }}" {{ ($old->availability == 1) ? 'checked' : '' }} name="availability" class="custom-control-input av-rec-new-st-check" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">В наличии</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $old->new }}" {{ ($old->new == 1) ? 'checked' : '' }} name="new" class="custom-control-input av-rec-new-st-check" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Новинка</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $old->recommended }}" {{ ($old->recommended == 1) ? 'checked' : '' }} name="recommended" class="custom-control-input av-rec-new-st-check" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Рекомендуемoе</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $old->status }}" {{ ($old->status == 1) ? 'checked' : '' }} name="status" class="custom-control-input av-rec-new-st-check" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4">Отображается</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Детальное описание (ru)</label>
                                            <textarea class="form-control" name="description_ru" rows="1">{{ $old->description_ru }}</textarea>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Основное изображение</label>
                                            <div class="div">
                                                <img src="{{ asset('images/products/smaller/' . json_decode($old->img)->main) }}" width="200">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Дополнительные изображения</label>
                                            <div class="d-flex">
                                            @foreach(json_decode($old->img) as $key => $value)
                                                @if($key != 'main')
                                                    <div class="other-img-container d-flex flex-column m-2 align-items-center justify-content-between">
                                                        <img src="{{ asset('images/products/little/' . $value) }}" alt="" width="100">
                                                    </div>
                                                @endif
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="app">
                                    <div class="col-md-12">
                                        <div class="form-group" style="pointer-events: none">
                                            <label for="">Рейтинг товара</label>
                                            <star-rating :rating="{{$old->getStarRating()}}"></star-rating>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Отзывы</label>
                                            @if(count($old->reviews) > 0)
                                                @if(count($old->reviews) < 2)
                                                    @foreach($old->reviews as $review)
                                                        <div class="my-2 review-div">{{ $review->review }}</div>
                                                    @endforeach

                                                @else 
                                                    @for ($i = 0; $i < 2; $i++)
                                                        <div class="my-2 review-div">{{ $old->reviews[$i]->review }}</div>
                                                    @endfor
                                                    <div class="other-reviews" style="display:none">
                                                    @for($j = 2; $j < count($old->reviews); $j++)
                                                        <div class="my-2 review-div">{{ $old->reviews[$j]->review }}</div>
                                                    @endfor
                                                    </div>
                                                    <div class="my-2 review-div more-reviews" style="cursor:pointer">Еще</div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <a href="{{ route('admin_products_edit',['id'=>$old->id]) }}" class="btn btn-info m-2">Изменить</a>
                                    <form action="{{ route('admin_products_edit',['id'=>$old->id]) }}" class="delete-product-form" method="post" enctype="multipart/form-data" style="display:inline-block">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger m-2">Удалить</button>
                                    </form>
                                </div>
                                <div class="text-right">
                                    
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
        $('input:not(:hidden),textarea').attr('disabled',true);
    </script>
    
    <script>
        $('.more-reviews').click(function() {
            if($(this).text() == 'Скрыть') $(this).text('Ещё');
            else $(this).text('Скрыть');
            $('.other-reviews').slideToggle();
        })
    </script>
@endsection