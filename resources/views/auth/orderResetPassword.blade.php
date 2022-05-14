@extends('layouts.app')

@section('content')
    <section class="section-4 section-4-2 wrapper d-flex spacebetween aligncenter">
        <div class="sign-in-form-container">
            <h2>Parolyň dikeldilmegi</h2>
            <form class="sign-in-form" action="{{ route('account.reset_password_without_token') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row flex alignend">
                    <p class="mr10">+993</p>
                    <input id="phone" type="text" autofocus name="login" placeholder="Telefon" required >
                </div>
                @error('login')
                    <div class="invalid-feedback" role="alert">
                        <p class="invalid-feedback-p">{{ $message }}</p>
                    </div>
                @enderror

                <input type="submit" name="" value="Ugratmak">
            </form>
            <div class="devider devider-2"></div>
        </div>
        <div class="img-container-0025">
            <img src="{{asset('img/animation/resource3.png')}}" width="621" alt="">
        </div>
    </section>
@endsection