<div class="cabinet-header d-flex spacebetween">
                    <h2 class="d-flex">Şahsy otag</h2>
                    <div class="cabinet-header-number-phone d-flex">
                        <p class="d-flex column aligncenter">
                            <span class="span-phone">+993 {{Auth::user()->phone}}</span> <br>
                            <span class="span-name">{{Auth::user()->name}} {{Auth::user()->surname}}</span>
                        </p>
                        <div class="cabinet-header-icon d-flex aligncenter justify-center">
                            <img src="{{asset('img/icons/Union9.png')}}" width="14.5" alt="">
                        </div>
                    </div>
                    <div class="cabinet-menu d-flex column">
                        <a href="{{ route('getprofileinfo') }}">Profil</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                        >Çykyň</a>
                    </div>
                </div>