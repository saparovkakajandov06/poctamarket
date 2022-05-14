@extends('layouts.app')

@section('content')
    
    <div class="title m-b-md">
        @lang('site.laravel')
    </div>
    
    <div id="contact-page" class="container">
    <div class="bg">
        	
        <div class="row">  	
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">get_in_touch</h2>

                    @if(session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                    @endif

                    @if(count($errors))
                    <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif

                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" action="{{ route('email') }}" method="post">
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="@lang('site.name')" value="{{ old('name') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" placeholder="@lang('site.subject')" value="{{ old('subject') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="text" id="message" class="form-control" rows="8" placeholder="Your Message Here"> {{ old('text') }}</textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="@lang('site.submit')">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">@lang('site.contact_info')</h2>
                    <address>
                        <p>E-Shopper Inc.</p>
                        <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                        <p>@lang('site.ny_usa')</p>
                        <p>@lang('site.mobile'): +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: info@e-shopper.com</p>
                    </address>
                    <div class="social-networks-new">
                        <h2 class="title text-center">@lang('site.social')</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    			
        </div>  
    </div>	
</div><!--/#contact-page-->
@endsection