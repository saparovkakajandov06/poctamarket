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
                                            <span>Baha</span>
                                            <input type="number" class="__min" name="price_from" placeholder="81" id="price_from" value="{{ request()->price_from}}" >
                                            <span>Bahadan</span>
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
                        @if($np->status == 1 or $np->recommended == 1 or $np->new == 1)

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
                                        <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                             class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}">

                                        @foreach(json_decode($np->img) as $key => $value)
                                            @if($key != 'main')
                                                <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                                     class="listing-item__img listing-item__img-2" src="{{ asset('images/products/little/' . $value) }}">
                                            @endif
                                        @endforeach

                                    </a>
                                   <div class="listing-item__button-open">
                                        <button class="js-show-mini-card-button" data-id=1>
                                            Giňişleýin</button>
                                    </div>
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
                                        {{$np->name_tk }} </a>
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

                    @endif
                    @endforeach




                </div>
            </div>
        </section>
        <!--  -->
        <div class="pagination">
            <div class="pagination__container __container">
                <div class="pagination__paginations">
                    {{ $products->links() }}

                </div>
            </div>
        </div>



    </section>

@endsection

@section('scripts')
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/sliders.js')}}"></script>

@endsection


