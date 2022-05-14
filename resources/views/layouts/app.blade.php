<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}"/>
    <title>{{ isset($title) ? $title : 'TurkmenPostMarket'}}</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/toastify.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('css/style_search.min.css')}}"/>

    {!! \Biscolab\ReCaptcha\Facades\ReCaptcha::htmlScriptTagJsApi() !!}


    @livewireStyles

    <style>
        .pereloader {
            position: fixed;
            -webkit-transition: 0.3s;
            transition: 0.3s;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-color: #fff;
            z-index: 99999999999999;
            visibility: visible;
            opacity: 1;
        }

        .pereloader span {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            border: 2px solid #000;
            border-left-color: #fff;
            border-radius: 50%;
            -webkit-animation: load 1s infinite linear;
            animation: load 1s infinite linear;
        }

        @-webkit-keyframes load {
            100% {
                -webkit-transform: translate(-50%, -50%) rotate(365deg);
                transform: translate(-50%, -50%) rotate(365deg);
            }
        }

        @keyframes load {
            100% {
                -webkit-transform: translate(-50%, -50%) rotate(365deg);
                transform: translate(-50%, -50%) rotate(365deg);
            }
        }

        @-webkit-keyframes load-reverce {
            100% {
                -webkit-transform: translate(-50%, -50%) rotate(-365deg);
                transform: translate(-50%, -50%) rotate(-365deg);
            }
        }

        @keyframes load-reverce {
            100% {
                -webkit-transform: translate(-50%, -50%) rotate(-365deg);
                transform: translate(-50%, -50%) rotate(-365deg);
            }
        }

        .pereloader span:nth-child(1) {
            width: 60px;
            height: 60px;
        }

        .pereloader span:nth-child(2) {
            width: 50px;
            height: 50px;
            -webkit-animation-name: load-reverce;
            animation-name: load-reverce;
        }

        body.loaded .pereloader {
            visibility: hidden;
            opacity: 0;
        }
    </style>
    {{--@livewireStyles--}}
</head>
<body>
<div class="pereloader">
    <span></span>
    <span></span>
</div>

<div class="wrapper">
    {{--hemme zat sun icinde--}}


   

    <header class="header">
        <section class="header__top">
            <div class="header__top-container __container">
                <div class="header__lang lang">
                <button class="lang__current">
                        <p>TM </p>
                        <span class="_icon-chevron-down"></span>
                    </button>
                    <ul class="lang__items">
                        <li class="lang__item"><a class="nav-link" href="{{ route('locale', 'tk') }}"> TM  </a></li>
                        <li class="lang__item"> <a class="nav-link" href="{{ route('locale', 'ru') }}"> RU  </a></li>
                        <li class="lang__item"> <a class="nav-link" href="{{ route('locale', 'en') }}"> EN  </a></li>
                    </ul>

                </div>
                <div class="header__top-menu top-menu">
                    <div class="top-menu__body">
                        <ul class="top-menu__list">
                            <li class="top-menu__links">
                                <a href="{{route('mugt')}}">
                                    <span class="_icon-truck"></span>
                                    <p>Mugt eltip berme</p>
                                </a>
                                <a href="{{route('amatly')}}">
                                    <span class="_icon-wallet"></span>
                                    <p>Amatly töleg hyzmaty</p>
                                </a>
                                <a href="{{route('yenillik')}}">
                                    <span class="_icon-sync"></span>
                                    <p>Ýeňillik bilen gaýtaryp almak</p>
                                </a>
                                <a href="{{route('olceg_gora')}}">
                                    <span class="_icon-clothes-hanger"></span>
                                    <p>Ölçegiňize görä</p>
                                </a>

                                <a href="{{route('prodawayte')}}">
                                    <span class=""></span>
                                    <p>TMPost-dan Satyn alyň!</p>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="header__navigators">
            <div class="header__navigators-container __container">
            <div class="header__burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                <div class="header__logo">
                    <a href="{{ route('main_page') }}"> 
                        <img src="{{ asset('images/logotpmarket.png') }}" alt="">
                    </a>
                </div>


                <!-- <div class="col-6">
                    <div id="search">
                        <div class="search-input">
                            <form action="{{route('search')}}" method="GET">

                                <input class="input-search" name="text" type="text" id="typed" autocomplete="off">
                                <div class="lds-ellipsis">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="autocom-box"></div>

                            </form>
                        </div>
                    </div>
                </div> -->

                <div class="header__search">
                    <form autocomplete="off"  action="{{route('search')}}" method="GET" class="search-form">

                        <div class="header__search-input">
                            <input placeholder="Gözle" class="input-search" type="text" name="query" id="query"  value="{{request()->input('query')}}"/>

                            <div class="search_list">

                            </div>
                        </div>

                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>

                        <button type="button" class="_icon-search openSearch hide_desktop"></button>
                        <button type="submit" class="searchSubmit _icon-search"></button>
                        <button type="button" class="searchClose _icon-close"></button>
                        
                        <!-- <button type="submit" class="hide_mobile searchSubmit _icon-search"></button>
                        <button type="button" class="searchClose_desktop _icon-close"></button> -->

                    </form>
                </div>

          

                <div class="header__nav-links">

                    @if(Auth::user())
                        <a href="{{ route('wishlist.index') }}" class="_icon-heart">

                            @isset(Auth::user()->wishlist)
                                @if(Auth::user()->wishlist->count())
                                    <span
                                    id="cart-count" style="margin-left: 2px;">{{Auth::user()->wishlist->count()}}
                            </span>
                                @endif
                            @endisset

                        </a>
                    @else
                        {{--<a href="#" class="_icon-heart js-show-log-and-reg">--}}
                        <a href="{{ route('wishlist.index') }}" class="_icon-heart">
                            @php

                                if(!isset($_COOKIE['wishlists'])) {
                                    setcookie('wishlists', '[]');
                                    $_COOKIE['wishlists'] = '[]';
                                }

                            echo count(json_decode($_COOKIE['wishlists'], true));

                            @endphp

                        </a>
                    @endif


                    @guest
                        {{--<a href="{{route('login')}}" class="_icon-user js-show-log-and-reg"></a>--}}
                        <a href="#" class="_icon-user js-show-log-and-reg"></a>
                        {{-- @if (Route::has('register'))
                            <a href="#" class="_icon-registered js-show-log-and-reg"></a>
                        @endif --}}
                    @else
                        <a href="{{ route('home') }}">{{Auth::user()->name}}</a>

                        {{-- <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                        ><img width="20" height="20" src="{{asset('images/lock.png')}}"> </a> --}}
                    @endguest
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <a href="{{ route('cart') }}" class="_icon-shopping-cart"><span
                                id="cart-count">{{session('cartCount')}}</span></a>
                    

                </div>
            </div>
        </section>

        <section class="header__menu menu">
            <div class="menu__container __container">
                <div class="menu__body">

                    <ul class="menu__list">
                        <li class="menu__item">
                            <a href="{{ route('getNewProds') }}" class="menu__link menu__link_hot">Täze</a>
                        </li>

                        @isset($categories)
                            @foreach ($categories as $category)
                                @if($category->status == 1)

                                    <li class="menu__item">
                                        <a href="{{ route('productsByCatalog',['id'=>$category->id]) }}"
                                           class="menu__link menu__link_hot">{{ $category->name_tk }}</a>
                                    </li>

                                @endif
                            @endforeach

                        @endisset

                        <li class="menu__item">
                            <a href="{{ route('news') }}" class="menu__link menu__link_hot">HABAR</a>

                        </li>

                        <li class="menu__item">
                            <a href="#" class="menu__link menu__link_hot">@lang('site.hello')</a>
                        </li>
                        

                    </ul>

                </div>
            </div>
        </section>



    </header>

    <main class="page">
        <section class="marquee">

            @isset($categories)
                @foreach ($categories as $category)
                    {{--  @if($category->status == 1)--}}

                    <a href="{{ route('productsByCatalog',['id'=>$category->id]) }}"
                       class="marquee__links">{{ $category->name_tk }}</a>


                    {{--@endif--}}
                @endforeach
            @endisset


        </section>


        @yield('content')


        <footer class="footer">
            <div class="footer__container __container">
                <div class="footer__top-menu">
                    <div class="footer__contacts">
                        <div class="footer__number">

                            <a href="tel:+993 (12) 92 14 95" class="phone">+993 (12) 92-14-95 </a>
                        </div>
                        <a href="mailto:post.market@online.tm" class="footer__link">post.market@online.tm</a>
                        <div class="footer__media">
                            <a href="#" class="_icon-facebook-square-brands"></a>
                            <a href="#" class="_icon-instagram-square-brands"></a>
                            <a href="#" class="_icon-youtube-square-brands"></a>
                        </div>
                    </div>


                    @isset($categories)
                        <div class="footer__links footer__links_double-row">
                            <div class="footer__links-title">Kategoriýalar</div>
                            <ul>


                                @foreach ($categories as $category)
                                    @if($category->status == 1)
                                        <li>
                                            <a href="{{ route('productsByCatalog',['id'=>$category->id]) }}">{{ $category->name_tk }}</a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    @endisset



                    <div class="footer__app-link">
                        <div class="footer__app-link-app">
                            <a href="#">
                                <img src="
                                {{asset('img/img/app-store.png')}}" alt=""/>
                            </a>
                            <a href="#">
                                <img src="
                                {{asset('img/img/google-play.png')}}" alt=""/>
                            </a>
                        </div>
                        <div class="footer__app-card">
                           
                            <a href="#">
                                <img src="
                                {{asset('img/senagat.png')}}" alt=""/>
                            </a>
                            <a href="#">
                                <img src="
                                {{asset('img/dayhanbank.svg')}}" alt=""/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="footer__bot">
                    <div class="footer__bot-title">2021 Ähli hukuklar goralan</div>
                </div>
            </div>
        </footer>


        <div class="sticky-box">
            <div class="sticky-box__container __container">
                <div class="sticky-box__row">
                  
                <!-- <div class="sticky-box__item sticky-box__item_gift">
                        <button class="_icon-gift js-show-hocu-skidku"></button>
                    </div> -->

                    <div class="sticky-box__item">

                        <a href="tel:+993 (12) 92 14 95">
                            <button class="_icon-phone"></button>
                        </a>
                    </div>

                    <div class="sticky-box__item">
                        <a href="mailto:post.market@online.tm">
                            <button class="letter">
                                <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36.78 25.8"
                                     style="enable-background:new 0 0 36.78 25.8;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: #464545;
                    }

                    .st1 {
                        fill: #FFFFFF;
                    }
                </style>
                                    <g>
                                        <path class="st0" d="M31.24,0.1H5.58c-3.02,0-5.5,2.47-5.5,5.5v14.66c0,3.02,2.47,5.5,5.5,5.5h25.65c3.02,0,5.5-2.47,5.5-5.5V5.6
		C36.73,2.57,34.26,0.1,31.24,0.1z"/>
                                        <g>
                                            <g>
                                                <path class="st1" d="M29.13,9.28c-0.31-0.38-0.89-0.44-1.29-0.15l-9.44,6.9l-9.46-6.8c-0.4-0.29-0.98-0.22-1.28,0.16
				c-0.16,0.2-0.21,0.44-0.17,0.66c-0.01,0.27,0.1,0.54,0.34,0.72l10.58,7.61l10.56-7.71c0.24-0.18,0.35-0.45,0.34-0.72
				C29.35,9.72,29.3,9.48,29.13,9.28z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path class="st1" d="M29.28,9.16c-0.32-0.38-0.9-0.45-1.3-0.15L18.41,16L8.81,9.1C8.41,8.8,7.82,8.88,7.51,9.26
				C7.35,9.46,7.3,9.7,7.34,9.93c-0.01,0.27,0.1,0.55,0.35,0.73l10.73,7.72l10.71-7.82c0.25-0.18,0.35-0.45,0.34-0.73
				C29.5,9.6,29.45,9.35,29.28,9.16z"/>
                                            </g>
                                        </g>
                                    </g>
              </svg>
                            </button>
                        </a>
                    </div>
                    <div class="sticky-box__item sticky-box__item_to-top">
                        <button class="_icon-chevron-down" id="scrollTop" onclick="topFunction()"></button>
                    </div>
                </div>
            </div>
        </div>

        <section class="shadow-overlay js-pop-up" data-pop-up-name="log-in-and-reg">
            <div class="reg-and-log">
                <div class="reg-and-log__wrapper">
                    <div class="reg-and-log__close js-close-button">X</div>
                    <div class="reg-and-log__row">
                        <div class="reg-and-log__mob-nav">
                            <button class="__js-show-reg-area">Registrasiýa</button>
                            <button class="__js-show-log-area">Girmek</button>
                        </div>

                        <div class="reg-and-log__column">

                            <div class="reg-and-log__show-area __js-nav-reg-area">
                                <h3>Täze akkount açmak </h3>
                                <h5>Sargytlary yzarlaň we şahsy hasabyňyzda bonuslary ýygnaň</h5>
                                <button class="reg-and-log__show-area-button __js-show-reg-area">Registrasiýa
                                </button>
                            </div>

                            <div class="reg-and-log__reg-area __js-reg-area">

                                <form action="{{ route('verif-registrasion') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <h3>Täze akkount açmak </h3>
                                    <h5>Sargytlary yzarlaň we şahsy hasabyňyzda bonuslary ýygnaň</h5>

                                    <div class="reg-and-log__form">

                                        <div class="reg-and-log__form-item">
                                            <span>E-mail</span>
                                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                                   placeholder="Email" class="@error('email') is-invalid @enderror" required>
                                        </div>
                                        @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror


                                        <div class="reg-and-log__form-item">
                                            <span>Ady</span>
                                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                                   placeholder="Ady *" class="@error('name') is-invalid @enderror">
                                        </div>
                                        @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror

                                        <div class="reg-and-log__form-item">
                                            <span>Familiýa</span>
                                            <input type="text" id="surname" name="surname" value="{{ old('surname') }}"
                                                   required placeholder="Familiýa *"
                                                   class="@error('surname') is-invalid @enderror">
                                        </div>
                                        @error('surname')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror


                                        <div class="reg-and-log__form-item">
                                            <span>Atasynyň ady</span>
                                            <input type="text" id="middlename" name="middlename"
                                                   value="{{ old('middlename') }}" required placeholder="Atasynyň ady *"
                                                   class="@error('middlename') is-invalid @enderror">
                                        </div>
                                        @error('middlename')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror

                                        <div class="reg-and-log__form-item">
                                            <span>Doglan senesi</span>
                                            <input type="date"
                                                   id="birthday" name="birthday" value="{{ old('birthday') }}"
                                                   placeholder="Doglan senesi *"
                                                   class="@error('birthday') is-invalid @enderror" required>
                                        </div>

                                        @error('birthday')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror

                                        <div class="reg-and-log__form-item">
                                            <span>Login</span>
                                            <input type="text" id="login" name="login"
                                                   value="{{ old('login') }}" required placeholder="Login *"
                                                   class="@error('login') is-invalid @enderror">
                                        </div>
                                        @error('login')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror

                                        <div class="reg-and-log__form-item">
                                            <span>Salgysy</span>
                                            <input type="text" id="address" name="address"
                                                   value="{{ old('address') }}" required placeholder="Salgysy *"
                                                   class="@error('address') is-invalid @enderror">
                                        </div>
                                        @error('address')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror

                                        <div class="reg-and-log__form-item">
                                            <span>Telefon belgisi</span>
                                            <input type="number" minlength="8" maxlength="8" id="tel" name="phone"
                                                   value="{{ old('phone') }}" required placeholder="Telefon belgisi *"
                                                   class="@error('password') is-invalid @enderror">
                                        </div>

                                        @error('phone')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror

                                        <div class="reg-and-log__form-item">
                                            <span>Parol</span>
                                            <input type="password" id="password" name="password" required
                                                   placeholder="Parol *" class="@error('password') is-invalid @enderror"
                                                   autocomplete="new-password" minlength="6">
                                            <div class="reg-and-log__show-pass __js-show-password">Görkez</div>
                                        </div>
                                        @error('password')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror

                                        <div class="reg-and-log__form-item">
                                            <span>Parolyňyzy tassyklaň</span>
                                            <input type="password" id="password-confirm" name="password_confirmation"
                                                   required placeholder="Parolyňyzy tassyklaň *"
                                                   autocomplete="new-password" minlength="6">
                                            <div class="reg-and-log__show-pass __js-show-password">Görkez</div>
                                        </div>


                                        <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right"></label>
                                        <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                                            </div>


                                    </div>
                                    <div class="reg-and-log__checkbox">
                                        <label>

                                            <input type="checkbox" id="random-password">
                                            <span></span>
                                            <p>Özüňe parol döret</p>
                                        </label>
                                    </div>
                                    <div class="reg-and-log__checkbox">
                                        <label>
                                            <input id='regCheck' type="checkbox" onclick="regCheckFuntion()">
                                            <span></span>
                                            <p>Köpçülikleýin teklip, gaýdyp gelmek we howpsuzlyk şertnamasynyň şertlerine razy</p>
                                        </label>
                                    </div>
                                    <button id="regText" type="submit" disabled>Registrasiýa</button>
                                </form>
                            </div>


                        </div>
                        <div class="reg-and-log__column">
                            <div class="reg-and-log__show-area __js-nav-log-area">
                                <h3>Mende akkount bar</h3>
                                <h5>Sargydy çalt ýerleşdirmek we hasabyňyzda yzarlamak üçin giriň</h5>
                                <button class="reg-and-log__show-area-button __js-show-log-area">Girmek</button>
                            </div>


                            <div class="reg-and-log__reg-area __js-log-area">
                                <h3>Mende akkount bar</h3>
                                <h5>Sargydy çalt ýerleşdirmek we hasabyňyzda yzarlamak üçin giriň</h5>
                                <div class="reg-and-log__form">


                                    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="reg-and-log__form-item">
                                            <span>E-mail</span>
                                            <input type="email" name="email" value="{{ old('email') }}" id="email"
                                                   required placeholder="Email"
                                                   class="input-login @error('email') is-invalid @enderror">
                                        </div>
                                        @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror

                                        <div class="reg-and-log__form-item">
                                            <span>Parol</span>
                                            <input type="password" name="password" id="password" required
                                                   placeholder="Parol *" autocomplete="current-password">
                                            <div class="reg-and-log__show-pass __js-show-password">Görkez</div>
                                        </div>

                                        @error('password')
                                        <div class="invalid-feedback" role="alert">
                                            <p class="invalid-feedback-p">{{ $message }}</p>
                                        </div>
                                        @enderror

                                        <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right"></label>
                                        <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                                        </div>

                                        <div class="reg-and-log__forgot-pass js-close-button __js-forgot-pass">Paroly ýatdan çykardyňyzmy?
                                        </div>
                                        <button>Girmek</button>

                                    </form>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="shadow-overlay   js-pop-up_skidku" data-pop-up-name="hocu-skidku">
            <div class="reg-and-log">
                <div class="reg-and-log__wrapper">
                    <div class="reg-and-log__close js-close-button_ocur">X</div>

                    @isset($warns)
                        @foreach ($warns as $warn)
                            <div class="reg-and-log__row">

                                <div class="reg-and-log__column">
                                    <div class="reg-and-log__reg-area">
                                        <img src="{{ asset($warn->img) }}" width="600" height="400" alt="">
                                    </div>
                                </div>


                                <div class="reg-and-log__column">
                                    <div class="reg-and-log__reg-area">
                                        <h5>Arzanladyş isleýäňizmi?</h5>

                                        <h5>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h5>

                                        <a class="menu-item"
                                           href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>
                                            <h3>{{$warn->category->name_tk}}</h3></a>
                                    </div>
                                </div>


                            </div>
                        @endforeach
                    @endisset


                </div>
            </div>


        </section>


        <div>

            <!-- Modal content -->
            {{-- <div>
                 <div     class="col-md-12">
                     <div class="text-center">
                         <h2>Хочу скидку</h2>
                     </div>
                     @isset($warns)
                         @foreach ($warns as $warn)
                             <div class="col-md-6 left-side-div">
                                 <img src="{{ asset($warn->img) }}" height="100" alt="">
                             </div>

                             <div class="col-md-6 right-side-div">
                                 <h4>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h4>

                                 <a class="menu-item" href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>{{$warn->category->name_tk}}</a>
                             </div>
                         @endforeach
                     @endisset
                 </div>

             </div>--}}


        </div>

    </main>

    <section class="shadow-overlay js-pop-up" data-pop-up-name="product-mini-card">
		<div
			class="box-shadow vertical-scroll-block mini-product-page--normal js-mini-product-page-block js-position-pop-up ">
			<div class="mini-product-page js-mini-product-page">
				
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
						<div id="mini-content" class="basic-info description-column js-coordinate-wrapper-button-block js-info-product">
                            <!-- quickView.js -> product detail  -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


    {{--hemme zat sun icinde--}}
