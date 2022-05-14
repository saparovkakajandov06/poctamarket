@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/old/owl.carousel.min.css')}}">

@endsection

@section('content')

    <section class="portfolio">
        <div class="portfolio__container __container">
            <div class="portfolio__wrapper">
                <div class="portfolio__categorys portfolio-categorys">
                    <div class="portfolio-categorys__title">
                        <p>Ваши образы в gj</p>
                    </div>
                    <div class="portfolio-categorys__row filter-button-group">
                        <button class="portfolio-categorys__item" data-filter="mans">взрослые</button>
                        <button class="portfolio-categorys__item" data-filter="child">дети</button>
                        <button class="portfolio-categorys__item portfolio-categorys__item_active"
                                data-filter="all">все</button>
                    </div>
                </div>
                <div class="portfolio__row grid">
                    @foreach($obraz as $obr)
                    <a href="{{route('show_gallery_detail',['id'=>$obr->id])}}" class="portfolio__column mans all">
                        <img src="{{$obr->img}}" alt="" />
                    </a>
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
