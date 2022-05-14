@extends('layouts.app')

@section('style')
@endsection

@section('content')

    <section class="product-filters-wrapper">
        <!--  -->
        <section class="product-filters">
            <div class="product-filters__container __container">
                <article class="product-filters__item product-filters__item_category f-dropdown __js-filter-wrapper">
                    <button class="f-dropdown__button __js-filter-butoon">
                        <p>Kategoriýalar</p><span>+</span>
                    </button>
                    <div class="f-dropdown__menu __js-filter">
                        <div class="f-dropdown__mobile-top">
                            <p class="f-dropdown__name">Kategoriýalar</p>
                            <button class="f-dropdown__button-close __js-filter-close"></button>
                        </div>
                        <ul>

                            @foreach($childrenCategories as $childCat)
                                <li> <a href="{{ route('productsByCatalog',['id'=>$childCat->id]) }}">{{ $childCat->name_tk }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </article>
                <section class="product-filters__wrapper __js-filter-wrapper">
                    <div class="product-filters__filters-mobile">
                        <button class="product-filters__filters-mobile_button __js-filter-butoon">
                            <p>Filter</p><span class="_icon-arrow"></span>
                        </button>
                    </div>
                    <div class="product-filters__items __js-filter">
                        <div class="f-dropdown__mobile-top">
                            <p class="f-dropdown__name">Filter</p>
                            <button class="f-dropdown__button-close __js-filter-close"></button>
                        </div>
                        <div class="product-filters__items-container">
                            <article class="product-filters__item f-dropdown">
                                <button class="f-dropdown__button">
                                    <p>Baha</p><span class="_icon-arrow"></span>
                                </button>

                                <div class="f-dropdown__menu">
                                    <div class="f-dropdown__price">
                                        {{--<span>с</span>
                                        <input type="number" class="__min" name="price_min" placeholder="81">
                                        <span>по</span>
                                        <input type="number" class="__max" name="price_max" placeholder="499">
                                        <span>грн.</span>--}}

                                        <form class="mb-3" method="GET" action="{{route("filter_by_price_to_price")}}">
                                            <span>Bahadan</span>
                                            <input type="number" class="__min" name="price_from" placeholder="81" id="price_from" value="{{ request()->price_from}}" >
                                            <span>Baha</span>
                                            <input type="number" class="__max" name="price_to" placeholder="499" id="price_to" value="{{ request()->price_to }}">
                                            <span>TMT</span>

                                            <button class="btn btn-outline-primary js-copy-code">
                                                <strong>Filter</strong>
                                            </button>

                                            <a  href="{{ route("search") }}">
                                                <button class="btn btn-outline-primary js-copy-code" type="button"
                                                        onclick="copyToClipboard($(this).find('strong'))">
                                                    <strong>Beset</strong>
                                                </button>
                                            </a>
                                        </form>
                                    </div>
                                </div>



                            </article>
                            <article style="width: 30%;" class="product-filters__item f-dropdown">
                                <button class="f-dropdown__button">
                                    <p>Reňkler</p><span class="_icon-arrow"></span>
                                </button>
                                <div class="f-dropdown__menu">

                                    <form class="mb-3" method="GET" action="{{route("filter_by_price_to_price")}}">

                                        @isset($colors)
                                        @foreach($colors as $color)

                                        <label class="f-dropdown__filter-color">
                                            <input type="checkbox" name="color" value="{{$color->id}}">
                                            <span style="background:{{$color->color}}"></span>
                                            <p>{{$color->color_tk}}</p>
                                        </label>

                                        @endforeach
                                        @endisset

                                        <button class="btn btn-outline-primary js-copy-code">
                                            <strong>Filter</strong>
                                        </button>

                                        <a  href="{{ route("search") }}">
                                            <button class="btn btn-outline-primary js-copy-code" type="button"
                                                    onclick="copyToClipboard($(this).find('strong'))">
                                                <strong>Beset</strong>
                                            </button>
                                        </a>
                                    </form>

                                 {{--   <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="666">
                                        <span style="background:#FFFFFF;"></span>
                                        <p>Белый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="668">
                                        <span style="background:#B00000;"></span>
                                        <p>Бордовый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="669">
                                        <span style="background:#00BFFF;"></span>
                                        <p>Голубой</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="671">
                                        <span style="background:#FFFF00;"></span>
                                        <p>Желтый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="672">
                                        <span style="background:#339433;"></span>
                                        <p>Зеленый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="675">
                                        <span style="background:#964B00;"></span>
                                        <p>Коричневый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="676">
                                        <span style="background:#FF0000;"></span>
                                        <p>Красный</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="680">
                                        <span style="background:#92F9BB;"></span>
                                        <p>Мятный</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="681">
                                        <span style="background:#B6B60A;"></span>
                                        <p>Оливковый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="682">
                                        <span style="background:#FFA500;"></span>
                                        <p>Оранжевый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="685">
                                        <span style="background:#FFCBDE;"></span>
                                        <p>Розовый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="688">
                                        <span style="background:#808080;"></span>
                                        <p>Серый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="689">
                                        <span style="background:#0000FF;"></span>
                                        <p>Синий</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="690">
                                        <span style="background:#C8A2C8;"></span>
                                        <p>Сиреневый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="691">
                                        <span style="background:#8626D7;"></span>
                                        <p>Фиолетовый</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="692">
                                        <span style="background:#78866B;"></span>
                                        <p>Хаки</p>
                                    </label>
                                    <label class="f-dropdown__filter-color">
                                        <input type="checkbox" name="rastsvetka2[]" value="693">
                                        <span style="background:#000000;"></span>
                                        <p>Черный</p>
                                    </label>--}}
                                </div>
                            </article>
                            
                            <article style="width: 35%;" class="product-filters__item f-dropdown">
                                <button class="f-dropdown__button">
                                    <p>Ölçegi</p><span class="_icon-arrow"></span>
                                </button>
                                <div class="f-dropdown__menu">



                                    <label class="f-dropdown__filter-item">
                                        <input type="checkbox" name="razmer[]" value="222">
                                        S <u>(49)</u>
                                    </label>
                                    <label class="f-dropdown__filter-item">
                                        <input type="checkbox" name="razmer[]" value="221">
                                        M <u>(47)</u>
                                    </label>
                                    <label class="f-dropdown__filter-item">
                                        <input type="checkbox" name="razmer[]" value="220">
                                        L <u>(41)</u>
                                    </label>
                                    <label class="f-dropdown__filter-item">
                                        <input type="checkbox" name="razmer[]" value="224">
                                        XL <u>(32)</u>
                                    </label>


                                    <button class="btn btn-outline-primary js-copy-code">
                                        <strong>Filter</strong>
                                    </button>

                                    <a  href="{{ route("search") }}">
                                        <button class="btn btn-outline-primary js-copy-code" type="button"
                                                onclick="copyToClipboard($(this).find('strong'))">
                                            <strong>Beset</strong>
                                        </button>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
                <article style="width: 20%;" class="product-filters__item product-filters__item_sort f-dropdown __js-filter-wrapper">
                    <button class="f-dropdown__button __js-filter-butoon">
                        <p>Tertiplemek</p><span class="_icon-arrow"></span>
                    </button>
                    <div class="f-dropdown__menu __js-filter">
                        <div class="f-dropdown__mobile-top">
                            <p class="f-dropdown__name">Tertiplemek</p>
                            <button class="f-dropdown__button-close __js-filter-close"></button>
                        </div>
                        <ul>

                            <form class="mb-3" method="GET" action="{{route("filter_by_price_to_price")}}">
                                <li for="new"><a href="#"> <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> <label for="new">Täze</label></a></li>
                                <li><a href="#"> <input type="checkbox" name="recommended" id="recommended" @if(request()->has('recommended')) checked @endif> <label for="recommended"> Maslahat berilýän </label></a></li>
                                <li><a href="#"><input type="checkbox" name="status" id="status" @if(request()->has('status')) checked @endif> <label for="status">  Meşhur</label></a></li>
                                <button class="btn btn-outline-primary js-copy-code">
                                    <strong>Filter</strong>
                                </button>

                                <a  href="{{ route("search") }}">
                                    <button class="btn btn-outline-primary js-copy-code" type="button"
                                            onclick="copyToClipboard($(this).find('strong'))">
                                        <strong>Beset</strong>
                                    </button>
                                </a>
                            </form>
                        </ul>
                    </div>
                </article>
            </div>
        </section>

        <section class="prodict-filters-list">
            <div class="prodict-filters-list__container __container">
                <div class="prodict-filters-list__item">
                    <a href="{{ route('main_page') }}">
                        Baş Sahypa
                    </a>
                </div>
                <div class="prodict-filters-list__item">
                    <a href="{{ route('productsByCatalog',['id'=>$thisCategory->id]) }}" class="custom-bread-item active-bread">
                        {{ $thisCategory->name_tk }}
                    </a>
                </div>

            </div>
        </section>


        <section class="listing-items">
            <div class="listing-items__container __container">
                <div class="listing-items__wrapper">

                    @foreach($childrenCategories as $childCat)
                        @if(count($childCat->products->where('status',1)->take(4)) > 0)
                            @foreach($childCat->products->where('status',1)->sortByDesc('id')->take(4) as $prod)
                    <article class=" listing-items__item listing-item">
                        <div class="listing-item__container">
                            <div class="listing-item__hover"></div>
                            <div class="listing-item__img-wrapper">
                                <a class="listing-item__img-content" href="{{ route('oneProduct',['id'=>$prod->id]) }}">
                                
                                    <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                    @foreach(json_decode($prod->img) as $key => $value)
                                        @if($key != 'main')
                                            <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                        @endif
                                    @endforeach

                                    <img alt="{{ $prod->name_tk }}" title="{{ $prod->name_tk }}"
                                         class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($prod->img)->main) }}">
                                   
                                    @foreach(json_decode($prod->img) as $key => $value)
                                        @if($key != 'main')

                                            <img alt="{{$prod->name_tk}}" title="{{$prod->name_tk}}"
                                                class="listing-item__img listing-item__img-{{ $loop->index + 2 }}" src="{{ asset('images/products/little/' . $value) }}">

                                        @endif
                                    @endforeach

                                </a>
                                <div class="listing-item__button-open">
                                    <button class="js-show-mini-card-button" data-id='{{$prod->id}}'>
                                        Giňişleýin</button>
                                </div>
                                <div class="sizes-pop-up__wrapper">

                                    @if(Auth()->user())
                                        <form action="{{route('wishlist.store')}}" method="post">
                                            {{csrf_field()}}
                                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                            <input name="product_id" type="hidden" value="{{$prod->id}}" />
                                            <button>  <svg class="listing-item__wish-block icon--heart js-add-to-wish-button" viewBox="0 0 24 24"
                                                           stroke-linecap="round" stroke-linejoin="round" id="heart">
                                                    <g>
                                                        <path
                                                                d="M20.4578 4.59133C19.9691 4.08683 19.3889 3.68663 18.7503 3.41358C18.1117 3.14054 17.4272 3 16.7359 3C16.0446 3 15.3601 3.14054 14.7215 3.41358C14.0829 3.68663 13.5026 4.08683 13.0139 4.59133L11.9997 5.63785L10.9855 4.59133C9.99842 3.57276 8.6596 3.00053 7.26361 3.00053C5.86761 3.00053 4.52879 3.57276 3.54168 4.59133C2.55456 5.6099 2 6.99139 2 8.43187C2 9.87235 2.55456 11.2538 3.54168 12.2724L4.55588 13.3189L11.9997 21L19.4436 13.3189L20.4578 12.2724C20.9467 11.7681 21.3346 11.1694 21.5992 10.5105C21.8638 9.85148 22 9.14517 22 8.43187C22 7.71857 21.8638 7.01225 21.5992 6.35328C21.3346 5.69431 20.9467 5.09559 20.4578 4.59133V4.59133Z">
                                                        </path>
                                                    </g>
                                                </svg> </button>
                                        </form>
                                    @else
                                        <a href="{{route('login')}}"><button>  <svg class="listing-item__wish-block icon--heart js-add-to-wish-button" viewBox="0 0 24 24"
                                                                                    stroke-linecap="round" stroke-linejoin="round" id="heart">
                                                    <g>
                                                        <path
                                                                d="M20.4578 4.59133C19.9691 4.08683 19.3889 3.68663 18.7503 3.41358C18.1117 3.14054 17.4272 3 16.7359 3C16.0446 3 15.3601 3.14054 14.7215 3.41358C14.0829 3.68663 13.5026 4.08683 13.0139 4.59133L11.9997 5.63785L10.9855 4.59133C9.99842 3.57276 8.6596 3.00053 7.26361 3.00053C5.86761 3.00053 4.52879 3.57276 3.54168 4.59133C2.55456 5.6099 2 6.99139 2 8.43187C2 9.87235 2.55456 11.2538 3.54168 12.2724L4.55588 13.3189L11.9997 21L19.4436 13.3189L20.4578 12.2724C20.9467 11.7681 21.3346 11.1694 21.5992 10.5105C21.8638 9.85148 22 9.14517 22 8.43187C22 7.71857 21.8638 7.01225 21.5992 6.35328C21.3346 5.69431 20.9467 5.09559 20.4578 4.59133V4.59133Z">
                                                        </path>
                                                    </g>
                                                </svg> </button></a>
                                    @endif

                                </div>
                            </div>
                            <div class="listing-item__shield-wrapper">
                                <div class="listing-item__shield-container">
                                    <div class="shield-wrapper">
                                        @if($prod->new)
                                        <div class="shield" style="background: #c3dbf8; color: #272b31">
                                            <p class="caption--uppercase">Täze</p>
                                        </div>
                                        @endif

                                            @if($prod->recommended)
                                        <div class="shield" style="background: #c3dbf8; color: #272b31">
                                            <p class="caption--uppercase">Maslahat berilýän</p>
                                        </div>
                                        @endif

                                            @if($prod->status)
                                        <div class="shield" style="background: #c3dbf8; color: #272b31">
                                            <p class="caption--uppercase">Meşhur</p>
                                        </div>

                                                @else

                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="listing-item__info">

                                <div class="listing-item__info-price-wrapper">
                                <div class="listing-item__info-price">
												<span class="price" data-ask-in-shop="Только в магазинах" data-soon-in-sale="Скоро в продаже">
													{{ number_format($prod->price,2,'.','') }} TMT</span>
                                    <span class="strike-diag" style="display: none">
													<span class="old-price"></span>
												</span>
                                </div>


                                    @if ($prod->availability == 1)

                                        <a class="add-to-cart" href="#" data-id="{{$prod->id}}">
                                    <div class="listing-item__info-buy-button js-listing-add-to-cart">
                                        <svg viewBox="0 0 24 24" id="bag">
                                            <path d="M20,5h-3.4c-0.2-2.4-2.2-4.3-4.6-4.3S7.6,2.6,7.3,5H4C3.4,5,3,5.4,3,6v14c0,1.6,1.1,3,2.8,3h12.4
																c1.7,0,2.8-1.5,2.8-3V6C21,5.4,20.5,5,20,5z M12,2.7c1.3,0,2.4,1,2.6,2.3H9.4C9.6,3.7,10.7,2.7,12,2.7z M19,20c0,0.7-0.5,1-0.8,1
																H5.8C5.4,21,5,20.7,5,20V7h14V20z M12,13.8c2.6,0,4.7-2.2,4.7-4.8c0-0.6-0.4-1-1-1s-1,0.4-1,1c0,1.5-1.2,2.8-2.7,2.8S9.3,10.5,9.3,9
																c0-0.6-0.4-1-1-1c-0.6,0-1,0.4-1,1C7.3,11.6,9.4,13.8,12,13.8z"></path>
                                        </svg>
                                    </div>
                                        </a>

                                    @else
                                        Ammarda ýok

                                    @endif
                                    
                                </div>

                                <a class="listing-item__info-title" href="#">
                                    {{ $prod->name_tk }}</a>
                                <div class="listing-item__info-color-wrapper">
                                    <a class="listing-item__info-color-container js-show-mini-card-button" title="черный" data-id=1>
                                        <div class="listing-item__info-color" style="background-color: #0b0b0b;"></div>
                                    </a>
                                    <a class="listing-item__info-color-container js-show-mini-card-button" title="темно-серый меланж"
                                       data-id=2>
                                        <div class="listing-item__info-color" style="background-color: #3c3a3a;"></div>
                                    </a>
                                </div>

                                <a class="listing-item__info-sizes" href="#">
                                    <span class="listing-item__info-sizes-item">XS</span>
                                    <span class="listing-item__info-sizes-item">S</span>
                                    <span class="listing-item__info-sizes-item">M</span>
                                    <span class="listing-item__info-sizes-item">L</span>
                                    <span class="listing-item__info-sizes-item">XL</span>
                                </a>
                            </div>
                        </div>
                    </article>