</div>

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/quickView.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/jquery.marquee.min.js')}}"></script>
<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('js/isotope-docs.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/sliders.js')}}"></script>


<script src="{{asset('js/old/addToCart.js')}}"></script>
<script src="{{ asset('js/old/plusToCart.js') }}"></script>

<script src="{{asset('js/old/deleteFromCart.js')}}"></script>
<script src="{{asset('js/old/subtractFromCart.js')}}"></script>

<script src="{{asset('js/jquery.min.js')}}"></script>

<script src="{{asset('js/toastify-js.js')}}"></script>

<script>
    var config = {
        routes: {
            searchPost: "{{ route('search_post') }}",
            
        }
    };
</script>

<script src="{{asset('js/search.min.js')}}"></script>


<!-- <script>
    function regCheckFuntion() {
        var checkBox = document.getElementById("regCheck");
        // Get the output text
        var text = document.getElementById("regText");

        if (checkBox.checked == true){
            text.style.color = "black";
            text.disabled = false;
        } else {
            text.style.color = "white";
            text.disabled = true;
        }
    }


    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    /*An array containing all the country names in the world:*/
    var countries = [
        @isset($all_products)
                @foreach($all_products as $product)
            "{{$product->name_tk}}",
        @endforeach
        @endisset



    ];

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("query"), countries);
</script> -->

{{--<script src="{{asset('js/langDropdown.js')}}"></script>
<script src="{{asset('js/showHideMainMenu.js')}}"></script>--}}



@livewireScripts
{{--@livewireScripts--}}
</body>
</html>





{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--<meta charset="UTF-8"/>--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge"/>--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1.0"/>--}}

{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}"/>--}}
{{--<title>{{ isset($title) ? $title : 'TurkmenPostMarket'}}</title>--}}
{{--<link rel="stylesheet" href="{{asset('css/style.css')}}"/>--}}



{{--@livewireStyles--}}

