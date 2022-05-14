@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/old/owl.carousel.min.css')}}">

@endsection

@section('content')



        <section class="main-category">
        <div class="main-category__container __container">
            <div class="main-category__wrapper">
                <section class="main-category__slider category-slider">
                    <div class="category-slider__slids">
                    
                    <article class="category-slider__item category-box">
                            <a href="#">
                               
                                <div class="category-box__img category-box__img_slider">
                                    <img src="
                                    {{asset('img/1.jpg')}}" alt="" />
                                </div>
                                <div class="category-box__category">
                                    <div class="category-box__category-name">Bedew</div>
                                    <div class="category-box__category-title">Bedew</div>
                                </div>
                            </a>
                        </article>


                        <article class="category-slider__item category-box">
                            <a href="#">
                               
                                <div class="category-box__img category-box__img_slider">
                                    <img src="
                                    {{asset('img/2.jpg')}}" alt="" />
                                </div>
                                <div class="category-box__category">
                                    <div class="category-box__category-name">Ýeňiş</div>
                                    <div class="category-box__category-title">Ýeňiş</div>
                                </div>
                            </a>
                        </article>

                        <article class="category-slider__item category-box">
                            <a href="#">
                               
                                <div class="category-box__img category-box__img_slider">
                                    <img src="
                                    {{asset('img/3.jpg')}}" alt="" />
                                </div>
                                <div class="category-box__category">
                                    <div class="category-box__category-name">Nusaý</div>
                                    <div class="category-box__category-title">Nusaý</div>
                                </div>
                            </a>
                        </article>
                    
                    
                    <!-- @foreach($sliderItems as $sI)
                            @if($sI->slider_id == 1)
                        <article class="category-slider__item category-box">
                            <a href="@isset($sI->url){{$sI->url}}@endisset">
                                <div class="category-box__title">{{$sI->title}}</div>
                                <div class="category-box__img category-box__img_slider">
                                    <img src="
                                    {{asset($sI->img)}}" alt="" />
                                </div>
                                <div class="category-box__category">
                                    <div class="category-box__category-name">{{$sI->title}}</div>
                                    <div class="category-box__category-title">{{$sI->description}}</div>
                                </div>
                            </a>
                        </article>
                           @endif
                            @endforeach -->



                    </div>
                </section>
                <section class="main-category__mini-boxs">

                        @foreach($ikigapdal as $iki)

                    <article class="main-category__mini-box category-box">
                        <a href="{{ $iki->link }}">
                            <div class="category-box__img">
                                <img src="
                                {{ asset($iki->img) }}" alt="" />
                            </div>
                            <div class="category-box__category">
                                <div class="category-box__category-name">{{$iki->title}}</div>

                            </div>
                        </a>
                    </article>

                    @endforeach

                </section>
            </div>
        </div>
    </section>

