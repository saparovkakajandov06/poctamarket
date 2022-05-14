@extends('layouts.app')

@section('content')

    <section class="m-news-item">
        <div class="m-news-item__container __container">
            <div class="m-news-item__header">
                <div class="m-news-item__header-title">{{$news->title}}</div>
                <div class="m-news-item__header-sub-title">{{$news->short_title}}</div>
                <div class="m-news-item__header-date">{{$news->created_at}}</div>
            </div>
            <div class="m-news-item__content">
                <img src="/images/my_news/little/{{$news->image}}" alt="">
                <p>
                    {{$news->news_body}}
                </p>
            </div>

            <section class="news">
                <div class="news__container __container">
                    <div class="news__row">
                        <div class="col">



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
    </section>

@endsection
