

    <h2 class="wrapper">Halanlarym</h2>



        <section class="col-12">
            <div class="container">
                <div class="row">
                    @if (Auth::user()->wishlist->count() )
                        @foreach ($wishlists as $wishlist)


                            <div class="col-4">

                                <div class="card">
                                    <a href="{{ route('oneProduct',['id'=>$wishlist->product->id]) }}">
                                        <div class="card-img">
                                            <img src="{{ asset('images/products/smaller/' . json_decode($wishlist->product->img)->main) }}" alt="">
                                        </div>
                                        <div class="card-body">
                                            <h5> {{$wishlist->product->name_tk}}</h5>
                                        </div>
                                    </a>
                                    <div class="card-footer">

                                        <h5> {{$wishlist->product->brand}}</h5>
                                        <h5>{{ number_format($wishlist->product['price'],2,'.','') }} TMT </h5>
                                        <form action="{{ route('wishlist.destroy',$wishlist->id) }}" class="delete-product-form" method="post" style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-transparent border-0 p-0" title="Poz">
                                                Poz
                                            </button>
                                        </form>

                                        @if ($wishlist->product->availability == 1)
                                            <div class="sizes-and-cart">
                                                <div class="cart-loader-container d-flex justify-center aligncenter">
                                                    <div class="cart-loader"></div>
                                                </div>
                                                <a class="add-to-cart" href="#" data-id="{{$wishlist->product->id}}">Sebede goş</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        @endforeach
                    @endif



                </div>
            </div>
        </section>

        {{--<section class="cart-table wrapper">
            <table>
                <thead>
                <tr>
                    <th class="epmty-th"></th>
                    <th class="th-for-photo">Harytlar</th>
                    <th class="th-for-name">Ady</th>
                    <th class="th-for-price">Brend</th>
                    <th class="th-for-price">Bahasy</th>
                    <th class="th-for-price">Operasiýalar</th>
                    <th class="epmty-th"></th>
                </tr>
                </thead>
                <tbody>
                @if (Auth::user()->wishlist->count() )
                    @foreach ($wishlists as $wishlist)




                        <tr>
                        <td class="empty-td"></td>
                        <td align="center" class="td-for-photo"><img src="{{ asset('images/products/smaller/' . json_decode($wishlist->product->img)->main) }}" height="158" alt=""></td>
                        <td class="td-for-name">
                            <h5> {{$wishlist->product->name_tk}}</h5>
                        </td>

                        <td class="td-for-price">
                            <h5> {{$wishlist->product->brand}}</h5>
                        </td>


                        <td class="td-for-price">   <h5>{{ number_format($wishlist->product['price'],2,'.','') }} TMT </h5></td>
                        <td class="td-for-price">

                            <form action="{{ route('wishlist.destroy',$wishlist->id) }}" class="delete-product-form" method="post" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-transparent border-0 p-0" title="Poz">
                                        Poz
                                </button>
                            </form>

                            @if ($wishlist->product->availability == 1)
                            <div class="sizes-and-cart">
                                <div class="cart-loader-container d-flex justify-center aligncenter">
                                    <div class="cart-loader"></div>
                                </div>
                                <a class="add-to-cart" href="#" data-id="{{$wishlist->product->id}}">Sebede goş</a>
                            </div>
                                @endif


                        </td>

                    </tr>

                    @endforeach
                @endif
                </tbody>
            </table>

        </section>--}}





