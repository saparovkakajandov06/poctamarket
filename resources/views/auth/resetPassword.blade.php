@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <section class="section-4 wrapper">
        <h2 class="hasaba-almak-h2">Paroly Üýtgetmek</h2>
        <div class="sign-up-form-container mini-wrapper d-flex">
            
            <form class="sign-up-form" action="{{ route('account.reset_password_with_token') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($errors->all() as $error)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $error }}</strong>
                    </span>
                @endforeach
                <div class="row flex alignend">
                    <p class="mr10">+993</p>
                    <input id="login" type="text" name="login" autocomplete="login" placeholder="Login" required>
                </div>
                @error('login')
                    <div class="invalid-feedback" role="alert">
                        <p class="invalid-feedback-p">{{ $message }}</p>
                    </div>
                @enderror
                <input id="token" type="text" name="tokenReq" autocomplete="token" placeholder="SMS kody" required>
                @error('tokenReq')
                    <div class="invalid-feedback" role="alert">
                        <p class="invalid-feedback-p">{{ $message }}</p>
                    </div>
                @enderror
                <input id="password" type="password" name="password" placeholder="Täze Parol" required>
                @error('password')
                    <div class="invalid-feedback" role="alert">
                        <p class="invalid-feedback-p">{{ $message }}</p>
                    </div>
                @enderror
                <input id="confirm_password" type="password" name="confirm_password" placeholder="Paroly gaýtadan ýaz" required>
                
                <input type="submit" name="" value="Hasaba alyň">
            </form>
            <div class="img-container-001">
                <img src="{{asset('img/animation/resource3.png')}}" width="621" alt="">
            </div>
        </div>
    </section>
@endsection