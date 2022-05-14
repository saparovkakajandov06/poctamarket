@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/magiczoomplus.css') }}">
@endsection

@section('content')


    <section class="prodict-filters-list">
        <div class="prodict-filters-list__container __container">
            <div class="prodict-filters-list__item">
                <a href="{{ route('main_page') }}">
                    Baş Sahypa
                </a>
            </div>

            <div class="prodict-filters-list__item">
                <a href="{{ route('oneProduct',['id'=>$prod->id]) }}" class="custom-bread-item active-bread">
                    {{ $prod->name_tk }}
                </a>
            </div>



        </div>
    </section>

<section class="product-card">
    <div class="product-card__container __container">
        <div class="product-card__slider-container">
            <section class="product-card__slider card-slider">
                <div class="card-slider__controls">
                    <div class="card-slider__video">
                        <div class="card-slider__video-background">

                            <img src="" alt="">

                        </div>
                        <div class="card-slider__video-controller">
										<span>
											<svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
												<defs>
													<rect id="path-1" x="0" y="0" width="72" height="110"></rect>
												</defs>
												<g id="Product" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<g id="Product-v3" transform="translate(-66.000000, -239.000000)">
														<g id="Bitmap" transform="translate(46.000000, 200.000000)">
															<g id="Icon/Play" stroke="#000000" stroke-width="2.2">
																<g transform="translate(20.000000, 39.000000)">
																	<circle id="Oval" cx="16" cy="16" r="13.9"></circle>
																	<polygon id="Path" stroke-linecap="round" stroke-linejoin="round"
                                                                             transform="translate(17.000000, 16.000000) rotate(-270.000000) translate(-17.000000, -16.000000) "
                                                                             points="22 20 12 20 17 12 19.3678941 15.7886306"></polygon>
																</g>
															</g>
														</g>
													</g>
												</g>
											</svg>
										</span>
                            Wideo
                        </div>
                    </div>
                    <section class="card-slider__vertical card-vertical-slider slider-nav">
                        @foreach($prod->img as $img)
                        <article class="card-vertical-slider__item">
                            <img src="{{ asset('images/products/little/' . $img) }}" alt="">
                        </article>
                        @endforeach
                        {{--  <article class="card-vertical-slider__item">
                                    <img src="{{asset('img/img/listing/p-1-2.jpg')}}" alt="">
                                </article>

                                    <article class="card-vertical-slider__item">
                                  <img src="{{asset('img/img/listing/p-1-3.jpg')}}" alt="">
                              </article>
                              <article class="card-vertical-slider__item">
                                  <img src="{{asset('img/img/listing/p-1-4.jpg')}}" alt="">
                              </article>
                              <article class="card-vertical-slider__item">
                                  <img src="{{asset('img/img/listing/p-1-5.jpg')}}" alt="">
                              </article>--}}
                    </section>
                </div>
                <div class="card-slider__wrapper">
                    <div class="card-video">
                        <div class="card-video__controls">
                            <button class="card-video__play-stop _icon-stop-video"></button>
                            <button class="card-video__resize _icon-resize-video"></button>
                        </div>
                        <video id="video" poster="{{asset('img/img/bg.mp4')}}">
                            <source src="{{asset('img/img/bg.mp4')}}" type="video/mp4">
                        </video>
                    </div>

                    <section class="card-slider__slider slider-for">
                        @foreach($prod->img as $img)
                        <figure class="card-slider__slide">
                            <a href="{{asset('images/products/big/' . $img)}}" data-size="500x1000">
                                <img src="{{asset('images/products/big/' . $img)}}" itemprop="thumbnail" alt="" />
                            </a>
                        </figure>
                        @endforeach

                       {{-- <figure class="card-slider__slide">
                            <a href="{{asset('img/img/listing/p-1-2.jpg')}}" data-size="500x1000">
                                <img src="{{asset('img/img/listing/p-1-2.jpg')}}" itemprop="thumbnail" alt="" />
                            </a>
                        </figure>

                        <figure class="card-slider__slide">
                            <a href="{{asset('img/img/listing/p-1-3.jpg')}}" data-size="500x1000">
                                <img src="{{asset('img/img/listing/p-1-3.jpg')}}" itemprop="thumbnail" alt="" />
                            </a>
                        </figure>--}}


                    </section>

                </div>
            </section>
        </div>
        <div class="product-card__content card-content">
            <div class="card-content__product-name-logo">
                <h1>{{ $prod->name_tk }}</h1>
                <h1>{{ $prod->brand }}</h1>
               {{-- <div class="card-content__logo">
                    <a href="#">
                   {{ $prod->brand }}
                        <img src="{{asset('img/img/product-logo.webp')}}" alt="">
                    </a>
                </div>--}}
            </div>
            <div class="card-content__price-container">
                <p class="card-content__price-overprice">{{number_format($prod->price,2,'.','')}} TMT</p>
                <p class="card-content__price-current card-content__price-current--sale">{{number_format($prod->price,2,'.','')}} TMT</p>
            </div>
            <div class="card-content__product-available">

                <div class="card-content__color-picker-wrapper">
                    <div class="card-content__colors">

                        <star-rating :rating="{{$prod->getStarRating()}}" :star-size="30"></star-rating>
                        <h2>Artikul: {{ $prod->code }}</h2>
                        <rating-form
                                :product="{{$prod}}"
                                url="{{route('rate')}}"
                        ></rating-form>
                    </div>

                </div>




              {{--  <div class="s-14-col-3-sizes width-100">
                    <h5 class="title ">Ölçegi</h5>
                    <div class="pr-loader-container d-flex justify-center aligncenter">
                        <div class="pr-loader"></div>
                    </div>
                    <div class="d-flex sizes-from-laravel flex-wrap">

                    </div>
                </div>--}}

               {{-- <div class="d-flex s-14-col-3-color-outer-container">
                    @isset($colors)
                        @foreach($colors as $c)
                            <div class="s-14-col-3-color-outer">
                                <div class="s-14-col-3-color-inner" data-color="{{$c->color}}" data-id="{{ $c->id }}"></div>
                            </div>
                        @endforeach
                    @endisset
                </div>

                <div class="card-content__color-picker-wrapper">
                    <div class="card-content__colors">

                       @if(isset($prod->colors))
                            <span class="pop-up-basket__info-color-img" style="background-color: #0b0b0b;"></span>
                           @endif

                    </div>

                </div>--}}

                <div class="card-content__size-select-wrapper">
                    <div class="card-content__size-dropdown size-dropdown">
                        <button class="size-dropdown__button">
                            <p>Ölçegiňizi saýlaň</p><span class="_icon-arrow1"></span>
                        </button>

                        <div class="size-dropdown__menu">
                            <ul>

                                <li class="size-dropdown__header">
                                    <span class="size-dropdown__size">M</span>
                                    <span class="size-dropdown_send-message-box">
													<span class="_icon-mail"></span>
													<p>Ammarda bar bolanlar bn habarlaşmak</p>
												</span>
                                </li>

                              {{-- @isset($color_product)
                                   @foreach($color_product as $color)
                                       @if($color->sizes == 'X' or 'M' or 'L' || 'XL')
                                <li>
                                    <span class="size-dropdown__size">{{$color->sizes}}</span>
                                </li>
                                        @endif
                                    @endforeach
                                @endisset--}}

                                <li>
                                    <span class="size-dropdown__size">XS</span>
                                </li>

                                <li>
                                    <span class="size-dropdown__size">S</span>
                                </li>



                                <li>
                                    <span class="size-dropdown__size">L</span>
                                </li>

                                <li>
                                    <span class="size-dropdown__size">XL</span>
                                </li>

                                <li>
                                    <span class="size-dropdown__size">XXL</span>
                                </li>

                                <li>
                                    <span class="size-dropdown__size">XXLS</span>
                                </li>

                                <li>
                                    <span class="size-dropdown__size">XXXL</span>
                                </li>


                            </ul>

                        </div>

                    </div>
                    <div class="card-content__cart-confirmation">

                            @if ($prod->availability == 1)
                        <div class="card-content__cart-confirmation-add-to-card">
                            <a class="add-to-cart" href="#" data-id="{{$prod->id}}">
                            <button type="button">
                                Sebede goş
                                <span>
												<svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
													<g id="Icon/Bag" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<g id="bag-(1)" transform="translate(4.000000, 1.000000)" fill="#fff" fill-rule="nonzero">
															<path
                                                                    d="M11.9375,16.82 C9.07598267,16.8234227 6.61026343,14.8056355 6.0475,12 C6.00347199,11.7099277 6.08905141,11.4151544 6.28157074,11.1937572 C6.47409008,10.9723599 6.75412415,10.8466777 7.0475,10.85 C7.53967974,10.8428441 7.96387262,11.1949242 8.0475,11.68 C8.43567549,13.5327847 10.0694888,14.8597714 11.9625,14.8597714 C13.8555112,14.8597714 15.4893245,13.5327847 15.8775,11.68 C15.9611274,11.1949242 16.3853203,10.8428441 16.8775,10.85 C17.1708759,10.8466777 17.4509099,10.9723599 17.6434293,11.1937572 C17.8359486,11.4151544 17.921528,11.7099277 17.8775,12 C17.3111489,14.8241882 14.8177848,16.847423 11.9375,16.82 L11.9375,16.82 Z"
                                                                    id="Path"></path>
															<path
                                                                    d="M20.8375,30.0000024 L3.0375,30.0000024 C2.21516623,30.0010286 1.42846092,29.6644514 0.861333743,29.0689679 C0.294206563,28.4734843 -0.00361736386,27.6713058 0.0375,26.85 L0.8475,9.61 C0.917152708,8.00412328 2.24011415,6.73849016 3.8475,6.73999865 L20.0275,6.73999865 C21.6348858,6.73849016 22.9578473,8.00412328 23.0275,9.61 L23.8375,26.85 C23.8786174,27.6713058 23.5807934,28.4734843 23.0136663,29.0689679 C22.4465391,29.6644514 21.6598338,30.0010286 20.8375,30.0000024 L20.8375,30.0000024 Z M3.8475,8.75 C3.29521525,8.75 2.8475,9.19771525 2.8475,9.75 L2.0375,26.95 C2.02379421,27.2237686 2.12306885,27.4911614 2.31211125,27.689656 C2.50115364,27.8881505 2.76338874,28.0003429 3.0375,28.0000008 L20.8375,28.0000008 C21.1116113,28.0003429 21.3738464,27.8881505 21.5628888,27.689656 C21.7519311,27.4911614 21.8512058,27.2237686 21.8375,26.95 L21.0275,9.71 C21.0275,9.15771525 20.5797847,8.71 20.0275,8.71 L3.8475,8.75 Z"
                                                                    id="Shape"></path>
															<path
                                                                    d="M17.9375,7.75 L15.9375,7.75 L15.9375,6 C15.9375,3.790861 14.146639,2 11.9375,2 C9.728361,2 7.9375,3.790861 7.9375,6 L7.9375,7.75 L5.9375,7.75 L5.9375,6 C5.9375,2.6862915 8.6237915,-8.8817842e-16 11.9375,-8.8817842e-16 C15.2512085,-8.8817842e-16 17.9375,2.6862915 17.9375,6 L17.9375,7.75 Z"
                                                                    id="Path"></path>
														</g>
													</g>
												</svg>
											</span>
                            </button>
                            </a>
                        </div>
                                @else
                            <div class="card-content__cart-confirmation-add-to-card">

                                    <button type="button">
                                        Ammarda ýok

                                    </button>

                            </div>
                            @endif

                        <div class="card-content__cart-confirmation-add-to-favs">
                            @if(Auth()->user())
                                <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                    {{csrf_field()}}
                                    <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                    <input name="product_id" type="hidden" value="{{$prod->id}}" />
                                    <button type="butoon">
                                        <span class="_icon-heart"></span>
                                    </button>
                                </form>
                            @else
                                {{--<a href="{{route('login')}}">
                                    <button type="butoon">
                                        <span class="_icon-heart"></span>
                                    </button>
                                </a>--}}
                                <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                    {{csrf_field()}}
                                    <input name="product_id" type="hidden" value="{{$prod->id}}" />
                                    <button type="butoon">
                                        <span class="_icon-heart"></span>
                                    </button>
                                </form>
                            @endif

                        </div>
                    </div>
                    <div class="card-content__delivery-section">
                        <div class="card-content__delivery-section-item">
										<span>

                                            <svg class="SVGInline-svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
												<g id="Icon/Time" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<g transform="translate(1.000000, 1.000000)" fill-rule="nonzero" id="Path">
														<path
                                                                d="M16.5007734,18.4379336 L17.5245039,19.8143945 C18.0204063,19.4455508 18.4886797,19.0317187 18.9162617,18.5843711 L17.6761836,17.3991211 C17.3150313,17.7769453 16.9195469,18.1264961 16.5007734,18.4379336 Z"
                                                                fill="#000000"></path>
														<path
                                                                d="M13.7167852,19.8520352 L14.2231289,21.4909922 C14.8138203,21.3085039 15.3933398,21.0737656 15.9454453,20.7932227 L15.1683984,19.2639219 C14.7029609,19.5003789 14.2145781,19.69825 13.7167852,19.8520352 Z"
                                                                fill="#000000"></path>
														<path
                                                                d="M18.6606406,16.1779492 L20.0820898,17.1381289 C20.4289336,16.6246523 20.7337969,16.0786484 20.9883437,15.5152852 L19.4250547,14.8090938 C19.2104258,15.2841563 18.9532578,15.7446953 18.6606406,16.1779492 Z"
                                                                fill="#000000"></path>
														<polygon fill="#FFCD00"
                                                                 points="10.1637422 10.1423008 5.36060938 10.1423008 5.36060938 11.8576992 11.8791406 11.8576992 11.8791406 3.28070703 10.1637422 3.28070703">
														</polygon>
														<path
                                                                d="M20.2846016,1.99413672 L20.2846016,5.17085938 C19.4780352,3.88347266 18.409875,2.77380469 17.1351641,1.90897266 C15.3150508,0.674136719 13.1861641,0.0214414062 10.9785586,0.0214414062 C8.04607031,0.0214414062 5.28915234,1.16342187 3.21552344,3.23696484 C1.14198047,5.31059375 0,8.06751172 0,11 C0,13.9324883 1.14198047,16.6894062 3.21552344,18.7630352 C5.28915234,20.8365781 8.04607031,21.9785586 10.9785586,21.9785586 C11.4559844,21.9785586 11.9365469,21.9475352 12.4068828,21.8863906 L12.1857656,20.1853008 C11.7884766,20.2369492 11.3823789,20.2631602 10.9786016,20.2631602 C5.87086328,20.2631602 1.71544141,16.1077383 1.71544141,11 C1.71544141,5.89226172 5.87086328,1.73683984 10.9786016,1.73683984 C14.2939414,1.73683984 17.3025273,3.48549609 18.9537734,6.28263281 L15.9961055,6.28263281 L15.9961055,7.99803125 L22,7.99803125 L22,1.99413672 L20.2846016,1.99413672 Z"
                                                                fill="#000000"></path>
														<path
                                                                d="M20.2091055,11.7719336 C20.201457,11.8634141 20.1923477,11.9544648 20.1821641,12.0452148 L20.1829805,12.0452578 C20.134168,12.4793281 20.0551055,12.9107773 19.9461797,13.3310977 L21.60675,13.7613438 C21.7616523,13.1636055 21.8664961,12.5472187 21.9183164,11.9294141 L21.9170703,11.9293281 C21.921625,11.8769062 21.9261797,11.8245273 21.929832,11.7719336 L20.2091055,11.7719336 L20.2091055,11.7719336 Z"
                                                                fill="#000000"></path>
													</g>
												</g>
											</svg>

										</span>
                            <p>Eltip berme hyzmaty - 30 TMT</p>
                        </div>
                        <div class="card-content__delivery-section-item">
										<span>
											<svg class="SVGInline-svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
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
										</span>
                            <p>Mugt eltip berme we yzyna gaýtaryp almak</p>
                        </div>
                    </div>

                    <div class="card-content__category-links">
                   {{--     <a href="#">
                            <img src="{{asset('img/img/brand/adidas.webp')}}" alt="adidas">
                            <div class="card-content__category-links-content">
                                <h4>Все шорты adidas</h4>
                                <p>Категория и бренд</p>
                            </div>
                        </a>
                        <a href="#">
                            <img src="{{asset('img/img/brand/brand.webp')}}" alt="adidas">
                            <div class="card-content__category-links-content">
                                <h4>Все товары adidas</h4>
                                <p>Бренд</p>
                            </div>
                        </a>
                        <a href="#">
                            <img src="{{asset('img/img/brand/category.webp')}}" alt="adidas">
                            <div class="card-content__category-links-content">
                                <h4>Все шорты</h4>
                                <p> Категория</p>
                            </div>
                        </a>
                    </div>--}}


                    <div class="card-content__category-links">

                            @foreach($prod->img as $img)
                            <a href="{{asset('images/products/big/' . $img)}}" data-size="500x1000">
                                <img src="{{ asset('images/products/big/' . $img) }}" alt="">
                                <div class="card-content__category-links-content">
                                    <h4>{{$prod->name_tk}}</h4>
                                    <p>{{$prod->brand}}</p>
                                </div>
                            </a>


                            @endforeach





                    </div>

                    <section class="card-content__info-section info-section">
                        <article class="info-section__acardion">
                            <button class="info-section__button">
                                Haryt barada
                                <span class="_icon-arrow1"></span>
                            </button>
                            <div class="info-section__textarea">
                                {{$prod->description_tk}}
                            </div>
                        </article>
                        <article class="info-section__acardion">
                            <button class="info-section__button">
                                Eltip berme
                                <span class="_icon-arrow1"></span>
                            </button>
                            <div class="info-section__textarea">
                               {{-- <p>Стоимость доставки в отделение Новой Почты - 79 грн.</p>
                                <p>Стоимость доставки&nbsp;MEEST&nbsp;Курьер - 79 грн.</p>
                                <p>Доставка заказов БЕСПЛАТНА при покупке на сумму свыше 1300 грн.</p>--}}
                            </div>
                        </article>
                        <article class="info-section__acardion">
                            <button class="info-section__button">
                                Ornaşdyrmak
                                <span class="_icon-arrow1"></span>
                            </button>
                            <div class="info-section__textarea">
                                <div class="Accordion__accordionDescription__3r3nn ">


                                </div>
                            </div>
                        </article>


                        <article class="info-section__acardion">
                            <button class="info-section__button">
                                Haryt barada soramak
                                <span class="_icon-arrow1"></span>
                            </button>
                            <div class="info-section__textarea">
                                    <form class="info-section__form info-form" action="{{ route('otzyw') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        @if(Auth()->user())
                                    <div class="info-form__form-area">
                                        <select name="product" style="display: none;">
                                            <option  value="{{ $prod->id }}">{{$prod->id}}</option>
                                        </select>
                                        <span class="info-form__title">Ady</span>
                                        <div class="info-form__input error">
                                            <input  {{ ($currentUser != null) ? 'disabled' : '' }} name="user_name" type="text" value="{{ $currentUser->name}}">
                                        </div>

                                    </div>

                                            <div class="info-form__form-area">

                                        <span class="info-form__title">Familiýa</span>
                                        <div class="info-form__input error">
                                            <input  {{ ($currentUser != null) ? 'disabled' : '' }} name="user_surname" type="text" value="{{ $currentUser->surname}}">
                                        </div>
                                    </div>

                                    <div class="info-form__form-area">
                                        <span class="info-form__title">Email</span>
                                        <div class="info-form__input">
                                            <input  {{ ($currentUser != null) ? 'disabled' : '' }} name="email" type="email" value="{{ $currentUser->email}}">
                                        </div>
                                    </div>

                                    <div class="info-form__form-area">
                                        <span class="info-form__title">Telefon belgisi</span>
                                        <div class="info-form__input">
                                            <input id="phone" {{ ($currentUser != null) ? 'disabled' : '' }} name="phone" type="tel" value="{{ $currentUser->phone}}">
                                        </div>
                                    </div>

                                    <div class="info-form__form-area">
                                        <span class="info-form__title">Habary</span>
                                        <div class="info-form__input">
                                            <textarea id="otzyw" name="otzyw" required type="textarea" class="" placeholder="Haryt barada soraglaryňyzy ýa-da islegiňizi düzüň!"></textarea>
                                        </div>
                                        <span class="info-form__error">Häzirki doldurylmaly meýdança dolduryldy</span>
                                    </div>

                                    <div class="info-form__checkbox">
                                        <input type="checkbox" id="newsletter_radio_0" name="online_payment" value="true">
                                        <label for="newsletter_radio_0">
														<span>TPMARKET dükanyndan ýokardaky e-poçta salgysyna täjirçilik tekliplerini alasym gelýär.</span>
                                        </label>
                                    </div>

                                    
                                    <button class="info-form__button" type="submit">
                                        Ibermek
                                    </button>
                                            @else
                                            <div class="info-form__form-area">
                                                <select name="product" style="display: none;">
                                                    <option  value="{{ $prod->id }}">{{$prod->id}}</option>
                                                </select>
                                                <span class="info-form__title">Ady</span>
                                                <div class="info-form__input error">
                                                    <input id="name" type="text" name="user_name" placeholder="Ady" value="">
                                                </div>
                                                <span class="info-form__error">Häzirki meýdança doldurylmaly</span>
                                            </div>

                                            <div class="info-form__form-area">

                                                <span class="info-form__title">Familiýa</span>
                                                <div class="info-form__input error">
                                                    <input id="name" type="text" name="user_surname" placeholder="Familiýa" value="">
                                                </div>
                                                <span class="info-form__error">Häzirki meýdança doldurylmaly</span>
                                            </div>

                                            <div class="info-form__form-area">
                                                <span class="info-form__title">Email</span>
                                                <div class="info-form__input">
                                                    <input id="email" type="email" name="email" maxlength="70" placeholder="" value="">
                                                </div>
                                                <span class="info-form__error">Häzirki meýdança doldurylmaly</span>
                                            </div>

                                            <div class="info-form__form-area">
                                                <span class="info-form__title">Telefon belgisi</span>
                                                <div class="info-form__input">
                                                    <input id="phoneNumber" type="tel" classes="" name="user_phone" placeholder="+993"
                                                           maxlength="13" value="">
                                                </div>
                                                <span class="info-form__error">Telefon belgi şu formatda +993 XX XX XX XX bolmaly</span>
                                            </div>

                                            <div class="info-form__form-area">
                                                <span class="info-form__title">Habary</span>
                                                <div class="info-form__input">
                                                    <textarea id="inquiry" name="otzyw" required type="textarea" class="" placeholder="Haryt barada soraglaryňyzy ýa-da islegiňizi düzüň!"></textarea>
                                                </div>
                                                <span class="info-form__error">Häzirki meýdança doldurylmaly</span>
                                            </div>

                                            <div class="info-form__checkbox">
                                                <input type="checkbox" id="newsletter_radio_0" name="online_payment" value="true">
                                                <label for="newsletter_radio_0">
                                                <span>TPMARKET dükanyndan ýokardaky e-poçta salgysyna täjirçilik tekliplerini alasym gelýär.</span>
                                                </label>
                                            </div>

                                           
                                            <button class="info-form__button" type="submit">
                                                Ibermek
                                            </button>
                                        @endif
                                </form>
                            </div>
                        </article>
                    </section>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>



