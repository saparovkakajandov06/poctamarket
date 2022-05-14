@extends('layouts.app')

@section('content')



    <section class="my-account">
        <div class="my-account__container __container">
            <div class="my-account__row">
                <div class="my-account__side-menu-wrapper">
                    <nav class="my-account__side-menu">
                        <ul>
                            <li>
                                <a class="my-account__side-menu-item my-account__side-menu-item_active" href="{{ route('getprofileinfo') }}">
											<span class="svg-inline">
												<svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
													<g id="Icon/User" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<g id="user-(7)" transform="translate(5.000000, 1.000000)" fill="#000000"
                                                           fill-rule="nonzero">
															<path
                                                                    d="M11.1111111,11.1111111 C8.0428625,11.1111111 5.55555556,8.62380417 5.55555556,5.55555556 C5.55555556,2.48730695 8.0428625,0 11.1111111,0 C14.1793597,0 16.6666667,2.48730695 16.6666667,5.55555556 C16.6630543,8.62230662 14.1778622,11.1074987 11.1111111,11.1111111 Z M11.1111111,2.22222222 C9.27016195,2.22222222 7.77777778,3.71460639 7.77777778,5.55555556 C7.77777778,7.39650472 9.27016195,8.88888889 11.1111111,8.88888889 C12.9520603,8.88888889 14.4444444,7.39650472 14.4444444,5.55555556 C14.4424237,3.71544408 12.9512226,2.22424301 11.1111111,2.22222222 L11.1111111,2.22222222 Z"
                                                                    id="Shape"></path>
															<path
                                                                    d="M11.1111111,30 C8.80486495,29.9835472 6.50592621,29.7385723 4.248,29.2686667 C3.85624225,29.1833089 3.5408577,28.8935083 3.42274074,28.5103524 C3.30462378,28.1271965 3.40209738,27.7101226 3.67779761,27.4190049 C3.95349783,27.1278873 4.36465648,27.0078859 4.75366667,27.105 C6.84617066,27.5336844 8.97522947,27.7589925 11.1111111,27.7777778 C13.7511111,27.7766667 18.2834444,27.3274444 20,26.1474444 L20,24.4444444 C20,19.5352467 16.0203089,15.5555556 11.1111111,15.5555556 C6.20191333,15.5555556 2.22222222,19.5352467 2.22222222,24.4444444 L2.22222222,26.6666667 C2.22222222,27.2803164 1.72476083,27.7777778 1.11111111,27.7777778 C0.497461389,27.7777778 0,27.2803164 0,26.6666667 L0,24.4444444 C0,18.3079472 4.97461389,13.3333333 11.1111111,13.3333333 C17.2476083,13.3333333 22.2222222,18.3079472 22.2222222,24.4444444 L22.2222222,26.6666667 C22.2222222,26.9613276 22.1050549,27.243897 21.8966667,27.4522222 C19.4205556,29.9283333 11.9542222,30 11.1111111,30 L11.1111111,30 Z"
                                                                    id="Path"></path>
														</g>
													</g>
												</svg>
											</span>
                                    <p>Мой Аккаунт</p>
                                </a>
                            </li>

                            <li>
                                <a class="my-account__side-menu-item" href="{{ route('history') }}">
												<span class="svg-inline">
													<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														<title></title>
														<g id="-" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<g id="AC-v2" transform="translate(-143.000000, -260.000000)" fill="#000000">
																<g id="Icon/Orders" transform="translate(143.000000, 260.000000)">
																	<path
                                                                            d="M17.4926288,7.58925 C17.0508788,7.58925 16.6923788,8.00175 16.6923788,8.50875 L16.6923788,20.28975 L7.0698788,20.28975 L7.0698788,8.50875 C7.0698788,8.00175 6.7106288,7.58925 6.2688788,7.58925 C5.8271288,7.58925 5.4686288,8.00175 5.4686288,8.50875 L5.4686288,9.4755 L2.8593788,8.45175 L5.2616288,4.81875 C5.7288788,4.11225 6.4301288,3.7065 7.1861288,3.7065 L8.6973788,3.7065 C9.3401288,5.064 10.5536288,5.9025 11.8811288,5.9025 C13.2078788,5.9025 14.4206288,5.064 15.0648788,3.7065 L16.5753788,3.7065 C17.3306288,3.7065 18.0326288,4.11225 18.5006288,4.81875 L20.9021288,8.45175 L18.2928788,9.4755 L18.2928788,8.50875 C18.2928788,8.00175 17.9343788,7.58925 17.4926288,7.58925 M22.8498788,8.3535 L19.7748788,3.70425 C19.0031288,2.53725 17.8368788,1.8675 16.5753788,1.8675 L14.5473788,1.8675 C14.2091288,1.8675 13.9061288,2.11275 13.7936288,2.478 C13.4988788,3.426 12.7301288,4.0635 11.8811288,4.0635 C11.0313788,4.0635 10.2626288,3.426 9.9678788,2.478 C9.8546288,2.11275 9.5516288,1.8675 9.2141288,1.8675 L7.1861288,1.8675 C5.9253788,1.8675 4.7583788,2.5365 3.9866288,3.70425 L0.913128802,8.35275 C0.759378802,8.58525 0.710628802,8.89125 0.782628802,9.171 C0.855378802,9.45675 1.0458788,9.684 1.2903788,9.78075 L5.4686288,11.42025 L5.4686288,21.21 C5.4686288,21.717 5.8271288,22.1295 6.2688788,22.1295 L17.4926288,22.1295 C17.9343788,22.1295 18.2928788,21.717 18.2928788,21.21 L18.2928788,11.42025 L22.4718788,9.78075 C22.7163788,9.684 22.9061288,9.456 22.9796288,9.17025 C23.0508788,8.8905 23.0021288,8.5845 22.8498788,8.3535"
                                                                            id="Fill-1"></path>
																</g>
															</g>
														</g>
													</svg>
												</span>
                                    <p>Мои заказы</p>
                                </a>
                            </li>


                            <hr class="my-account__side-menu-separate-line">

                            <li>


                                <a class="my-account__side-menu-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
											<span class="svg-inline">
												<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
													<title></title>
													<g id="-" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<g id="AC-v2" transform="translate(-143.000000, -589.000000)" fill="#000000">
															<g id="Icon/Logout" transform="translate(143.000000, 589.000000)">
																<path
                                                                        d="M4.02272727,0.75 C3.04772727,0.75 2.25,1.87625139 2.25,3.25278087 L2.25,7.4874922 C2.25,7.90630988 2.59179965,8.2458287 2.99152448,8.2458287 L3.28120279,8.2458287 C3.69073545,8.2458287 4.02272727,7.90658615 4.02272727,7.50119857 L4.02272727,3.29463013 C4.02272727,2.88338227 4.35596063,2.55 4.77084883,2.55 L19.2291512,2.55 C19.6423273,2.55 19.9772727,2.87803538 19.9772727,3.29088093 L19.9772727,20.7085713 C19.9772727,21.1177486 19.6440394,21.4494523 19.2291512,21.4494523 L4.77084883,21.4494523 C4.3576727,21.4494523 4.02272727,21.1102423 4.02272727,20.7048937 L4.02272727,16.4987298 C4.02272727,16.0875215 3.68092762,15.7541713 3.28120279,15.7541713 L2.99152448,15.7541713 C2.58199182,15.7541713 2.25,16.0834213 2.25,16.4946056 L2.25,20.7722469 C2.25,22.1487764 3.04772727,23.25 4.02272727,23.25 L19.9772727,23.25 C20.9522727,23.25 21.75,22.1487764 21.75,20.7722469 L21.75,3.25278087 C21.75,1.86373749 20.9522727,0.75 19.9772727,0.75 L4.02272727,0.75 Z"
                                                                        id="Shape"></path>
																<path
                                                                        d="M11.7266688,7.57654517 L11.8018959,7.63678233 L15.5518959,11.0117823 C15.8917588,11.3176589 15.9144163,11.8354425 15.6198685,12.1695734 L15.5518959,12.2382177 L11.8018959,15.6132177 C11.4632251,15.9180214 10.941586,15.8905667 10.6367823,15.5518959 C10.3537503,15.2374159 10.3572064,14.7651724 10.630303,14.4552706 L10.6981041,14.3867823 L12.85,12.4499929 L3,12.45 C2.54436508,12.45 2.175,12.0806349 2.175,11.625 C2.175,11.1997407 2.49675803,10.8496321 2.91010716,10.804841 L3,10.8 L12.85,10.7999929 L10.6981041,8.86321767 C10.3836241,8.58018567 10.3374886,8.11018843 10.5765452,7.77333124 L10.6367823,7.6981041 C10.9198143,7.3836241 11.3898116,7.33748857 11.7266688,7.57654517 Z"
                                                                        id="Combined-Shape" fill-rule="nonzero"></path>
															</g>
														</g>
													</g>
												</svg>
											</span>
                                    <p>Выйти</p>
                                </a>
                            </li>


                        </ul>
                    </nav>
                </div>

                <div class="my-account__account account-content">
                    <div class="account-content__row">

                        <div class="account-content__column">
                            <h4>Персональные данные</h4>
                            <div class="grey-box__grey-box __js-account-inf-box">
                                <button class="grey-box__grey-box-button grey-box__grey-box-toggler __js-account-inf-button">
                                    <span class="_icon-pencil"></span>
                                </button>
                                <div class="grey-box__grey-box-content grey-box__grey-box-content-min-height">
                                    <div data-hj-suppress="true">
                                        <h6>{{Auth::user()->name}} {{Auth::user()->surname}}</h6>
                                        <p>{{Auth::user()->email}}</p>
                                        <p>+993 {{Auth::user()->phone}}</p>
                                        <p>(Дата рождения) {{Auth::user()->birthday}}</p>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <form action="{{ route('getprofileinfo') }}" method="post" class="dynamic-form __js-account-inf-form my-account__hide">
                                @csrf
                                <div class="dynamic-form__wrapper">
                                    <div class="dynamic-form__wrapper">


                                        <div class="dynamic-form__dynamic-field">
													<span
                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Имя</span>
                                            <div class="input__input-wrapper input__error input__input-wrapper-placeholder">
                                                <input type="text" name="name" value="{{Auth::user()->name}}" required>
                                            </div>
                                            {{--<span class="field-error field-error__error">Данное поле должно быть заполнено</span>--}}
                                        </div>


                                        <div class="dynamic-form__dynamic-field">
													<span
                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Фамилия</span>
                                            <div class="input__input-wrapper input__error input__input-wrapper-placeholder">
                                                {{--<input type="text">--}}
                                                <input type="text" name="surname" value="{{Auth::user()->surname}}" required>
                                            </div>
                                            {{--<span class="field-error field-error__error">Данное поле должно быть заполнено</span>--}}
                                        </div>

                                        <div class="dynamic-form__dynamic-field">
													<span
                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Отчество</span>
                                            <div class="input__input-wrapper input__error input__input-wrapper-placeholder">
                                                {{--<input type="text">--}}
                                                <input type="text" name="middlename" value="{{Auth::user()->middlename}}" required>
                                            </div>
                                            {{--<span class="field-error field-error__error">Данное поле должно быть заполнено</span>--}}
                                        </div>


                                        <div class="dynamic-form__dynamic-field">
													<span
                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Телефон</span>
                                            <div class="input__input-wrapper input__error input__input-wrapper-placeholder">
                                                {{--<input type="tel" value="+993">--}}
                                                <input type="tel" name="phone" value="@isset(Auth::user()->phone){{Auth::user()->phone}}@endisset" required>
                                            </div>

                                            {{--<span class="field-error field-error__error">Телефонный должен быть в формате +38 0XX--}}
														{{--XXX--}}
														{{--XX XX</span>--}}
                                        </div>

                                        <div class="dynamic-form__dynamic-field">
													<span
                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Эл. адрес</span>
                                            <div class="input__input-wrapper input__error input__input-wrapper-placeholder">
                                                {{--<input type="tel" value="+993">--}}
                                                <input type="email" name="email" value="@isset(Auth::user()->email){{Auth::user()->email}}@endisset" required>
                                            </div>

                                            {{--<span class="field-error field-error__error">Телефонный должен быть в формате +38 0XX--}}
														{{--XXX--}}
														{{--XX XX</span>--}}
                                        </div>


                                        <div class="dynamic-form__dynamic-field">
                                            <span class="dynamic-form__dynamic-field-static-label">Дата рождения</span>
                                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                <input type="date" name="birthday" value="@isset(Auth::user()->birthday){{Auth::user()->birthday}}@endisset" required>
                                            </div>
                                        </div>
                                        <div class="dynamic-form__dynamic-field dynamic-form__dynamic-field-checkbox">
                                            <div class="dynamic-form__checkbox">
                                                <input type="checkbox" id="agreement.newsletter_radio_0" value="true" checked>
                                                <label for="agreement.newsletter_radio_0">
															<span>
																<p class="text-expander__text-wrapper-paragraph">Хочу получать коммерческие
																	предложения магазина ANSWEAR.ua на указанный выше email.</p>
																<p class="text-expander__text-wrapper-paragraph" style="display: none;">Вы всегда можете
																	отписаться от
																	рассылки по ссылке, указанной в получаемом newsletter.</p>
															</span>
                                                </label>
                                                <a class="text-expander__text-wrapper-expand">
                                                    <span class="text-expander__text-wrapper-expand_show">ПОДРОБНЕЕ</span>
                                                    <span class="text-expander__text-wrapper-expand_hide">СКРЫТЬ</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="dynamic-form__dynamic-field dynamic-form__dynamic-field-checkbox">
                                            <div class="dynamic-form__checkbox">
                                                <input type="checkbox" id="agreement.phone_radio_0" value="true" checked>
                                                <label for="agreement.phone_radio_0">
															<span>
																<p class="text-expander__text-wrapper-paragraph">Хочу получать коммерческие
																	предложения магазина ANSWEAR.ua на указанный выше email.</p>
																<p class="text-expander__text-wrapper-paragraph" style="display: none;">Вы всегда можете
																	отписаться от
																	рассылки по ссылке, указанной в получаемом newsletter.</p>
															</span>
                                                </label>
                                                <a class="text-expander__text-wrapper-expand">
                                                    <span class="text-expander__text-wrapper-expand_show">ПОДРОБНЕЕ</span>
                                                    <span class="text-expander__text-wrapper-expand_hide">СКРЫТЬ</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dynamic-form__row dynamic-form__row_nowrap">
                                        <button
                                                class="account-content__btn account-content__btn--default account-content__btn--wide-medium">Аннулировать</button>
                                        <button
                                                class="account-content__btn account-content__btn--primary account-content__btn--wide-medium">Сохранить</button>
                                    </div>
                                </div>
                            </form>
                            <!--  -->
                        </div>
                        <div class="account-content__column">
                            <div class="default-delivery__default-delivery">
                                <h4>Ранее выбранный адрес</h4>
                                <div class="grey-box__grey-box">
                                    <div class="grey-box__grey-box-content">
                                        <h6>{{Auth::user()->name}} {{Auth::user()->surname}} {{Auth::user()->middlename}}</h6>
                                        <h6>{{Auth::user()->email}}</h6>
                                        <h6>{{Auth::user()->phone}}</h6>
                                        <h6>{{Auth::user()->address}}</h6>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="account-content__row">
                        <div class="account-content__column account-content__column_big">
                            <div class="delivery-addresses__delivery-addresses">
                               
                                <div class="account-content__row">
                                    <div class="account-content__column account-content__column_big __js-account-adress-box">
                                        <button
                                                class="account-content__btn account-content__btn--default delivery-addresses__delivery-addresses-button __js-account-adress-button">
                                            <div>Добавить адрес доставки</div>
                                        </button>
                                    </div>
                                    <!--  -->
                                    <div class="account-content__column __js-account-adress-form my-account__hide">
                                            <form class="dynamic-form" action="{{ route('getprofileinfo') }}" method="post">
                                                @csrf
                                            <div class="dynamic-form__wrapper">
                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Имя
																</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="text" name="name" value="{{Auth::user()->name}}" required>
                                                    </div>
                                                </div>
                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Фамилия
															</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="text" name="surname" value="{{Auth::user()->surname}}" required>
                                                    </div>
                                                </div>
                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Отчество</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="text" name="middlename" value="{{Auth::user()->middlename}}" required>
                                                    </div>
                                                </div>


                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Телефон</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="tel" name="phone" value="@isset(Auth::user()->phone){{Auth::user()->phone}}@endisset" required>
                                                    </div>
                                                </div>

                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Эл. адрес</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="email" name="email" value="@isset(Auth::user()->email){{Auth::user()->email}}@endisset" required>
                                                    </div>
                                                </div>

                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Дата рождение</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="date" name="birthday" value="@isset(Auth::user()->birthday){{Auth::user()->birthday}}@endisset" required>
                                                    </div>
                                                </div>

                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Логин</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="text" name="login" value="@isset(Auth::user()->login){{Auth::user()->login}}@endisset" required>
                                                    </div>
                                                </div>


                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Адрес</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="text" name="address" value="@isset(Auth::user()->address){{Auth::user()->address}}@endisset" required>
                                                    </div>
                                                </div>

                                                <!--  -->
                                                <div
                                                        class="dynamic-form__row dynamic-form__row_nowrap dynamic-form__add-new-address-form-buttons">
                                                    <button
                                                            class="account-content__btn account-content__btn--default account-content__btn--wide-medium">Аннулировать</button>
                                                    <button
                                                            class="account-content__btn account-content__btn--primary account-content__btn--wide-medium">Сохранить</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-content__row">
                        <div class="account-content__column account-content__column_secnd">
                            <div class="password-change__change-password">
                                <h4 class="password-change__change-password-header">Изменить пароль</h4>
                                <div class="grey-box__grey-box __js-account-password-box">
                                    <button class="grey-box__grey-box-button grey-box__grey-box-toggler __js-account-password-button">
                                        <span class="_icon-pencil"></span>
                                    </button>
                                    <div class="grey-box__grey-box-content"><span>**********</span></div>
                                </div>
                                <!--  -->
                                <form action="{{ route('change.password') }}" method="post" class="dynamic-form __js-account-password-form my-account__hide">
                                    @csrf
                                    <div class="dynamic-form__wrapper">
                                        <div class="dynamic-form__dynamic-field">
													<span
                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">
														Старый пароль
													</span>
                                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                <input id="password" type="password" name="current_password" autocomplete="current-password" required>
                                                <span
                                                        class="_icon-eye input__input-wrapper-eye-icon-error input__input-wrapper-eye-icon __js-show-password"></span>
                                            </div>
                                        </div>
                                        <div class="dynamic-form__dynamic-field">
													<span
                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">
														Новый пароль
													</span>
                                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                <input id="new_password" type="password" name="new_password" autocomplete="current-password" required>
                                                <span
                                                        class="_icon-eye input__input-wrapper-eye-icon-error input__input-wrapper-eye-icon __js-show-password"></span>
                                            </div>
                                        </div>
                                        <div class="dynamic-form__dynamic-field">
													<span
                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">
														Повторить новый пароль
													</span>
                                            <div class="input__input-wrapper input__error input__input-wrapper-placeholder">
                                                <input id="new_confirm_password" type="password" name="new_confirm_password" autocomplete="current-password" required>
                                                <span
                                                        class="_icon-eye input__input-wrapper-eye-icon-error input__input-wrapper-eye-icon __js-show-password"></span>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div
                                                class="dynamic-form__row dynamic-form__row_nowrap dynamic-form__add-new-address-form-buttons">
                                     {{--       <button
                                                    class="account-content__btn account-content__btn--default account-content__btn--wide-medium">Аннулировать</button>--}}
                                            <button
                                                    class="account-content__btn account-content__btn--primary account-content__btn--wide-medium">Сохранить</button>
                                        </div>
                                    </div>
                                </form>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection

