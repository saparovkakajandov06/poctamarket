@extends('layouts.app')

@section('content')


    <section class="my-account">
        <div class="my-account__container __container">
            <div class="account-content__row">
                <div class="account-content__column account-content__column_big">
                    <div class="delivery-addresses__delivery-addresses">


                        <div class="account-content__row">

                            <!--  -->
                            <div class="account-content__column">
                                <form class="dynamic-form" action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="dynamic-form__wrapper">
                                        <div class="dynamic-form__dynamic-field">
															<h2>E-mail</h2>
                                            <div class="input__input-wrapper input__input-wrapper-placeholder">

                                                <input type="email" name="email" value="{{ old('email') }}" id="email" required placeholder="Email" class="input-login @error('email') is-invalid @enderror">
                                            </div>
                                            @error('email')
                                            <div class="invalid-feedback" role="alert">
                                                <p class="invalid-feedback-p">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>



                                        <div class="dynamic-form__dynamic-field">
															<h2>Пароль</h2>
                                            <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                <input type="password" name="password" id="password" required placeholder="Пароль *" autocomplete="current-password">
                                            </div>
                                            @error('password')
                                            <div class="invalid-feedback" role="alert">
                                                <p class="invalid-feedback-p">{{ $message }}</p>
                                            </div>
                                            @enderror
                                        </div>

                                        <!--  -->
                                        <div
                                                class="dynamic-form__row dynamic-form__row_nowrap dynamic-form__add-new-address-form-buttons">

                                            <button
                                                    class="account-content__btn account-content__btn--primary account-content__btn--wide-medium">Войти</button>



                    <a href="#" class="js-show-log-and-reg">
                        <button
                                class="account-content__btn account-content__btn--primary account-content__btn--wide-medium">Зарегистрировать</button> </a>


                                                <a href="#" class="js-show-log-and-reg">   <button
                                                            class="account-content__btn account-content__btn--primary account-content__btn--wide-medium">Забыли пароль?</button>
                                                </a>


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
    </section>


@endsection


@section('scripts')
    <script>
    jQuery(document).ready(function($) {
        $('.label-for-psw-1 img').mousedown(function() {
            $('.my-psw-1').attr('type','text');
        });

        $('.label-for-psw-1 img').mouseup(function() {
            $('.my-psw-1').attr('type','password');
        });
    })

    </script>
@endsection