{{--taze--}}

    {{--<section class="new-product">
        <a href="#" class="new-product__big-title">täze gelenler</a>
        <div class="new-product__container __container">
            <div class="new-product__wrapper">
                <section class="new-product__row">

                        @foreach($newProds as $np)
                            @if($np->new == 1)
                    <article class="new-product__column">
                        <div class="new-product__img-box">
                            <a href="{{ route('oneProduct',['id'=>$np->id]) }}" class="new-product__img">
                                <img src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}" alt="" />
                            </a>

                            @if(Auth()->user())
                                <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                    {{csrf_field()}}
                                    <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                    <input name="product_id" type="hidden" value="{{$np->id}}" />

                                    <button class="new-product__favorite">
                                        <span class="_icon-heart"></span>

                                    </button>
                                </form>
                            @else

                                <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                    {{csrf_field()}}
                                    <input name="product_id" type="hidden" value="{{$np->id}}" />

                                    <button class="new-product__favorite">
                                        <span class="_icon-heart"></span>

                                    </button>
                                </form>
                            @endif



                            <div class="new-product__img-bot">
                                
                                <div class="new-product__img-bot-new">  @if($np->new ) Täze @endif</div>
                            </div>
                        </div>
                        <div class="new-product__inf-box">
                            <div class="new-product__price-com">
                                <div class="new-product__price">

                                    <div class="new-product__price-new">{{number_format($np->price,2,'.','')}} TMT</div>
                                    <div class="new-product__price-current">{{number_format($np->price,2,'.','')}} TMT</div>
                                </div>

                            </div>
                            <a href="#" class="new-product__company">{{$np->brand }}</a>
                            <a href="#" class="new-product__link">{{$np->name_tk }}</a>
                        </div>
                    </article>
                            @endif
                        @endforeach


                </section>
            </div>
        </div>
    </section>--}}

        <section class="new-product">
            <a href="#" class="new-product__big-title">täze gelenler</a>
            <div class="new-product__container __container">
                <div class="new-product__wrapper">

                    <section class="new-product__row new-product__slider">



                        @foreach($newProducts as $rp)
                            @if($rp->new == 1)
                                <article class="new-product__column">
                                    <div class="new-product__img-box listing-item">
                                       
                                            <div class="listing-item__hover"></div>
                                            <div class="listing-item__img-wrapper" style="height: 100%;">
                                                <a class="listing-item__img-content" href="{{ route('oneProduct',['id'=>$rp->id]) }}">
                                                    <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                                    @foreach(json_decode($rp->img) as $key => $value)
                                                        @if($key != 'main')
                                                            <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                                        @endif
                                                    @endforeach

                                                    <img alt="{{$rp->name_tk}}" title="{{$rp->name_tk}}"
                                                        class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($rp->img)->main) }}">

                                                    @foreach(json_decode($rp->img) as $key => $value)
                                                        @if($key != 'main')

                                                            <img alt="{{$rp->name_tk}}" title="{{$rp->name_tk}}"
                                                                class="listing-item__img listing-item__img-{{ $loop->index + 1 }}" src="{{ asset('images/products/little/' . $value) }}">

                                                        @endif
                                                    @endforeach

                                                </a>

                                            </div>

                                            <div class="listing-item__button-open">
                                                <button class="js-show-mini-card-button" data-id='{{$rp->id}}'>
                                                    Giňişleýin</button>
                                            </div>

                                        @if(Auth()->user())
                                    <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                        {{csrf_field()}}
                                        <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                        <input name="product_id" type="hidden" value="{{$rp->id}}" />

                                        <button class="new-product__favorite">
                                            <span class="_icon-heart"></span>

                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                        {{csrf_field()}}
                                        <input name="product_id" type="hidden" value="{{$rp->id}}" />

                                        <button class="new-product__favorite">
                                            <span class="_icon-heart"></span>
                                        </button>
                                    </form>
                                @endif

                                        <div class="new-product__img-bot">

                                            @if($rp->new)
                                                <div class="new-product__img-bot-new">Täze</div>
                                            @elseif($rp->recommended)
                                                <div class="new-product__img-bot-new">Maslahat berilýän</div>
                                            @elseif($rp->status)
                                                <div class="new-product__img-bot-new">Meşhur</div>
                                            @else

                                            @endif
                                        </div>
                                    </div>
                                    <div class="new-product__inf-box">
                                        <div class="new-product__price-com">
                                            <div class="new-product__price">
                                               
                                                <div class="new-product__price-new">{{ number_format($rp->price,2,'.','') }} TMT</div>
                                                <div class="new-product__price-current">{{ number_format($rp->price,2,'.','') }} TMT</div>
                                            </div>
                                            <a href="#" class="new-product__company">{{$rp->brand}}</a>
                                        </div>
                                       
                                        @if(__('site.name_product')=='name_tk')
                                            <a href="#" class="new-product__link">{{$rp->name_tk}}</a>
                                        @endif
                                        @if(__('site.name_product')=='name_ru')
                                            <a href="#" class="new-product__link">{{$rp->name_ru}}</a>
                                        @endif
                                        @if(__('site.name_product')=='name_en')
                                            <a href="#" class="new-product__link">{{$rp->name_en}}</a>
                                        @endif

                                        <a href="#" class="new-product__size">
                                            <p>{{$rp->brand}}</p>
                                            
                                        </a>
                                    </div>
                                </article>
                            @endif
                        @endforeach


                    </section>

    {{--taze--}}

    {{--hity prodaj--}}
    <section class="new-product">
        <div class="new-product__container __container">
            <div class="new-product__wrapper" style="position: relative;">
                <div class="new-product__categorys product-categorys">
                    <div class="product-categorys__title">
                        <p>Meşhur saýlananlar</p>
                    </div>
                    <div class="product-categorys__row">
                        <button class="product-categorys__item">Aýallar üçin</button>
                        <button class="product-categorys__item">Gyzlar üçin</button>
                        <button class="product-categorys__item">Çagalar üçin</button>
                        <button class="product-categorys__item">Erkekler üçin</button>
                    </div>
                </div>

                <div class="new-product__category-active-slider">
                    <section class="new-product__row new-product__slider">

                        @foreach($recomProdForHer as $np)

                        <article class="new-product__column">
                            <div class="new-product__img-box listing-item">
                                
                                <div class="listing-item__hover"></div>
                                    <div class="listing-item__img-wrapper" style="height: 100%;">
                                        <a class="listing-item__img-content" href="{{ route('oneProduct',['id'=>$np->id]) }}">
                                            <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                            @foreach(json_decode($np->img) as $key => $value)
                                                @if($key != 'main')
                                                    <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                                @endif
                                            @endforeach

                                            <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                                class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}">

                                            @foreach(json_decode($np->img) as $key => $value)
                                                @if($key != 'main')

                                                    <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                                        class="listing-item__img listing-item__img-{{ $loop->index + 2 }}" src="{{ asset('images/products/little/' . $value) }}">

                                                @endif
                                            @endforeach

                                        </a>

                                    </div>

                                    <div class="listing-item__button-open">
                                        <button class="js-show-mini-card-button" data-id='{{$np->id}}'>
                                            Giňişleýin</button>
                                    </div>

                                @if(Auth()->user())
                                    <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                        {{csrf_field()}}
                                        <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                        <input name="product_id" type="hidden" value="{{$np->id}}" />

                                        <button class="new-product__favorite">
                                            <span class="_icon-heart"></span>

                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                        {{csrf_field()}}
                                        <input name="product_id" type="hidden" value="{{$np->id}}" />

                                        <button class="new-product__favorite">
                                            <span class="_icon-heart"></span>
                                        </button>
                                    </form>
                                @endif


                                <div class="new-product__img-bot">

                                    <div class="new-product__img-bot">

                                        @if($np->recommended )
                                            <div class="new-product__img-bot-new">
                                                Maslahat berilýän
                                            </div>
                                        @elseif($np->status)
                                            <div class="new-product__img-bot-new">
                                                Meşhur
                                            </div>
                                        @elseif($np->new)
                                            <div class="new-product__img-bot-new">
                                                Täze
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </div>
                            <div class="new-product__inf-box">
                                <div class="new-product__price-com">
                                    <div class="new-product__price">
                                        <div class="new-product__price-current">{{number_format($np->price,2,'.','')}} TMT</div>
                                    </div>
                                    <a href="#" class="new-product__company">{{$np->brand }}</a>
                                </div>
                                 @if(__('site.name_product')=='name_tk')
                                    <a href="#" class="new-product__category">{{$np->name_tk}}</a>
                                @endif
                                @if(__('site.name_product')=='name_ru')
                                    <a href="#" class="new-product__category">{{$np->name_ru}}</a>
                                @endif
                                @if(__('site.name_product')=='name_en')
                                    <a href="#" class="new-product__category">{{$np->name_en}}</a>
                                @endif
                            </div>
                        </article>

