@extends('layouts.app')

@section('content')

    @if($productsInCart)


        <section class="card">
            <div class="card__container">
                <div class="card__row">
                    <div class="card__column card-product">
                        <div class="card-product__wrapper">
                            <div class="card-product__header">Sebet</div>
                            <div class="card-product__items">

                                @foreach($productsInCart as $key => $pInC)
                                <article class="card-product__item">
                                    <div class="card-product__img">
                                        <img src="{{ asset('images/products/little/' . $pInC['img']) }}" alt="">
                                    </div>
                                    <div class="card-product__content">
                                        <div class="card-product__head">
                                            <a href="#">{{ $pInC['name_tk'] }}</a>
                                        </div>
                                        <div class="card-product__section">
                                            <div class="card-product__section-wrapper">
                                                <div class="card-product__card-info">
                                                    <p>Reňki:</p>
                                                    <p class="card-product__card-info-bold">{{$pInC['color_tk']}}</p>
                                                </div>
                                                <div class="card-product__card-info">
                                                    <p>Ölçegi:</p>
                                                    <p class="card-product__card-info-bold"> {{$pInC['size']}}</p>
                                                </div>
                                                <div class="card-product__card-info">
                                                    <p>Mukdary:</p>
                                                    <div class="card-product__quantity-selector __quantity">

                                                        <button class="card-product__quantity-button __js-dec" data-id="{{ $key }}">-</button>
                                                        <span class="card-product__card-info-bold __count">{{ $pInC['amount'] }}</span>
                                                        <button class="card-product__quantity-button __js-inc" data-id="{{ $key }}">+</button>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-product__section-wrapper">
                                                <div class="card-product__card-info">
                                                    <p>Baha:</p>
                                                    <p class="card-product__card-info-price">
                                                        <span class="card-product__card-info-regular-price"><span>{{ number_format($pInC['price'],2,'.','') }}</span> TMT</span>
                                                    </p>
                                                </div>
                                                <div class="card-product__card-info">
                                                    <p>Jemi:</p>
                                                    <p class="card-product__card-info-bold card-product__card-info-summary-price">
                                                        <span>{{ number_format($pInC['amount'] * $pInC['price'],2,'.','') }}</span>
                                                        TMT
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-product__buttons">
                                            <div class="card-product__button-item">

                                                @if(Auth()->user())
                                                    <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                                        {{csrf_field()}}
                                                        <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                                        <input name="product_id" type="hidden" value="{{$pInC['id']}}" />

                                                        <button class="__js-add-to-fav">
                                                            <span class="_icon-heart"></span>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                                        {{csrf_field()}}
                                                        <input name="product_id" type="hidden" value="{{$pInC['id']}}" />

                                                        <button class="__js-add-to-fav">
                                                            <span class="_icon-heart"></span>
                                                        </button>
                                                    </form>
                                                @endif

                                                <p>Halanlaryma goş</p>
                                            </div>

                                            <form action="{{route('deletefromCart',$pInC['id'])}}" method="post">
                                                @csrf
                                            <div class="card-product__button-item">
                                                <button class="">
                                                    <span class="_icon-trash"></span>
                                                </button>
                                                <p>Poz</p>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </article>
                                @endforeach
                                    <div class="card-summary__btn-container">
                                        <a href="{{route('clear')}}" class="card-summary__btn"><span>Sebedi arassala!</span></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card__column card-summary">
                        <div class="card-summary__summary">
                            <aside class="card-summary__wrapper">
                                <div class="card-summary__title">
                                    <h2>Jemi</h2>
                                </div>
                                <div class="card-summary__content">
                                    <div class="card-summary__info">
                                        <p class="card-summary__info-title">Harytlaryň jemi:</p>
                                        <p class="card-summary__info-value __js-sum"><span>{{ number_format($totalPrice,2,'.','') }}</span> TMT</p>
                                    </div>

                                    <div class="card-summary__info">
                                        <p class="card-summary__info-title"></p>
                                        <p class="card-summary__info-value __js-skidka"><span></span> </p>
                                    </div>

                                    <div class="card-summary__info">
                                        <p class="card-summary__info-title">Eltip bermek:</p>
                                        <p class="card-summary__info-value __js-dostavka"><span>10</span> TMT</p>
                                    </div>

                                    <div class="card-summary__info card-summary__info_last-row">
                                        <p class="card-summary__info-title">Jemi tölenmeli:</p>
                                        <p class="card-summary__info-value __js-last-sum"><span>{{ number_format($totalPrice + 10,2,'.','') }}</span> TMT</p>
                                    </div>
                                    <div class="card-summary__btn-container">
                                        <a href="{{route('check_list')}}" class="card-summary__btn"><span>Satyn al</span></a>
                                    </div>
                                   
                                </div>
                            </aside>
                            
                           
                            <aside class="shipment-info">
                                <div class="shipment-info__item">
                                    <div class="shipment-info__summary-info">
                                        <div class="shipment-info__shipment-info-icon">
                                            <svg width="25px" height="25px" viewBox="0 0 25 25" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g id="Icon/Return" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g>
                                                        <rect id="Rectangle" x="0" y="0.5" width="25" height="24"></rect>
                                                        <path
                                                                d="M23.5896423,14.1963791 C23.5896423,18.3709542 20.2054805,21.755116 16.0309054,21.755116 L3.18105264,21.755116 L3.18105264,20.2433686 L16.0309054,20.2433686 C19.3705655,20.2433686 22.0778949,17.5360392 22.0778949,14.1963791 C22.0778949,10.856719 19.3705655,8.14938953 16.0309054,8.14938953 L5.26726403,8.14938953 L8.20005396,10.5908616 L7.23253563,11.754907 L2.00188968,7.39351584 L7.23253563,3.03212463 L8.20005396,4.19617012 L5.26726403,6.63764214 L16.0309054,6.63764214 C20.2054805,6.63764214 23.5896423,10.0218039 23.5896423,14.1963791 Z"
                                                                id="Path" fill="#000000" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="shipment-info__shipment-info-label">
                                            <h6>Gaýtaryp almak</h6>
                                            <p>Ölçeg gabat gelmedimi? Pikirlendiňizmi? Kynçylygy ýok! Harydy yzyna tabşyrmak boýunça, tanyş boluň!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shipment-info__item">
                                    <div class="shipment-info__summary-info">
                                        <div class="shipment-info__shipment-info-icon">
                                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g id="Icon/Delivery" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g>
                                                        <rect id="Rectangle" x="0" y="0" width="25" height="24"></rect>
                                                        <g id="Group" transform="translate(0.500000, 2.000200)">
                                                            <polygon id="Fill-1" fill="#FFCD00" points="0 1.58 9.637 1.58 9.637 0.005 0 0.005">
                                                            </polygon>
                                                            <polygon id="Fill-2" fill="#FFCD00" points="0 5.33 7.762 5.33 7.762 3.756 0 3.756">
                                                            </polygon>
                                                            <polygon id="Fill-3" fill="#FFCD00" points="0 9.079 5.887 9.079 5.887 7.505 0 7.505">
                                                            </polygon>
                                                            <path
                                                                    d="M6.1782,15.783 C6.7782,15.783 7.2662,16.271 7.2662,16.871 C7.2662,17.47 6.7782,17.959 6.1782,17.959 C5.5782,17.959 5.0902,17.47 5.0902,16.871 C5.0902,16.271 5.5782,15.783 6.1782,15.783 L6.1782,15.783 Z M17.2872,15.783 C17.8872,15.783 18.3752,16.271 18.3752,16.871 C18.3752,17.47 17.8872,17.959 17.2872,17.959 C16.6882,17.959 16.1992,17.47 16.1992,16.871 C16.1992,16.271 16.6882,15.783 17.2872,15.783 L17.2872,15.783 Z M16.1992,11.658 L22.1252,11.658 L22.1252,16.084 L19.8322,16.084 L19.7972,15.983 C19.4212,14.922 18.4122,14.209 17.2872,14.209 C16.9832,14.209 16.6842,14.26 16.4012,14.361 L16.1992,14.432 L16.1992,11.658 Z M16.1992,6.267 L18.2282,6.267 C18.5672,6.267 18.8922,6.429 19.0962,6.699 L21.6502,10.084 L16.1992,10.084 L16.1992,6.267 Z M2.6622,17.658 L3.6332,17.658 L3.6682,17.759 C4.0442,18.82 5.0532,19.533 6.1782,19.533 C7.3032,19.533 8.3122,18.82 8.6882,17.759 L8.7232,17.658 L14.7422,17.658 L14.7782,17.759 C15.1542,18.82 16.1622,19.533 17.2872,19.533 C18.4122,19.533 19.4212,18.82 19.7972,17.759 L19.8322,17.658 L23.6992,17.658 L23.6992,11.39 C23.6992,10.612 23.4422,9.843 22.9732,9.222 L20.3532,5.752 C19.8532,5.089 19.0592,4.693 18.2282,4.693 L16.1992,4.693 L16.1992,2.663 C16.1992,1.194 15.0052,7.10542736e-15 13.5372,7.10542736e-15 L11.8132,7.10542736e-15 L11.8132,1.575 L13.5372,1.575 C14.1372,1.575 14.6252,2.063 14.6252,2.663 L14.6252,16.084 L8.7232,16.084 L8.6882,15.983 C8.3122,14.922 7.3032,14.209 6.1782,14.209 C5.0532,14.209 4.0442,14.922 3.6682,15.983 L3.6332,16.084 L2.6622,16.084 C2.0632,16.084 1.5752,15.596 1.5752,14.996 L1.5752,11.256 L0.0002,11.256 L0.0002,14.996 C0.0002,16.464 1.1942,17.658 2.6622,17.658 L2.6622,17.658 Z"
                                                                    id="Fill-4" fill="#000000"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="shipment-info__shipment-info-label">
                                            <h6></h6>
                                            <p>1 sagada çenli eltip berme hyzmaty siziň ýanyňyzda</p>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <div class="card__back-box">
                        <a href="#">
                            <span class="_icon-arrow-left1"></span>
                            Söwda etmegiňizi dowam ediň!
                        </a>
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

                            <div class="card-product__header">Sebet boş</div>


                        </div>
                    </div>



                </div>
            </div>
        </section>
    @endif
@endsection