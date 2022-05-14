@extends('layouts.app')

@section('style')
@endsection

@section('content')




<div class="checkout-main__step-area step-area">
    <div class="step-area__wrapper step-area__step-2">

        <div class="step-area__row">

            <div class="account-content">
                <div class="account-content__row">
                    <div class="account-content__column account-content__column_big">
                        <div class="delivery-addresses__delivery-addresses">

                            <div class="account-content__row ">


                                @if(session('status'))
                                <div class="present-box">
                                    <div class="present-box__container __container">
                                        <div class="present-box__wrapper">
                                            <div class="present-box__titles">
                                                <h2>  {{ session('status') }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(count($errors))
                                <div class="present-box">
                                    <div class="present-box__container __container">
                                        <div class="present-box__wrapper">
                                            <div class="present-box__titles">
                                                @foreach($errors->all() as $error)
                                                    <h2>{{$error}}</h2>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div
                                        class="account-content__column account-content__column_big">

                                        <form class="dynamic-form" action="{{ route('podarka.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="dynamic-form__wrapper">
                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Получатель</span>
                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                    <input type="text" name="username">
                                                </div>
                                            </div>
                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Отправитель
																	</span>
                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                    <input type="text" name="name">
                                                </div>
                                            </div>
                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Фамилия отправителя</span>
                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                    <input type="text" name="surname">
                                                </div>
                                            </div>
                                            <div class="dynamic-form__dynamic-field">
                                                <span class="dynamic-form__dynamic-field-static-label">Эл. адрес отправителя</span>
                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                    <input type="email" name="email">
                                                </div>
                                            </div>

                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Телефон номер отправителя</span>
                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                    <input type="number" name="phone">
                                                </div>
                                            </div>

                                            <div class="dynamic-form__dynamic-field">
                                                <span class="dynamic-form__dynamic-field-static-label">Содержание</span>
                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                  <input type="text" name="sebap">
                                                </div>
                                            </div>
                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Ссылка</span>
                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                    <input type="text" name="hyper">
                                                </div>
                                            </div>
                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">Сообщение</span>
                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                    <input type="text" name="message">
                                                </div>
                                            </div>

                                            <div class="dynamic-form__dynamic-field">
																	<span
                                                                            class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory" for="customCheck4">Отправите срочно!</span>
                                                <div class="input__input-wrapper input__input-wrapper-placeholder">
                                                    <input type="checkbox" value="1"  name="send"  id="customCheck4">
                                                </div>
                                            </div>


                                            <!--  -->
                                            <div
                                                    class="dynamic-form__row dynamic-form__row_nowrap dynamic-form__add-new-address-form-buttons">
                                             {{--   <button
                                                        class="account-content__btn account-content__btn--default account-content__btn--wide-medium">Аннулировать</button>--}}
                                                <button type="submit"
                                                        class="account-content__btn account-content__btn--primary account-content__btn--wide-medium">Сохранить</button>
                                            </div>
                                        </div>
                                    </form>
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
 {{--   <div class="step-buttons__step-btn-section">
        <div class="step-buttons__step-btn-wrapper">
            <button
                    class="account-content__btn account-content__btn--primary account-content__btn--height-large account-content__btn--small-round step-buttons__step-btn step-buttons__step-btn-submit">
                К оплате
            </button>
        </div>
        <div class="step-buttons__step-btn-wrapper">
            <button
                    class="account-content__btn account-content__btn--height-large account-content__btn--small-round account-content__btn--back">
									<span class="step-buttons__left-edge">
										<span class="_icon-arrow"></span>
										Вернуться
									</span>
            </button>
        </div>
    </div>--}}
</div>

@endsection

@section('scripts')
@endsection