<div class="md-title-tabs">
    <div class="md-title-tabs__inner">
        <div class="js-title-tab" data-tab="js_recommended">Meňzeş harytlary</div>
        <span class="md-divider">/</span>
        <div class="js-title-tab" data-tab="js_viewed">Gorulenler</div>
    </div>
</div>

<div class="slider-md-wrapper">
    <div class="md-prod-slier js_viewed">
        <div class="md-prod-slier__line">
            <section class="md-prod-slier__slide-wrapper js-md-prod-slier js_vieved-slider">

                @foreach($menzes as $rp)
                <article class="md-prod-panel__slider">
                    <div class="md-prod-panel_img">
                        <div class="listing-item__img-wrapper">
                            <a href="{{ route('oneProduct',['id'=>$rp->id]) }}" class="listing-item__img-content new-product__img">
                                <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                @foreach(json_decode($rp->img) as $key => $value)
                                    @if($key != 'main')
                                        <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                    @endif
                                @endforeach


                                <img alt="{{ $rp->name_tk }}" title="{{ $rp->name_tk }}" class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($rp->img)->main) }}">
                                    
                                @foreach(json_decode($rp->img) as $key => $value)
                                    @if($key != 'main')

                                        <img alt="{{$rp->name_tk}}" title="{{$rp->name_tk}}"
                                            class="listing-item__img listing-item__img-{{ $loop->index + 2 }}" src="{{ asset('images/products/little/' . $value) }}">

                                    @endif
                                @endforeach
                            </a>
                        </div>
                    </div>
                    <div class="descr">
                        <div class="name">
                            <div class="name-brand">{{ $rp->name_tk }}</div>
                        </div>
                        <div class="price">
                            <span class="numb">{{ number_format($rp->price,2,'.','') }} </span> <span class="val">TMT</span>
                        </div>
                    </div>
                    <div class="hidden-block">
                        <div class="quick-view js-show-mini-card-button" data-id={{$rp->id}}>
                            <div>Giňişleýin</div>
                        </div>
                        <div class="sizes">
                            <span>38</span>
                            <span>40</span>
                            <span>41</span>
                            <span>42</span>
                        </div>
                    </div>
                </article>
            @endforeach


            </section>
            <div class="md-prod-slier__nav">
                <button type="button" class="icon-arrow-left"></button>
                <div class="viv-slick-dots"></div>
                <button type="button" class="viv-slick-next"></button>
            </div>
        </div>
    </div>