@endforeach

                    </section>
                </div>
                <div class="new-product__category-active-slider">
                    <section class="new-product__row new-product__slider">

                        @foreach($recomProdForGirls as $np)

                                <article class="new-product__column">
                                    <div class="new-product__img-box listing-item">
                                           
                                        <div class="listing-item__hover"></div>
                                            <div class="listing-item__img-wrapper" style="height: 100%;">
                                                <a class="listing-item__img-content" href="{{ route('oneProduct',['id'=>$np->id]) }}">
                                                    <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                                    @foreach(json_decode($np->img) as $key => $value)
                                                        @if($key != 'main')
                                                            <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                                        @endif
                                                    @endforeach

                                                    <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                                        class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}">

                                                    @foreach(json_decode($np->img) as $key => $value)
                                                        @if($key != 'main')

                                                            <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                                                class="listing-item__img listing-item__img-{{ $loop->index + 2 }}" src="{{ asset('images/products/little/' . $value) }}">

                                                        @endif
                                                    @endforeach

                                                </a>

                                            </div>

                                            <div class="listing-item__button-open">
                                                <button class="js-show-mini-card-button" data-id='{{$np->id}}'>
                                                    Giňişleýin</button>
                                            </div>


                                        @if(Auth()->user())
                                            <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                                {{csrf_field()}}
                                                <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                                <input name="product_id" type="hidden" value="{{$np->id}}" />

                                                <button class="new-product__favorite">
                                                    <span class="_icon-heart"></span>
                                                    {{--<p>161</p>--}}
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                                {{csrf_field()}}
                                                <input name="product_id" type="hidden" value="{{$np->id}}" />

                                                <button class="new-product__favorite">
                                                    <span class="_icon-heart"></span>
                                                    {{--<p>161</p>--}}
                                                </button>
                                            </form>
                                        @endif


                                        <div class="new-product__img-bot">

                                            @if($np->recommended )
                                                <div class="new-product__img-bot-new">
                                                    Maslahat berilýän
                                            </div>
                                                @elseif($np->status)
                                                <div class="new-product__img-bot-new">
                                                    Meşhur
                                                </div>
                                                @elseif($np->new)
                                                <div class="new-product__img-bot-new">
                                                    Täze
                                                </div>
                                            @endif

                                        </div>

                                    </div>
                                    <div class="new-product__inf-box">
                                        <div class="new-product__price-com">
                                            <div class="new-product__price">
                                                <div class="new-product__price-current">{{number_format($np->price,2,'.','')}} TMT</div>
                                            </div>
                                            <a href="#" class="new-product__company">{{$np->brand }}</a>
                                        </div>
                                        @if(__('site.name_product')=='name_tk')
                                    <a href="#" class="new-product__category">{{$np->name_tk}}</a>
                                @endif
                                @if(__('site.name_product')=='name_ru')
                                    <a href="#" class="new-product__category">{{$np->name_ru}}</a>
                                @endif
                                @if(__('site.name_product')=='name_en')
                                    <a href="#" class="new-product__category">{{$np->name_en}}</a>
                                @endif

                                    </div>
                                </article>

                        @endforeach

                    </section>
                </div>
                <div class="new-product__category-active-slider">
                    <section class="new-product__row new-product__slider">

                        @foreach($recomProdForBoys as $np)

                                <article class="new-product__column">
                                    <div class="new-product__img-box listing-item">
                                
                                        <div class="listing-item__hover"></div>
                                            <div class="listing-item__img-wrapper" style="height: 100%;">
                                                <a class="listing-item__img-content" href="{{ route('oneProduct',['id'=>$np->id]) }}">
                                                    <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                                    @foreach(json_decode($np->img) as $key => $value)
                                                        @if($key != 'main')
                                                            <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                                        @endif
                                                    @endforeach

                                                    <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                                        class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}">

                                                    @foreach(json_decode($np->img) as $key => $value)
                                                        @if($key != 'main')

                                                            <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                                                class="listing-item__img listing-item__img-{{ $loop->index + 2 }}" src="{{ asset('images/products/little/' . $value) }}">

                                                        @endif
                                                    @endforeach

                                                </a>

                                            </div>

                                            <div class="listing-item__button-open">
                                                <button class="js-show-mini-card-button" data-id='{{$np->id}}'>
                                                    Giňişleýin</button>
                                            </div>


                                        @if(Auth()->user())
                                            <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                                {{csrf_field()}}
                                                <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                                <input name="product_id" type="hidden" value="{{$np->id}}" />

                                                <button class="new-product__favorite">
                                                    <span class="_icon-heart"></span>

                                                </button>
                                            </form>
                                        @else
                                            <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                                {{csrf_field()}}
                                                <input name="product_id" type="hidden" value="{{$np->id}}" />

                                                <button class="new-product__favorite">
                                                    <span class="_icon-heart"></span>

                                                </button>
                                            </form>
                                        @endif


                                        <div class="new-product__img-bot">

                                            @if($np->recommended )
                                                <div class="new-product__img-bot-new">
                                                    Maslahat berilýän
                                                </div>
                                            @elseif($np->status)
                                                <div class="new-product__img-bot-new">
                                                    Meşhur
                                                </div>
                                            @elseif($np->new)
                                                <div class="new-product__img-bot-new">
                                                    Täze
                                                </div>
                                            @endif

                                        </div>


                                    </div>
                                    <div class="new-product__inf-box">
                                        <div class="new-product__price-com">
                                            <div class="new-product__price">
                                                <div class="new-product__price-current">{{number_format($np->price,2,'.','')}} TMT</div>
                                            </div>
                                            <a href="#" class="new-product__company">{{$np->brand }}</a>
                                        </div>
                                        @if(__('site.name_product')=='name_tk')
                                    <a href="#" class="new-product__category">{{$np->name_tk}}</a>
                                @endif
                                @if(__('site.name_product')=='name_ru')
                                    <a href="#" class="new-product__category">{{$np->name_ru}}</a>
                                @endif
                                @if(__('site.name_product')=='name_en')
                                    <a href="#" class="new-product__category">{{$np->name_en}}</a>
                                @endif

                                    </div>
                                </article>

                        @endforeach

                    </section>
                </div>
                <div class="new-product__category-active-slider">
                    <section class="new-product__row new-product__slider">

                        @foreach($recomProdForHim as $np)

                                <article class="new-product__column">
                                    <div class="new-product__img-box listing-item">
                                
                                        <div class="listing-item__hover"></div>
                                            <div class="listing-item__img-wrapper" style="height: 100%;">
                                                <a class="listing-item__img-content" href="{{ route('oneProduct',['id'=>$np->id]) }}">
                                                    <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                                    @foreach(json_decode($np->img) as $key => $value)
                                                        @if($key != 'main')
                                                            <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                                        @endif
                                                    @endforeach

                                                    <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                                        class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}">

                                                    @foreach(json_decode($np->img) as $key => $value)
                                                        @if($key != 'main')

                                                            <img alt="{{$np->name_tk}}" title="{{$np->name_tk}}"
                                                                class="listing-item__img listing-item__img-{{ $loop->index + 2 }}" src="{{ asset('images/products/little/' . $value) }}">

                                                        @endif
                                                    @endforeach

                                                </a>

                                            </div>

                                            <div class="listing-item__button-open">
                                                <button class="js-show-mini-card-button" data-id='{{$np->id}}'>
                                                    Giňişleýin</button>
                                            </div>


                                        @if(Auth()->user())
                                            <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                                {{csrf_field()}}
                                                <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                                <input name="product_id" type="hidden" value="{{$np->id}}" />

                                                <button class="new-product__favorite">
                                                    <span class="_icon-heart"></span>
                                                    {{--<p>161</p>--}}
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                                {{csrf_field()}}
                                                <input name="product_id" type="hidden" value="{{$np->id}}" />

                                                <button class="new-product__favorite">
                                                    <span class="_icon-heart"></span>

                                                </button>
                                            </form>
                                        @endif


                                        <div class="new-product__img-bot">

                                            @if($np->recommended )
                                                <div class="new-product__img-bot-new">
                                                    Maslahat berilýän
                                                </div>
                                            @elseif($np->status)
                                                <div class="new-product__img-bot-new">
                                                    Meşhur
                                                </div>
                                            @elseif($np->new)
                                                <div class="new-product__img-bot-new">
                                                    Täze
                                                </div>
                                            @endif

                                        </div>

                                    </div>
                                    <div class="new-product__inf-box">
                                        <div class="new-product__price-com">
                                            <div class="new-product__price">
                                                <div class="new-product__price-current">{{number_format($np->price,2,'.','')}} TMT</div>
                                            </div>
                                            <a href="#" class="new-product__company">{{$np->brand }}</a>
                                        </div>
                                        @if(__('site.name_product')=='name_tk')
                                    <a href="#" class="new-product__category">{{$np->name_tk}}</a>
                                @endif
                                @if(__('site.name_product')=='name_ru')
                                    <a href="#" class="new-product__category">{{$np->name_ru}}</a>
                                @endif
                                @if(__('site.name_product')=='name_en')
                                    <a href="#" class="new-product__category">{{$np->name_en}}</a>
                                @endif
                                       
                                    </div>
                                </article>

                        @endforeach

                    </section>
                </div>
            </div>
        </div>
    </section>
    {{--hity prodaj--}}

    {{--podarki--}}
    <div class="present-box">
        <div class="present-box__container __container">
            <div class="present-box__wrapper">
                <div class="present-box__titles">
                    <h2>Sowgat üçin oňa maslahat beriň</h2>
                    <p>Islän zadyňyzy hökman alarsyňyz!</p>
                </div>
                <div class="present-box__img">
                    <img src="{{asset('img/img/present.png')}}" alt="" />
                </div>
                <a href="{{route('podarka')}}" class="present-box__button">Sowgat</a>
            </div>
        </div>
    </div>
    {{--podarki--}}






    {{--brand--}}
    <div class="brands-slider">
        <div class="brands-slider__container __container">
            <div class="brands-slider__row">

              @foreach($brands as $brand)
                <div class="brands-slider__brand">
                    <a href="{{route('brand_show')}}">
                    <img src="{{$brand->img}}" alt="" />
                    </a>
                </div>
            @endforeach

            </div>
        </div>
    </div>
    {{--brand--}}

    {{--podpisites--}}
    <div class="news-reg_box">
        <div class="news-reg_box__container __container">
            <img src="{{asset('img/galadurdy.jpg')}}" alt="" />
            <div class="news-reg_box__form">
                <div class="news-reg_box__title">Arzanladyş, aksiýa, täzeçillik,  Abuna boluň!</div>
                <div class=""></div>
                <form action="{{ route('pocta') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <input type="email" name="email" required class="news-reg_box__input" placeholder="Siziň Email" />
                <div class="news-reg_box__links">
                    <label for="checkbox" class="news-reg_box__checkbox">
                        <input type="checkbox" name="" id="checkbox" />
                        <span>
                  <div class="_icon-check"></div>
                </span>
                        <p>Kabul edýärin</p>
                    </label>
                    <a href="#" class="news-reg_box__link">ulanyjy razylygy</a>
                </div>

                <input type="submit" value="Abuna boluň!" class="news-reg_box__send" />
                </form>
            </div>
        </div>
    </div>
    {{--podpisites--}}

   



   {{-- <section class="shadow-overlay js-pop-up" data-pop-up-name="log-in-and-reg">
        <div class="reg-and-log">
            <div class="reg-and-log__wrapper">
                <div class="reg-and-log__close js-close-button">X</div>
                <div class="reg-and-log__row">
                    <div class="reg-and-log__mob-nav">
                        <button class="__js-show-reg-area">Зарегистрироваться</button>
                        <button class="__js-show-log-area">Войти</button>
                    </div>

                    <div class="reg-and-log__column">
                        <div class="reg-and-log__show-area __js-nav-reg-area">
                            <h3>Я новый пользователь </h3>
                            <h5>Отслеживай заказы и накапливай бонусы в личном кабинете</h5>
                            <button class="reg-and-log__show-area-button __js-show-reg-area">Зарегистрироваться</button>
                        </div>
                        <div class="reg-and-log__reg-area __js-reg-area">
                            <h3>Я новый пользователь </h3>
                            <h5>Отслеживай заказы и накапливай бонусы в личном кабинете</h5>
                            <div class="reg-and-log__form">
                                <div class="reg-and-log__form-item">
                                    <span>E-mail</span>
                                    <input type="email">
                                </div>
                                <div class="reg-and-log__form-item">
                                    <span>Номер телефона</span>
                                    <input type="tel">
                                </div>
                                <div class="reg-and-log__form-item">
                                    <span>Пароль</span>
                                    <input type="password" id="password">
                                    <div class="reg-and-log__show-pass __js-show-password">Показать</div>
                                </div>
                            </div>
                            <div class="reg-and-log__checkbox">
                                <label>
                                    <input type="checkbox" id="random-password">
                                    <span></span>
                                    <p>Сгенерировать пароль за меня</p>
                                </label>
                            </div>
                            <div class="reg-and-log__checkbox">
                                <label>
                                    <input type="checkbox">
                                    <span></span>
                                    <p>Я соглашаюсь с условиями договора публичной оферты, возврата и безопасности</p>
                                </label>
                            </div>
                            <button>Зарегистрироваться</button>
                        </div>
                    </div>
                    <div class="reg-and-log__column">
                        <div class="reg-and-log__show-area __js-nav-log-area">
                            <h3>Я уже зарегистрирован</h3>
                            <h5>Войти, чтобы быстрее оформить заказ и отслеживать его в личном кабинете</h5>
                            <button class="reg-and-log__show-area-button __js-show-log-area">Войти</button>
                        </div>
                        <div class="reg-and-log__reg-area __js-log-area">
                            <h3>Я уже зарегистрирован</h3>
                            <h5>Войти, чтобы быстрее оформить заказ и отслеживать его в личном кабинете</h5>
                            <div class="reg-and-log__form">
                                <div class="reg-and-log__form-item">
                                    <span>E-mail</span>
                                    <input type="email">
                                </div>
                                <div class="reg-and-log__form-item">
                                    <span>Пароль</span>
                                    <input type="password">
                                    <div class="reg-and-log__show-pass __js-show-password">Показать</div>
                                </div>
                            </div>
                            <div class="reg-and-log__forgot-pass js-close-button __js-forgot-pass">Забыл пароль?</div>
                            <button>Войти</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="shadow-overlay js-pop-up" data-pop-up-name="forgot-pass">
        <div class="reg-and-log reg-and-log_forgot">
            <div class="reg-and-log__wrapper">
                <div class="reg-and-log__close js-close-button">X</div>
                <div class="reg-and-log__row">
                    <div class="reg-and-log__column">
                        <div class="reg-and-log__reg-area">
                            <h3>Восстановление пароля</h3>
                            <div class="reg-and-log__form">
                                <div class="reg-and-log__form-item">
                                    <span>Email или телефон</span>
                                    <input type="text">
                                </div>
                            </div>
                            <button>Получить временный пароль</button>
                            <div class="reg-and-log__forgot-pass js-close-button js-show-log-and-reg">Я вспомнил(а) пароль</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

   {{-- <section class="section-3 wrapper d-flex aligncenter">
        <div class="menu d-flex aligncenter">


            <button id="myBtn"><img height="100" src="{{asset('img/icons/heart.svg')}}"> </button>

            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="col-md-12">
                        <div class="text-center">
                            <h2>Хочу скидку</h2>
                        </div>
                        @foreach ($warns as $warn)
                        <div class="col-md-6 left-side-div">
                            <img src="{{ asset($warn->img) }}" height="100" alt="">
                        </div>

                            <div class="col-md-6 right-side-div">
                               <h4>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h4>

                                <a class="menu-item" href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>{{$warn->category->name_tk}}</a>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="section-4 wrapper d-flex">
        <div class="owl-carousel arrows-carousel" id="owl-carousel">
            @foreach($sliderItems as $sI)
            @if($sI->slider_id == 1)
            <div class="slider">
                <a href="@isset($sI->url){{$sI->url}}@endisset">
                    <img class="owl-lazy img-1 img-of-slider" data-src="{{asset($sI->img)}}" alt="">
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </section>


    <section class="banner-block mini-wrapper">
        @foreach($ikigapdal as $iki)
            <a href="{{ $iki->link }}" class="block">
                <img src="{{ asset($iki->img) }}" alt="">
            </a>
        @endforeach
    </section>
    
    <section class="section-5 mini-wrapper owl-1-wrapper">
        <h2>Täze harytlar</h2>

        <div class="owl-carousel" id="owl-carousel-2">
            @foreach($newProds as $np)
            @if($np->new == 1)
            <div class="card">
                <a class="owl-lazy" href="{{ route('oneProduct',['id'=>$np->id]) }}">
                    <div class="card-img">
                        <img src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}" alt="">
                        @if($np->new )
                        <p class="new">Täze</p>
                            @endif
                    </div>
                    <div class="d-flex spacebetween">
                        <h5 class="price">{{number_format($np->price,2,'.','')}} TMT</h5>
                    </div>
                    <p class="product-title">{{$np->name_tk }}</p>
                </a>    
            </div>
            @endif
            @endforeach
        </div>

        <div class="d-flex spacebetween delivery-container">
            <div class="d-flex column aligncenter delivery">
                <div class="delivery-img"><img src="{{asset('img/icons/truck.svg')}}" height="83" alt=""></div>
                <h5>Iberiş bahasy</h5>
                <h5 class="cl-black">30-40 manat</h5>
            </div>
            <div class="d-flex column aligncenter delivery">
                <div class="delivery-img"><img src="{{asset('img/icons/clock.svg')}}" height="83" alt=""></div>
                <h5>Gowşuryş wagty</h5>
                <h5 class="cl-black">1 - 2 gün </h5>
            </div>
            <div class="d-flex column aligncenter delivery">
                <div class="delivery-img"><img src="{{asset('img/icons/payment.svg')}}" height="83" alt=""></div>
                <h5 class="text-align-center">Nagt ýa-da <br> Altyn Asyr karta</h5>
            </div>
        </div>
    </section>

    <section class="section-4 wrapper d-flex">
        <div class="owl-carousel arrows-carousel" id="owl-carousel-special">
            @foreach($sliderItems as $sI)
            @if($sI->slider_id == 2)
            <div class="slider">
                <a href="@isset($sI->url) 
                    {{$sI->url}}@endisset">
                    <img class="owl-lazy img-1 img-of-slider" data-src="{{asset($sI->img)}}" alt="">
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </section>

    <h2>Meşhur harytlar</h2>
    <section class="section-5 mini-wrapper section-5-2 d-flex flex-wrap spacebetween">

        @foreach($newProds->where('recommended',1)->take(10) as $np)
        
        <a href="{{ route('oneProduct',['id'=>$np->id]) }}" class="card">
            <div class="card-img">
                <img src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}" alt="">
                @if($np->recommended )
                    <p class="new">Meşhur</p>
                @endif
            </div>
            <div class="d-flex spacebetween">
                <h5 class="price">{{number_format($np->price,2,'.','')}} TMT</h5>
            </div>
            <p class="product-title">{{$np->name_tk }}</p>
        </a>
        
        @endforeach
        
    </section>


    <h2>Подарить</h2>

    <section class="section-5 mini-wrapper section-5-2 d-flex flex-wrap spacebetween">

       Хочу подарить

            <a href="{{route('podarka')}}" class="card">
                <div class="card-img">
                    <img src="{{ asset('img/icons/market-logo.png') }}" style="padding-top: 15px" width="190" alt="">

                </div>
                <div class="d-flex spacebetween">
                    Хочу подарить
                </div>

            </a>



    </section>



    <section class="banner-block mini-wrapper">
        @foreach($adblocks as $ab)
            <a href="{{ $ab->link }}" class="block">
                <img src="{{ asset($ab->img) }}" alt="">
            </a>
        @endforeach
    </section>



    <section class="category-blocks small-wrapper">
        <h2>Kategoriýalar</h2>
        <div class="d-flex spacebetween category-blocks-inner">
            @foreach($bottomContent as $bc)
            <a href="{{ $bc->link }}">
                <img src="{{asset($bc->img)}}" alt="">
                <div class="caption">
                    <h4>{{$bc->title}}</h4>
                </div>
            </a>
            @endforeach
        </div>
    </section>


    <h2>Новости Моды</h2>

    <section class="category">
        <div class="container">
            <div class="boxes news-blocks">
                @foreach($news as $item)
                    <a href="{{route('news', ['new_alias' => $item->id])}}" class="box">
                        <img src="/images/my_news/little/{{$item->image}}" alt="">
                        <div class="content">
                            <h5>{{$item->title }}</h5>
                            <div class="sub-content">
                                <span class="p-news">{{$item->created_at->format('d.m.Y')}}</span>
                            </div>
                            <p class="p-news">{{$item->short_title }}</p>
                        </div>
                    </a>
                @endforeach

            </div>



        </div>
    </section>


    <h2>Brandler</h2>

    <section class="banner-block mini-wrapper">
        @foreach($brands as $ab)
            <a href="#" class="block">
                <img src="{{ asset($ab->img) }}" alt="">
            </a>
        @endforeach
    </section>




    <section class="section-4 section-4-2 wrapper d-flex spacebetween aligncenter">
        <div class="sign-in-form-container">
            <h2>Скидки, акции, новинки Подпишитесь</h2>
            <form class="sign-in-form" action="{{ route('pocta') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row flex alignend login-div-input-1">

                    <input type="email" name="email" required placeholder="Ваш Email" class="input-group">
                </div>

                <input type="submit" name="" value="Подписаться">
            </form>

        </div>

    </section>
    --}}

@endsection

@section('scripts')
    <script src="{{asset('js/old/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/old/sliders.js')}}"></script>

@endsection
