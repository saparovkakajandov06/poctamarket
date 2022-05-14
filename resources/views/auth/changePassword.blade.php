@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <section class="new-section-2-outer">
        <section class="wrapper new-section-2">
            <div class="new-section-2-inner">
                @include('inc.cabinet_header')
                
                <div class="cabinet-content d-flex">
                    @include('inc.cabinet_menu')
                    
                    <div class="right-side-div">
                        <div class="right-side-div-content">
                            
                            <div class="right-side-div-content-1 d-flex aligncenter">
                                <a href="{{ route('home') }}">
                                    <img class="mr10" src="{{asset('img/icons/Group113.png')}}" width="24" height="12" alt="">
                                </a>
                                <h2>Açar Söz Üýtgetmek</h2>
                            </div>
                            @if(session('status'))
                                <!-- <section class="wrapper"> -->
                                    <h5 class="alert-success-1 p20 mt20 mb20">{{ session('status') }}</h5>
                                <!-- </section> -->
                            @endif
                            @if(count($errors))
                                @foreach($errors->all() as $error)
                                    <h5 class="h5-alert p20 mb10">{{$error}}</h5>
                                @endforeach
                            @endif
                            <form action="{{ route('change.password') }}" method="post" class="d-flex spacebetween flex-wrap form-in-profile-12">
                            
                                @csrf
                                <div class="input-conatiner-1 d-flex column flex-wrap">
                                    <input id="password" type="password" name="current_password" autocomplete="current-password" required>
                                    <label>Häzirki Açar Söz *</label>
                                </div>
                                <div class="input-conatiner-1 d-flex column flex-wrap">
                                    <input id="new_password" type="password" name="new_password" autocomplete="current-password" required>
                                    <label>Täze Açar Söz *</label>
                                </div>
                                
                                <div class="input-conatiner-1 d-flex column flex-wrap"></div>

                                <div class="input-conatiner-1 d-flex column flex-wrap">
                                    <input id="new_confirm_password" type="password" name="new_confirm_password" autocomplete="current-password" required>
                                    <label>Paroly gaýtadan ýaz *</label>
                                </div>
                                
                                <div class="input-conatiner-1 input-conatiner-2 d-flex column flex-wrap"></div>
                                
                                <div class="input-conatiner-2 d-flex justify-center">
                                    <input class="submit-toleg-new submit-tassyk-new" type="submit" value="Üýtgetmek">
                                </div>
                            </form>
                        </div>
                        
                        <div class="right-side-div-content d-flex spacebetween flex-wrap">
                            <a href="#" class="right-side-div-card smaller-card-1 ads-banner-12"></a>
                            <a href="#" class="right-side-div-card smaller-card-1 ads-banner-12"></a>
                            <a href="#" class="right-side-div-card smaller-card-1 ads-banner-12"></a>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </section>
@endsection

@section('scripts')
@endsection