@extends('layouts.app')

@section('content')

    <section class="news">
        <div class="news__container __container">
            <div class="news__header">
                <div class="news__header-tite">Kompaniýanyň aksiýalary we täzelikleri</div>
                <div class="news__header-tabs">
                    <div class="news__header-tab">
                        <a href="#">Aksiýa</a>
                    </div>
                    <div class="news__header-tab">
                        <a href="#">Täzelikler</a>
                    </div>
                    <div class="news__header-tab news__header-tab_active">
                        <a href="#">Hemmesi</a>
                    </div>
                </div>
            </div>
            <div class="news__filter-container">
                <div class="news__filter news-filter">
                    <div class="news-filter__header">
                        <div class="news-filter__header-title">Hemişe</div>
                        <span class="_icon-arrow1"></span>
                    </div>
                    <div class="news-filter__menu">
                        <ul class="news-filter__size">
                            <li class="news-filter__item">Hemişe</li>
                            <li class="news-filter__item">Sentýabr</li>
                            <li class="news-filter__item">Awgust</li>
                            <li class="news-filter__item">Iýul</li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="news__row">
                <div class="col">
                    @foreach($iki_uly as $item)

                        <div class="news-item news-item-big">
                            <a href="{{route('news_detail', ['id' => $item->id])}}" class="news-item__image-link">
                                <div class="news-item__image" style="background-image: url(/images/my_news/little/{{$item->image}});">
                                </div>
                            </a>
                        </div>

                    @endforeach

                        @foreach($paginator as $item)
                    <div class="news-item">
                        <a href="{{route('news_detail', ['id' => $item->id])}}" class="news-item__image-link">
                            <div class="news-item__image" style="background-image: url(/images/my_news/little/{{$item->image}});">
                            </div>
                        </a>
                        <div class="news-item__content">
                            <div class="news-item__type">
                                {{$item->short_title}}
                            </div>
                            <div class="news-item__name">
                                <a href="{{route('news_detail', ['id' => $item->id])}}">{{$item->title}}</a>
                            </div>
                            <div class="news-item__description">
                                <p><span style="font-size:16px">{{$item->news_body}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                        @endforeach

                </div>
            </div>
        </div>
    </section>

{{--    <section class="breadcrumbs wrapper">
        <a href="{{ route('main_page') }}" class="custom-bread-item">
            Baş Sahypa
        </a>
        <p class="bread-arrows">>></p>
        <a href="#" class="custom-bread-item active-bread">
            Habarlar
        </a>
    </section>

    <h2 class="wrapper product-title-desktop">Habarlar</h2>


	<section class="category">
        <div class="container">

            <div class="card">
                <div class="card-header">Yokarky iki uly</div>
                <div class="card-body">
                @foreach($iki_uly as $item)
                    <a href="{{route('news_detail', ['id' => $item->id])}}" class="box">
                        <img src="/images/my_news/little/{{$item->image}}" alt="">
                        <div class="content">
                            <h5>{{$item->title }}</h5>
                            <div class="sub-content">
                                <span class="p-news">{{$item->created_at->format('d.m.Y')}}</span>
                            </div>
                            <p class="p-news">{{$item->short_title }}</p>
                        </div>
                    </a>
                @endforeach
                </div>
            </div>

            <div class="boxes news-blocks">
<h4>Asakylar</h4>
                @foreach($paginator as $item)
                <a href="{{route('news_detail', ['id' => $item->id])}}" class="box">
                    <img src="/images/my_news/little/{{$item->image}}" alt="">
                    <div class="content">
                        <h5>{{$item->title }}</h5>
                        <div class="sub-content">
                            <span class="p-news">{{$item->created_at->format('d.m.Y')}}</span>
                        </div>
                        <p class="p-news">{{$item->short_title }}</p>
                    </div>
                </a>

                @endforeach
                
            </div>

            @if($paginator->lastPage() > 1)
            <div class="boxes pagination">
                @for($i = 1; $i <= $paginator->lastPage(); $i++)
                    @if($paginator->currentPage() == $i)
                        <a class="active">{{$i}}</a>
                    @else
                        <a href="{{$paginator->url($i)}}">{{$i}}</a>
                    @endif
                @endfor
                
            </div>

            @endif
        </div>
    </section>--}}

@endsection
