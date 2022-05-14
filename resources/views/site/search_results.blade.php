@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/old/owl.carousel.min.css')}}">

@endsection

@section('content')

    <section class="product-filters-wrapper">

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
                                @foreach($categories as $category)
                            <li><a href="{{ route('productsByCatalog',['id'=>$category->id]) }}">{{$category->name_tk}}  </a></li>
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
                                        {{--  <li for="new"><a href="#"> <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> <label for="new">Täze</label></a></li>
                                          <li><a href="#"> <input type="checkbox" name="recommended" id="recommended" @if(request()->has('recommended')) checked @endif> <label for="recommended"> Maslahat berilýän </label></a></li>
                                          <li><a href="#"><input type="checkbox" name="status" id="status" @if(request()->has('status')) checked @endif> <label for="status">  Meşhur</label></a></li>--}}

                                        {{--@isset($colors)
                                        @foreach($colors as $color)
                                        @if(count($color->products->where('status',1)->take(4)) > 0)
                                            @foreach($color->products->where('status',1)->sortByDesc('id')->take(4) as $prod)
                                        <label class="f-dropdown__filter-color">
                                            <input type="checkbox" name="color" value="{{$color->id}}">
                                            <span style="background:{{$color->color}}"></span>
                                            <p>{{$color->color_tk}}</p>
                                        </label>
                                        @endforeach
                                        @endif
                                        @endforeach
                                        @endisset--}}

                                        @isset($colors)
                                            @foreach($colors as $color)
                                                {{--      @if(count($color->products->where('status',1)->take(4)) > 0)
                                                          @foreach($color->products->where('status',1)->sortByDesc('id')->take(4) as $prod)--}}
                                                <label class="f-dropdown__filter-color">
                                                    <input type="checkbox" name="color" value="{{$color->id}}">
                                                    <span style="background:{{$color->color}}"></span>
                                                    <p>{{$color->color_tk}}</p>
                                                </label>
                                                {{--   @endforeach
                                                   @endif--}}
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
        <br><br><br>
        <section class="listing-items">
            <div class="listing-items__container __container">
                <div class="listing-items__wrapper">

                   @foreach($products as $np)

                    <article class=" listing-items__item listing-item">
                        <div class="listing-item__container">
                            <div class="listing-item__hover"></div>
                            <div class="listing-item__img-wrapper">
                                <a class="listing-item__img-content" href="{{ route('oneProduct',['id'=>$np->id]) }}">
                                    <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                    <div class="listing-item__img-hover listing-item__img-hover-2"></div>
                                    <div class="listing-item__img-hover listing-item__img-hover-3"></div>
                                    <div class="listing-item__img-hover listing-item__img-hover-4"></div>
                                    <div class="listing-item__img-hover listing-item__img-hover-5"></div>
                                    <img alt="{{$np->name_tk}}" title="Чёрный базовый джемпер"
                                         class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}">

                                    @foreach(json_decode($np->img) as $key => $value)
                                        @if($key != 'main')
                                    <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                         class="listing-item__img listing-item__img-2" src="{{ asset('images/products/little/' . $value) }}">
                                        @endif
                                            @endforeach

                                </a>
                                {{--<div class="listing-item__button-open">
                                    <button class="js-show-mini-card-button" data-id=1>
                                        Быстрый просмотр</button>
                                </div>--}}
                                <div class="sizes-pop-up__wrapper">
                                    <svg class="listing-item__wish-block icon--heart js-add-to-wish-button" viewBox="0 0 24 24"
                                         stroke-linecap="round" stroke-linejoin="round" id="heart">
                                        <g>
                                            <path
                                                    d="M20.4578 4.59133C19.9691 4.08683 19.3889 3.68663 18.7503 3.41358C18.1117 3.14054 17.4272 3 16.7359 3C16.0446 3 15.3601 3.14054 14.7215 3.41358C14.0829 3.68663 13.5026 4.08683 13.0139 4.59133L11.9997 5.63785L10.9855 4.59133C9.99842 3.57276 8.6596 3.00053 7.26361 3.00053C5.86761 3.00053 4.52879 3.57276 3.54168 4.59133C2.55456 5.6099 2 6.99139 2 8.43187C2 9.87235 2.55456 11.2538 3.54168 12.2724L4.55588 13.3189L11.9997 21L19.4436 13.3189L20.4578 12.2724C20.9467 11.7681 21.3346 11.1694 21.5992 10.5105C21.8638 9.85148 22 9.14517 22 8.43187C22 7.71857 21.8638 7.01225 21.5992 6.35328C21.3346 5.69431 20.9467 5.09559 20.4578 4.59133V4.59133Z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>

                            <div class="listing-item__shield-wrapper">
                                <div class="listing-item__shield-container">
                                    <div class="shield-wrapper">
                                        @if($np->new )
                                        <div class="shield" style="background: #c3dbf8; color: #272b31">
                                            <p class="caption--uppercase">
                                                    Täze
                                            </p>
                                        </div>

                                        @elseif($np->recommended)
                                            <div class="shield" style="background: #c3dbf8; color: #272b31">
                                                <p class="caption--uppercase">
                                                       Maslahat berilýän
                                                </p>
                                            </div>

                                        @elseif($np->status)
                                            <div class="shield" style="background: #c3dbf8; color: #272b31">
                                                <p class="caption--uppercase">
                                                    Meşhur
                                                </p>
                                            </div>
                                            @else

                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{--<div class="listing-item__shield-wrapper">
                                <div class="listing-item__shield-container">
                                    <div class="shield-wrapper">
                                        <div class="shield" style="background: #c3dbf8; color: #272b31">
                                            <p class="caption--uppercase">
                                                @if($np->new )
                                                    Täze
                                                    @elseif($np->recommended)
                                                    Meşhur
                                                    @elseif($np->status)
                                                    Maslahat berilýän
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}

                            <div class="listing-item__info">
                             @if($np->availability == 1)
                                <a class="listing-item__info-price-wrapper" href="{{ route('oneProduct',['id'=>$np->id]) }}">
                                    <div class="listing-item__info-price">
												<span class="price" data-ask-in-shop="Только в магазинах" data-soon-in-sale="Скоро в продаже">
													{{number_format($np->price,2,'.','')}} TMT</span>
                                        <span class="strike-diag" style="display: none">
													<span class="old-price"></span>
												</span>
                                    </div>
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

                                <a class="listing-item__info-title" href="{{ route('oneProduct',['id'=>$np->id]) }}">
                                    {{$np->name_tk }}
                                </a>
                                <div class="listing-item__info-color-wrapper">
                                    <a class="listing-item__info-color-container js-show-mini-card-button" title="{{$np->name_tk}}" data-id=1>
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

                    <section class="shadow-overlay js-pop-up" data-pop-up-name="product-mini-card">
    <div
            class="box-shadow vertical-scroll-block mini-product-page--normal js-mini-product-page-block js-position-pop-up ">
        <div class="mini-product-page js-mini-product-page">
            <div class="look-mini-product-list-wrapper" style="display: none;">
                <div class="look-mini-product-list-wrapper__back js-close-button">
                    <div class="look-mini-product-list-wrapper__back__icon">
                        <svg class="icon" viewBox="0 0 10 17" id="back">
                            <path
                                    d="M1.1005 8.1005L8.29289 0.908115C8.68342 0.517591 9.31658 0.517591 9.70711 0.908115C10.0976 1.29864 10.0976 1.93181 9.70711 2.32233L3.22182 8.80761L9.70711 15.2929C10.0976 15.6834 10.0976 16.3166 9.70711 16.7071C9.31658 17.0976 8.68342 17.0976 8.29289 16.7071L1.1005 9.51472C0.70998 9.12419 0.70998 8.49103 1.1005 8.1005Z"
                                    fill="#2C2C2C"></path>
                        </svg>
                    </div>
                    <span>Yza</span>
                </div>
                <div class="look-mini-product-list js-look-mini-product-list"></div>
            </div>
            <div class="mini-product-page__block-img">
                <div class="">
                    <div class="swiper swiper-container-horizontal js-product-images-block">
                        <div class="swiper-wrapper">
                        </div>
                        <div class="pagination">
                        </div>
                        <div class="next"></div>
                        <div class="prev"></div>
                    </div>
                </div>
            </div>
            <div class="mini-product-page__block-info">
                <div class="dropdown__close-button mini-product-page__block-close js-close-button"></div>
                <div class="js-block-product-information">
                    <div class="basic-info description-column js-coordinate-wrapper-button-block js-info-product">
                        <div class="mini-product-info-block">
                            <div style="width: 100%">
                                <div class="js-shield-mini-card-block js-shield-block">
                                    <div class="shield-wrapper js-shield-container">
                                        <div class="shield" style="background: #c3dbf8;color: #272b31">
                                            <p class="caption--uppercase">Täze</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="basic-info__caption caption-24-tablet-16 margin-right-50 js-name-product js-link-for-product-page"
                                   style="cursor: pointer" href="#">Тёмно-серый базовый джемпер</a>
                                <div class="basic-info__row">
                                    <p class="basic-info__row-item basic-info__row-item--grey-dark js-vendor-code">Артикул</p>
                                    &nbsp;
                                    <p class="basic-info__row-item js-vendor-code-number">BSW001727</p>
                                    <a href="#" class="mini-product-link js-link-for-product-page">Перейти к товару</a>
                                </div>
                            </div>
                            <div class="wrapper-price js-base-price">
									<span class="price price--old-price" style="display: none;">
										<span class="strike-diag js-old-price-info"></span>
									</span>
                                <span class="price  js-price-info"> 1699 TMT</span>
                            </div>
                            <div class="wrapper-color wrapper-color--product-card-page js-color-block">
                                <p class="wrapper-color__title">
                                    Цвет<span class="js-color-name" style="display: none">темно-серый меланж</span>
                                </p>
                                <div
                                        class="wrapper-color__item-carousel swiper-container js-color-item-swiper swiper-container-initialized swiper-container-horizontal">
                                    <div class="swiper-wrapper">
                                    </div>
                                </div>
                                <div class="swiper-navigation">
                                    <div class="previous">
                                        <svg class="icon icon--slider-arrow">
                                            <use xlink:href="#arrow"></use>
                                        </svg>
                                    </div>
                                    <div class="nextItem">
                                        <svg class="icon icon--slider-arrow" viewBox="0 0 24 24" id="arrow">
                                            <path
                                                    d="M10.8891 16.4957L3.6967 9.30331C3.30618 8.91279 3.30618 8.27962 3.6967 7.8891C4.08723 7.49858 4.7204 7.49858 5.11092 7.8891L11.5962 14.3744L18.0815 7.8891C18.472 7.49858 19.1052 7.49858 19.4957 7.8891C19.8862 8.27962 19.8862 8.91279 19.4957 9.30331L12.3033 16.4957C11.9128 16.8862 11.2796 16.8862 10.8891 16.4957Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper-size js-activating-block">
                                <div class="sizes-box" style="display: none;">
                                    <div class="js-sizolution-wrapper">
                                        <div id="Sizolution" class="js-sizolution">
                                            <button class="TardisButton" type="button">
                                                <div class="TardisButton__content">Ваш размер L/182</div>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="wrapper-size__measuring js-size-table-container">
                                        <div class="wrapper-size__measuring-button js-size js-show-size-table">
                                            <p class="button-link link link--dashed link--sizes js-button-load-style-block">Ölçegler
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="block-size js-block-size-sku">
                                    <div>
                                        <div class="block-size__item js-size-item">
                                            XS/176</div>
                                    </div>
                                    <div>
                                        <div class="block-size__item js-size-item">
                                            S/182</div>
                                    </div>
                                    <div>
                                        <div class="block-size__item js-size-item">
                                            M/182</div>
                                    </div>
                                    <div>
                                        <div class="block-size__item js-size-item">
                                            L/182</div>
                                    </div>
                                    <div>
                                        <div class="block-size__item js-size-item">
                                            XL/182</div>
                                    </div>
                                </div>

                                <p class="wrapper-size__availability js-quantity-stock" data-text-one="Осталось"
                                   data-text-two="шт. в этом размере" data-empty-text="Нет в наличии" data-relative-quantity="enough">
                                    Galan ölçegler</p>
                            </div>

                            <p class="button-text--attention button-text--prod-attention js-button-text--attention js-button-text-attention"
                               style="display: none">Ölçegiňizi saýlaň</p>

                            <p class="wrapper-bottom__text-delivery-free js-container-free-delivery-text" style="display: flex">
                                <svg class="icon icon--truck icon--size-32" viewBox="0 0 17 13" fill="none" id="truck">
                                    <path
                                            d="M3.69086 0.67334L2.65146 10.743H3.34361H3.70853C3.70853 10.743 3.98585 12.2176 5.46337 12.3702C6.94088 12.5227 7.59891 10.743 7.59891 10.743H11.3984C11.3984 10.743 11.8343 12.3702 13.2227 12.3702C14.6111 12.3702 15.0652 10.743 15.0652 10.743H15.9855L16.4362 8.04051C16.554 7.02683 16.4038 6.24939 15.9855 5.70817C15.5672 5.16696 14.8134 4.77466 13.7242 4.53128H12.1878L12.4658 0.67334H3.69086Z"
                                            stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                            d="M7.19714 10.6449C7.19714 11.5316 6.48793 12.2407 5.62506 12.2407C4.7622 12.2407 4.05298 11.5316 4.05298 10.6449C4.05298 9.75806 4.7622 9.04895 5.62506 9.04895C6.48793 9.04895 7.19714 9.75806 7.19714 10.6449Z"
                                            stroke="#2C2C2C"></path>
                                    <path
                                            d="M14.7948 10.6449C14.7948 11.5316 14.0856 12.2407 13.2227 12.2407C12.3599 12.2407 11.6506 11.5316 11.6506 10.6449C11.6506 9.75806 12.3599 9.04895 13.2227 9.04895C14.0856 9.04895 14.7948 9.75806 14.7948 10.6449Z"
                                            stroke="#2C2C2C"></path>
                                    <path d="M3.01004 8.15266H11.794L12.1878 4.53125" stroke="#2C2C2C" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                    <path d="M1 2.34932H6.84821" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path d="M2 4.34932H6.07559" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path d="M1 6.34932H4.14241" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path
                                            d="M12.1878 6.34192H13.2227C13.2227 6.34192 13.9033 6.51549 14.801 7.11216C15.6986 7.70883 16.2253 8.15262 16.2253 8.15262"
                                            stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13.7242 4.53125L13.5096 6.34195" stroke="#2C2C2C"></path>
                                </svg>
                                <span>
										<span>Sargyt berenimizde mugt eltip bereris</span>
										<span class="js-text-free-delivery">1&nbsp;30 </span>
										<span>TMT!</span>
									</span>
                            </p>

                        </div>
                        <div class="follow-button-wrapper">
                            <div class="wrapper-button wrapper-button--follow-top wrapper-button--product">
                                <p class="button-text--error margin-bottom-16" style="display:none">
                                    Siziň raýonyňyza eltip bermek mümkinçiligi ýok</p>
                                <button type="button" class="press-button js-product-details-add-to-cart">
                                    Sebede goş</button>
                                <div class="product-info__wish-block">
                                    <p class="product-info__wish-block-text">Ölçegiňizi saýlaň</p>
                                    <svg class="icon icon--heart product-info__wish js-add-to-wish-button">
                                        <g>
                                            <path
                                                    d="M20.4578 4.59133C19.9691 4.08683 19.3889 3.68663 18.7503 3.41358C18.1117 3.14054 17.4272 3 16.7359 3C16.0446 3 15.3601 3.14054 14.7215 3.41358C14.0829 3.68663 13.5026 4.08683 13.0139 4.59133L11.9997 5.63785L10.9855 4.59133C9.99842 3.57276 8.6596 3.00053 7.26361 3.00053C5.86761 3.00053 4.52879 3.57276 3.54168 4.59133C2.55456 5.6099 2 6.99139 2 8.43187C2 9.87235 2.55456 11.2538 3.54168 12.2724L4.55588 13.3189L11.9997 21L19.4436 13.3189L20.4578 12.2724C20.9467 11.7681 21.3346 11.1694 21.5992 10.5105C21.8638 9.85148 22 9.14517 22 8.43187C22 7.71857 21.8638 7.01225 21.5992 6.35328C21.3346 5.69431 20.9467 5.09559 20.4578 4.59133V4.59133Z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

                       <section class="shadow-overlay js-pop-up" data-pop-up-name="selectSizeAddToCartPopUp">
                           <div class="box-shadow vertical-scroll-block js-pop-up-info-block product-details__sizes-pop-up">
                               <div class="modal-pop-up__header">
                                   <div class="modal-pop-up__header-title">Выберите размер</div>
                                   <div class="modal-pop-up__header-close icon--close js-close-button">X</div>
                               </div>
                               <div class="product-details__sizes-pop-up-table js-show-sizes-table">
                                   Таблица размеров
                               </div>
                               <div class="product-details__sizes-wrapper custom-scroll js-add-to-basket-sizes">
                                   <div class="block-size__item js-add-to-basket-size">XS/176</div>
                                   <div class="block-size__item js-add-to-basket-size">S/182</div>
                                   <div class="block-size__item js-add-to-basket-size">M/182</div>
                                   <div class="block-size__item js-add-to-basket-size">L/182</div>
                                   <div class="block-size__item js-add-to-basket-size">XL/182</div>
                               </div>
                           </div>
                       </section>

                       <section class="shadow-overlay js-pop-up" data-pop-up-name="mini-basket">
                           <div class="vertical-scroll-block position-pop-up js-add-to-cart-content">
                               <div class="pop-up-basket__wrapper fade-bottom-mobile">
                                   <div class="pop-up-basket js-mini-basket">
                                       <div class="pop-up-basket__header margin-bottom-16">
                                           <div class="pop-up-basket__header-head">
                                               <h2 class="uk-caption uk-caption--h3 uk-caption--bold">
                                                   Товар добавлен в корзину
                                               </h2>
                                               <div class="icon icon--close js-close">X</div>
                                           </div>
                                       </div>
                                       <div class="pop-up-basket__img">
                                           <img src="./img/listing/p-1-1.jpg" alt="Джемпер BSW001727 трикотаж черный S/182"
                                                title="Джемпер BSW001727 трикотаж черный S/182">
                                       </div>
                                       <div class="pop-up-basket__info">
                                           <h5 class="uk-caption uk-caption--h5 uk-caption--bold margin-bottom-16">Чёрный базовый джемпер</h5>
                                           <div class="pop-up-basket__info-block">
                                               <p class="pop-up-basket__info-color-size">
								<span class="pop-up-basket__info-size margin-right-24">
									<span>S/182</span>
								</span>
                                                   <span class="pop-up-basket__info-color">
									<span class="color--grey-dark">Цвет</span>
									&nbsp;
									<span class="pop-up-basket__info-color-img" style="background-color: #000;"></span>
								</span>
                                               </p>
                                               <p class="pop-up-basket__price caption-18">
                                                   <span class="uk-caption uk-caption--h4">1699 TMT</span>
                                               </p>
                                           </div>
                                       </div>

                                       <div class="pop-up-basket__basket-total">
                                           <div class="pop-up-basket__total-text">
                                               <p><span class="light-text">В корзине</span> <span class="js-minibasket-total">4 товара на сумму 6496
									TMT</span></p>
                                           </div>
                                           <div class="pop-up-basket__delivery-status js-text-free-delivery" data-free-limit="1500.0">
                                               <div class="delivery-index">
                                                   <div class="delivery-index__text">
									<span>
										Поздравляем! Вы получили бесплатную доставку
									</span>
                                                   </div>
                                                   <div class="delivery-index__icon js-delivery-progress">
                                                       <svg class="icon--truck">
                                                           <use xlink:href="#truck"></use>
                                                       </svg>
                                                       <svg viewBox="0 0 100 100">
                                                           <path d="M 50,50 m 0,-47 a 47,47 0 1 1 0,94 a 47,47 0 1 1 0,-94" stroke="#f2f2f2" stroke-width="5"
                                                                 fill-opacity="0"></path>
                                                           <path d="M 50,50 m 0,-47 a 47,47 0 1 1 0,94 a 47,47 0 1 1 0,-94" stroke="#66b46b" stroke-width="6"
                                                                 fill-opacity="0" style="stroke-dasharray: 295.416, 295.416; stroke-dashoffset: 590.832;"></path>
                                                       </svg>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="pop-up-basket__buttons">
                                           <div class="uk-button js-close">Продолжить покупки</div>
                                           <a href="#" class="pop-up-basket__buttons-basket uk-button uk-button--red">
                                               Оформить заказ
                                           </a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </section>

                       <section class="shadow-overlay js-pop-up" data-pop-up-name="size-table">
                           <div class="box-shadow vertical-scroll-block modal-size">
                               <div class="modal-top modal-top--size-tablet">
                                   <p class="modal-title">Таблица размеров</p>
                                   <div class="modal-close-icon js-close-button">X</div>
                               </div>
                               <div class="table-wrapper js-size-table-content">
                                   <table class="table-caption-block">
                                       <tbody>
                                       <tr>
                                           <th class="table-caption-block__caption">
                                               Размер</th>

                                           <th class="table-caption-block__caption">
                                               Обхват груди<p>см</p>
                                           </th>
                                           <th class="table-caption-block__caption">
                                               Обхват талии<p>см</p>
                                           </th>
                                       </tr>
                                       <tr>
                                           <td class="table-caption-block__block">XS/176</td>
                                           <td class="table-caption-block__block">84</td>
                                           <td class="table-caption-block__block">72</td>
                                       </tr>
                                       <tr>
                                           <td class="table-caption-block__block">S/182</td>
                                           <td class="table-caption-block__block">92</td>
                                           <td class="table-caption-block__block">76</td>
                                       </tr>
                                       <tr>
                                           <td class="table-caption-block__block">M/182</td>
                                           <td class="table-caption-block__block">96</td>
                                           <td class="table-caption-block__block">82</td>
                                       </tr>
                                       <tr>
                                           <td class="table-caption-block__block">L/182</td>
                                           <td class="table-caption-block__block">104</td>
                                           <td class="table-caption-block__block">90</td>
                                       </tr>
                                       <tr>
                                           <td class="table-caption-block__block">XL/182</td>
                                           <td class="table-caption-block__block">108</td>
                                           <td class="table-caption-block__block">96</td>
                                       </tr>
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </section>

                </div>
            </div>
        </section>
        <!--  -->
        <div class="pagination">
            <div class="pagination__container __container">
                <div class="pagination__paginations">
                  {{ $products->links() }}
                  {{--  <ul>

                        <li><a href="#">{{ $products->links() }}</a></li>
                        --}}{{--<li><a href="#" class="selected disabled">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#" class="disabled">...</a></li>
                        <li><a href="#">99</a></li>--}}{{--
                    </ul>--}}
                </div>
            </div>
        </div>

    </section>

    @endsection

@section('scripts')
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/sliders.js')}}"></script>

@endsection