@endforeach
                        @endif
                        @endforeach

                </div>
            </div>
        </section>
        <!--  -->
        <div class="pagination">
            <div class="pagination__container __container">
                <div class="pagination__paginations">

                    {{--@if(count($childCat->products->where('status',1)->take(4)) > 0)--}}
                    @if(count($childCat->products->where('status',1)->take(4)) >= 48)
                    {{ $prods->links() }}
                    @endif

                    {{--{{ $category->products()->orderBy('id', 'desc')->paginate(4)->links() }}--}}

            
                </div>
            </div>
        </div>

        {{--<form class="md-form-subscribe" action="{{ route('ekslyuziw') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex">
                <div class="md-form-subscribe__text">
                    <h3>
                    aýratyn
                        teklipler
                        Siziň üçin
                    </h3>
                    <p>
                    Ýitirmezlik üçin abuna ýazylyň
                        bizden arzanladyş teklipleri
                    </p>
                </div>

                <div class="md-form-subscribe__fields">
                    <div data-error="no_message">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="s" value="w" id="inlineRadio1">
                            <label class="form-check-label" for="inlineRadio1">Aýal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input js_o" type="radio" name="s" value="m" id="inlineRadio2">
                            <label class="form-check-label" for="inlineRadio2">Erkek</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="phonegift" data-or="emailgift" data-error="no_message"
                               placeholder="+38">
                        <span class="divider">ýa-da</span>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="emailgift" data-or="phonegift" data-error="no_message"
                               placeholder="E-mail">
                    </div>
                </div>
            </div>
            <div class="btn-wrap">
                <button class="btn btn-primary" type="button">Abuna boluň</button>
            </div>
            <!-- <div class="telegram-news">
                Получать новости в
                <a class="btn btn-link" href="#" target="_blank">
                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M16.7375 0.410662C16.5298 0.145815 16.2188 0 15.8616 0C15.6675 0 15.4618 0.0426083 15.2503 0.126878L0.860193 5.85573C0.096523 6.15967 -0.00632858 6.61578 0.00028608 6.86061C0.00690074 7.10543 0.134395 7.55478 0.91337 7.81327C0.918039 7.81476 0.922708 7.81625 0.927377 7.8176L3.91228 8.70845L5.52652 13.5225C5.74662 14.1788 6.24064 14.5865 6.81599 14.5865C7.17876 14.5865 7.53556 14.428 7.84788 14.1282L9.69415 12.3553L12.3721 14.6041C12.3723 14.6044 12.3727 14.6045 12.373 14.6048L12.3984 14.6261C12.4007 14.628 12.4032 14.6301 12.4055 14.6319C12.7032 14.8727 13.0281 14.9999 13.3454 15H13.3456C13.9657 15 14.4594 14.5213 14.6033 13.7806L16.9611 1.63873C17.0558 1.15137 16.9764 0.715278 16.7375 0.410662ZM4.91084 8.53924L10.6696 5.47104L7.08382 9.44469C7.02507 9.50976 6.98343 9.58943 6.96294 9.67613L6.27151 12.597L4.91084 8.53924ZM7.17305 13.364C7.14919 13.3868 7.12519 13.4073 7.1012 13.4261L7.74269 10.7164L8.9096 11.6964L7.17305 13.364ZM15.9848 1.43245L13.627 13.5744C13.6043 13.6906 13.5318 13.961 13.3454 13.961C13.2534 13.961 13.1377 13.9087 13.0193 13.8136L9.98481 11.2655C9.98442 11.2651 9.9839 11.2647 9.98338 11.2644L8.17783 9.74809L13.3633 4.00166C13.5294 3.8177 13.5444 3.53594 13.399 3.33386C13.2535 3.13177 12.9898 3.0682 12.7741 3.18317L4.24535 7.72724L1.21985 6.82449L15.6056 1.0974C15.7271 1.04897 15.8119 1.03883 15.8616 1.03883C15.8921 1.03883 15.9463 1.04262 15.9664 1.06845C15.9929 1.10213 16.0266 1.21697 15.9848 1.43245Z"
                                fill="#2E2E2E"></path>
                    </svg>
                    <span>Telegram</span>
                </a>
            </div> -->
        </form>--}}

    </section>





@endsection
