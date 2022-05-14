@guest
    @if (Route::has('register'))
        <div class="card-summary__btn-container" xmlns:wire="http://www.w3.org/1999/xhtml"
             xmlns:wire="http://www.w3.org/1999/xhtml">
            <a href="#" class="card-summary__btn js-show-log-and-reg"><span>Hasaba girmek!</span></a>
        </div>
    @endif
@endguest

@if($productsInCart)


    <div class="col-10">
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
    </div>

    <form  action="{{ route('checkout') }}" method="post" enctype="multipart/form-data">
        @csrf

        @if($currentStep == 1)
            <div class="checkout-main__container __container">
                <div class="checkout-main__row">

                    <div class="checkout-main__stepper checkout-stepper">

                        <div class="checkout-stepper__wrapper">

                            <div class="checkout-stepper__row">
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item checkout-stepper__step-item_status--active">
                                        <div class="checkout-stepper__step-number">1</div>
                                        <div class="checkout-stepper__step-label">Доставка</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#" class="checkout-stepper__step-item">
                                        <div class="checkout-stepper__step-number">2</div>
                                        <div class="checkout-stepper__step-label">Адрес</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#" class="checkout-stepper__step-item">
                                        <div class="checkout-stepper__step-number">3</div>
                                        <div class="checkout-stepper__step-label">Оплата</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#" class="checkout-stepper__step-item">
                                        <div class="checkout-stepper__step-number">4</div>
                                        <div class="checkout-stepper__step-label">Итого</div>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- end checkout stepper -->
                    <div class="checkout-main__step-area step-area">

                        <div class="dynamic-form__wrapper">
                            <div class="step-area__wrapper">
                                <div class="step-area__row">
                                    <h3>На указанный адрес</h3>
                                </div>
                                <div class="step-area__radio-group radio-group">

                                    <div class="radio-group__section">

                                        <input type="radio" id="deliveryMethod_radio_0" name="delivery" value="0" {{ (old('delivery') == '0' || old('delivery') == null) ? 'checked' : '' }} checked>

                                        <label class="" for="deliveryMethod_radio_0">

                                            <div class="radio-group__text">Курьер Meest</div>

                                            <div class="radio-group__description">До 150 часов от момента передачи посылки на доставку</div>

                                            <div class="radio-group__price">

                                                <span>10 TMT</span>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="radio-group__section">

                                        <input type="radio" id="deliveryMethod_radio_1" name="delivery" value="1" {{ old('delivery') == '1' ? 'checked' : '' }}>


                                        <label class="" for="deliveryMethod_radio_1">

                                            <div class="radio-group__text">Отделение Новая Почта</div>

                                            <div class="radio-group__description">До 150 часов от момента передачи посылки на доставку</div>

                                            <div class="radio-group__price">20 TMT</div>

                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="step-buttons__step-btn-section">
                            <div class="step-buttons__step-btn-wrapper">
                                <button
                                        class="account-content__btn account-content__btn--primary account-content__btn--height-large account-content__btn--small-round step-buttons__step-btn step-buttons__step-btn-submit"
                                        wire:click.prevent="increaseStep()">
                                    Адресные данные
                                </button>
                            </div>
                            <div class="step-buttons__step-btn-wrapper">

                                <a href="{{route('main_page')}}">
                                    <button
                                            class="account-content__btn account-content__btn--height-large account-content__btn--small-round account-content__btn--back">
									<span class="step-buttons__left-edge">
										<span class="_icon-arrow"></span>
										Продолжить покупки</span>
                                    </button>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!--end checkout-main__row -->
                </div>
            </div>
        @endif



        @if($currentStep == 2)
            <div class="checkout-main__container __container">
                <div class="checkout-main__row">
                    <div class="checkout-main__stepper checkout-stepper">
                        <div class="checkout-stepper__wrapper">
                            <div class="checkout-stepper__row">
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item checkout-stepper__step-item_status--completed">
                                        <div class="checkout-stepper__step-number">1</div>
                                        <div class="checkout-stepper__step-label">Доставка</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item checkout-stepper__step-item_status--active">
                                        <div class="checkout-stepper__step-number">2</div>
                                        <div class="checkout-stepper__step-label">Адрес</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item">
                                        <div class="checkout-stepper__step-number">3</div>
                                        <div class="checkout-stepper__step-label">Оплата</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item">
                                        <div class="checkout-stepper__step-number">4</div>
                                        <div class="checkout-stepper__step-label">Итого</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end checkout stepper -->


                    <div class="checkout-main__step-area step-area">
                        <div class="step-area__wrapper step-area__step-2">
                            <div class="step-area__row">
                                <h3>На указанный адрес</h3>
                                <div class="account-content">
                                    <div class="account-content__row">
                                        <div class="account-content__column account-content__column_big">
                                            <div class="delivery-addresses__delivery-addresses">
                                                <div class="account-content__row __js-account-adress-box">
                                                    <div class="account-content__column delivery-address__delivery-address">
                                                        <div class="grey-box__grey-box">
                                                            <button
                                                                    class="grey-box__grey-box-button grey-box__grey-box-toggler __js-account-adress-button">
                                                                <span class="_icon-pencil"></span>
                                                            </button>
                                                            <div class="grey-box__grey-box-content">
                                                                <div>
                                                                    <div class="dynamic-field__dynamic-field">
                                                                        <div class="radio__radio-group">
                                                                            <div class="radio__radio-section radio__radio-section-vertical">
                                                                                <div class="radio__radio checkout__checkout-radio">
                                                                                    <input type="radio" id="userAddress_radio_0" name="userAddress" checked>
                                                                                    <label class="" for="userAddress_radio_0">Ранее выбранный адрес</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="delivery-address-selector-step-form__address-box">
                                                                        <div class="side-box__side-box">
                                                                            <div class="side-box__side-box-wrapper">
                                                                                <div class="side-box__side-box-content">
                                                                                    <div class="delivery-address__address" data-hj-suppress="true">
                                                                                        <span class="delivery-address__full-name">{{Auth::user()->name}} {{Auth::user()->surname}} {{Auth::user()->middlename}}</span>
                                                                                        <span>{{Auth::user()->email}}</span>
                                                                                        <span>+993{{Auth::user()->phone}}</span>
                                                                                        <span>{{Auth::user()->birthday}}</span>
                                                                                        <span>{{Auth::user()->address}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="account-content__column delivery-address__delivery-address">
                                                        <div class="grey-box__grey-box grey-box__grey-box-blackout">
                                                            <button
                                                                    class="grey-box__grey-box-button grey-box__grey-box-toggler __js-account-adress-button">
                                                                <span class="_icon-pencil"></span>

                                                            </button>
                                                            <div class="grey-box__grey-box-content">
                                                                <div>
                                                                    <div class="dynamic-field__dynamic-field">
                                                                        <div class="radio__radio-group">
                                                                            <div class="radio__radio-section radio__radio-section-vertical">
                                                                                <div class="radio__radio checkout__checkout-radio">
                                                                                    <input type="radio" id="userAddress_radio_1" name="userAddress">
                                                                                    <label class="" for="userAddress_radio_1">Дополнительный адрес </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="delivery-address-selector-step-form__address-box">
                                                                        <div class="side-box__side-box">
                                                                            <div class="side-box__side-box-wrapper">
                                                                                <div class="side-box__side-box-content">
                                                                                    <div class="delivery-address__address" data-hj-suppress="true">
                                                                                        <span class="delivery-address__full-name">{{Auth::user()->name}} {{Auth::user()->surname}} {{Auth::user()->middlename}}</span>
                                                                                        <span>{{Auth::user()->email}}</span>
                                                                                        <span>+993{{Auth::user()->phone}}</span>
                                                                                        <span>{{Auth::user()->birthday}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                </div>

                                                <div class="account-content__row">
                                                    <div
                                                            class="account-content__column account-content__column_big step-area__new-delivery-btn __js-account-adress-box">
                                                        <button
                                                                class="account-content__btn account-content__btn--default delivery-addresses__delivery-addresses-button __js-account-adress-button">
                                                            <div>Указать другой адрес</div>
                                                        </button>
                                                    </div>
                                                    <!--  -->
                                                    <div
                                                            class="account-content__column account-content__column_big __js-account-adress-form my-account__hide">

                                                        <div class="dynamic-form__wrapper">
                                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Имя
																		(українською)</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="text">
                                                                </div>
                                                            </div>

                                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Фамилия
																	</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="text">
                                                                </div>
                                                            </div>

                                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Отчество</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="text">
                                                                </div>
                                                            </div>
                                                            <div class="dynamic-form__dynamic-field">
                                                                <span class="dynamic-form__dynamic-field-static-label">Компания (опционально)</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="text">
                                                                </div>
                                                            </div>
                                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Улица</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="text">
                                                                </div>
                                                            </div>
                                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">№
																		дома</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="text">
                                                                </div>
                                                            </div>
                                                            <div class="dynamic-form__dynamic-field">
                                                                <span class="dynamic-form__dynamic-field-static-label">№ квартиры</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="text">
                                                                </div>
                                                            </div>
                                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Почтовый
																		индекс</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="text">
                                                                </div>
                                                            </div>
                                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Область</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="text">
                                                                </div>
                                                            </div>
                                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Город</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="text">
                                                                </div>
                                                            </div>
                                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Телефон</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="tel" value="+993">
                                                                </div>
                                                            </div>
                                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">email</span>
                                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                                    <input type="email">
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

                                                    </div>
                                                    <!--  -->
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                        <div class="step-buttons__step-btn-section">
                            <div class="step-buttons__step-btn-wrapper">
                                <button
                                        class="account-content__btn account-content__btn--primary account-content__btn--height-large account-content__btn--small-round step-buttons__step-btn step-buttons__step-btn-submit"
                                        wire:click.prevent="increaseStep()">
                                    К оплате
                                </button>
                            </div>
                            <div class="step-buttons__step-btn-wrapper">
                                <button
                                        class="account-content__btn account-content__btn--height-large account-content__btn--small-round account-content__btn--back"
                                        wire:click.prevent="decreaseStep()">
									<span class="step-buttons__left-edge">
										<span class="_icon-arrow"></span>
										Вернуться
									</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--end checkout-main__row -->
                </div>
            </div>
        @endif



        @if($currentStep == 3)
            <div class="checkout-main__container __container">
                <div class="checkout-main__row">
                    <div class="checkout-main__stepper checkout-stepper">
                        <div class="checkout-stepper__wrapper">
                            <div class="checkout-stepper__row">
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item checkout-stepper__step-item_status--completed">
                                        <div class="checkout-stepper__step-number">1</div>
                                        <div class="checkout-stepper__step-label">Доставка</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item checkout-stepper__step-item_status--completed">
                                        <div class="checkout-stepper__step-number">2</div>
                                        <div class="checkout-stepper__step-label">Адрес</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item checkout-stepper__step-item_status--active">
                                        <div class="checkout-stepper__step-number">3</div>
                                        <div class="checkout-stepper__step-label">Оплата</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item">
                                        <div class="checkout-stepper__step-number">4</div>
                                        <div class="checkout-stepper__step-label">Итого</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end checkout stepper -->

                    <div class="checkout-main__step-area step-area">
                        <div class="dynamic-form__wrapper">
                            <div class="step-area__wrapper">
                                <div class="step-area__row">
                                    <h3>На указанный адрес</h3>
                                </div>
                                <div class="step-area__radio-group radio-group">
                                    <div class="radio-group__section">
                                        <input type="radio" id="deliveryMethod_radio_0" name="paymenttype" value="3" {{ old('paymenttype') == 3 ? 'checked' : '' }} checked>
                                        {{--      <input type="radio" name="paymenttype" value="3" {{ old('paymenttype') == 3 ? 'checked' : '' }} class="inp-rad-1"><i></i><span>Onlaýn töleg</span>--}}
                                        <label class="" for="deliveryMethod_radio_0">
                                            <div class="radio-group__text">Банковской картой</div>
                                            <div class="radio-group__description">Оплата картой Visa, MasterCard, Maestro или электронным
                                                кошельком Google Pay</div>
                                        </label>
                                    </div>

                                    <div class="radio-group__section">
                                        <input type="radio" id="deliveryMethod_radio_1" name="paymenttype" value="1" {{ (old('paymenttype') == 1 || old('paymenttype') == null) ? 'checked' : '' }}>
                                        {{--<input type="radio" name="paymenttype" value="1" {{ (old('paymenttype') == 1 || old('paymenttype') == null) ? 'checked' : '' }} class="inp-rad-1"><i></i><span>Çapara nagt tölemek</span>--}}
                                        <label class="" for="deliveryMethod_radio_1">
                                            <div class="radio-group__text">Наложенный платёж</div>
                                            <div class="radio-group__description">Оплата наличными при получении</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="step-buttons__step-btn-section">
                            <div class="step-buttons__step-btn-wrapper">
                                <button
                                        class="account-content__btn account-content__btn--primary account-content__btn--height-large account-content__btn--small-round step-buttons__step-btn step-buttons__step-btn-submit"
                                        wire:click.prevent="increaseStep()">
                                    Итог
                                </button>
                            </div>
                            <div class="step-buttons__step-btn-wrapper">
                                <button
                                        class="account-content__btn account-content__btn--height-large account-content__btn--small-round account-content__btn--back"
                                        wire:click.prevent="decreaseStep()">
									<span class="step-buttons__left-edge">
										<span class="_icon-arrow"></span>
										Вернуться</span>
                                </button>
                            </div>
                        </div>
                    </div>



                    <!--end checkout-main__row -->
                </div>
            </div>
        @endif



        @if($currentStep == 4)
            <div class="checkout-main__container __container">
                <div class="checkout-main__row">
                    <div class="checkout-main__stepper checkout-stepper">
                        <div class="checkout-stepper__wrapper">
                            <div class="checkout-stepper__row">
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item checkout-stepper__step-item_status--completed">
                                        <div class="checkout-stepper__step-number">1</div>
                                        <div class="checkout-stepper__step-label">Доставка</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item checkout-stepper__step-item_status--completed">
                                        <div class="checkout-stepper__step-number">2</div>
                                        <div class="checkout-stepper__step-label">Адрес</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item checkout-stepper__step-item_status--completed">
                                        <div class="checkout-stepper__step-number">3</div>
                                        <div class="checkout-stepper__step-label">Оплата</div>
                                    </a>
                                </div>
                                <div class="checkout-stepper__step-divider"></div>
                                <div class="checkout-stepper__step-item-wrapper">
                                    <a href="#"
                                       class="checkout-stepper__step-item checkout-stepper__step-item_status--active">
                                        <div class="checkout-stepper__step-number">4</div>
                                        <div class="checkout-stepper__step-label">Итого</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end checkout stepper -->

                    <div class="checkout-main__step-area step-area">
                        <!--  -->
                        <div class="card__container">
                            <div class="card__row">
                                <div class="card__column card-product">
                                    <div class="card-product__wrapper summary-step__summary-form-products-container">
                                        <div class="summary-step__header">
                                            <h4 class="summary-step__summary-form-header">Товары</h4>
                                            <a class="account-content__btn account-content__btn--white summary-step__summary-form-header-btn"
                                               href="{{route('cart')}}">
                                                Изменить в Корзине <span class="_icon-pencil"></span>
                                            </a>
                                        </div>
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
                                                                    <p>Цвет:</p>
                                                                    <p class="card-product__card-info-bold">{{$pInC['color_tk']}}</p>
                                                                </div>
                                                                <div class="card-product__card-info">
                                                                    <p>Размер:</p>
                                                                    <p class="card-product__card-info-bold">{{$pInC['size']}}</p>
                                                                </div>
                                                                <div class="card-product__card-info">
                                                                    <p>Кол-во:</p>
                                                                    <div class="card-product__quantity-selector">
                                                                        <span class="card-product__card-info-bold">{{ $pInC['amount'] }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-product__section-wrapper">
                                                                <div class="card-product__card-info">
                                                                    <p>Цена:</p>
                                                                    <p class="card-product__card-info-price">
                                                                        <span class="card-product__card-info-regular-price"><span>{{ number_format($pInC['price'],2,'.','') }}</span> TMT</span>
                                                                        {{--<span class="card-product__card-info-discounted-price"><span>3099</span> TMT</span>--}}
                                                                    </p>
                                                                </div>
                                                                <div class="card-product__card-info">
                                                                    <p>Итого:</p>
                                                                    <p class="card-product__card-info-bold card-product__card-info-summary-price">
                                                                        <span>{{ number_format($pInC['amount'] * $pInC['price'],2,'.','') }}</span>
                                                                        TMT
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--<div class="card-product__last-item">
                                                            <span>Последняя штука</span>
                                                        </div>--}}
                                                    </div>
                                                </article>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="card-commend">
                                        <div class="card-commend__wrapper">
                                            <h4 class="card-commend__heading">Комментарий к заказу</h4>
                                            <div class="card-commend__textarea">
                                                <div class="card-commend__label">
                                                    Комментарий к Заказу
                                                </div>
                                                <textarea></textarea>
                                                <div class="card-commend__info">Заказ, который нуждается в дополнительной обработке
                                                    информации, в которой нуждается Клиент, может быть выслано с опозданием</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card__column card-summary">
                                    <!--  -->
                                    <div class="side-box__side-box">
                                        <div class="side-box__side-box-wrapper">
                                            <h4 class="side-box__side-box-heading">Данные доставки</h4>
                                            <div class="side-box__side-box-content">
                                                <span class="side-box__side-box-link-btn"><span class="_icon-pencil"></span></span>
                                                <div class="delivery-address__address" data-hj-suppress="true">
                                                    <span class="delivery-address__full-name">{{Auth::user()->name}} {{Auth::user()->surname}} {{Auth::user()->middlename}}</span>
                                                    <span>{{Auth::user()->email}}</span>
                                                    <span>{{Auth::user()->phone}}</span>
                                                    {{--<span>Компания (опционально)</span>--}}
                                                    <span>{{Auth::user()->address}}</span>
                                                    {{--<span>Почтовый индекс</span>--}}
                                                    {{--<span>Область</span>--}}
                                                    {{--<span>Город</span>--}}
                                                    {{--<span>Turkmenistan</span>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="side-box__side-box">
                                        <div class="side-box__side-box-wrapper">
                                            <h4 class="side-box__side-box-heading">Выбранный вид доставки</h4>
                                            <div class="side-box__side-box-content">
                                                <span class="side-box__side-box-link-btn"><span class="_icon-pencil"></span></span>
                                                <div class="summary-step__summary-form-delivery-method-wrapper">
                                                    <div>

                                                        <input type="radio" name="paymenttype" value="3" {{ old('paymenttype') == 3 ? 'checked' : '' }} class="inp-rad-1"><i></i><span>Onlaýn töleg</span>

                                                        {{--
                                                             <p class="summary-step__summary-form-delivery-method-header">
                                                             <strong>Курьер Meest</strong>
                                                               </p>
                                                               --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="side-box__side-box">
                                        <div class="side-box__side-box-wrapper">
                                            <h4 class="side-box__side-box-heading">Выбранный способ оплаты</h4>
                                            <div class="side-box__side-box-content"><span class="side-box__side-box-link-btn">
													<span class="_icon-pencil"></span>
												</span>
                                                <p>Банковской картой</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="side-box__side-box">
                                        <div class="side-box__side-box-wrapper">
                                            <h4 class="side-box__side-box-heading">Стоимость заказа</h4>
                                            <div class="side-box__side-box-content">
                                                <div class="side-box__row">
                                                    <div class="summary-step__summary-form-side-box-section">
                                                        <div class="summary__content">
                                                            <div class="summary__cart-summary-info">
                                                                <p class="summary__cart-summary-info-title">Сумма товаров:</p>
                                                                <p class="summary__cart-summary-info-value">{{ number_format($totalPrice,2,'.','') }} TMT</p>
                                                            </div>

                                                            <div class="summary__cart-summary-info">
                                                                <p class="summary__cart-summary-info-title">Доставка:</p>
                                                                <p class="summary__cart-summary-info-value">10 TMT</p>
                                                            </div>
                                                            <div class="summary__cart-summary-info summary__cart-summary-info-last-row">
                                                                <p class="summary__cart-summary-info-title">К оплате:</p>
                                                                <p class="summary__cart-summary-info-value">{{ number_format($totalPrice + 10,2,'.','') }} TMT</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="summary-step__summary-form-side-box-section summary-step__summary-form-labels">
                                                        <div>
                                                            <label class="summary-step-terms-template__summary-form-terms">Администратором
                                                                персональных данных является Answear S.A. О том, как мы обрабатываем Ваши персональные
                                                                данные Вы можете прочесть <a href="#">ЗДЕСЬ</a>.
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <div class="summary-step-terms-template__summary-form-terms-info">
                                                                <label>Вернуть товар Вы можете в течении 30 дней. Более подробно <a href="#">здесь.</a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="summary-step-terms-template__summary-form-checkbox-wrapper">
                                                            <div
                                                                    class="dynamic-field dynamic-field__dynamic-field dynamic-field__dynamic-field-checkbox">
                                                                <div class="checkbox__checkbox-group">
                                                                    <div class="checkbox__checkbox checkbox__checkbox-label checkbox__checkbox--vertical">
                                                                        <input type="checkbox" id="terms_radio_0" name="terms" value="true" {{ old('chb-123') != null ? 'checked' : '' }}>
                                                                        <label for="terms_radio_0">
                                                                            <span>Соглашаюсь <a href="#">Правилами магазина</a></span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="button-container button-container-margined-top">
                                                            <button type="submit"
                                                                    class="account-content__btn account-content__btn--fluid account-content__btn--primary account-content__btn--height-large">
                                                                Заказываю/Оплачиваю
                                                            </button>

                                                        </div>

                                                        <div class="step-buttons__step-btn-wrapper">
                                                            <button
                                                                    class="account-content__btn account-content__btn--height-large account-content__btn--small-round account-content__btn--back"
                                                                    wire:click.prevent="decreaseStep()">
									<span class="step-buttons__left-edge">
										<span class="_icon-arrow"></span>
										Вернуться</span>
                                                            </button>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                    <!--end checkout-main__row -->
                </div>
            </div>
        @endif

    </form>


@endif