</div>


<section class="new-product">
    <div class="new-product__container __container">
        <div class="product-categorys__title" style="text-align: left;">
            <p>Soňky satuwa goýlan harytlar</p>
        </div>
        <div class="new-product__wrapper">
            <section class="new-product__row new-product__slider">

                @foreach($recProds as $rp)
                <article class="new-product__column listing-item">
                    <div class="new-product__img-box">
                        <div class="listing-item__img-wrapper">
                            <a href="{{ route('oneProduct',['id'=>$rp->id]) }}" class="listing-item__img-content new-product__img">
                                <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                @foreach(json_decode($rp->img) as $key => $value)
                                    @if($key != 'main')
                                        <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                    @endif
                                @endforeach


                                <img alt="{{ $rp->name_tk }}" title="{{ $rp->name_tk }}" class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($rp->img)->main) }}">
                                    
                                @foreach(json_decode($rp->img) as $key => $value)
                                    @if($key != 'main')

                                        <img alt="{{$rp->name_tk}}" title="{{$rp->name_tk}}"
                                            class="listing-item__img listing-item__img-{{ $loop->index + 2 }}" src="{{ asset('images/products/little/' . $value) }}">

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
                                <div class="new-product__price-current">{{ number_format($rp->price,2,'.','') }} TMT</div>
                            </div>
                            <a href="#" class="new-product__company">{{$rp->brand}}</a>
                        </div>
                        <a href="#" class="new-product__category">{{$rp->name_tk}}</a>
                    </div>

                </article>
                @endforeach


            </section>
        </div>
    </div>
</section>

<section class="new-product">
    <a href="#" class="new-product__big-title">Täze gelenler</a>
    <div class="new-product__container __container">
        <div class="new-product__wrapper">
            <section class="new-product__row">

                @foreach($newProds as $rp)
                    @if($rp->new == 1)
                <article class="new-product__column">
                    <div class="new-product__img-box listing-item">
                        <div class="listing-item__img-wrapper">
                            <a href="{{ route('oneProduct',['id'=>$rp->id]) }}" class="listing-item__img-content new-product__img">
                                <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                @foreach(json_decode($rp->img) as $key => $value)
                                    @if($key != 'main')
                                        <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                    @endif
                                @endforeach


                                <img alt="{{ $rp->name_tk }}" title="{{ $rp->name_tk }}" class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($rp->img)->main) }}">
                                    
                                @foreach(json_decode($rp->img) as $key => $value)
                                    @if($key != 'main')

                                        <img alt="{{$rp->name_tk}}" title="{{$rp->name_tk}}"
                                            class="listing-item__img listing-item__img-{{ $loop->index + 2 }}" src="{{ asset('images/products/little/' . $value) }}">

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
                            <a href="{{route('login')}}">

                                <button class="new-product__favorite">
                                    <span class="_icon-heart"></span>
                                </button>
                            </a>
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
                            </div>
                            <a href="#" class="new-product__company">{{$rp->brand}}</a>
                        </div>
                   
                        <a href="#" class="new-product__link">{{$rp->name_tk}}</a>
                        <a href="#" class="new-product__size">
                            <p>S</p>
                            <p>M</p>
                            <p>L</p>
                            <p>XL</p>
                            <p>XXL</p>
                        </a>
                    </div>
                </article>
                    @endif
            @endforeach

            </section>
        </div>
    </div>
