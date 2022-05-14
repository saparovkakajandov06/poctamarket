<div class="left-side-div">
                        <h2>{{Auth::user()->name}} {{Auth::user()->surname}}</h2>
                        <p>Telefon belgim</p>
                        <p class="left-side-div-number">+993 {{Auth::user()->phone}}</p>
                        <div class="left-side-div-menu d-flex column">
                            <a href="{{ route('history') }}">Taryh</a>
                            <a href="{{route('cart')}}">Sebet</a>
                            <a href="{{ route('getprofileinfo') }}">Profil</a>
                            <a href="{{ route('change.password.form') }}">Paroly üýtgetmek</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                            >Çykyň</a>
                        </div>
                    </div>