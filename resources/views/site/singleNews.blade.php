@extends('layouts.app')

@section('content')
	<section class="edara">
        <div class="container">
            <h1 class="mb20">{{ $nowost->title }}</h1>
            <div class="boxes">
                <div class="box box-two">
                    <div class="boxes boxes-column">
                        <img class="news-top" src="/images/my_news/big/{{$nowost->image}}" alt="">
                        <div class="content">
                            {!! $nowost->news_body !!}
                        </div>
                    </div>
                </div>
                <div class="box box-one">
                    <ul id="paginationContainer" class="mt30">
                        @if(count($allnews))
                            @foreach($allnews as $item)
                                <li>
                                    <a href="{{route('news', ['new_alias' => $item->id])}}" class="prev-content" >
                                        <p class="date-prev p-news">{{$item->created_at->format('d.m.Y')}}</p>
                                        <h5>{{$item->title }}</h5>
                                    </a>
                                </li>
                            @endforeach
                        @endif

                    </ul>
                    <div class="holder"></div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('scripts')

	<link rel="stylesheet" href="/css/animate.css">
    <script src="/js/jPages.min.js"></script>

    <script>

    /* when document is ready */
        $(document).ready(function(){
        /* initiate the plugin */
        $("div.holder").jPages({
            containerID  : "paginationContainer",
            perPage      : 3,
            startPage    : 1,
            startRange   : 1,
            midRange     : 3,
            endRange     : 1,
            first        : false,
            previous     : false,
            next         : false,
            last         : false,
            delay        : 100,
            animation    : "fadeInRight"
            });
        });
    </script>
@endsection