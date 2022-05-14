@extends('layouts.app')

@section('style')
@endsection

@section('content')


    <section class="new-product">
        {{--<a href="#" class="new-product__big-title">Täze gelenler</a>--}}
        <div class="new-product__container __container">
            <div class="new-product__wrapper">
                <section class="new-product__row">

                    @foreach($newProds as $np)
                        @if($np->new == 1)
                            <article class="new-product__column">
                                <div class="new-product__img-box">
                                    <a href="{{ route('oneProduct',['id'=>$np->id]) }}" class="new-product__img">
                                        <img src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}" alt="" />
                                    </a>

                                    @if(Auth()->user())
                                        <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                            {{csrf_field()}}
                                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                            <input name="product_id" type="hidden" value="{{$np->id}}" />

                                            <button class="new-product__favorite">
                                                <span class="_icon-heart"></span>
                                               
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                            {{csrf_field()}}
                                            <input name="product_id" type="hidden" value="{{$np->id}}" />

                                            <button class="new-product__favorite">
                                                <span class="_icon-heart"></span>
                                              
                                            </button>
                                        </form>
                                    @endif

                                  

                                    <div class="new-product__img-bot">
                                         
                                        <div class="new-product__img-bot-new">  @if($np->new ) Täze @endif</div>
                                    </div>
                                </div>
                                <div class="new-product__inf-box">
                                    <div class="new-product__price-com">
                                        <div class="new-product__price">
                                            
                                            <div class="new-product__price-new">{{number_format($np->price,2,'.','')}} TMT</div>
                                          
                                        </div>

                                    </div>
                                    <a href="#" class="new-product__company">{{$np->brand }}</a>
                                 
                                    <a href="#" class="new-product__link">{{$np->name_tk }}</a>
                                </div>
                            </article>
                        @endif
                    @endforeach


                </section>
            </div>
        </div>
        <div class="pagination">
            <div class="pagination__container __container">
                <div class="pagination__paginations">
                    {{ $newProds->links() }}

                </div>
            </div>
        </div>
    </section>




    {{--hity prodaj--}}
    <section class="new-product">
        <div class="new-product__container __container">
            <div class="new-product__wrapper" style="position: relative;">

                <div class="new-product__category-active-slider">
                    <section class="new-product__row new-product__slider">

                        @foreach($recProds as $np)
                            @if($np->recommended == 1)
                                <article class="new-product__column">
                                    <div class="new-product__img-box">
                                        <a href="{{ route('oneProduct',['id'=>$np->id]) }}" class="new-product__img">
                                            <img src="{{ asset('images/products/smaller/' . json_decode($np->img)->main) }}" alt="" />
                                        </a>

                                        @if(Auth()->user())
                                            <form action="{{route('wishlist.store')}}" id="contact_form" method="post">
                                                {{csrf_field()}}
                                                <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />
                                                <input name="product_id" type="hidden" value="{{$np->id}}" />

                                                <button class="new-product__favorite">
                                                    <span class="_icon-heart"></span>
                                                 
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{route('login')}}">
                                                <button class="new-product__favorite">
                                                    <span class="_icon-heart"></span>
                                                   
                                                </button>
                                            </a>
                                        @endif


                                        <div class="new-product__img-bot">
                                           
                                            <div class="new-product__img-bot-new">
                                                @if($np->recommended )
                                                    Meşhur
                                                @endif</div>
                                        </div>
                                    </div>
                                    <div class="new-product__inf-box">
                                        <div class="new-product__price-com">
                                            <div class="new-product__price">
                                                <div class="new-product__price-current">{{number_format($np->price,2,'.','')}} TMT</div>
                                            </div>
                                            <a href="#" class="new-product__company">{{$np->brand }}</a>
                                        </div>
                                        <a href="#" class="new-product__category">{{$np->name_tk }}</a>
                                       
                                    </div>
                                </article>
                            @endif
                        @endforeach

                    </section>
                </div>
            </div>
        </div>
    </section>
    {{--hity prodaj--}}
@endsection


@section('scripts')

    <script>
        $(document).ready(function() {
            let prodsAmount = $('.card-cont-cat-1 .card').length;

            if(prodsAmount % 5 > 1) {
                let needToAdd = 5 - (prodsAmount % 5)

                for(let i=0; i<needToAdd; i++) {
                    $('.card-cont-cat-1 .card').first().clone().css({
                        opacity: 0,
                        pointerEvents: 'none'
                    }).addClass('cloned-card').appendTo('.card-cont-cat-1');
                }
            }
        })
    </script>
    <script>
$(document).ready(function(){

 var _token = $('input[name="_token"]').val();

 load_data('', _token);

 function load_data(id="", _token)
 {
  $.ajax({
   url:"{{ route('ajax_load') }}",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#load_more_button').remove();
    $('#post_data').append(data);
   }
  })
 }

 $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b>Loading...</b>');
  load_data(id, _token);
 });

});
</script>
@endsection