</section>


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
                                    <div class="listing-item__img-wrapper">
                                        <a href="{{ route('oneProduct',['id'=>$np->id]) }}" class="listing-item__img-content new-product__img">
                                            <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                            @foreach(json_decode($np->img) as $key => $value)
                                                @if($key != 'main')
                                                    <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                                @endif
                                            @endforeach


                                            <img alt="{{ $np->name_tk }}" title="{{ $np->name_tk }}" class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}">
                                                
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
                                    <div class="listing-item__img-wrapper">
                                        <a href="{{ route('oneProduct',['id'=>$np->id]) }}" class="listing-item__img-content new-product__img">
                                            <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                            @foreach(json_decode($np->img) as $key => $value)
                                                @if($key != 'main')
                                                    <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                                @endif
                                            @endforeach


                                            <img alt="{{ $np->name_tk }}" title="{{ $np->name_tk }}" class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}">
                                                
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
                                    <div class="listing-item__img-wrapper">
                                        <a href="{{ route('oneProduct',['id'=>$np->id]) }}" class="listing-item__img-content new-product__img">
                                            <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                            @foreach(json_decode($np->img) as $key => $value)
                                                @if($key != 'main')
                                                    <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                                @endif
                                            @endforeach


                                            <img alt="{{ $np->name_tk }}" title="{{ $np->name_tk }}" class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}">
                                                
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
                                    <div class="listing-item__img-wrapper">
                                        <a href="{{ route('oneProduct',['id'=>$np->id]) }}" class="listing-item__img-content new-product__img">
                                            <div class="listing-item__img-hover listing-item__img-hover-1"></div>
                                            @foreach(json_decode($np->img) as $key => $value)
                                                @if($key != 'main')
                                                    <div class="listing-item__img-hover listing-item__img-hover-{{ $loop->index + 2 }}"></div>
                                                @endif
                                            @endforeach


                                            <img alt="{{ $np->name_tk }}" title="{{ $np->name_tk }}" class="listing-item__img listing-item__img-1" src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}">
                                                
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



