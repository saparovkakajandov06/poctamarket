@extends('layouts.app')

@section('style')
@endsection

@section('content')


    <section class="my-account">
        <div class="my-account__container __container">
            <div class="my-account__row">

                <div class="my-account__account account-content">

                    <div class="account-content__row">
                        <div class="account-content__column account-content__column_big">
                            <div class="delivery-addresses__delivery-addresses">

                                <div class="account-content__row" style="width: 100%;">

                                <div class="account-content__row" style="width: 100%;">

                                    <!--  -->
                                    <div class="account-content__column">

                                        <form class="dynamic-form" action="{{ route('verif-registrasion') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="dynamic-form__wrapper">
                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Имя
															</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">

                                                        <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Имья" class="@error('name') is-invalid @enderror">
                                                    </div>
                                                </div>
                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Фамилия
															</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="text" id="surname" name="surname" value="{{ old('surname') }}" required placeholder="Фамилия *" class="@error('surname') is-invalid @enderror">
                                                    </div>
                                                </div>
                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Отчество</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="text" id="middlename" name="middlename" value="{{ old('middlename') }}" required placeholder="Отчество * " class="@error('middlename') is-invalid @enderror">

                                                    </div>
                                                </div>

                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Дата рождение</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="text" onfocus="(this.type='date')" onblur="( !this.value ? this.type='text' : this.type='date')" id="birthday" name="birthday" value="{{ old('birthday') }}" required placeholder="Дата рождение * " class="@error('birthday') is-invalid @enderror">

                                                    </div>
                                                </div>


                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Телефон</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">

                                                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="Телефон * " class="@error('phone') is-invalid @enderror">

                                                    </div>
                                                </div>


                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Эл. адрес</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">

                                                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Эл. адрес * " class="@error('email') is-invalid @enderror">

                                                    </div>
                                                </div>


                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Пароль</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="password" id="password" name="password"  required placeholder="Пароль *" class="@error('password') is-invalid @enderror" autocomplete="new-password">
                                                        <div class="reg-and-log__show-pass __js-show-password">Показать</div>
                                                    </div>
                                                </div>


                                                <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Подвердите пароль</span>
                                                    <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                        <input type="password" id="password-confirm" name="password_confirmation" required placeholder="Подвердите пароль *" autocomplete="new-password">
                                                        <div class="reg-and-log__show-pass __js-show-password">Показать</div>
                                                    </div>
                                                </div>

                                                <div class="reg-and-log__checkbox" style="margin-top: 10px;">
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


                                                <div
                                                        class="dynamic-form__row dynamic-form__row_nowrap dynamic-form__add-new-address-form-buttons">

                                                    <button class="account-content__btn account-content__btn--primary account-content__btn--wide-medium">

                                                        Сохранить

                                                    </button>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>
    </section>
@endsection


@section('scripts')

<script>
    $(document).ready(function($) {
        $('.invalid-feedback p').click(function() {
            $(this).hide();
            $(this).parent().prev().focus()
        })

        $('input').focus(function() {
            $(this).next().find('.invalid-feedback-p').hide();
        })

        $('#tel').focus(function() {
            $(this).parent().next().find('.invalid-feedback-p').hide();
        })
    })
</script>
@endsection
