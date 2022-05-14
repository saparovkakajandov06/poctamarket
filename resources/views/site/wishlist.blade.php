@extends('layouts.app')



@section('content')

    @if ($wishlists->isNotEmpty())
        <section class="favourites">
            <div class="favourites__container __container">
                <div class="favourites__header">
                    <h1>Halanlarym</h1>
                    {{-- <p>

                        @if(Auth::user())
                                @isset(Auth::user()->wishlist)
                            @if(Auth::user()->wishlist->count())
                                {{Auth::user()->wishlist->count()}}
                            @endif
                                    @endisset
                        @else
                            {{count($wishlists)}}
                        @endif
                        sany halan harytlarym
                    </p> --}}
                </div>
                <div class="favourites__header-block favourites-header-block">
                    <div class="favourites-header-block__column">
                        <div class="favourites-header-block__checkbox-box">
                            <div class="favourites-header-block__checkbox">
                               
                            </div>
                        </div>
                        
                       
                    </div>

                    <div class="favourites-header-block__column">
                        <div class="favourites-header-block__dropdown">
                            <div class="base-select-dropdown">
                                
                               
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="favourites__products favourites-products">
                    <div class="favourites-products__wrapper">
                        <section class="favourites-products__row">

                            {{-- @if ( (Auth::user() and Auth::user()->wishlist->count()) or (count($wishlists))) --}}
                                @foreach ($wishlists as $wishlist)
                                    <div class="favourites-products__column">
                                        <article class="favourites-products__item">
                                            <div class="favourites-products__item-image-container">
                                                @if(Auth::user())
                                                    <a href="{{ route('oneProduct',['id'=>  $wishlist->product->id]) }}"
                                                       class="favourites-products__image">
                                                        <img src="{{ asset('images/products/smaller/' . json_decode($wishlist->product->img)->main) }}"
                                                             alt="">
                                                    </a>
                                                @else
                                                    <a href="{{ route('oneProduct',['id'=>  $wishlist->id]) }}"
                                                       class="favourites-products__image">
                                                        <img src="{{ asset('images/products/smaller/' . json_decode($wishlist->img)->main) }}"
                                                             alt="">
                                                    </a>
                                                @endif
                                                <div class="favourites-products__control-buttons">
                                                   


                                                    <div class="favourites-products__control-button-container favourites-products__control-button-container_trash">
                                                        <div class="favourites-products__control-button">
                                                            <form action="{{ route('wishlist.destroy',$wishlist->id) }}"
                                                                  class="delete-product-form" method="post"
                                                                  style="display:inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="bg-transparent border-0 p-0"
                                                                        title="Poz">
                                                                    <span class="_icon-trash"></span>
                                                                </button>

                                                            </form>

                                                        </div>
                                                    </div>

                                                    <div
                                                            class="favourites-products__control-button-container favourites-products__control-button-container_card-pencil">
                                                       

                                                        @if(Auth::user())
                                                            @if ($wishlist->product->availability == 1)
                                                                <div class="favourites-products__control-button">

                                                                    <a class="add-to-cart" href="#"
                                                                       data-id="{{$wishlist->product->id}}">
                                                                        <button>
                                                                            <span class="_icon-shopping-bag"></span>
                                                                        </button>
                                                                    </a>

                                                                </div>
                                                            @endif
                                                        @else
                                                            @if ($wishlist->availability == 1)
                                                                <div class="favourites-products__control-button">

                                                                    <a class="add-to-cart" href="#"
                                                                       data-id="{{$wishlist->id}}">
                                                                        <button>
                                                                            <span class="_icon-shopping-bag"></span>
                                                                        </button>
                                                                    </a>

                                                                </div>
                                                            @endif
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="favourites-products__description">
                                                @if(Auth::user())
                                                    <a href="{{ route('oneProduct',['id'=>$wishlist->product->id]) }}">
                                                        <div class="favourites-products__description-wrapper">


                                                            <div class="favourites-products__description-brand"> {{$wishlist->product->name_tk}}</div>


                                                            <div class="favourites-products__description-price-container">
                                                               
                                                            <div
                                                                        class="favourites-products__description-price-current favourites-products__description-price-current_sale">
                                                                    {{ number_format($wishlist['price'],2,'.','') }}
                                                                    TMT
                                                                </div>
                                                               
                                                            </div>

                                                        </div>
                                                    </a>
                                                @else
                                                    <a href="{{ route('oneProduct',['id'=>$wishlist->id]) }}">
                                                        <div class="favourites-products__description-wrapper">


                                                            <div class="favourites-products__description-brand">
                                                                {{$wishlist->name_tk}}</div>


                                                            <div class="favourites-products__description-price-container">
                                                              
                                                                <div
                                                                        class="favourites-products__description-price-current favourites-products__description-price-current_sale">
                                                                    {{ number_format($wishlist['price'],2,'.','') }}
                                                                    TMT
                                                                </div>
                                                                
                                                               
                                                            </div>

                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            {{-- @endif --}}


                        </section>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="card">
            <div class="card__container">
                <div class="card__row">
                    <div class="card__column card-product">
                        <div class="card-product__wrapper">

                            <div class="card-product__header">Halanlaryňyzda hiç bir zat saýlanmadyk</div>


                        </div>
                    </div>



                </div>
            </div>
        </section>
    @endif




@endsection