<section class="shadow-overlay js-pop-up" data-pop-up-name="selectSizeAddToCartPopUp">
    <div class="box-shadow vertical-scroll-block js-pop-up-info-block product-details__sizes-pop-up">
        <div class="modal-pop-up__header">
            <div class="modal-pop-up__header-title">Ölçegiňizi saýlaň</div>
            <div class="modal-pop-up__header-close icon--close js-close-button"></div>
        </div>
        <div class="product-details__sizes-pop-up-table js-show-sizes-table">
            Ölçegler
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
                            Haryt sebede goşulan
                        </h2>
                        <div class="icon icon--close js-close"></div>
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
									<span class="color--grey-dark">Reňk</span>
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
                        <p><span class="light-text">Sebetde</span> <span class="js-minibasket-total">4 haryt umumy: 6496
									TMT</span></p>
                    </div>
                    <div class="pop-up-basket__delivery-status js-text-free-delivery" data-free-limit="1500.0">
                        <div class="delivery-index">
                            <div class="delivery-index__text">
									<span>
										Gutlaýarys! Siz mugt eltip berme hyzmatyndan peýdalandyňyz
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
                    <div class="uk-button js-close">Söwda etmegiňizi dowam ediň!</div>
                    <a href="#" class="pop-up-basket__buttons-basket uk-button uk-button--red">
                        Sargydy tassyklaň
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shadow-overlay js-pop-up" data-pop-up-name="size-table">
    <div class="box-shadow vertical-scroll-block modal-size">
        <div class="modal-top modal-top--size-tablet">
            <p class="modal-title">Ölçegleri saýlaň</p>
            <div class="modal-close-icon js-close-button"></div>
        </div>
        <div class="table-wrapper js-size-table-content">
            <table class="table-caption-block">
                <tbody>
                <tr>
                    <th class="table-caption-block__caption">
                        Ölçeg</th>

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