{{--<style>--}}
{{--.pereloader {--}}
{{--position: fixed;--}}
{{---webkit-transition: 0.3s;--}}
{{--transition: 0.3s;--}}
{{--top: 0;--}}
{{--left: 0;--}}
{{--bottom: 0;--}}
{{--right: 0;--}}
{{--background-color: #fff;--}}
{{--z-index: 99999999999999;--}}
{{--visibility: visible;--}}
{{--opacity: 1;--}}
{{--}--}}

{{--.pereloader span {--}}
{{--display: block;--}}
{{--position: absolute;--}}
{{--top: 50%;--}}
{{--left: 50%;--}}
{{---webkit-transform: translate(-50%, -50%);--}}
{{--transform: translate(-50%, -50%);--}}
{{--border: 2px solid #000;--}}
{{--border-left-color: #fff;--}}
{{--border-radius: 50%;--}}
{{---webkit-animation: load 1s infinite linear;--}}
{{--animation: load 1s infinite linear;--}}
{{--}--}}

{{--@-webkit-keyframes load {--}}
{{--100% {--}}
{{---webkit-transform: translate(-50%, -50%) rotate(365deg);--}}
{{--transform: translate(-50%, -50%) rotate(365deg);--}}
{{--}--}}
{{--}--}}

{{--@keyframes load {--}}
{{--100% {--}}
{{---webkit-transform: translate(-50%, -50%) rotate(365deg);--}}
{{--transform: translate(-50%, -50%) rotate(365deg);--}}
{{--}--}}
{{--}--}}

{{--@-webkit-keyframes load-reverce {--}}
{{--100% {--}}
{{---webkit-transform: translate(-50%, -50%) rotate(-365deg);--}}
{{--transform: translate(-50%, -50%) rotate(-365deg);--}}
{{--}--}}
{{--}--}}

{{--@keyframes load-reverce {--}}
{{--100% {--}}
{{---webkit-transform: translate(-50%, -50%) rotate(-365deg);--}}
{{--transform: translate(-50%, -50%) rotate(-365deg);--}}
{{--}--}}
{{--}--}}

{{--.pereloader span:nth-child(1) {--}}
{{--width: 60px;--}}
{{--height: 60px;--}}
{{--}--}}

{{--.pereloader span:nth-child(2) {--}}
{{--width: 50px;--}}
{{--height: 50px;--}}
{{---webkit-animation-name: load-reverce;--}}
{{--animation-name: load-reverce;--}}
{{--}--}}

{{--body.loaded .pereloader {--}}
{{--visibility: hidden;--}}
{{--opacity: 0;--}}
{{--}--}}
{{--</style>--}}
{{--@livewireStyles--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="pereloader">--}}
{{--<span></span>--}}
{{--<span></span>--}}
{{--</div>--}}

{{--<div class="wrapper">--}}
{{--hemme zat sun icinde--}}


{{-- @isset($warns)--}}
{{--@foreach ($warns as $warn)--}}
{{--<section class="top-popup">--}}
{{--<a href="#" class="top-popup__item">--}}
{{--<p>{{$warn->category->name_tk}}</p>--}}
{{--</a>--}}
{{--<a href="#" class="top-popup__item" style="background-color: red;">--}}
{{--<p>{{$warn->category->name_tk}} - {{$warn->prosent}}%</p>--}}
{{--</a>--}}
{{--<a href="#" class="top-popup__item" style="background-color: #339433;">--}}
{{--<p>{{$warn->category->name_tk}} - {{$warn->prosent}}%</p>--}}
{{--</a>--}}
{{--<button class="top-popup__close">X</button>--}}
{{--</section>--}}
{{--@endforeach--}}
{{--@endisset--}}

{{--<header class="header">--}}
{{--<section class="header__top">--}}
{{--<div class="header__top-container __container">--}}
{{--<div class="header__lang lang">--}}
{{--<!-- <button class="lang__current">--}}
{{--<p>Rus </p>--}}
{{--<span class="_icon-chevron-down"></span>--}}
{{--</button>--}}
{{--<ul class="lang__items">--}}
{{--<li class="lang__item lang__item_active">Rus</li>--}}
{{--<li class="lang__item">Eng</li>--}}
{{--<li class="lang__item">Tm</li>--}}
{{--</ul> -->--}}
{{--</div>--}}
{{--<div class="header__top-menu top-menu">--}}
{{--<div class="top-menu__body">--}}
{{--<ul class="top-menu__list">--}}
{{--<li class="top-menu__links">--}}
{{--<a href="#">--}}
{{--<span class="_icon-truck"></span>--}}
{{--<p>Mugt eltip berme</p>--}}
{{--</a>--}}
{{--<a href="#">--}}
{{--<span class="_icon-wallet"></span>--}}
{{--<p>Amatly töleg hyzmaty</p>--}}
{{--</a>--}}
{{--<a href="#">--}}
{{--<span class="_icon-sync"></span>--}}
{{--<p>Ýeňillik bilen gaýtaryp almak</p>--}}
{{--</a>--}}
{{--<a href="{{route('sidedrawer')}}">--}}
{{--<span class="_icon-clothes-hanger"></span>--}}
{{--<p>Ölçegiňize görä</p>--}}
{{--</a>--}}
{{--<a href="#">--}}
{{--<span class="_icon-registered"></span>--}}
{{--<p>100% ýokary hilli önüm</p>--}}
{{--</a>--}}

{{--<a href="#">--}}
{{--<span class=""></span>--}}
{{--<p>TMPost-dan Satyn alyň!</p>--}}
{{--</a>--}}

{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}
{{--<section class="header__navigators">--}}
{{--<div class="header__navigators-container __container">--}}
{{--<div style="width:20%;" class="header__logo">--}}
{{--<a href="{{ route('main_page') }}"> <img style="width:70%;"--}}
{{--src="{{ asset('images/logotpmarket.png') }}" alt=""></a>--}}
{{--</div>--}}



{{--<div class="header__search">--}}
{{--<button class="_icon-search"></button>--}}
{{--<div class="header__search-input">--}}
{{--<form action="{{route('search')}}" method="GET" class="search-form">--}}
{{--<input type="text" name="query" id="query" value="{{request()->input('query')}}"/>--}}
{{--</form>--}}

{{--</div>--}}
{{--</div>--}}

{{--<div class="header__nav-links">--}}

{{--@if(Auth::user())--}}
{{--<a href="{{ route('wishlist.index') }}" class="_icon-heart">--}}

{{--@isset(Auth::user()->wishlist)--}}
{{--@if(Auth::user()->wishlist->count())--}}
{{--{{Auth::user()->wishlist->count()}}--}}
{{--@endif--}}
{{--@endisset--}}

{{--</a>--}}
{{--@else--}}
{{--<a href="#" class="_icon-heart js-show-log-and-reg">--}}
{{--<a href="{{ route('wishlist.index') }}" class="_icon-heart">--}}
{{--@php--}}

{{--if(!isset($_COOKIE['wishlists'])) {--}}
{{--setcookie('wishlists', '[]');--}}
{{--$_COOKIE['wishlists'] = '[]';--}}
{{--}--}}

{{--echo count(json_decode($_COOKIE['wishlists'], true));--}}

{{--@endphp--}}

{{--</a>--}}
{{--@endif--}}


{{--@guest--}}
{{--<a href="{{route('login')}}" class="_icon-user js-show-log-and-reg"></a>--}}
{{--<a href="#" class="_icon-user js-show-log-and-reg"></a>--}}
{{--@if (Route::has('register'))--}}
{{--<a href="#" class="_icon-registered js-show-log-and-reg"></a>--}}
{{--@endif--}}
{{--@else--}}
{{--<a href="{{ route('home') }}" class="_icon-user">{{Auth::user()->name}}</a>--}}

{{--<a href="{{ route('logout') }}" onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();"--}}
{{--><img width="20" height="20" src="{{asset('images/lock.png')}}"> </a>--}}
{{--@endguest--}}
{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--@csrf--}}
{{--</form>--}}

{{--<a href="{{ route('cart') }}" class="_icon-shopping-cart"><span--}}
{{--id="cart-count">{{session('cartCount')}}</span></a>--}}
{{--</div>--}}
{{--<div class="header__burger">--}}
{{--<span></span>--}}
{{--<span></span>--}}
{{--<span></span>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}

{{--<section class="header__menu menu">--}}
{{--<div class="menu__container __container">--}}
{{--<div class="menu__body">--}}

{{--<ul class="menu__list">--}}
{{--<li class="menu__item">--}}
{{--<a href="{{ route('getNewProds') }}" class="menu__link menu__link_hot">Täze</a>--}}
{{--</li>--}}

{{--@isset($categories)--}}
{{--@foreach ($categories as $category)--}}
{{--@if($category->status == 1)--}}

{{--<li class="menu__item">--}}
{{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}"--}}
{{--class="menu__link menu__link_hot">{{ $category->name_tk }}</a>--}}
{{--</li>--}}

{{--@endif--}}
{{--@endforeach--}}

{{--@endisset--}}
{{--<li class="menu__item">--}}
{{--<a href="{{ route('news') }}" class="menu__link menu__link_hot">HABAR</a>--}}

{{--</li>--}}

{{--</ul>--}}

{{--</div>--}}
{{--</div>--}}
{{--</section>--}}

{{--</header>--}}

{{--<main class="page">--}}
{{--<section class="marquee">--}}

{{--@isset($categories)--}}
{{--@foreach ($categories as $category)--}}
{{--  @if($category->status == 1)--}}

{{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}"--}}
{{--class="marquee__links">{{ $category->name_tk }}</a>--}}


{{--@endif--}}
{{--@endforeach--}}
{{--@endisset--}}


{{--</section>--}}


{{--@yield('content')--}}


{{--<footer class="footer">--}}
{{--<div class="footer__container __container">--}}
{{--<div class="footer__top-menu">--}}
{{--<div class="footer__contacts">--}}
{{--<div class="footer__number">--}}

{{--<a href="tel:+993 (12) 92 14 95" class="phone">+993 (12) 92-14-95 </a>--}}
{{--</div>--}}
{{--<a href="mailto:post.market@online.tm" class="footer__link">post.market@online.tm</a>--}}
{{--<div class="footer__media">--}}
{{--<a href="#" class="_icon-facebook-square-brands"></a>--}}
{{--<a href="#" class="_icon-instagram-square-brands"></a>--}}
{{--<a href="#" class="_icon-youtube-square-brands"></a>--}}
{{--</div>--}}
{{--</div>--}}


{{--@isset($categories)--}}
{{--<div class="footer__links footer__links_double-row">--}}
{{--<div class="footer__links-title">Kategoriýalar</div>--}}
{{--<ul>--}}


{{--@foreach ($categories as $category)--}}
{{--@if($category->status == 1)--}}
{{--<li>--}}
{{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}">{{ $category->name_tk }}</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--@endforeach--}}

{{--</ul>--}}
{{--</div>--}}
{{--@endisset--}}



{{--<div class="footer__app-link">--}}
{{--<div class="footer__app-link-app">--}}
{{--<a href="#">--}}
{{--<img src="--}}
{{--{{asset('img/img/app-store.png')}}" alt=""/>--}}
{{--</a>--}}
{{--<a href="#">--}}
{{--<img src="--}}
{{--{{asset('img/img/google-play.png')}}" alt=""/>--}}
{{--</a>--}}
{{--</div>--}}
{{--<div class="footer__app-card">--}}
{{--<h2>Бонусная программа Intertop PLUS</h2>--}}
{{--<a href="#">--}}
{{--<img src="--}}
{{--{{asset('img/img/mastercard.jpg')}}" alt=""/>--}}
{{--</a>--}}
{{--<a href="#">--}}
{{--<img src="--}}
{{--{{asset('img/img/visa.jpg')}}" alt=""/>--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="footer__bot">--}}
{{--<div class="footer__bot-title">2021 Все права защищены</div>--}}
{{--<a href="#" class="footer__link">Публичная оферта</a>--}}
{{--<a href="#" class="footer__link">Карта сайты</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</footer>--}}


{{--<div class="sticky-box">--}}
{{--<div class="sticky-box__container __container">--}}
{{--<div class="sticky-box__row">--}}
{{--<div class="sticky-box__item sticky-box__item_gift">--}}
{{--<button class="_icon-gift js-show-hocu-skidku"></button>--}}
{{--</div>--}}
{{--<div class="sticky-box__item">--}}

{{--<a href="tel:+993 (12) 92 14 95">--}}
{{--<button class="_icon-phone"></button>--}}
{{--</a>--}}
{{--</div>--}}

{{--<div class="sticky-box__item">--}}
{{--<a href="mailto:post.market@online.tm">--}}
{{--<button class="letter">--}}
{{--<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg"--}}
{{--xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36.78 25.8"--}}
{{--style="enable-background:new 0 0 36.78 25.8;" xml:space="preserve">--}}
{{--<style type="text/css">--}}
{{--.st0 {--}}
{{--fill: #464545;--}}
{{--}--}}

{{--.st1 {--}}
{{--fill: #FFFFFF;--}}
{{--}--}}
{{--</style>--}}
{{--<g>--}}
{{--<path class="st0" d="M31.24,0.1H5.58c-3.02,0-5.5,2.47-5.5,5.5v14.66c0,3.02,2.47,5.5,5.5,5.5h25.65c3.02,0,5.5-2.47,5.5-5.5V5.6--}}
{{--C36.73,2.57,34.26,0.1,31.24,0.1z"/>--}}
{{--<g>--}}
{{--<g>--}}
{{--<path class="st1" d="M29.13,9.28c-0.31-0.38-0.89-0.44-1.29-0.15l-9.44,6.9l-9.46-6.8c-0.4-0.29-0.98-0.22-1.28,0.16--}}
{{--c-0.16,0.2-0.21,0.44-0.17,0.66c-0.01,0.27,0.1,0.54,0.34,0.72l10.58,7.61l10.56-7.71c0.24-0.18,0.35-0.45,0.34-0.72--}}
{{--C29.35,9.72,29.3,9.48,29.13,9.28z"/>--}}
{{--</g>--}}
{{--</g>--}}
{{--<g>--}}
{{--<g>--}}
{{--<path class="st1" d="M29.28,9.16c-0.32-0.38-0.9-0.45-1.3-0.15L18.41,16L8.81,9.1C8.41,8.8,7.82,8.88,7.51,9.26--}}
{{--C7.35,9.46,7.3,9.7,7.34,9.93c-0.01,0.27,0.1,0.55,0.35,0.73l10.73,7.72l10.71-7.82c0.25-0.18,0.35-0.45,0.34-0.73--}}
{{--C29.5,9.6,29.45,9.35,29.28,9.16z"/>--}}
{{--</g>--}}
{{--</g>--}}
{{--</g>--}}
{{--</svg>--}}
{{--</button>--}}
{{--</a>--}}
{{--</div>--}}
{{--<div class="sticky-box__item sticky-box__item_to-top">--}}
{{--<button class="_icon-chevron-down" id="scrollTop" onclick="topFunction()"></button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<section class="shadow-overlay js-pop-up" data-pop-up-name="log-in-and-reg">--}}
{{--<div class="reg-and-log">--}}
{{--<div class="reg-and-log__wrapper">--}}
{{--<div class="reg-and-log__close js-close-button">X</div>--}}
{{--<div class="reg-and-log__row">--}}
{{--<div class="reg-and-log__mob-nav">--}}
{{--<button class="__js-show-reg-area">Зарегистрироваться</button>--}}
{{--<button class="__js-show-log-area">Войти</button>--}}
{{--</div>--}}

{{--<div class="reg-and-log__column">--}}

{{--<div class="reg-and-log__show-area __js-nav-reg-area">--}}
{{--<h3>Я новый пользователь </h3>--}}
{{--<h5>Отслеживай заказы и накапливай бонусы в личном кабинете</h5>--}}
{{--<button class="reg-and-log__show-area-button __js-show-reg-area">Зарегистрироваться--}}
{{--</button>--}}
{{--</div>--}}

{{--<div class="reg-and-log__reg-area __js-reg-area">--}}

{{--<form action="{{ route('verif-registrasion') }}" method="POST"--}}
{{--enctype="multipart/form-data">--}}
{{--@csrf--}}
{{--<h3>Я новый пользователь </h3>--}}
{{--<h5>Отслеживай заказы и накапливай бонусы в личном кабинете</h5>--}}

{{--<div class="reg-and-log__form">--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>E-mail</span>--}}
{{--<input type="email" id="email" name="email" value="{{ old('email') }}"--}}
{{--placeholder="Email" class="@error('email') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('email')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}


{{--<div class="reg-and-log__form-item">--}}
{{--<span>Имья</span>--}}
{{--<input type="text" id="name" name="name" value="{{ old('name') }}" required--}}
{{--placeholder="Имья *" class="@error('name') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('name')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Фамилия</span>--}}
{{--<input type="text" id="surname" name="surname" value="{{ old('surname') }}"--}}
{{--required placeholder="Фамилия *"--}}
{{--class="@error('surname') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('surname')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}


{{--<div class="reg-and-log__form-item">--}}
{{--<span>Отчество</span>--}}
{{--<input type="text" id="middlename" name="middlename"--}}
{{--value="{{ old('middlename') }}" required placeholder="Отчество *"--}}
{{--class="@error('middlename') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('middlename')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>День рождения</span>--}}
{{--<input type="text"--}}
{{--onblur="( !this.value ? this.type='text' : this.type='date')"--}}
{{--id="birthday" name="birthday" value="{{ old('birthday') }}"--}}
{{--placeholder="Doglan senesi *"--}}
{{--class="@error('birthday') is-invalid @enderror" required>--}}
{{--</div>--}}

{{--@error('birthday')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Логин</span>--}}
{{--<input type="text" id="login" name="login"--}}
{{--value="{{ old('login') }}" required placeholder="Логин *"--}}
{{--class="@error('login') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('login')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Адрес</span>--}}
{{--<input type="text" id="address" name="address"--}}
{{--value="{{ old('address') }}" required placeholder="Адрес *"--}}
{{--class="@error('address') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('address')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Номер телефона</span>--}}
{{--<input type="tel" minlength="8" maxlength="8" id="tel" name="phone"--}}
{{--value="{{ old('phone') }}" required placeholder="Telefon belgisi *"--}}
{{--class="@error('password') is-invalid @enderror">--}}
{{--</div>--}}

{{--@error('phone')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Пароль</span>--}}
{{--<input type="password" id="password" name="password" required--}}
{{--placeholder="Parol *" class="@error('password') is-invalid @enderror"--}}
{{--autocomplete="new-password">--}}
{{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
{{--</div>--}}
{{--@error('password')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Подвердите пароль </span>--}}
{{--<input type="password" id="password-confirm" name="password_confirmation"--}}
{{--required placeholder="Paroly gaýtadan ýaz *"--}}
{{--autocomplete="new-password">--}}
{{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
{{--</div>--}}


{{--</div>--}}
{{--<div class="reg-and-log__checkbox">--}}
{{--<label>--}}

{{--<input type="checkbox" id="random-password">--}}
{{--<span></span>--}}
{{--<p>Сгенерировать пароль за меня</p>--}}
{{--</label>--}}
{{--</div>--}}
{{--<div class="reg-and-log__checkbox">--}}
{{--<label>--}}
{{--<input type="checkbox">--}}
{{--<span></span>--}}
{{--<p>Я соглашаюсь с условиями договора публичной оферты, возврата и--}}
{{--безопасности</p>--}}
{{--</label>--}}
{{--</div>--}}
{{--<button type="submit">Зарегистрироваться</button>--}}
{{--<input type="submit" name="" value="Зарегистрироваться">--}}
{{--</form>--}}
{{--</div>--}}


{{--</div>--}}
{{--<div class="reg-and-log__column">--}}
{{--<div class="reg-and-log__show-area __js-nav-log-area">--}}
{{--<h3>Я уже зарегистрирован</h3>--}}
{{--<h5>Войти, чтобы быстрее оформить заказ и отслеживать его в личном кабинете</h5>--}}
{{--<button class="reg-and-log__show-area-button __js-show-log-area">Войти</button>--}}
{{--</div>--}}


{{--<div class="reg-and-log__reg-area __js-log-area">--}}
{{--<h3>Я уже зарегистрирован</h3>--}}
{{--<h5>Войти, чтобы быстрее оформить заказ и отслеживать его в личном кабинете</h5>--}}
{{--<div class="reg-and-log__form">--}}


{{--<form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">--}}
{{--@csrf--}}
{{--<div class="reg-and-log__form-item">--}}
{{--<span>E-mail</span>--}}
{{--<input type="email" name="email" value="{{ old('email') }}" id="email"--}}
{{--required placeholder="Email"--}}
{{--class="input-login @error('email') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('email')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Пароль</span>--}}
{{--<input type="password" name="password" id="password" required--}}
{{--placeholder="Parol *" autocomplete="current-password">--}}
{{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
{{--</div>--}}

{{--@error('password')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}
{{--<div class="reg-and-log__forgot-pass js-close-button __js-forgot-pass">Забыл--}}
{{--пароль?--}}
{{--</div>--}}
{{--<button>Войти</button>--}}

{{--</form>--}}

{{--</div>--}}

{{--</div>--}}


{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}


{{--<section class="shadow-overlay   js-pop-up_skidku" data-pop-up-name="hocu-skidku">--}}
{{--<div class="reg-and-log">--}}
{{--<div class="reg-and-log__wrapper">--}}
{{--<div class="reg-and-log__close js-close-button_ocur">X</div>--}}

{{--@isset($warns)--}}
{{--@foreach ($warns as $warn)--}}
{{--<div class="reg-and-log__row">--}}

{{--<div class="reg-and-log__column">--}}
{{--<div class="reg-and-log__reg-area">--}}
{{--<img src="{{ asset($warn->img) }}" width="600" height="400" alt="">--}}
{{--</div>--}}
{{--</div>--}}


{{--<div class="reg-and-log__column">--}}
{{--<div class="reg-and-log__reg-area">--}}
{{--<h5>Хочу скидку!</h5>--}}

{{--<h5>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h5>--}}

{{--<a class="menu-item"--}}
{{--href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>--}}
{{--<h3>{{$warn->category->name_tk}}</h3></a>--}}
{{--</div>--}}
{{--</div>--}}


{{--</div>--}}
{{--@endforeach--}}
{{--@endisset--}}


{{--</div>--}}
{{--</div>--}}


{{--</section>--}}


{{--<div>--}}

{{--<!-- Modal content -->--}}
{{-- <div>--}}
{{--<div     class="col-md-12">--}}
{{--<div class="text-center">--}}
{{--<h2>Хочу скидку</h2>--}}
{{--</div>--}}
{{--@isset($warns)--}}
{{--@foreach ($warns as $warn)--}}
{{--<div class="col-md-6 left-side-div">--}}
{{--<img src="{{ asset($warn->img) }}" height="100" alt="">--}}
{{--</div>--}}

{{--<div class="col-md-6 right-side-div">--}}
{{--<h4>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h4>--}}

{{--<a class="menu-item" href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>{{$warn->category->name_tk}}</a>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--@endisset--}}
{{--</div>--}}

{{--</div>--}}


{{--</div>--}}

{{--</main>--}}

{{--hemme zat sun icinde--}}
{{--</div>--}}

{{--<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>--}}
{{--<script src="{{asset('js/slick.min.js')}}"></script>--}}
{{--<script src="{{asset('js/jquery.marquee.min.js')}}"></script>--}}
{{--<script src="{{asset('js/swiper-bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('js/isotope-docs.min.js')}}"></script>--}}
{{--<script src="{{asset('js/scripts.js')}}"></script>--}}
{{--<script src="{{asset('js/sliders.js')}}"></script>--}}


{{--<script src="{{asset('js/old/addToCart.js')}}"></script>--}}
{{--<script src="{{ asset('js/old/plusToCart.js') }}"></script>--}}

{{--<script src="{{asset('js/old/deleteFromCart.js')}}"></script>--}}
{{--<script src="{{asset('js/old/subtractFromCart.js')}}"></script>--}}

{{--<script src="{{asset('js/langDropdown.js')}}"></script>--}}
{{--<script src="{{asset('js/showHideMainMenu.js')}}"></script>--}}



{{--@livewireScripts--}}
{{--@livewireScripts--}}
{{--</body>--}}
{{--</html>--}}





{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--<meta charset="UTF-8"/>--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge"/>--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1.0"/>--}}

{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}"/>--}}
{{--<title>{{ isset($title) ? $title : 'TurkmenPostMarket'}}</title>--}}
{{--<link rel="stylesheet" href="{{asset('css/style.css')}}"/>--}}



{{--@livewireStyles--}}

{{--<style>--}}
{{--.pereloader {--}}
{{--position: fixed;--}}
{{---webkit-transition: 0.3s;--}}
{{--transition: 0.3s;--}}
{{--top: 0;--}}
{{--left: 0;--}}
{{--bottom: 0;--}}
{{--right: 0;--}}
{{--background-color: #fff;--}}
{{--z-index: 99999999999999;--}}
{{--visibility: visible;--}}
{{--opacity: 1;--}}
{{--}--}}

{{--.pereloader span {--}}
{{--display: block;--}}
{{--position: absolute;--}}
{{--top: 50%;--}}
{{--left: 50%;--}}
{{---webkit-transform: translate(-50%, -50%);--}}
{{--transform: translate(-50%, -50%);--}}
{{--border: 2px solid #000;--}}
{{--border-left-color: #fff;--}}
{{--border-radius: 50%;--}}
{{---webkit-animation: load 1s infinite linear;--}}
{{--animation: load 1s infinite linear;--}}
{{--}--}}

{{--@-webkit-keyframes load {--}}
{{--100% {--}}
{{---webkit-transform: translate(-50%, -50%) rotate(365deg);--}}
{{--transform: translate(-50%, -50%) rotate(365deg);--}}
{{--}--}}
{{--}--}}

{{--@keyframes load {--}}
{{--100% {--}}
{{---webkit-transform: translate(-50%, -50%) rotate(365deg);--}}
{{--transform: translate(-50%, -50%) rotate(365deg);--}}
{{--}--}}
{{--}--}}

{{--@-webkit-keyframes load-reverce {--}}
{{--100% {--}}
{{---webkit-transform: translate(-50%, -50%) rotate(-365deg);--}}
{{--transform: translate(-50%, -50%) rotate(-365deg);--}}
{{--}--}}
{{--}--}}

{{--@keyframes load-reverce {--}}
{{--100% {--}}
{{---webkit-transform: translate(-50%, -50%) rotate(-365deg);--}}
{{--transform: translate(-50%, -50%) rotate(-365deg);--}}
{{--}--}}
{{--}--}}

{{--.pereloader span:nth-child(1) {--}}
{{--width: 60px;--}}
{{--height: 60px;--}}
{{--}--}}

{{--.pereloader span:nth-child(2) {--}}
{{--width: 50px;--}}
{{--height: 50px;--}}
{{---webkit-animation-name: load-reverce;--}}
{{--animation-name: load-reverce;--}}
{{--}--}}

{{--body.loaded .pereloader {--}}
{{--visibility: hidden;--}}
{{--opacity: 0;--}}
{{--}--}}
{{--</style>--}}
{{--@livewireStyles--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="pereloader">--}}
{{--<span></span>--}}
{{--<span></span>--}}
{{--</div>--}}

{{--<div class="wrapper">--}}
{{--hemme zat sun icinde--}}


{{-- @isset($warns)--}}
{{--@foreach ($warns as $warn)--}}
{{--<section class="top-popup">--}}
{{--<a href="#" class="top-popup__item">--}}
{{--<p>{{$warn->category->name_tk}}</p>--}}
{{--</a>--}}
{{--<a href="#" class="top-popup__item" style="background-color: red;">--}}
{{--<p>{{$warn->category->name_tk}} - {{$warn->prosent}}%</p>--}}
{{--</a>--}}
{{--<a href="#" class="top-popup__item" style="background-color: #339433;">--}}
{{--<p>{{$warn->category->name_tk}} - {{$warn->prosent}}%</p>--}}
{{--</a>--}}
{{--<button class="top-popup__close">X</button>--}}
{{--</section>--}}
{{--@endforeach--}}
{{--@endisset--}}

{{--<header class="header">--}}
{{--<section class="header__top">--}}
{{--<div class="header__top-container __container">--}}
{{--<div class="header__lang lang">--}}
{{--<!-- <button class="lang__current">--}}
{{--<p>Rus </p>--}}
{{--<span class="_icon-chevron-down"></span>--}}
{{--</button>--}}
{{--<ul class="lang__items">--}}
{{--<li class="lang__item lang__item_active">Rus</li>--}}
{{--<li class="lang__item">Eng</li>--}}
{{--<li class="lang__item">Tm</li>--}}
{{--</ul> -->--}}
{{--</div>--}}
{{--<div class="header__top-menu top-menu">--}}
{{--<div class="top-menu__body">--}}
{{--<ul class="top-menu__list">--}}
{{--<li class="top-menu__links">--}}
{{--<a href="#">--}}
{{--<span class="_icon-truck"></span>--}}
{{--<p>Mugt eltip berme</p>--}}
{{--</a>--}}
{{--<a href="#">--}}
{{--<span class="_icon-wallet"></span>--}}
{{--<p>Amatly töleg hyzmaty</p>--}}
{{--</a>--}}
{{--<a href="#">--}}
{{--<span class="_icon-sync"></span>--}}
{{--<p>Ýeňillik bilen gaýtaryp almak</p>--}}
{{--</a>--}}
{{--<a href="{{route('sidedrawer')}}">--}}
{{--<span class="_icon-clothes-hanger"></span>--}}
{{--<p>Ölçegiňize görä</p>--}}
{{--</a>--}}
{{--<a href="#">--}}
{{--<span class="_icon-registered"></span>--}}
{{--<p>100% ýokary hilli önüm</p>--}}
{{--</a>--}}

{{--<a href="#">--}}
{{--<span class=""></span>--}}
{{--<p>TMPost-dan Satyn alyň!</p>--}}
{{--</a>--}}

{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}
{{--<section class="header__navigators">--}}
{{--<div class="header__navigators-container __container">--}}
{{--<div style="width:20%;" class="header__logo">--}}
{{--<a href="{{ route('main_page') }}"> <img style="width:70%;"--}}
{{--src="{{ asset('images/logotpmarket.png') }}" alt=""></a>--}}
{{--</div>--}}



{{--<div class="header__search">--}}
{{--<button class="_icon-search"></button>--}}
{{--<div class="header__search-input">--}}
{{--<form action="{{route('search')}}" method="GET" class="search-form">--}}
{{--<input type="text" name="query" id="query" value="{{request()->input('query')}}"/>--}}
{{--</form>--}}

{{--</div>--}}
{{--</div>--}}

{{--<div class="header__nav-links">--}}

{{--@if(Auth::user())--}}
{{--<a href="{{ route('wishlist.index') }}" class="_icon-heart">--}}

{{--@isset(Auth::user()->wishlist)--}}
{{--@if(Auth::user()->wishlist->count())--}}
{{--{{Auth::user()->wishlist->count()}}--}}
{{--@endif--}}
{{--@endisset--}}

{{--</a>--}}
{{--@else--}}
{{--<a href="#" class="_icon-heart js-show-log-and-reg">--}}
{{--<a href="{{ route('wishlist.index') }}" class="_icon-heart">--}}
{{--@php--}}

{{--if(!isset($_COOKIE['wishlists'])) {--}}
{{--setcookie('wishlists', '[]');--}}
{{--$_COOKIE['wishlists'] = '[]';--}}
{{--}--}}

{{--echo count(json_decode($_COOKIE['wishlists'], true));--}}

{{--@endphp--}}

{{--</a>--}}
{{--@endif--}}


{{--@guest--}}
{{--<a href="{{route('login')}}" class="_icon-user js-show-log-and-reg"></a>--}}
{{--<a href="#" class="_icon-user js-show-log-and-reg"></a>--}}
{{--@if (Route::has('register'))--}}
{{--<a href="#" class="_icon-registered js-show-log-and-reg"></a>--}}
{{--@endif--}}
{{--@else--}}
{{--<a href="{{ route('home') }}" class="_icon-user">{{Auth::user()->name}}</a>--}}

{{--<a href="{{ route('logout') }}" onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();"--}}
{{--><img width="20" height="20" src="{{asset('images/lock.png')}}"> </a>--}}
{{--@endguest--}}
{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--@csrf--}}
{{--</form>--}}

{{--<a href="{{ route('cart') }}" class="_icon-shopping-cart"><span--}}
{{--id="cart-count">{{session('cartCount')}}</span></a>--}}
{{--</div>--}}
{{--<div class="header__burger">--}}
{{--<span></span>--}}
{{--<span></span>--}}
{{--<span></span>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}

{{--<section class="header__menu menu">--}}
{{--<div class="menu__container __container">--}}
{{--<div class="menu__body">--}}

{{--<ul class="menu__list">--}}
{{--<li class="menu__item">--}}
{{--<a href="{{ route('getNewProds') }}" class="menu__link menu__link_hot">Täze</a>--}}
{{--</li>--}}

{{--@isset($categories)--}}
{{--@foreach ($categories as $category)--}}
{{--@if($category->status == 1)--}}

{{--<li class="menu__item">--}}
{{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}"--}}
{{--class="menu__link menu__link_hot">{{ $category->name_tk }}</a>--}}
{{--</li>--}}

{{--@endif--}}
{{--@endforeach--}}

{{--@endisset--}}
{{--<li class="menu__item">--}}
{{--<a href="{{ route('news') }}" class="menu__link menu__link_hot">HABAR</a>--}}

{{--</li>--}}

{{--</ul>--}}

{{--</div>--}}
{{--</div>--}}
{{--</section>--}}

{{--</header>--}}

{{--<main class="page">--}}
{{--<section class="marquee">--}}

{{--@isset($categories)--}}
{{--@foreach ($categories as $category)--}}
{{--  @if($category->status == 1)--}}

{{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}"--}}
{{--class="marquee__links">{{ $category->name_tk }}</a>--}}


{{--@endif--}}
{{--@endforeach--}}
{{--@endisset--}}


{{--</section>--}}


{{--@yield('content')--}}


{{--<footer class="footer">--}}
{{--<div class="footer__container __container">--}}
{{--<div class="footer__top-menu">--}}
{{--<div class="footer__contacts">--}}
{{--<div class="footer__number">--}}

{{--<a href="tel:+993 (12) 92 14 95" class="phone">+993 (12) 92-14-95 </a>--}}
{{--</div>--}}
{{--<a href="mailto:post.market@online.tm" class="footer__link">post.market@online.tm</a>--}}
{{--<div class="footer__media">--}}
{{--<a href="#" class="_icon-facebook-square-brands"></a>--}}
{{--<a href="#" class="_icon-instagram-square-brands"></a>--}}
{{--<a href="#" class="_icon-youtube-square-brands"></a>--}}
{{--</div>--}}
{{--</div>--}}


{{--@isset($categories)--}}
{{--<div class="footer__links footer__links_double-row">--}}
{{--<div class="footer__links-title">Kategoriýalar</div>--}}
{{--<ul>--}}


{{--@foreach ($categories as $category)--}}
{{--@if($category->status == 1)--}}
{{--<li>--}}
{{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}">{{ $category->name_tk }}</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--@endforeach--}}

{{--</ul>--}}
{{--</div>--}}
{{--@endisset--}}



{{--<div class="footer__app-link">--}}
{{--<div class="footer__app-link-app">--}}
{{--<a href="#">--}}
{{--<img src="--}}
{{--{{asset('img/img/app-store.png')}}" alt=""/>--}}
{{--</a>--}}
{{--<a href="#">--}}
{{--<img src="--}}
{{--{{asset('img/img/google-play.png')}}" alt=""/>--}}
{{--</a>--}}
{{--</div>--}}
{{--<div class="footer__app-card">--}}
{{--<h2>Бонусная программа Intertop PLUS</h2>--}}
{{--<a href="#">--}}
{{--<img src="--}}
{{--{{asset('img/img/mastercard.jpg')}}" alt=""/>--}}
{{--</a>--}}
{{--<a href="#">--}}
{{--<img src="--}}
{{--{{asset('img/img/visa.jpg')}}" alt=""/>--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="footer__bot">--}}
{{--<div class="footer__bot-title">2021 Все права защищены</div>--}}
{{--<a href="#" class="footer__link">Публичная оферта</a>--}}
{{--<a href="#" class="footer__link">Карта сайты</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</footer>--}}


{{--<div class="sticky-box">--}}
{{--<div class="sticky-box__container __container">--}}
{{--<div class="sticky-box__row">--}}
{{--<div class="sticky-box__item sticky-box__item_gift">--}}
{{--<button class="_icon-gift js-show-hocu-skidku"></button>--}}
{{--</div>--}}
{{--<div class="sticky-box__item">--}}

{{--<a href="tel:+993 (12) 92 14 95">--}}
{{--<button class="_icon-phone"></button>--}}
{{--</a>--}}
{{--</div>--}}

{{--<div class="sticky-box__item">--}}
{{--<a href="mailto:post.market@online.tm">--}}
{{--<button class="letter">--}}
{{--<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg"--}}
{{--xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36.78 25.8"--}}
{{--style="enable-background:new 0 0 36.78 25.8;" xml:space="preserve">--}}
{{--<style type="text/css">--}}
{{--.st0 {--}}
{{--fill: #464545;--}}
{{--}--}}

{{--.st1 {--}}
{{--fill: #FFFFFF;--}}
{{--}--}}
{{--</style>--}}
{{--<g>--}}
{{--<path class="st0" d="M31.24,0.1H5.58c-3.02,0-5.5,2.47-5.5,5.5v14.66c0,3.02,2.47,5.5,5.5,5.5h25.65c3.02,0,5.5-2.47,5.5-5.5V5.6--}}
{{--C36.73,2.57,34.26,0.1,31.24,0.1z"/>--}}
{{--<g>--}}
{{--<g>--}}
{{--<path class="st1" d="M29.13,9.28c-0.31-0.38-0.89-0.44-1.29-0.15l-9.44,6.9l-9.46-6.8c-0.4-0.29-0.98-0.22-1.28,0.16--}}
{{--c-0.16,0.2-0.21,0.44-0.17,0.66c-0.01,0.27,0.1,0.54,0.34,0.72l10.58,7.61l10.56-7.71c0.24-0.18,0.35-0.45,0.34-0.72--}}
{{--C29.35,9.72,29.3,9.48,29.13,9.28z"/>--}}
{{--</g>--}}
{{--</g>--}}
{{--<g>--}}
{{--<g>--}}
{{--<path class="st1" d="M29.28,9.16c-0.32-0.38-0.9-0.45-1.3-0.15L18.41,16L8.81,9.1C8.41,8.8,7.82,8.88,7.51,9.26--}}
{{--C7.35,9.46,7.3,9.7,7.34,9.93c-0.01,0.27,0.1,0.55,0.35,0.73l10.73,7.72l10.71-7.82c0.25-0.18,0.35-0.45,0.34-0.73--}}
{{--C29.5,9.6,29.45,9.35,29.28,9.16z"/>--}}
{{--</g>--}}
{{--</g>--}}
{{--</g>--}}
{{--</svg>--}}
{{--</button>--}}
{{--</a>--}}
{{--</div>--}}
{{--<div class="sticky-box__item sticky-box__item_to-top">--}}
{{--<button class="_icon-chevron-down" id="scrollTop" onclick="topFunction()"></button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<section class="shadow-overlay js-pop-up" data-pop-up-name="log-in-and-reg">--}}
{{--<div class="reg-and-log">--}}
{{--<div class="reg-and-log__wrapper">--}}
{{--<div class="reg-and-log__close js-close-button">X</div>--}}
{{--<div class="reg-and-log__row">--}}
{{--<div class="reg-and-log__mob-nav">--}}
{{--<button class="__js-show-reg-area">Зарегистрироваться</button>--}}
{{--<button class="__js-show-log-area">Войти</button>--}}
{{--</div>--}}

{{--<div class="reg-and-log__column">--}}

{{--<div class="reg-and-log__show-area __js-nav-reg-area">--}}
{{--<h3>Я новый пользователь </h3>--}}
{{--<h5>Отслеживай заказы и накапливай бонусы в личном кабинете</h5>--}}
{{--<button class="reg-and-log__show-area-button __js-show-reg-area">Зарегистрироваться--}}
{{--</button>--}}
{{--</div>--}}

{{--<div class="reg-and-log__reg-area __js-reg-area">--}}

{{--<form action="{{ route('verif-registrasion') }}" method="POST"--}}
{{--enctype="multipart/form-data">--}}
{{--@csrf--}}
{{--<h3>Я новый пользователь </h3>--}}
{{--<h5>Отслеживай заказы и накапливай бонусы в личном кабинете</h5>--}}

{{--<div class="reg-and-log__form">--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>E-mail</span>--}}
{{--<input type="email" id="email" name="email" value="{{ old('email') }}"--}}
{{--placeholder="Email" class="@error('email') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('email')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}


{{--<div class="reg-and-log__form-item">--}}
{{--<span>Имья</span>--}}
{{--<input type="text" id="name" name="name" value="{{ old('name') }}" required--}}
{{--placeholder="Имья *" class="@error('name') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('name')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Фамилия</span>--}}
{{--<input type="text" id="surname" name="surname" value="{{ old('surname') }}"--}}
{{--required placeholder="Фамилия *"--}}
{{--class="@error('surname') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('surname')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}


{{--<div class="reg-and-log__form-item">--}}
{{--<span>Отчество</span>--}}
{{--<input type="text" id="middlename" name="middlename"--}}
{{--value="{{ old('middlename') }}" required placeholder="Отчество *"--}}
{{--class="@error('middlename') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('middlename')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>День рождения</span>--}}
{{--<input type="text"--}}
{{--onblur="( !this.value ? this.type='text' : this.type='date')"--}}
{{--id="birthday" name="birthday" value="{{ old('birthday') }}"--}}
{{--placeholder="Doglan senesi *"--}}
{{--class="@error('birthday') is-invalid @enderror" required>--}}
{{--</div>--}}

{{--@error('birthday')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Логин</span>--}}
{{--<input type="text" id="login" name="login"--}}
{{--value="{{ old('login') }}" required placeholder="Логин *"--}}
{{--class="@error('login') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('login')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Адрес</span>--}}
{{--<input type="text" id="address" name="address"--}}
{{--value="{{ old('address') }}" required placeholder="Адрес *"--}}
{{--class="@error('address') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('address')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Номер телефона</span>--}}
{{--<input type="tel" minlength="8" maxlength="8" id="tel" name="phone"--}}
{{--value="{{ old('phone') }}" required placeholder="Telefon belgisi *"--}}
{{--class="@error('password') is-invalid @enderror">--}}
{{--</div>--}}

{{--@error('phone')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Пароль</span>--}}
{{--<input type="password" id="password" name="password" required--}}
{{--placeholder="Parol *" class="@error('password') is-invalid @enderror"--}}
{{--autocomplete="new-password">--}}
{{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
{{--</div>--}}
{{--@error('password')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Подвердите пароль </span>--}}
{{--<input type="password" id="password-confirm" name="password_confirmation"--}}
{{--required placeholder="Paroly gaýtadan ýaz *"--}}
{{--autocomplete="new-password">--}}
{{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
{{--</div>--}}


{{--</div>--}}
{{--<div class="reg-and-log__checkbox">--}}
{{--<label>--}}

{{--<input type="checkbox" id="random-password">--}}
{{--<span></span>--}}
{{--<p>Сгенерировать пароль за меня</p>--}}
{{--</label>--}}
{{--</div>--}}
{{--<div class="reg-and-log__checkbox">--}}
{{--<label>--}}
{{--<input type="checkbox">--}}
{{--<span></span>--}}
{{--<p>Я соглашаюсь с условиями договора публичной оферты, возврата и--}}
{{--безопасности</p>--}}
{{--</label>--}}
{{--</div>--}}
{{--<button type="submit">Зарегистрироваться</button>--}}
{{--<input type="submit" name="" value="Зарегистрироваться">--}}
{{--</form>--}}
{{--</div>--}}


{{--</div>--}}
{{--<div class="reg-and-log__column">--}}
{{--<div class="reg-and-log__show-area __js-nav-log-area">--}}
{{--<h3>Я уже зарегистрирован</h3>--}}
{{--<h5>Войти, чтобы быстрее оформить заказ и отслеживать его в личном кабинете</h5>--}}
{{--<button class="reg-and-log__show-area-button __js-show-log-area">Войти</button>--}}
{{--</div>--}}


{{--<div class="reg-and-log__reg-area __js-log-area">--}}
{{--<h3>Я уже зарегистрирован</h3>--}}
{{--<h5>Войти, чтобы быстрее оформить заказ и отслеживать его в личном кабинете</h5>--}}
{{--<div class="reg-and-log__form">--}}


{{--<form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">--}}
{{--@csrf--}}
{{--<div class="reg-and-log__form-item">--}}
{{--<span>E-mail</span>--}}
{{--<input type="email" name="email" value="{{ old('email') }}" id="email"--}}
{{--required placeholder="Email"--}}
{{--class="input-login @error('email') is-invalid @enderror">--}}
{{--</div>--}}
{{--@error('email')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}

{{--<div class="reg-and-log__form-item">--}}
{{--<span>Пароль</span>--}}
{{--<input type="password" name="password" id="password" required--}}
{{--placeholder="Parol *" autocomplete="current-password">--}}
{{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
{{--</div>--}}

{{--@error('password')--}}
{{--<div class="invalid-feedback" role="alert">--}}
{{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
{{--</div>--}}
{{--@enderror--}}
{{--<div class="reg-and-log__forgot-pass js-close-button __js-forgot-pass">Забыл--}}
{{--пароль?--}}
{{--</div>--}}
{{--<button>Войти</button>--}}

{{--</form>--}}

{{--</div>--}}

{{--</div>--}}


{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}


{{--<section class="shadow-overlay   js-pop-up_skidku" data-pop-up-name="hocu-skidku">--}}
{{--<div class="reg-and-log">--}}
{{--<div class="reg-and-log__wrapper">--}}
{{--<div class="reg-and-log__close js-close-button_ocur">X</div>--}}

{{--@isset($warns)--}}
{{--@foreach ($warns as $warn)--}}
{{--<div class="reg-and-log__row">--}}

{{--<div class="reg-and-log__column">--}}
{{--<div class="reg-and-log__reg-area">--}}
{{--<img src="{{ asset($warn->img) }}" width="600" height="400" alt="">--}}
{{--</div>--}}
{{--</div>--}}


{{--<div class="reg-and-log__column">--}}
{{--<div class="reg-and-log__reg-area">--}}
{{--<h5>Хочу скидку!</h5>--}}

{{--<h5>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h5>--}}

{{--<a class="menu-item"--}}
{{--href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>--}}
{{--<h3>{{$warn->category->name_tk}}</h3></a>--}}
{{--</div>--}}
{{--</div>--}}


{{--</div>--}}
{{--@endforeach--}}
{{--@endisset--}}


{{--</div>--}}
{{--</div>--}}


{{--</section>--}}


{{--<div>--}}

{{--<!-- Modal content -->--}}
{{-- <div>--}}
{{--<div     class="col-md-12">--}}
{{--<div class="text-center">--}}
{{--<h2>Хочу скидку</h2>--}}
{{--</div>--}}
{{--@isset($warns)--}}
{{--@foreach ($warns as $warn)--}}
{{--<div class="col-md-6 left-side-div">--}}
{{--<img src="{{ asset($warn->img) }}" height="100" alt="">--}}
{{--</div>--}}

{{--<div class="col-md-6 right-side-div">--}}
{{--<h4>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h4>--}}

{{--<a class="menu-item" href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>{{$warn->category->name_tk}}</a>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--@endisset--}}
{{--</div>--}}

{{--</div>--}}


{{--</div>--}}

{{--</main>--}}

{{--hemme zat sun icinde--}}
{{--</div>--}}

{{--<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>--}}
{{--<script src="{{asset('js/slick.min.js')}}"></script>--}}
{{--<script src="{{asset('js/jquery.marquee.min.js')}}"></script>--}}
{{--<script src="{{asset('js/swiper-bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('js/isotope-docs.min.js')}}"></script>--}}
{{--<script src="{{asset('js/scripts.js')}}"></script>--}}
{{--<script src="{{asset('js/sliders.js')}}"></script>--}}


{{--<script src="{{asset('js/old/addToCart.js')}}"></script>--}}
{{--<script src="{{ asset('js/old/plusToCart.js') }}"></script>--}}

{{--<script src="{{asset('js/old/deleteFromCart.js')}}"></script>--}}
{{--<script src="{{asset('js/old/subtractFromCart.js')}}"></script>--}}

{{--<script src="{{asset('js/langDropdown.js')}}"></script>--}}
{{--<script src="{{asset('js/showHideMainMenu.js')}}"></script>--}}



{{--@livewireScripts--}}
{{--@livewireScripts--}}
{{--</body>--}}
{{--</html>--}}





{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
    {{--<meta charset="UTF-8"/>--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge"/>--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0"/>--}}

    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    {{--<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}"/>--}}
    {{--<title>{{ isset($title) ? $title : 'TurkmenPostMarket'}}</title>--}}
    {{--<link rel="stylesheet" href="{{asset('css/style.css')}}"/>--}}



    {{--@livewireStyles--}}

    {{--<style>--}}
        {{--.pereloader {--}}
            {{--position: fixed;--}}
            {{---webkit-transition: 0.3s;--}}
            {{--transition: 0.3s;--}}
            {{--top: 0;--}}
            {{--left: 0;--}}
            {{--bottom: 0;--}}
            {{--right: 0;--}}
            {{--background-color: #fff;--}}
            {{--z-index: 99999999999999;--}}
            {{--visibility: visible;--}}
            {{--opacity: 1;--}}
        {{--}--}}

        {{--.pereloader span {--}}
            {{--display: block;--}}
            {{--position: absolute;--}}
            {{--top: 50%;--}}
            {{--left: 50%;--}}
            {{---webkit-transform: translate(-50%, -50%);--}}
            {{--transform: translate(-50%, -50%);--}}
            {{--border: 2px solid #000;--}}
            {{--border-left-color: #fff;--}}
            {{--border-radius: 50%;--}}
            {{---webkit-animation: load 1s infinite linear;--}}
            {{--animation: load 1s infinite linear;--}}
        {{--}--}}

        {{--@-webkit-keyframes load {--}}
            {{--100% {--}}
                {{---webkit-transform: translate(-50%, -50%) rotate(365deg);--}}
                {{--transform: translate(-50%, -50%) rotate(365deg);--}}
            {{--}--}}
        {{--}--}}

        {{--@keyframes load {--}}
            {{--100% {--}}
                {{---webkit-transform: translate(-50%, -50%) rotate(365deg);--}}
                {{--transform: translate(-50%, -50%) rotate(365deg);--}}
            {{--}--}}
        {{--}--}}

        {{--@-webkit-keyframes load-reverce {--}}
            {{--100% {--}}
                {{---webkit-transform: translate(-50%, -50%) rotate(-365deg);--}}
                {{--transform: translate(-50%, -50%) rotate(-365deg);--}}
            {{--}--}}
        {{--}--}}

        {{--@keyframes load-reverce {--}}
            {{--100% {--}}
                {{---webkit-transform: translate(-50%, -50%) rotate(-365deg);--}}
                {{--transform: translate(-50%, -50%) rotate(-365deg);--}}
            {{--}--}}
        {{--}--}}

        {{--.pereloader span:nth-child(1) {--}}
            {{--width: 60px;--}}
            {{--height: 60px;--}}
        {{--}--}}

        {{--.pereloader span:nth-child(2) {--}}
            {{--width: 50px;--}}
            {{--height: 50px;--}}
            {{---webkit-animation-name: load-reverce;--}}
            {{--animation-name: load-reverce;--}}
        {{--}--}}

        {{--body.loaded .pereloader {--}}
            {{--visibility: hidden;--}}
            {{--opacity: 0;--}}
        {{--}--}}
    {{--</style>--}}
    {{--@livewireStyles--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="pereloader">--}}
    {{--<span></span>--}}
    {{--<span></span>--}}
{{--</div>--}}

{{--<div class="wrapper">--}}
    {{--hemme zat sun icinde--}}


    {{-- @isset($warns)--}}
         {{--@foreach ($warns as $warn)--}}
             {{--<section class="top-popup">--}}
                 {{--<a href="#" class="top-popup__item">--}}
                     {{--<p>{{$warn->category->name_tk}}</p>--}}
                 {{--</a>--}}
                 {{--<a href="#" class="top-popup__item" style="background-color: red;">--}}
                     {{--<p>{{$warn->category->name_tk}} - {{$warn->prosent}}%</p>--}}
                 {{--</a>--}}
                 {{--<a href="#" class="top-popup__item" style="background-color: #339433;">--}}
                     {{--<p>{{$warn->category->name_tk}} - {{$warn->prosent}}%</p>--}}
                 {{--</a>--}}
                 {{--<button class="top-popup__close">X</button>--}}
             {{--</section>--}}
         {{--@endforeach--}}
     {{--@endisset--}}

    {{--<header class="header">--}}
        {{--<section class="header__top">--}}
            {{--<div class="header__top-container __container">--}}
                {{--<div class="header__lang lang">--}}
                    {{--<button class="lang__current">--}}
                        {{--<p><a class="nav-link" href="{{ route('locale', 'tk') }}"> TM  </a> </p>--}}
                        {{--<span class="_icon-chevron-down"></span>--}}
                    {{--</button>--}}
                    {{--<ul class="lang__items">--}}
                        {{--<li class="lang__item lang__item_active"><a class="nav-link" href="{{ route('locale', 'tk') }}"> TM  </a></li>--}}
                        {{--<li class="lang__item"><a class="nav-link" href="{{ route('locale', 'ru') }}"> RU  </a></li>--}}
                        {{--<li class="lang__item"><a class="nav-link" href="{{ route('locale', 'en') }}"> EN  </a></li>--}}
                    {{--</ul>--}}


                  {{--  <li class="menu__item">--}}

                        {{--<a class="nav-link" href="{{ route('locale', 'tk') }}"> TM  </a>--}}
                        {{--<a class="nav-link" href="{{ route('locale', 'ru') }}"> RU  </a>--}}
                        {{--<a class="nav-link" href="{{ route('locale', 'en') }}"> EN  </a>--}}

                    {{--</li>--}}


                {{--</div>--}}
                {{--<div class="header__top-menu top-menu">--}}
                    {{--<div class="top-menu__body">--}}
                        {{--<ul class="top-menu__list">--}}
                            {{--<li class="top-menu__links">--}}
                                {{--<a href="#">--}}
                                    {{--<span class="_icon-truck"></span>--}}
                                    {{--<p>Mugt eltip berme</p>--}}
                                {{--</a>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="_icon-wallet"></span>--}}
                                    {{--<p>Amatly töleg hyzmaty</p>--}}
                                {{--</a>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="_icon-sync"></span>--}}
                                    {{--<p>Ýeňillik bilen gaýtaryp almak</p>--}}
                                {{--</a>--}}
                                {{--<a href="{{route('sidedrawer')}}">--}}
                                    {{--<span class="_icon-clothes-hanger"></span>--}}
                                    {{--<p>Ölçegiňize görä</p>--}}
                                {{--</a>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="_icon-registered"></span>--}}
                                    {{--<p>100% ýokary hilli önüm</p>--}}
                                {{--</a>--}}

                                {{--<a href="{{route('mobile')}}">--}}
                                    {{--<span class=""></span>--}}
                                    {{--<p>TMPost-dan Satyn alyň!</p>--}}
                                {{--</a>--}}

                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--<section class="header__navigators">--}}
            {{--<div class="header__navigators-container __container">--}}
                {{--<div style="width:20%;" class="header__logo">--}}
                    {{--<a href="{{ route('main_page') }}"> <img style="width:70%;"--}}
                                                             {{--src="{{ asset('images/logotpmarket.png') }}" alt=""></a>--}}
                {{--</div>--}}


                {{--<div class="header__search">--}}
                    {{--<form autocomplete="off"  action="{{route('search')}}" method="GET" class="search-form">--}}

                        {{--<div class="header__search-input">--}}
                            {{--<input type="text" name="query" id="query"  value="{{request()->input('query')}}"/>--}}
                        {{--</div>--}}

                        {{--<button class="_icon-search" type="submit"></button>--}}

                    {{--</form>--}}
                {{--</div>--}}

            {{--                <div class="header__search">--}}
            {{--                    <button class="_icon-search"></button>--}}
            {{--                    <div class="header__search-input">--}}
            {{--                        <form autocomplete="off"  action="{{route('search')}}" method="GET" class="search-form">--}}
            {{--                            <input type="text" name="query"  id="query" value="{{request()->input('query')}}"/>--}}
            {{--                        </form>--}}

            {{--                    </div>--}}
            {{--                </div>--}}




            {{--<!--Make sure the form has the autocomplete function switched off:-->--}}



                {{--<div class="header__nav-links">--}}

                    {{--@if(Auth::user())--}}
                        {{--<a href="{{ route('wishlist.index') }}" class="_icon-heart">--}}

                            {{--@isset(Auth::user()->wishlist)--}}
                                {{--@if(Auth::user()->wishlist->count())--}}
                                    {{--{{Auth::user()->wishlist->count()}}--}}
                                {{--@endif--}}
                            {{--@endisset--}}

                        {{--</a>--}}
                    {{--@else--}}
                        {{--<a href="#" class="_icon-heart js-show-log-and-reg">--}}
                        {{--<a href="{{ route('wishlist.index') }}" class="_icon-heart">--}}
                            {{--@php--}}

                                {{--if(!isset($_COOKIE['wishlists'])) {--}}
                                    {{--setcookie('wishlists', '[]');--}}
                                    {{--$_COOKIE['wishlists'] = '[]';--}}
                                {{--}--}}

                            {{--echo count(json_decode($_COOKIE['wishlists'], true));--}}

                            {{--@endphp--}}

                        {{--</a>--}}
                    {{--@endif--}}


                    {{--@guest--}}
                        {{--<a href="{{route('login')}}" class="_icon-user js-show-log-and-reg"></a>--}}
                        {{--<a href="#" class="_icon-user js-show-log-and-reg"></a>--}}
                        {{--@if (Route::has('register'))--}}
                            {{--<a href="#" class="_icon-registered js-show-log-and-reg"></a>--}}
                        {{--@endif--}}
                    {{--@else--}}
                        {{--<a href="{{ route('home') }}" class="_icon-user">{{Auth::user()->name}}</a>--}}

                        {{--<a href="{{ route('logout') }}" onclick="event.preventDefault();--}}
                                {{--document.getElementById('logout-form').submit();"--}}
                        {{--><img width="20" height="20" src="{{asset('images/lock.png')}}"> </a>--}}
                    {{--@endguest--}}
                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                    {{--</form>--}}

                    {{--<a href="{{ route('cart') }}" class="_icon-shopping-cart"><span--}}
                                {{--id="cart-count">{{session('cartCount')}}</span></a>--}}
                {{--</div>--}}
                {{--<div class="header__burger">--}}
                    {{--<span></span>--}}
                    {{--<span></span>--}}
                    {{--<span></span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}

        {{--<section class="header__menu menu">--}}
            {{--<div class="menu__container __container">--}}
                {{--<div class="menu__body">--}}

                    {{--<ul class="menu__list">--}}
                        {{--<li class="menu__item">--}}
                            {{--<a href="{{ route('getNewProds') }}" class="menu__link menu__link_hot">Täze</a>--}}
                        {{--</li>--}}

                        {{--@isset($categories)--}}
                            {{--@foreach ($categories as $category)--}}
                                {{--@if($category->status == 1)--}}

                                    {{--<li class="menu__item">--}}
                                        {{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}"--}}
                                           {{--class="menu__link menu__link_hot">{{ $category->name_tk }}</a>--}}
                                    {{--</li>--}}

                                {{--@endif--}}
                            {{--@endforeach--}}

                        {{--@endisset--}}

                        {{--<li class="menu__item">--}}
                            {{--<a href="{{ route('news') }}" class="menu__link menu__link_hot">HABAR</a>--}}

                        {{--</li>--}}

                        {{--<li class="menu__item">--}}
                            {{--<a href="#" class="menu__link menu__link_hot">@lang('site.hello')</a>--}}


                        {{--</li>--}}
                        {{--<li class="menu__item">--}}

                            {{--<a class="nav-link" href="{{ route('locale', 'tk') }}"> TM  </a>--}}
                            {{--<a class="nav-link" href="{{ route('locale', 'ru') }}"> RU  </a>--}}
                            {{--<a class="nav-link" href="{{ route('locale', 'en') }}"> EN  </a>--}}

                        {{--</li>--}}

                    {{--</ul>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}



    {{--</header>--}}

    {{--<main class="page">--}}
        {{--<section class="marquee">--}}

            {{--@isset($categories)--}}
                {{--@foreach ($categories as $category)--}}
                    {{--  @if($category->status == 1)--}}

                    {{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}"--}}
                       {{--class="marquee__links">{{ $category->name_tk }}</a>--}}


                    {{--@endif--}}
                {{--@endforeach--}}
            {{--@endisset--}}


        {{--</section>--}}


        {{--@yield('content')--}}


        {{--<footer class="footer">--}}
            {{--<div class="footer__container __container">--}}
                {{--<div class="footer__top-menu">--}}
                    {{--<div class="footer__contacts">--}}
                        {{--<div class="footer__number">--}}

                            {{--<a href="tel:+993 (12) 92 14 95" class="phone">+993 (12) 92-14-95 </a>--}}
                        {{--</div>--}}
                        {{--<a href="mailto:post.market@online.tm" class="footer__link">post.market@online.tm</a>--}}
                        {{--<div class="footer__media">--}}
                            {{--<a href="#" class="_icon-facebook-square-brands"></a>--}}
                            {{--<a href="#" class="_icon-instagram-square-brands"></a>--}}
                            {{--<a href="#" class="_icon-youtube-square-brands"></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    {{--@isset($categories)--}}
                        {{--<div class="footer__links footer__links_double-row">--}}
                            {{--<div class="footer__links-title">Kategoriýalar</div>--}}
                            {{--<ul>--}}


                                {{--@foreach ($categories as $category)--}}
                                    {{--@if($category->status == 1)--}}
                                        {{--<li>--}}
                                            {{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}">{{ $category->name_tk }}</a>--}}
                                        {{--</li>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}

                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--@endisset--}}



                    {{--<div class="footer__app-link">--}}
                        {{--<div class="footer__app-link-app">--}}
                            {{--<a href="#">--}}
                                {{--<img src="--}}
                                {{--{{asset('img/img/app-store.png')}}" alt=""/>--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<img src="--}}
                                {{--{{asset('img/img/google-play.png')}}" alt=""/>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="footer__app-card">--}}
                            {{--<h2>Бонусная программа Intertop PLUS</h2>--}}
                            {{--<a href="#">--}}
                                {{--<img src="--}}
                                {{--{{asset('img/img/mastercard.jpg')}}" alt=""/>--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<img src="--}}
                                {{--{{asset('img/img/visa.jpg')}}" alt=""/>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="footer__bot">--}}
                    {{--<div class="footer__bot-title">2021 Все права защищены</div>--}}
                    {{--<a href="#" class="footer__link">Публичная оферта</a>--}}
                    {{--<a href="#" class="footer__link">Карта сайты</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</footer>--}}


        {{--<div class="sticky-box">--}}
            {{--<div class="sticky-box__container __container">--}}
                {{--<div class="sticky-box__row">--}}
                    {{--<div class="sticky-box__item sticky-box__item_gift">--}}
                        {{--<button class="_icon-gift js-show-hocu-skidku"></button>--}}
                    {{--</div>--}}
                    {{--<div class="sticky-box__item">--}}

                        {{--<a href="tel:+993 (12) 92 14 95">--}}
                            {{--<button class="_icon-phone"></button>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="sticky-box__item">--}}
                        {{--<a href="mailto:post.market@online.tm">--}}
                            {{--<button class="letter">--}}
                                {{--<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg"--}}
                                     {{--xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36.78 25.8"--}}
                                     {{--style="enable-background:new 0 0 36.78 25.8;" xml:space="preserve">--}}
                {{--<style type="text/css">--}}
                    {{--.st0 {--}}
                        {{--fill: #464545;--}}
                    {{--}--}}

                    {{--.st1 {--}}
                        {{--fill: #FFFFFF;--}}
                    {{--}--}}
                {{--</style>--}}
                                    {{--<g>--}}
                                        {{--<path class="st0" d="M31.24,0.1H5.58c-3.02,0-5.5,2.47-5.5,5.5v14.66c0,3.02,2.47,5.5,5.5,5.5h25.65c3.02,0,5.5-2.47,5.5-5.5V5.6--}}
		{{--C36.73,2.57,34.26,0.1,31.24,0.1z"/>--}}
                                        {{--<g>--}}
                                            {{--<g>--}}
                                                {{--<path class="st1" d="M29.13,9.28c-0.31-0.38-0.89-0.44-1.29-0.15l-9.44,6.9l-9.46-6.8c-0.4-0.29-0.98-0.22-1.28,0.16--}}
				{{--c-0.16,0.2-0.21,0.44-0.17,0.66c-0.01,0.27,0.1,0.54,0.34,0.72l10.58,7.61l10.56-7.71c0.24-0.18,0.35-0.45,0.34-0.72--}}
				{{--C29.35,9.72,29.3,9.48,29.13,9.28z"/>--}}
                                            {{--</g>--}}
                                        {{--</g>--}}
                                        {{--<g>--}}
                                            {{--<g>--}}
                                                {{--<path class="st1" d="M29.28,9.16c-0.32-0.38-0.9-0.45-1.3-0.15L18.41,16L8.81,9.1C8.41,8.8,7.82,8.88,7.51,9.26--}}
				{{--C7.35,9.46,7.3,9.7,7.34,9.93c-0.01,0.27,0.1,0.55,0.35,0.73l10.73,7.72l10.71-7.82c0.25-0.18,0.35-0.45,0.34-0.73--}}
				{{--C29.5,9.6,29.45,9.35,29.28,9.16z"/>--}}
                                            {{--</g>--}}
                                        {{--</g>--}}
                                    {{--</g>--}}
              {{--</svg>--}}
                            {{--</button>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="sticky-box__item sticky-box__item_to-top">--}}
                        {{--<button class="_icon-chevron-down" id="scrollTop" onclick="topFunction()"></button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<section class="shadow-overlay js-pop-up" data-pop-up-name="log-in-and-reg">--}}
            {{--<div class="reg-and-log">--}}
                {{--<div class="reg-and-log__wrapper">--}}
                    {{--<div class="reg-and-log__close js-close-button">X</div>--}}
                    {{--<div class="reg-and-log__row">--}}
                        {{--<div class="reg-and-log__mob-nav">--}}
                            {{--<button class="__js-show-reg-area">Зарегистрироваться</button>--}}
                            {{--<button class="__js-show-log-area">Войти</button>--}}
                        {{--</div>--}}

                        {{--<div class="reg-and-log__column">--}}

                            {{--<div class="reg-and-log__show-area __js-nav-reg-area">--}}
                                {{--<h3>Я новый пользователь </h3>--}}
                                {{--<h5>Отслеживай заказы и накапливай бонусы в личном кабинете</h5>--}}
                                {{--<button class="reg-and-log__show-area-button __js-show-reg-area">Зарегистрироваться--}}
                                {{--</button>--}}
                            {{--</div>--}}

                            {{--<div class="reg-and-log__reg-area __js-reg-area">--}}

                                {{--<form action="{{ route('verif-registrasion') }}" method="POST"--}}
                                      {{--enctype="multipart/form-data">--}}
                                    {{--@csrf--}}
                                    {{--<h3>Я новый пользователь </h3>--}}
                                    {{--<h5>Отслеживай заказы и накапливай бонусы в личном кабинете</h5>--}}

                                    {{--<div class="reg-and-log__form">--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>E-mail</span>--}}
                                            {{--<input type="email" id="email" name="email" value="{{ old('email') }}"--}}
                                                   {{--placeholder="Email" class="@error('email') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('email')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}


                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Имья</span>--}}
                                            {{--<input type="text" id="name" name="name" value="{{ old('name') }}" required--}}
                                                   {{--placeholder="Имья *" class="@error('name') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('name')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Фамилия</span>--}}
                                            {{--<input type="text" id="surname" name="surname" value="{{ old('surname') }}"--}}
                                                   {{--required placeholder="Фамилия *"--}}
                                                   {{--class="@error('surname') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('surname')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}


                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Отчество</span>--}}
                                            {{--<input type="text" id="middlename" name="middlename"--}}
                                                   {{--value="{{ old('middlename') }}" required placeholder="Отчество *"--}}
                                                   {{--class="@error('middlename') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('middlename')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>День рождения</span>--}}
                                            {{--<input type="text"--}}
                                                   {{--onblur="( !this.value ? this.type='text' : this.type='date')"--}}
                                                   {{--id="birthday" name="birthday" value="{{ old('birthday') }}"--}}
                                                   {{--placeholder="Doglan senesi *"--}}
                                                   {{--class="@error('birthday') is-invalid @enderror" required>--}}
                                        {{--</div>--}}

                                        {{--@error('birthday')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Логин</span>--}}
                                            {{--<input type="text" id="login" name="login"--}}
                                                   {{--value="{{ old('login') }}" required placeholder="Логин *"--}}
                                                   {{--class="@error('login') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('login')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Адрес</span>--}}
                                            {{--<input type="text" id="address" name="address"--}}
                                                   {{--value="{{ old('address') }}" required placeholder="Адрес *"--}}
                                                   {{--class="@error('address') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('address')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Номер телефона</span>--}}
                                            {{--<input type="tel" minlength="8" maxlength="8" id="tel" name="phone"--}}
                                                   {{--value="{{ old('phone') }}" required placeholder="Telefon belgisi *"--}}
                                                   {{--class="@error('password') is-invalid @enderror">--}}
                                        {{--</div>--}}

                                        {{--@error('phone')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Пароль</span>--}}
                                            {{--<input type="password" id="password" name="password" required--}}
                                                   {{--placeholder="Parol *" class="@error('password') is-invalid @enderror"--}}
                                                   {{--autocomplete="new-password">--}}
                                            {{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
                                        {{--</div>--}}
                                        {{--@error('password')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Подвердите пароль </span>--}}
                                            {{--<input type="password" id="password-confirm" name="password_confirmation"--}}
                                                   {{--required placeholder="Paroly gaýtadan ýaz *"--}}
                                                   {{--autocomplete="new-password">--}}
                                            {{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
                                        {{--</div>--}}


                                    {{--</div>--}}
                                    {{--<div class="reg-and-log__checkbox">--}}
                                        {{--<label>--}}

                                            {{--<input type="checkbox" id="random-password">--}}
                                            {{--<span></span>--}}
                                            {{--<p>Сгенерировать пароль за меня</p>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="reg-and-log__checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox">--}}
                                            {{--<span></span>--}}
                                            {{--<p>Я соглашаюсь с условиями договора публичной оферты, возврата и--}}
                                                {{--безопасности</p>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<button type="submit">Зарегистрироваться</button>--}}
                                    {{--<input type="submit" name="" value="Зарегистрироваться">--}}
                                {{--</form>--}}
                            {{--</div>--}}


                        {{--</div>--}}
                        {{--<div class="reg-and-log__column">--}}
                            {{--<div class="reg-and-log__show-area __js-nav-log-area">--}}
                                {{--<h3>Я уже зарегистрирован</h3>--}}
                                {{--<h5>Войти, чтобы быстрее оформить заказ и отслеживать его в личном кабинете</h5>--}}
                                {{--<button class="reg-and-log__show-area-button __js-show-log-area">Войти</button>--}}
                            {{--</div>--}}


                            {{--<div class="reg-and-log__reg-area __js-log-area">--}}
                                {{--<h3>Я уже зарегистрирован</h3>--}}
                                {{--<h5>Войти, чтобы быстрее оформить заказ и отслеживать его в личном кабинете</h5>--}}
                                {{--<div class="reg-and-log__form">--}}


                                    {{--<form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">--}}
                                        {{--@csrf--}}
                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>E-mail</span>--}}
                                            {{--<input type="email" name="email" value="{{ old('email') }}" id="email"--}}
                                                   {{--required placeholder="Email"--}}
                                                   {{--class="input-login @error('email') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('email')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Пароль</span>--}}
                                            {{--<input type="password" name="password" id="password" required--}}
                                                   {{--placeholder="Parol *" autocomplete="current-password">--}}
                                            {{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
                                        {{--</div>--}}

                                        {{--@error('password')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}
                                        {{--<div class="reg-and-log__forgot-pass js-close-button __js-forgot-pass">Забыл--}}
                                            {{--пароль?--}}
                                        {{--</div>--}}
                                        {{--<button>Войти</button>--}}

                                    {{--</form>--}}

                                {{--</div>--}}

                            {{--</div>--}}


                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}


        {{--<section class="shadow-overlay   js-pop-up_skidku" data-pop-up-name="hocu-skidku">--}}
            {{--<div class="reg-and-log">--}}
                {{--<div class="reg-and-log__wrapper">--}}
                    {{--<div class="reg-and-log__close js-close-button_ocur">X</div>--}}

                    {{--@isset($warns)--}}
                        {{--@foreach ($warns as $warn)--}}
                            {{--<div class="reg-and-log__row">--}}

                                {{--<div class="reg-and-log__column">--}}
                                    {{--<div class="reg-and-log__reg-area">--}}
                                        {{--<img src="{{ asset($warn->img) }}" width="600" height="400" alt="">--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                                {{--<div class="reg-and-log__column">--}}
                                    {{--<div class="reg-and-log__reg-area">--}}
                                        {{--<h5>Хочу скидку!</h5>--}}

                                        {{--<h5>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h5>--}}

                                        {{--<a class="menu-item"--}}
                                           {{--href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>--}}
                                            {{--<h3>{{$warn->category->name_tk}}</h3></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--@endisset--}}


                {{--</div>--}}
            {{--</div>--}}


        {{--</section>--}}


        {{--<div>--}}

            {{--<!-- Modal content -->--}}
            {{-- <div>--}}
                 {{--<div     class="col-md-12">--}}
                     {{--<div class="text-center">--}}
                         {{--<h2>Хочу скидку</h2>--}}
                     {{--</div>--}}
                     {{--@isset($warns)--}}
                         {{--@foreach ($warns as $warn)--}}
                             {{--<div class="col-md-6 left-side-div">--}}
                                 {{--<img src="{{ asset($warn->img) }}" height="100" alt="">--}}
                             {{--</div>--}}

                             {{--<div class="col-md-6 right-side-div">--}}
                                 {{--<h4>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h4>--}}

                                 {{--<a class="menu-item" href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>{{$warn->category->name_tk}}</a>--}}
                             {{--</div>--}}
                         {{--@endforeach--}}
                     {{--@endisset--}}
                 {{--</div>--}}

             {{--</div>--}}


        {{--</div>--}}

    {{--</main>--}}

    {{--hemme zat sun icinde--}}
{{--</div>--}}

{{--<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>--}}
{{--<script src="{{asset('js/slick.min.js')}}"></script>--}}
{{--<script src="{{asset('js/jquery.marquee.min.js')}}"></script>--}}
{{--<script src="{{asset('js/swiper-bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('js/isotope-docs.min.js')}}"></script>--}}
{{--<script src="{{asset('js/scripts.js')}}"></script>--}}
{{--<script src="{{asset('js/sliders.js')}}"></script>--}}


{{--<script src="{{asset('js/old/addToCart.js')}}"></script>--}}
{{--<script src="{{ asset('js/old/plusToCart.js') }}"></script>--}}

{{--<script src="{{asset('js/old/deleteFromCart.js')}}"></script>--}}
{{--<script src="{{asset('js/old/subtractFromCart.js')}}"></script>--}}


{{--<script>--}}
    {{--function autocomplete(inp, arr) {--}}
        {{--/*the autocomplete function takes two arguments,--}}
        {{--the text field element and an array of possible autocompleted values:*/--}}
        {{--var currentFocus;--}}
        {{--/*execute a function when someone writes in the text field:*/--}}
        {{--inp.addEventListener("input", function(e) {--}}
            {{--var a, b, i, val = this.value;--}}
            {{--/*close any already open lists of autocompleted values*/--}}
            {{--closeAllLists();--}}
            {{--if (!val) { return false;}--}}
            {{--currentFocus = -1;--}}
            {{--/*create a DIV element that will contain the items (values):*/--}}
            {{--a = document.createElement("DIV");--}}
            {{--a.setAttribute("id", this.id + "autocomplete-list");--}}
            {{--a.setAttribute("class", "autocomplete-items");--}}
            {{--/*append the DIV element as a child of the autocomplete container:*/--}}
            {{--this.parentNode.appendChild(a);--}}
            {{--/*for each item in the array...*/--}}
            {{--for (i = 0; i < arr.length; i++) {--}}
                {{--/*check if the item starts with the same letters as the text field value:*/--}}
                {{--if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {--}}
                    {{--/*create a DIV element for each matching element:*/--}}
                    {{--b = document.createElement("DIV");--}}
                    {{--/*make the matching letters bold:*/--}}
                    {{--b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";--}}
                    {{--b.innerHTML += arr[i].substr(val.length);--}}
                    {{--/*insert a input field that will hold the current array item's value:*/--}}
                    {{--b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";--}}
                    {{--/*execute a function when someone clicks on the item value (DIV element):*/--}}
                    {{--b.addEventListener("click", function(e) {--}}
                        {{--/*insert the value for the autocomplete text field:*/--}}
                        {{--inp.value = this.getElementsByTagName("input")[0].value;--}}
                        {{--/*close the list of autocompleted values,--}}
                        {{--(or any other open lists of autocompleted values:*/--}}
                        {{--closeAllLists();--}}
                    {{--});--}}
                    {{--a.appendChild(b);--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
        {{--/*execute a function presses a key on the keyboard:*/--}}
        {{--inp.addEventListener("keydown", function(e) {--}}
            {{--var x = document.getElementById(this.id + "autocomplete-list");--}}
            {{--if (x) x = x.getElementsByTagName("div");--}}
            {{--if (e.keyCode == 40) {--}}
                {{--/*If the arrow DOWN key is pressed,--}}
                {{--increase the currentFocus variable:*/--}}
                {{--currentFocus++;--}}
                {{--/*and and make the current item more visible:*/--}}
                {{--addActive(x);--}}
            {{--} else if (e.keyCode == 38) { //up--}}
                {{--/*If the arrow UP key is pressed,--}}
                {{--decrease the currentFocus variable:*/--}}
                {{--currentFocus--;--}}
                {{--/*and and make the current item more visible:*/--}}
                {{--addActive(x);--}}
            {{--} else if (e.keyCode == 13) {--}}
                {{--/*If the ENTER key is pressed, prevent the form from being submitted,*/--}}
                {{--e.preventDefault();--}}
                {{--if (currentFocus > -1) {--}}
                    {{--/*and simulate a click on the "active" item:*/--}}
                    {{--if (x) x[currentFocus].click();--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
        {{--function addActive(x) {--}}
            {{--/*a function to classify an item as "active":*/--}}
            {{--if (!x) return false;--}}
            {{--/*start by removing the "active" class on all items:*/--}}
            {{--removeActive(x);--}}
            {{--if (currentFocus >= x.length) currentFocus = 0;--}}
            {{--if (currentFocus < 0) currentFocus = (x.length - 1);--}}
            {{--/*add class "autocomplete-active":*/--}}
            {{--x[currentFocus].classList.add("autocomplete-active");--}}
        {{--}--}}
        {{--function removeActive(x) {--}}
            {{--/*a function to remove the "active" class from all autocomplete items:*/--}}
            {{--for (var i = 0; i < x.length; i++) {--}}
                {{--x[i].classList.remove("autocomplete-active");--}}
            {{--}--}}
        {{--}--}}
        {{--function closeAllLists(elmnt) {--}}
            {{--/*close all autocomplete lists in the document,--}}
            {{--except the one passed as an argument:*/--}}
            {{--var x = document.getElementsByClassName("autocomplete-items");--}}
            {{--for (var i = 0; i < x.length; i++) {--}}
                {{--if (elmnt != x[i] && elmnt != inp) {--}}
                    {{--x[i].parentNode.removeChild(x[i]);--}}
                {{--}--}}
            {{--}--}}
        {{--}--}}
        {{--/*execute a function when someone clicks in the document:*/--}}
        {{--document.addEventListener("click", function (e) {--}}
            {{--closeAllLists(e.target);--}}
        {{--});--}}
    {{--}--}}

    {{--/*An array containing all the country names in the world:*/--}}
    {{--var countries = [--}}
        {{--@isset($all_products)--}}
                {{--@foreach($all_products as $product)--}}
            {{--"{{$product->name_tk}}",--}}
        {{--@endforeach--}}
        {{--@endisset--}}



    {{--];--}}

    {{--/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/--}}
    {{--autocomplete(document.getElementById("query"), countries);--}}
{{--</script>--}}

{{--<script src="{{asset('js/langDropdown.js')}}"></script>--}}
{{--<script src="{{asset('js/showHideMainMenu.js')}}"></script>--}}



{{--@livewireScripts--}}
{{--@livewireScripts--}}
{{--</body>--}}
{{--</html>--}}





{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
    {{--<meta charset="UTF-8"/>--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge"/>--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0"/>--}}

    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    {{--<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}"/>--}}
    {{--<title>{{ isset($title) ? $title : 'TurkmenPostMarket'}}</title>--}}
    {{--<link rel="stylesheet" href="{{asset('css/style.css')}}"/>--}}



    {{--@livewireStyles--}}

    {{--<style>--}}
        {{--.pereloader {--}}
            {{--position: fixed;--}}
            {{---webkit-transition: 0.3s;--}}
            {{--transition: 0.3s;--}}
            {{--top: 0;--}}
            {{--left: 0;--}}
            {{--bottom: 0;--}}
            {{--right: 0;--}}
            {{--background-color: #fff;--}}
            {{--z-index: 99999999999999;--}}
            {{--visibility: visible;--}}
            {{--opacity: 1;--}}
        {{--}--}}

        {{--.pereloader span {--}}
            {{--display: block;--}}
            {{--position: absolute;--}}
            {{--top: 50%;--}}
            {{--left: 50%;--}}
            {{---webkit-transform: translate(-50%, -50%);--}}
            {{--transform: translate(-50%, -50%);--}}
            {{--border: 2px solid #000;--}}
            {{--border-left-color: #fff;--}}
            {{--border-radius: 50%;--}}
            {{---webkit-animation: load 1s infinite linear;--}}
            {{--animation: load 1s infinite linear;--}}
        {{--}--}}

        {{--@-webkit-keyframes load {--}}
            {{--100% {--}}
                {{---webkit-transform: translate(-50%, -50%) rotate(365deg);--}}
                {{--transform: translate(-50%, -50%) rotate(365deg);--}}
            {{--}--}}
        {{--}--}}

        {{--@keyframes load {--}}
            {{--100% {--}}
                {{---webkit-transform: translate(-50%, -50%) rotate(365deg);--}}
                {{--transform: translate(-50%, -50%) rotate(365deg);--}}
            {{--}--}}
        {{--}--}}

        {{--@-webkit-keyframes load-reverce {--}}
            {{--100% {--}}
                {{---webkit-transform: translate(-50%, -50%) rotate(-365deg);--}}
                {{--transform: translate(-50%, -50%) rotate(-365deg);--}}
            {{--}--}}
        {{--}--}}

        {{--@keyframes load-reverce {--}}
            {{--100% {--}}
                {{---webkit-transform: translate(-50%, -50%) rotate(-365deg);--}}
                {{--transform: translate(-50%, -50%) rotate(-365deg);--}}
            {{--}--}}
        {{--}--}}

        {{--.pereloader span:nth-child(1) {--}}
            {{--width: 60px;--}}
            {{--height: 60px;--}}
        {{--}--}}

        {{--.pereloader span:nth-child(2) {--}}
            {{--width: 50px;--}}
            {{--height: 50px;--}}
            {{---webkit-animation-name: load-reverce;--}}
            {{--animation-name: load-reverce;--}}
        {{--}--}}

        {{--body.loaded .pereloader {--}}
            {{--visibility: hidden;--}}
            {{--opacity: 0;--}}
        {{--}--}}
    {{--</style>--}}
    {{--@livewireStyles--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="pereloader">--}}
    {{--<span></span>--}}
    {{--<span></span>--}}
{{--</div>--}}

{{--<div class="wrapper">--}}
    {{--hemme zat sun icinde--}}


   {{-- @isset($warns)--}}
        {{--@foreach ($warns as $warn)--}}
            {{--<section class="top-popup">--}}
                {{--<a href="#" class="top-popup__item">--}}
                    {{--<p>{{$warn->category->name_tk}}</p>--}}
                {{--</a>--}}
                {{--<a href="#" class="top-popup__item" style="background-color: red;">--}}
                    {{--<p>{{$warn->category->name_tk}} - {{$warn->prosent}}%</p>--}}
                {{--</a>--}}
                {{--<a href="#" class="top-popup__item" style="background-color: #339433;">--}}
                    {{--<p>{{$warn->category->name_tk}} - {{$warn->prosent}}%</p>--}}
                {{--</a>--}}
                {{--<button class="top-popup__close">X</button>--}}
            {{--</section>--}}
        {{--@endforeach--}}
    {{--@endisset--}}

    {{--<header class="header">--}}
        {{--<section class="header__top">--}}
            {{--<div class="header__top-container __container">--}}
                {{--<div class="header__lang lang">--}}
                    {{--<!-- <button class="lang__current">--}}
                        {{--<p>Rus </p>--}}
                        {{--<span class="_icon-chevron-down"></span>--}}
                    {{--</button>--}}
                    {{--<ul class="lang__items">--}}
                        {{--<li class="lang__item lang__item_active">Rus</li>--}}
                        {{--<li class="lang__item">Eng</li>--}}
                        {{--<li class="lang__item">Tm</li>--}}
                    {{--</ul> -->--}}
                {{--</div>--}}
                {{--<div class="header__top-menu top-menu">--}}
                    {{--<div class="top-menu__body">--}}
                        {{--<ul class="top-menu__list">--}}
                            {{--<li class="top-menu__links">--}}
                                {{--<a href="#">--}}
                                    {{--<span class="_icon-truck"></span>--}}
                                    {{--<p>Mugt eltip berme</p>--}}
                                {{--</a>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="_icon-wallet"></span>--}}
                                    {{--<p>Amatly töleg hyzmaty</p>--}}
                                {{--</a>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="_icon-sync"></span>--}}
                                    {{--<p>Ýeňillik bilen gaýtaryp almak</p>--}}
                                {{--</a>--}}
                                {{--<a href="{{route('sidedrawer')}}">--}}
                                    {{--<span class="_icon-clothes-hanger"></span>--}}
                                    {{--<p>Ölçegiňize görä</p>--}}
                                {{--</a>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="_icon-registered"></span>--}}
                                    {{--<p>100% ýokary hilli önüm</p>--}}
                                {{--</a>--}}

                                {{--<a href="#">--}}
                                    {{--<span class=""></span>--}}
                                    {{--<p>TMPost-dan Satyn alyň!</p>--}}
                                {{--</a>--}}

                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--<section class="header__navigators">--}}
            {{--<div class="header__navigators-container __container">--}}
                {{--<div style="width:20%;" class="header__logo">--}}
                    {{--<a href="{{ route('main_page') }}"> <img style="width:70%;"--}}
                                                             {{--src="{{ asset('images/logotpmarket.png') }}" alt=""></a>--}}
                {{--</div>--}}



                {{--<div class="header__search">--}}
                    {{--<button class="_icon-search"></button>--}}
                    {{--<div class="header__search-input">--}}
                        {{--<form action="{{route('search')}}" method="GET" class="search-form">--}}
                            {{--<input type="text" name="query" id="query" value="{{request()->input('query')}}"/>--}}
                        {{--</form>--}}

                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="header__nav-links">--}}

                    {{--@if(Auth::user())--}}
                        {{--<a href="{{ route('wishlist.index') }}" class="_icon-heart">--}}

                            {{--@isset(Auth::user()->wishlist)--}}
                                {{--@if(Auth::user()->wishlist->count())--}}
                                    {{--{{Auth::user()->wishlist->count()}}--}}
                                {{--@endif--}}
                            {{--@endisset--}}

                        {{--</a>--}}
                    {{--@else--}}
                        {{--<a href="#" class="_icon-heart js-show-log-and-reg">--}}
                        {{--<a href="{{ route('wishlist.index') }}" class="_icon-heart">--}}
                            {{--@php--}}

                                {{--if(!isset($_COOKIE['wishlists'])) {--}}
                                    {{--setcookie('wishlists', '[]');--}}
                                    {{--$_COOKIE['wishlists'] = '[]';--}}
                                {{--}--}}

                            {{--echo count(json_decode($_COOKIE['wishlists'], true));--}}

                            {{--@endphp--}}

                        {{--</a>--}}
                    {{--@endif--}}


                    {{--@guest--}}
                        {{--<a href="{{route('login')}}" class="_icon-user js-show-log-and-reg"></a>--}}
                        {{--<a href="#" class="_icon-user js-show-log-and-reg"></a>--}}
                        {{--@if (Route::has('register'))--}}
                            {{--<a href="#" class="_icon-registered js-show-log-and-reg"></a>--}}
                        {{--@endif--}}
                    {{--@else--}}
                        {{--<a href="{{ route('home') }}" class="_icon-user">{{Auth::user()->name}}</a>--}}

                        {{--<a href="{{ route('logout') }}" onclick="event.preventDefault();--}}
                                {{--document.getElementById('logout-form').submit();"--}}
                        {{--><img width="20" height="20" src="{{asset('images/lock.png')}}"> </a>--}}
                    {{--@endguest--}}
                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                    {{--</form>--}}

                    {{--<a href="{{ route('cart') }}" class="_icon-shopping-cart"><span--}}
                                {{--id="cart-count">{{session('cartCount')}}</span></a>--}}
                {{--</div>--}}
                {{--<div class="header__burger">--}}
                    {{--<span></span>--}}
                    {{--<span></span>--}}
                    {{--<span></span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}

        {{--<section class="header__menu menu">--}}
            {{--<div class="menu__container __container">--}}
                {{--<div class="menu__body">--}}

                    {{--<ul class="menu__list">--}}
                        {{--<li class="menu__item">--}}
                            {{--<a href="{{ route('getNewProds') }}" class="menu__link menu__link_hot">Täze</a>--}}
                        {{--</li>--}}

                        {{--@isset($categories)--}}
                            {{--@foreach ($categories as $category)--}}
                                {{--@if($category->status == 1)--}}

                                    {{--<li class="menu__item">--}}
                                        {{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}"--}}
                                           {{--class="menu__link menu__link_hot">{{ $category->name_tk }}</a>--}}
                                    {{--</li>--}}

                                {{--@endif--}}
                            {{--@endforeach--}}

                        {{--@endisset--}}
                        {{--<li class="menu__item">--}}
                            {{--<a href="{{ route('news') }}" class="menu__link menu__link_hot">HABAR</a>--}}

                        {{--</li>--}}

                    {{--</ul>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}

    {{--</header>--}}

    {{--<main class="page">--}}
        {{--<section class="marquee">--}}

            {{--@isset($categories)--}}
                {{--@foreach ($categories as $category)--}}
                    {{--  @if($category->status == 1)--}}

                    {{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}"--}}
                       {{--class="marquee__links">{{ $category->name_tk }}</a>--}}


                    {{--@endif--}}
                {{--@endforeach--}}
            {{--@endisset--}}


        {{--</section>--}}


        {{--@yield('content')--}}


        {{--<footer class="footer">--}}
            {{--<div class="footer__container __container">--}}
                {{--<div class="footer__top-menu">--}}
                    {{--<div class="footer__contacts">--}}
                        {{--<div class="footer__number">--}}

                            {{--<a href="tel:+993 (12) 92 14 95" class="phone">+993 (12) 92-14-95 </a>--}}
                        {{--</div>--}}
                        {{--<a href="mailto:post.market@online.tm" class="footer__link">post.market@online.tm</a>--}}
                        {{--<div class="footer__media">--}}
                            {{--<a href="#" class="_icon-facebook-square-brands"></a>--}}
                            {{--<a href="#" class="_icon-instagram-square-brands"></a>--}}
                            {{--<a href="#" class="_icon-youtube-square-brands"></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    {{--@isset($categories)--}}
                        {{--<div class="footer__links footer__links_double-row">--}}
                            {{--<div class="footer__links-title">Kategoriýalar</div>--}}
                            {{--<ul>--}}


                                {{--@foreach ($categories as $category)--}}
                                    {{--@if($category->status == 1)--}}
                                        {{--<li>--}}
                                            {{--<a href="{{ route('productsByCatalog',['id'=>$category->id]) }}">{{ $category->name_tk }}</a>--}}
                                        {{--</li>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}

                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--@endisset--}}



                    {{--<div class="footer__app-link">--}}
                        {{--<div class="footer__app-link-app">--}}
                            {{--<a href="#">--}}
                                {{--<img src="--}}
                                {{--{{asset('img/img/app-store.png')}}" alt=""/>--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<img src="--}}
                                {{--{{asset('img/img/google-play.png')}}" alt=""/>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="footer__app-card">--}}
                            {{--<h2>Бонусная программа Intertop PLUS</h2>--}}
                            {{--<a href="#">--}}
                                {{--<img src="--}}
                                {{--{{asset('img/img/mastercard.jpg')}}" alt=""/>--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<img src="--}}
                                {{--{{asset('img/img/visa.jpg')}}" alt=""/>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="footer__bot">--}}
                    {{--<div class="footer__bot-title">2021 Все права защищены</div>--}}
                    {{--<a href="#" class="footer__link">Публичная оферта</a>--}}
                    {{--<a href="#" class="footer__link">Карта сайты</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</footer>--}}


        {{--<div class="sticky-box">--}}
            {{--<div class="sticky-box__container __container">--}}
                {{--<div class="sticky-box__row">--}}
                    {{--<div class="sticky-box__item sticky-box__item_gift">--}}
                        {{--<button class="_icon-gift js-show-hocu-skidku"></button>--}}
                    {{--</div>--}}
                    {{--<div class="sticky-box__item">--}}

                        {{--<a href="tel:+993 (12) 92 14 95">--}}
                            {{--<button class="_icon-phone"></button>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="sticky-box__item">--}}
                        {{--<a href="mailto:post.market@online.tm">--}}
                            {{--<button class="letter">--}}
                                {{--<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg"--}}
                                     {{--xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36.78 25.8"--}}
                                     {{--style="enable-background:new 0 0 36.78 25.8;" xml:space="preserve">--}}
                {{--<style type="text/css">--}}
                    {{--.st0 {--}}
                        {{--fill: #464545;--}}
                    {{--}--}}

                    {{--.st1 {--}}
                        {{--fill: #FFFFFF;--}}
                    {{--}--}}
                {{--</style>--}}
                                    {{--<g>--}}
                                        {{--<path class="st0" d="M31.24,0.1H5.58c-3.02,0-5.5,2.47-5.5,5.5v14.66c0,3.02,2.47,5.5,5.5,5.5h25.65c3.02,0,5.5-2.47,5.5-5.5V5.6--}}
		{{--C36.73,2.57,34.26,0.1,31.24,0.1z"/>--}}
                                        {{--<g>--}}
                                            {{--<g>--}}
                                                {{--<path class="st1" d="M29.13,9.28c-0.31-0.38-0.89-0.44-1.29-0.15l-9.44,6.9l-9.46-6.8c-0.4-0.29-0.98-0.22-1.28,0.16--}}
				{{--c-0.16,0.2-0.21,0.44-0.17,0.66c-0.01,0.27,0.1,0.54,0.34,0.72l10.58,7.61l10.56-7.71c0.24-0.18,0.35-0.45,0.34-0.72--}}
				{{--C29.35,9.72,29.3,9.48,29.13,9.28z"/>--}}
                                            {{--</g>--}}
                                        {{--</g>--}}
                                        {{--<g>--}}
                                            {{--<g>--}}
                                                {{--<path class="st1" d="M29.28,9.16c-0.32-0.38-0.9-0.45-1.3-0.15L18.41,16L8.81,9.1C8.41,8.8,7.82,8.88,7.51,9.26--}}
				{{--C7.35,9.46,7.3,9.7,7.34,9.93c-0.01,0.27,0.1,0.55,0.35,0.73l10.73,7.72l10.71-7.82c0.25-0.18,0.35-0.45,0.34-0.73--}}
				{{--C29.5,9.6,29.45,9.35,29.28,9.16z"/>--}}
                                            {{--</g>--}}
                                        {{--</g>--}}
                                    {{--</g>--}}
              {{--</svg>--}}
                            {{--</button>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="sticky-box__item sticky-box__item_to-top">--}}
                        {{--<button class="_icon-chevron-down" id="scrollTop" onclick="topFunction()"></button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<section class="shadow-overlay js-pop-up" data-pop-up-name="log-in-and-reg">--}}
            {{--<div class="reg-and-log">--}}
                {{--<div class="reg-and-log__wrapper">--}}
                    {{--<div class="reg-and-log__close js-close-button">X</div>--}}
                    {{--<div class="reg-and-log__row">--}}
                        {{--<div class="reg-and-log__mob-nav">--}}
                            {{--<button class="__js-show-reg-area">Зарегистрироваться</button>--}}
                            {{--<button class="__js-show-log-area">Войти</button>--}}
                        {{--</div>--}}

                        {{--<div class="reg-and-log__column">--}}

                            {{--<div class="reg-and-log__show-area __js-nav-reg-area">--}}
                                {{--<h3>Я новый пользователь </h3>--}}
                                {{--<h5>Отслеживай заказы и накапливай бонусы в личном кабинете</h5>--}}
                                {{--<button class="reg-and-log__show-area-button __js-show-reg-area">Зарегистрироваться--}}
                                {{--</button>--}}
                            {{--</div>--}}

                            {{--<div class="reg-and-log__reg-area __js-reg-area">--}}

                                {{--<form action="{{ route('verif-registrasion') }}" method="POST"--}}
                                      {{--enctype="multipart/form-data">--}}
                                    {{--@csrf--}}
                                    {{--<h3>Я новый пользователь </h3>--}}
                                    {{--<h5>Отслеживай заказы и накапливай бонусы в личном кабинете</h5>--}}

                                    {{--<div class="reg-and-log__form">--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>E-mail</span>--}}
                                            {{--<input type="email" id="email" name="email" value="{{ old('email') }}"--}}
                                                   {{--placeholder="Email" class="@error('email') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('email')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}


                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Имья</span>--}}
                                            {{--<input type="text" id="name" name="name" value="{{ old('name') }}" required--}}
                                                   {{--placeholder="Имья *" class="@error('name') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('name')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Фамилия</span>--}}
                                            {{--<input type="text" id="surname" name="surname" value="{{ old('surname') }}"--}}
                                                   {{--required placeholder="Фамилия *"--}}
                                                   {{--class="@error('surname') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('surname')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}


                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Отчество</span>--}}
                                            {{--<input type="text" id="middlename" name="middlename"--}}
                                                   {{--value="{{ old('middlename') }}" required placeholder="Отчество *"--}}
                                                   {{--class="@error('middlename') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('middlename')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>День рождения</span>--}}
                                            {{--<input type="text"--}}
                                                   {{--onblur="( !this.value ? this.type='text' : this.type='date')"--}}
                                                   {{--id="birthday" name="birthday" value="{{ old('birthday') }}"--}}
                                                   {{--placeholder="Doglan senesi *"--}}
                                                   {{--class="@error('birthday') is-invalid @enderror" required>--}}
                                        {{--</div>--}}

                                        {{--@error('birthday')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Логин</span>--}}
                                            {{--<input type="text" id="login" name="login"--}}
                                                   {{--value="{{ old('login') }}" required placeholder="Логин *"--}}
                                                   {{--class="@error('login') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('login')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Адрес</span>--}}
                                            {{--<input type="text" id="address" name="address"--}}
                                                   {{--value="{{ old('address') }}" required placeholder="Адрес *"--}}
                                                   {{--class="@error('address') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('address')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Номер телефона</span>--}}
                                            {{--<input type="tel" minlength="8" maxlength="8" id="tel" name="phone"--}}
                                                   {{--value="{{ old('phone') }}" required placeholder="Telefon belgisi *"--}}
                                                   {{--class="@error('password') is-invalid @enderror">--}}
                                        {{--</div>--}}

                                        {{--@error('phone')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Пароль</span>--}}
                                            {{--<input type="password" id="password" name="password" required--}}
                                                   {{--placeholder="Parol *" class="@error('password') is-invalid @enderror"--}}
                                                   {{--autocomplete="new-password">--}}
                                            {{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
                                        {{--</div>--}}
                                        {{--@error('password')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Подвердите пароль </span>--}}
                                            {{--<input type="password" id="password-confirm" name="password_confirmation"--}}
                                                   {{--required placeholder="Paroly gaýtadan ýaz *"--}}
                                                   {{--autocomplete="new-password">--}}
                                            {{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
                                        {{--</div>--}}


                                    {{--</div>--}}
                                    {{--<div class="reg-and-log__checkbox">--}}
                                        {{--<label>--}}

                                            {{--<input type="checkbox" id="random-password">--}}
                                            {{--<span></span>--}}
                                            {{--<p>Сгенерировать пароль за меня</p>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="reg-and-log__checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox">--}}
                                            {{--<span></span>--}}
                                            {{--<p>Я соглашаюсь с условиями договора публичной оферты, возврата и--}}
                                                {{--безопасности</p>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<button type="submit">Зарегистрироваться</button>--}}
                                    {{--<input type="submit" name="" value="Зарегистрироваться">--}}
                                {{--</form>--}}
                            {{--</div>--}}


                        {{--</div>--}}
                        {{--<div class="reg-and-log__column">--}}
                            {{--<div class="reg-and-log__show-area __js-nav-log-area">--}}
                                {{--<h3>Я уже зарегистрирован</h3>--}}
                                {{--<h5>Войти, чтобы быстрее оформить заказ и отслеживать его в личном кабинете</h5>--}}
                                {{--<button class="reg-and-log__show-area-button __js-show-log-area">Войти</button>--}}
                            {{--</div>--}}


                            {{--<div class="reg-and-log__reg-area __js-log-area">--}}
                                {{--<h3>Я уже зарегистрирован</h3>--}}
                                {{--<h5>Войти, чтобы быстрее оформить заказ и отслеживать его в личном кабинете</h5>--}}
                                {{--<div class="reg-and-log__form">--}}


                                    {{--<form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">--}}
                                        {{--@csrf--}}
                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>E-mail</span>--}}
                                            {{--<input type="email" name="email" value="{{ old('email') }}" id="email"--}}
                                                   {{--required placeholder="Email"--}}
                                                   {{--class="input-login @error('email') is-invalid @enderror">--}}
                                        {{--</div>--}}
                                        {{--@error('email')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}

                                        {{--<div class="reg-and-log__form-item">--}}
                                            {{--<span>Пароль</span>--}}
                                            {{--<input type="password" name="password" id="password" required--}}
                                                   {{--placeholder="Parol *" autocomplete="current-password">--}}
                                            {{--<div class="reg-and-log__show-pass __js-show-password">Показать</div>--}}
                                        {{--</div>--}}

                                        {{--@error('password')--}}
                                        {{--<div class="invalid-feedback" role="alert">--}}
                                            {{--<p class="invalid-feedback-p">{{ $message }}</p>--}}
                                        {{--</div>--}}
                                        {{--@enderror--}}
                                        {{--<div class="reg-and-log__forgot-pass js-close-button __js-forgot-pass">Забыл--}}
                                            {{--пароль?--}}
                                        {{--</div>--}}
                                        {{--<button>Войти</button>--}}

                                    {{--</form>--}}

                                {{--</div>--}}

                            {{--</div>--}}


                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}


        {{--<section class="shadow-overlay   js-pop-up_skidku" data-pop-up-name="hocu-skidku">--}}
            {{--<div class="reg-and-log">--}}
                {{--<div class="reg-and-log__wrapper">--}}
                    {{--<div class="reg-and-log__close js-close-button_ocur">X</div>--}}

                    {{--@isset($warns)--}}
                        {{--@foreach ($warns as $warn)--}}
                            {{--<div class="reg-and-log__row">--}}

                                {{--<div class="reg-and-log__column">--}}
                                    {{--<div class="reg-and-log__reg-area">--}}
                                        {{--<img src="{{ asset($warn->img) }}" width="600" height="400" alt="">--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                                {{--<div class="reg-and-log__column">--}}
                                    {{--<div class="reg-and-log__reg-area">--}}
                                        {{--<h5>Хочу скидку!</h5>--}}

                                        {{--<h5>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h5>--}}

                                        {{--<a class="menu-item"--}}
                                           {{--href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>--}}
                                            {{--<h3>{{$warn->category->name_tk}}</h3></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--@endisset--}}


                {{--</div>--}}
            {{--</div>--}}


        {{--</section>--}}


        {{--<div>--}}

            {{--<!-- Modal content -->--}}
            {{-- <div>--}}
                 {{--<div     class="col-md-12">--}}
                     {{--<div class="text-center">--}}
                         {{--<h2>Хочу скидку</h2>--}}
                     {{--</div>--}}
                     {{--@isset($warns)--}}
                         {{--@foreach ($warns as $warn)--}}
                             {{--<div class="col-md-6 left-side-div">--}}
                                 {{--<img src="{{ asset($warn->img) }}" height="100" alt="">--}}
                             {{--</div>--}}

                             {{--<div class="col-md-6 right-side-div">--}}
                                 {{--<h4>Howlugyň, arzanladyş! - {{$warn->prosent}}%</h4>--}}

                                 {{--<a class="menu-item" href={{ route('productsByCatalog',['id'=>$warn->category->id]) }}>{{$warn->category->name_tk}}</a>--}}
                             {{--</div>--}}
                         {{--@endforeach--}}
                     {{--@endisset--}}
                 {{--</div>--}}

             {{--</div>--}}


        {{--</div>--}}

    {{--</main>--}}

    {{--hemme zat sun icinde--}}
{{--</div>--}}

{{--<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>--}}
{{--<script src="{{asset('js/slick.min.js')}}"></script>--}}
{{--<script src="{{asset('js/jquery.marquee.min.js')}}"></script>--}}
{{--<script src="{{asset('js/swiper-bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('js/isotope-docs.min.js')}}"></script>--}}
{{--<script src="{{asset('js/scripts.js')}}"></script>--}}
{{--<script src="{{asset('js/sliders.js')}}"></script>--}}


{{--<script src="{{asset('js/old/addToCart.js')}}"></script>--}}
{{--<script src="{{ asset('js/old/plusToCart.js') }}"></script>--}}

{{--<script src="{{asset('js/old/deleteFromCart.js')}}"></script>--}}
{{--<script src="{{asset('js/old/subtractFromCart.js')}}"></script>--}}

{{--<script src="{{asset('js/langDropdown.js')}}"></script>--}}
{{--<script src="{{asset('js/showHideMainMenu.js')}}"></script>--}}



{{--@livewireScripts--}}
{{--@livewireScripts--}}
{{--</body>--}}
{{--</html>--}}

