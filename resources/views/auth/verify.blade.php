@extends('layouts.app')

@section('style')
@endsection

@section('content')
    {{--<section class="section-4 section-4-2 wrapper d-flex spacebetween aligncenter">
        <div class="sign-in-form-container registration">
            <form method="POST" action="{{ route('verifi-send') }}">
                @csrf
                <input type="hidden" name="id" value="{{isset($id) ? $id : 0}}">
                <div class="flex row aligncenter spacebetween">
                    <h2>SMS-de alnan tassyklama koduny giriziň</h2>
                </div>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="d-flex column aligncenter">
                    <input type="number" name="code" required autofocus placeholder="SMS kody">

                    <button type="submit" class="button ml40">Ugratmak</button>
                </div>
            </form>
        </div>
        <div class="img-container-0025">
            <img src="{{asset('img/animation/resource3.png')}}" width="621" alt="">
        </div>
    </section>--}}


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

                                            <form class="dynamic-form" action="{{ route('verifi-send') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="dynamic-form__wrapper">
                                                    <div class="dynamic-form__dynamic-field">
															<span
                                                                    class="dynamic-form__dynamic-field-static-label dynamic-form__dynamic-field-static-label-mandatory">SMS-de alnan tassyklama koduny giriziň
															</span>
                                                        <div class="input__input-wrapper input__input-wrapper-placeholder">

                                                            @error('phone')
                                                                 <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $message }}</strong>
                                                              </span>
                                                            @enderror
                                                            <input type="hidden" name="id" value="{{isset($id) ? $id : 0}}">
                                                            <input type="number" name="code" required autofocus placeholder="SMS kody">
                                                        </div>
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