<form class="md-form-subscribe" action="{{ route('ekslyuziw') }}" method="POST" enctype="multipart/form-data">

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
                    <input class="form-check-input " type="radio" name="paymenttype" id="inlineRadio1" value="1" {{ (old('paymenttype') == 1 || old('paymenttype') == null) ? 'checked' : '' }}>
                    <label class="form-check-label" for="inlineRadio1">Aýal</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input js_o" type="radio" id="inlineRadio2" name="paymenttype" value="2" {{ (old('paymenttype') == 2 || old('paymenttype') == null) ? 'checked' : '' }} class="inp-rad-1">
                    <label class="form-check-label" for="inlineRadio2">Erkek</label>
                </div>

            </div>

            <select name="product" style="display: none;">
                <option  value="{{ $prod->id }}">{{$prod->id}}</option>
            </select>

            <div class="form-group">
                <input class="form-control" type="text" name="phone" data-or="emailgift" data-error="no_message"
                       placeholder="+993">
                <span class="divider">ýa-da</span>
            </div>

            <div class="form-group">
                <input class="form-control" type="email" name="email" data-or="phonegift" data-error="no_message"
                       placeholder="E-mail">
            </div>

        </div>



    </div>
    <div class="btn-wrap">
        <input class="btn btn-primary" type="submit" name="" value="Abuna boluň">
    </div>

