@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/old/owl.carousel.min.css')}}">

@endsection

@section('content')

    <section class="main-category">
        <div class="main-category__container __container">
            <div class="main-category__wrapper">
                <section class="main-category__slider category-slider">
                    <div class="category-slider__slids">

                                <article class="category-slider__item category-box">
                                    <a href="">

                                        <div class="category-box__img category-box__img_slider">
                                            <img src="
                                    {{asset($obraz->img)}}" alt="" />
                                        </div>
                                        <div class="category-box__category">
                                            <div class="category-box__category-name">{{$obraz->title}}</div>
                                        </div>
                                    </a>
                                </article>


                    </div>
                </section>

            </div>
        </div>
    </section>


    <section class="news">
        <div class="news__container __container">
            <div class="news__row">
                <div class="col">
                    
                  @foreach($news as $new)
                    <div class="news-item">
                        <a href="" class="news-item__image-link">

                                <img src="
                                   {{ asset('/images/my_news/little/' . $new->image) }}" alt="" />

                        </a>
                        <div class="news-item__content">
                            <div class="news-item__type">
                                {{$new->short_title}}
                            </div>
                            <div class="news-item__name">
                                <a href="#">{{$new->title}}</a>
                            </div>
                            <div class="news-item__description">
                                <p><span style="font-size:16px">{{$new->news_body}}</span></p>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/sliders.js')}}"></script>

@endsection
