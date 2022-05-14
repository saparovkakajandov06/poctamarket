@if($productsInCart)
    <div class="checkout-main__container __container">
        <div class="checkout-main__row">
            <div class="checkout-main__stepper checkout-stepper">
                <div class="checkout-stepper__wrapper">
                    <div class="checkout-stepper__row">
                        <div class="checkout-stepper__step-item-wrapper ">
                            <a onclick="change(0)"
                               class="checkout-stepper__step-item step checkout-stepper__step-item_status--active">
                                <div class="checkout-stepper__step-number">1</div>
                                <div class="checkout-stepper__step-label">Eltip berme</div>
                            </a>
                        </div>
                        <div class="checkout-stepper__step-divider"></div>
                        <div class="checkout-stepper__step-item-wrapper">
                            <a onclick="change(1)" class="checkout-stepper__step-item step ">
                                <div class="checkout-stepper__step-number">2</div>
                                <div class="checkout-stepper__step-label">Salgy</div>
                            </a>
                        </div>
                        <div class="checkout-stepper__step-divider "></div>
                        <div class="checkout-stepper__step-item-wrapper">
                            <a onclick="change(2)" class="checkout-stepper__step-item step ">
                                <div class="checkout-stepper__step-number">3</div>
                                <div class="checkout-stepper__step-label">Töleg</div>
                            </a>
                        </div>
                        <div class="checkout-stepper__step-divider "></div>
                        <div class="checkout-stepper__step-item-wrapper">
                            <a onclick="change(3)" class="checkout-stepper__step-item step ">
                                <div class="checkout-stepper__step-number">4</div>
                                <div class="checkout-stepper__step-label">Jemi</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> <!-- end checkout stepper -->
            <div class="checkout-main__step-area step-area">

                <form action="{{ route('checkout') }}" class="dynamic-form" id="dynamic_form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="dynamic-form__wrapper tab">
                        <div class="step-area__wrapper">
                            <div class="step-area__row">
                                <h3>Görkezilen salgy</h3>
                            </div>
                            <div class="step-area__radio-group radio-group">
                                <div class="radio-group__section">

                                    <input type="radio" id="deliveryMethod_radio_0" name="delivery" value="0" {{ (old('delivery') == '0' || old('delivery') == null) ? 'checked' : '' }}
                                           checked>

                                    <label class="" for="deliveryMethod_radio_0">

                                        <div class="radio-group__text">Çapar bilen</div>
                                        <div class="radio-group__description">1 sagada çenli siziň eliňizde</div>
                                        <div class="radio-group__price">
                                            <span>30 TMT</span>
                                        </div>
                                    </label>
                                </div>
                                <div class="radio-group__section">

                                    <input type="radio" id="deliveryMethod_radio_1" name="delivery" value="1" {{ old('delivery') == '1' ? 'checked' : '' }}>

                                    <label class="" for="deliveryMethod_radio_1">

                                        <div class="radio-group__text">Türkmen Poçta bilen</div>
                                        <div class="radio-group__description">Ýerleşýän ýeriňize görä wagt kesgitlenýär</div>
                                        <div class="radio-group__price">20 TMT</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="step-buttons__step-btn-section">
                            <div class="step-buttons__step-btn-wrapper">
                                <button type="button" onclick="nextPrev(1)"
                                        class="account-content__btn account-content__btn--primary account-content__btn--height-large account-content__btn--small-round step-buttons__step-btn step-buttons__step-btn-submit">
                                    Adres maglumatlary
                                </button>
                            </div>
                            <div class="step-buttons__step-btn-wrapper">
                                <a href="/"
                                   class="account-content__btn account-content__btn--height-large account-content__btn--small-round account-content__btn--back">
											<span class="step-buttons__left-edge">
												<span class="_icon-arrow"></span>
												Söwdaňyzy dowam ediň</span>
                                </a>
                            </div>
                        </div>
                    </div>


                   @if(Auth::user())

                        <div class="dynamic-form__wrapper tab">
                            <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Ady
										</span>
                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                    <input type="text" name="name" required='true' value="{{Auth::user()->name}}" disabled>
                                </div>
                            </div>
                            <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Familiýa
									</span>
                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                    <input type="text" name="surname" required='true' value="{{Auth::user()->surname}}" disabled>
                                </div>
                            </div>


                            <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Telefon belgisi</span>
                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                    <input type="tel" required='true' name="phone" value="{{Auth::user()->phone}}" disabled>
                                </div>
                            </div>

                            <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">E - mail</span>
                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                    <input type="email" required='true' name="email" value="{{Auth::user()->email}}" disabled>
                                </div>
                            </div>

                            <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Welaýaty</span>
                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                    <input type="text" name="region">
                                </div>
                            </div>

                            <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Şäher/Etrap</span>
                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                    <input type="text" name="city">
                                </div>
                            </div>


                            <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Köçe</span>
                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                    <input type="text" required='true' name="street">
                                </div>
                            </div>

                            <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">№
										Öý</span>
                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                    <input type="text" required='true' name="house">
                                </div>
                            </div>


                            <div class="dynamic-form__dynamic-field">
                                <span class="dynamic-form__dynamic-field-static-label">№ etaž</span>
                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                    <input type="text" name="apartment">
                                </div>
                            </div>

                            <div class="dynamic-form__dynamic-field">
                                <span class="dynamic-form__dynamic-field-static-label">№ kwartira</span>
                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                    <input type="text" name="korpus">
                                </div>
                            </div>

                            <div
                                    class="dynamic-form__row dynamic-form__row_nowrap dynamic-form__add-new-address-form-buttons">
                                <button type="button" onclick="nextPrev(-1)"
                                        class="account-content__btn account-content__btn--default account-content__btn--wide-medium">Bes et</button>
                                <button type="button" onclick="nextPrev(1)"
                                        class="account-content__btn account-content__btn--primary account-content__btn--wide-medium">Dowam et</button>
                            </div>
                        </div>

                    @else

                    <div class="dynamic-form__wrapper tab">
                        <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Ady
										</span>
                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                <input type="text" name="name" required='true'>
                            </div>
                        </div>
                        <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Familiýa
									</span>
                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                <input type="text" name="surname" required='true'>
                            </div>
                        </div>


                        <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Telefon belgisi</span>
                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                <input type="tel" value="+993" required='true' name="phone">
                            </div>
                        </div>

                        <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">E - mail</span>
                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                <input type="email" required='true' name="email">
                            </div>
                        </div>

                        <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Welaýaty</span>
                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                <input type="text" name="region">
                            </div>
                        </div>

                        <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Şäher/Etrap</span>
                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                <input type="text" name="city">
                            </div>
                        </div>


                        <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Köçe</span>
                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                <input type="text" required='true' name="street">
                            </div>
                        </div>

                        <div class="dynamic-form__dynamic-field">
									<span
                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">№
										Öý</span>
                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                <input type="text" required='true' name="house">
                            </div>
                        </div>


                        <div class="dynamic-form__dynamic-field">
                            <span class="dynamic-form__dynamic-field-static-label">№ etaž</span>
                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                <input type="text" name="apartment">
                            </div>
                        </div>

                        <div class="dynamic-form__dynamic-field">
                            <span class="dynamic-form__dynamic-field-static-label">№ kwartira</span>
                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                <input type="text" name="korpus">
                            </div>
                        </div>

                        <div
                                class="dynamic-form__row dynamic-form__row_nowrap dynamic-form__add-new-address-form-buttons">
                            <button type="button" onclick="nextPrev(-1)"
                                    class="account-content__btn account-content__btn--default account-content__btn--wide-medium">Bes et</button>
                            <button type="button" onclick="nextPrev(1)"
                                    class="account-content__btn account-content__btn--primary account-content__btn--wide-medium">Dowam et</button>
                        </div>
                    </div>

                    @endif


                    <div class="dynamic-form__wrapper tab">
                        <div class="step-area__wrapper">
                            <div class="step-area__row">
                                <h3>Görkezilen salgy</h3>
                            </div>
                            <div class="step-area__radio-group radio-group">
                                <div class="radio-group__section">

                                    <input type="radio" id="paymentMethod_radio_0" name="paymenttype" checked value="3" {{ old('paymenttype') == 3 ? 'checked' : '' }}>
                                    <label class="" for="paymentMethod_radio_0">


                                        <div class="radio-group__text">Bank Karty</div>
                                        <div class="radio-group__description">"Altyn asyr" kart bilen töleg geçirmek</div>
                                    </label>
                                </div>
                                <div class="radio-group__section">

                                    <input type="radio" id="paymentMethod_radio_1" name="paymenttype" value="1" {{ (old('paymenttype') == 1 || old('paymenttype') == null) ? 'checked' : '' }}>
                                    <label class="" for="paymentMethod_radio_1">
                                        <div class="radio-group__text">Görkezilen töleg</div>
                                        <div class="radio-group__description">Elden ele (в наличии) tölemek
                                        </div>
                                    </label>
                                </div>

                                <div class="step-buttons__step-btn-section">
                                    <div class="step-buttons__step-btn-wrapper">
                                        <button type="button" onclick="nextPrev(1)"
                                                class="account-content__btn account-content__btn--primary account-content__btn--height-large account-content__btn--small-round step-buttons__step-btn step-buttons__step-btn-submit">
                                            Jemi
                                        </button>
                                    </div>
                                    <div class="step-buttons__step-btn-wrapper">
                                        <button type="button" onclick="nextPrev(-1)"
                                                class="account-content__btn account-content__btn--height-large account-content__btn--small-round account-content__btn--back">
													<span class="step-buttons__left-edge">
														<span class="_icon-arrow"></span>
														Yza</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="card__container tab">
                        <div class="card__row">
                            <div class="card__column card-product">
                                <div
                                        class="card-product__wrapper summary-step__summary-form-products-container">
                                    <div class="summary-step__header">
                                        <h4 class="summary-step__summary-form-header">Harytlar</h4>
                                        <a class="account-content__btn account-content__btn--white summary-step__summary-form-header-btn"
                                           href="{{route('cart')}}">
                                            Sebedi üýtgetmek <span class="_icon-pencil"></span>
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
                                                                <p>Reňki:</p>
                                                                <p class="card-product__card-info-bold">{{$pInC['color_tk']}}</p>
                                                            </div>
                                                            <div class="card-product__card-info">
                                                                <p>Ölçegi:</p>
                                                                <p class="card-product__card-info-bold">{{$pInC['size']}}</p>
                                                            </div>
                                                            <div class="card-product__card-info">
                                                                <p>Mukdary:</p>
                                                                <div class="card-product__quantity-selector">
                                                                    <span class="card-product__card-info-bold">{{ $pInC['amount'] }}</span>
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

                                                </div>
                                            </article>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="card-commend">
                                    <div class="card-commend__wrapper">
                                        <h4 class="card-commend__heading">Kommentariýa üçin</h4>
                                        <div class="card-commend__textarea">
                                            <div class="card-commend__label">
                                            Kommentariýa üçin
                                            </div>
                                            <textarea name="comments"></textarea>
                                            <div class="card-commend__info">Müşderiniň zerur maglumatlary goşmaça maglumatlary girizmek bilen sargyt gijikdirilip iberilip bilner</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card__column card-summary">
                                <!--  -->
                                <div class="side-box__side-box">
                                    <div class="side-box__side-box-wrapper">
                                        <h4 class="side-box__side-box-heading">Häzirki eltip berme</h4>
                                        <div class="side-box__side-box-content">
													<span class="side-box__side-box-link-btn">
														<span class="_icon-pencil" onclick="change(1)"></span>
													</span>
                                            <div id="info1" class="delivery-address__address" data-hj-suppress="true">
                                                <span class="delivery-address__full-name">Ady Atasynyň ady Familiýa</span>
                                                <span>email@mail.ru</span>
                                                <span>+380848784546</span>
                                                <span>Компания (опционально)</span>
                                                <span>Улица № дома / № квартиры</span>
                                                <span>Почтовый индекс</span>
                                                <span>Область</span>
                                                <span>Город</span>
                                                <span>Turkmenistan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="side-box__side-box">
                                    <div class="side-box__side-box-wrapper">
                                        <h4 class="side-box__side-box-heading">Eltip bermäniň görnüşi</h4>
                                        <div class="side-box__side-box-content">
													<span class="side-box__side-box-link-btn">
														<span class="_icon-pencil" onclick="change(0)"></span>
													</span>
                                            <div class="summary-step__summary-form-delivery-method-wrapper">
                                                <div>
                                                    <p
                                                            class="summary-step__summary-form-delivery-method-header">
                                                        <strong id="info2"></strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="side-box__side-box">
                                    <div class="side-box__side-box-wrapper">
                                        <h4 class="side-box__side-box-heading">Töleg hyzmatynyň görnüşi</h4>
                                        <div class="side-box__side-box-content">
													<span class="side-box__side-box-link-btn">
														<span class="_icon-pencil" onclick="change(2)"></span>
													</span>
                                            <p id="info3"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="side-box__side-box">
                                    <div class="side-box__side-box-wrapper">
                                        <h4 class="side-box__side-box-heading">Sargyt</h4>
                                        <div class="side-box__side-box-content">
                                            <div class="side-box__row">
                                                <div class="summary-step__summary-form-side-box-section">
                                                    <div class="summary__content">
                                                        <div class="summary__cart-summary-info">
                                                            <p class="summary__cart-summary-info-title">Harydyň jemi:</p>
                                                            <p class="summary__cart-summary-info-value">{{ number_format($totalPrice,2,'.','') }} TMT
                                                            </p>
                                                        </div>
                                                        <div class="summary__cart-summary-info">
                                                            <p class="summary__cart-summary-info-title"></p>
                                                            <p class="summary__cart-summary-info-value">
                                                            </p>
                                                        </div>
                                                        <div class="summary__cart-summary-info">
                                                            <p class="summary__cart-summary-info-title">
                                                                Eltip bermek:</p>
                                                            <p class="summary__cart-summary-info-value">30 TMT
                                                            </p>
                                                        </div>
                                                        <div
                                                                class="summary__cart-summary-info summary__cart-summary-info-last-row">
                                                            <p class="summary__cart-summary-info-title">Töleg:</p>
                                                            <p class="summary__cart-summary-info-value">{{ number_format($totalPrice + 10,2,'.','') }} TMT
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                        class="summary-step__summary-form-side-box-section summary-step__summary-form-labels">
                                                   
                                                    <div>
                                                        
                                                    </div>

                                                    <div
                                                            class="summary-step-terms-template__summary-form-checkbox-wrapper">
                                                        <div
                                                                class="dynamic-field dynamic-field__dynamic-field dynamic-field__dynamic-field-checkbox">
                                                            <div class="checkbox__checkbox-group">
                                                                <div
                                                                        class="checkbox__checkbox checkbox__checkbox-label checkbox__checkbox--vertical">
                                                                    <input type="checkbox" id="terms_radio_0"
                                                                           name="terms" value="true">
                                                                    <label for="terms_radio_0">
																				<span>Ylalaşýaryn</span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="button-container button-container-margined-top">
                                                        <button type="submit"
                                                                class="account-content__btn account-content__btn--fluid account-content__btn--primary account-content__btn--height-large">
                                                            Sargyt edýärin
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

                </form>


            </div>
        </div>

    </div>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        var dynamic_form = document.getElementById('dynamic_form')
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            // if (n == 0) {
            // 	document.getElementById("prevBtn").style.display = "none";
            // } else {
            // 	document.getElementById("prevBtn").style.display = "inline";
            // }
            // if (n == (x.length - 1)) {
            // 	document.getElementById("nextBtn").innerHTML = "Submit";
            // } else {
            // 	document.getElementById("nextBtn").innerHTML = "Next";
            // }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)

            if(n==3) showValue();
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function change(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n > 1 && !validateFormAll()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = n;
            // if you have reached the end of the form... :
            // if (currentTab >= x.length) {
            // 	//...the form gets submitted:
            // 	document.getElementById("regForm").submit();
            // 	return false;
            // }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateFormAll() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");

            y = dynamic_form.getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (!y[i].checkValidity()) {
                    // add an "invalid" class to the field:
                    y[i].classList.add('invalid');
                    // and set the current valid status to false:
                    valid = false;
                } else y[i].classList.remove('invalid');

            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].classList.add("finish");
            }
            return valid; // return the valid status
        }


        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");

            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {

                // If a field is empty...
                if (!y[i].checkValidity()) {
                    // add an "invalid" class to the field:
                    y[i].classList.add('invalid');
                    // and set the current valid status to false:
                    valid = false;
                } else y[i].classList.remove('invalid');

            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            // x.classList.remove("checkout-stepper__step-item_status--completed")

            for (i = 0; i < x.length; i++) {
                x[i].classList.remove("checkout-stepper__step-item_status--completed", "checkout-stepper__step-item_status--active");
            }


            for (i = 0; i < currentTab; i++) {
                x[i].classList.add("checkout-stepper__step-item_status--completed");
            }
            //... and adds the "active" class to the current step:
            console.log(currentTab);
            x[n].classList.add("checkout-stepper__step-item_status--active");
        }

        document.addEventListener('keypress', function (e) {
            if ((e.keyCode === 13 || e.which === 13) && currentTab < 3) {
                e.preventDefault();
                return false;
            }

        });



        function showValue(){

            var formData = new FormData(dynamic_form),
                result = {};

            for (var entry of formData.entries()) {
                result[entry[0]] = entry[1];
            }


            var info1 = document.getElementById('info1'),
                info2 = document.getElementById('info2'),
                info3 = document.getElementById('info3')
            info1.innerHTML= `

                @if(Auth::user())
				<span class="delivery-address__full-name">{{Auth::user()->name}} {{Auth::user()->surname}}</span>
				<span>{{Auth::user()->email}}</span>
				<span>{{Auth::user()->phone}}</span>
				<span>${result.region}</span>
				<span>${result.city}</span>
				<span>${result.street}</span>
				<span>${result.house}</span>
				@else
                <span class="delivery-address__full-name">${result.name} ${result.surname}</span>
				<span>${result.email}</span>
				<span>${result.phone}</span>
				<span>${result.region}</span>
				<span>${result.city}</span>
				<span>${result.street}</span>
				<span>${result.house}</span>
				@endif
			`


            info2.innerText= result.delivery
            info3.innerText= result.paymenttype



            console.log(result);
        }

    </script>


@else

    <section class="card">
        <div class="card__container">
            <div class="card__row">
                <div class="card__column card-product">
                    <div class="card-product__wrapper">

                        <div class="card-product__header">Töleg ýerine ýetirilmedi, sargyt kabul edilmeýär</div>


                    </div>
                </div>



            </div>
        </div>
    </section>

@endif