</form>

@endsection

@section('scripts')

    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/magiczoomplus.js')}}"></script>

    <script src="{{asset('js/sliders.js')}}"></script>


    <div class="d-flex s-14-col-3-color-outer-container">
        @isset($colors)
            @foreach($colors as $c)
                <div class="s-14-col-3-color-outer">
                    <div class="s-14-col-3-color-inner" data-color="{{$c->color}}" data-id="{{ $c->id }}"></div>
                </div>
            @endforeach
        @endisset
    </div>

    <div class="card-content__color-picker-wrapper">
        <div class="card-content__colors">

            @if(isset($prod->colors))
                <span class="pop-up-basket__info-color-img" style="background-color: #0b0b0b;"></span>
            @endif

        </div>

    </div>

    <script>
        $(document).ready(function(){

            $('.sizes-from-laravel').delegate('p','click',function() {
                $thisElem = $(this);

                $('.s-14-col-3-size-itself').removeClass('s-14-size-active');
                $(this).addClass('s-14-size-active');

                //дополнительно:
                //при нажатии на размер в сессию помещается строка с цветом

                $.ajax({
                    url: "/put-size-to-session/" + $thisElem.text(),
                    data: {
                        size: $thisElem.text()
                    },
                    type: "GET",
                    // dataType : "JSON",
                    success: function() {
                        // alert($thisElem.text())
                    },
                    error: function(e) {
                        alert('Sapar, you have an error!');
                    }
                })
            })

            $('.s-14-col-3-color-inner').click(function() {
                //show preloader
                $('.pr-loader-container').css('display','flex');

                $('.s-14-col-3-color-outer').removeClass('bordered');
                $(this).parent().addClass('bordered');

                var color_id = $(this).attr("data-id");
                var prod_id = <?php  echo $prod->id ?>;

                var $thisElem = $(this);

                //дополнительно:
                //при нажатии на цвет в сессию помещается идентификатор цвета

                $.ajax({
                    url: "/getsizes/" + color_id + "/" + prod_id,
                    data: {
                        color_id: color_id,
                        prod_id: prod_id
                    },
                    type: "GET",
                    dataType : "JSON",
                    success: function(html) {
                        $('.sizes-from-laravel').html('');

                        if(JSON.parse(html.sizes['0'].sizes)) {

                            for(key in JSON.parse(html.sizes['0'].sizes)) {
                                $('.sizes-from-laravel').append(
                                    `<p class="s-14-col-3-size-itself d-flex justify-center aligncenter">${key}</p>`
                                );
                            }

                            if($('.s-14-col-3-size-itself').get(0) != undefined) {
                                $('.s-14-col-3-size-itself').get(0).click();
                            }


                        }

                        //hide preloader
                        $('.pr-loader-container').css('display','none');
                    },
                    error: function(e) {
                        // alert('Sapar, you have an error!');
                        location.reload();
                    }
                })
            })

            if($('.s-14-col-3-color-inner').get(0) != undefined) {
                $('.s-14-col-3-color-inner').get(0).click();
            }
        });

    </script>


    <script>
        $(document).ready(function(){
            $('.div-for-show-rating').click(function() {
                $('.special-form').slideToggle();
            })
        })
    </script>

    <script>
        $('.s-14-col-3-color-inner').each(function(index) {
            $(this).css('background',$(this).data('color'));
        });
    </script>

    <script>

        $('.rate-button').click(function() {
            $('.special-form').slideToggle();
        })

    </script>

@endsection
