<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title : 'Adminpanel'}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- Custom CSS -->

    @yield('style')

    <!-- Custom CSS -->
    <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
    
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="{{ route('main_page') }}">
                            
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
                                <!-- Light Logo text -->
                                <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> -->
                                <h3>TurkmenPost <br> Market</h3>
                            </span>
                            
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">{{$page_title}}</h3>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        @guest
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user-dropdown-menu-1" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('admin/assets/images/users/profile-pic.jpg')}}" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span
                                        class="text-dark">{{ auth()->user()->name }}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY user-dropdown-menu-2">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                ><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Выйти</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                        @endguest
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link " href="{{ route('admin') }}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Админпанель</span></a></li>
                        <li class="list-divider"></li>
                        @if(Auth::user()->role == "admin" || Auth::user()->role == "product_manager")

                       

                    
                        <li class="sidebar-item {{(strpos(url()->current(),'admin/products') === false) ? '' : 'selected'}}"> <a class="sidebar-link" href="{{ route('admin_products') }}"
                                aria-expanded="false"><i class="fas fa-shopping-bag"></i><span
                                    class="hide-menu">Товары
                                </span></a>
                        </li>
                        @endif
                        @if(Auth::user()->role == "admin")
                        <li class="sidebar-item {{(strpos(url()->current(),'admin/categories') === false) ? '' : 'selected'}}"> <a class="sidebar-link sidebar-link" href="{{ route('admin_categories') }}"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">Категории</span></a></li>
                        <li class="sidebar-item {{(strpos(url()->current(),'admin/colors') === false) ? '' : 'selected'}}"> <a class="sidebar-link sidebar-link" href="{{ route('admin_colors') }}"
                                aria-expanded="false"><i class="fas fa-paint-brush"></i><span
                                    class="hide-menu">Цвета</span></a></li>
                        @endif 
                        @if(Auth::user()->role == "dispatcher" || Auth::user()->role == "admin")     
                        <li class="sidebar-item {{(strpos(url()->current(),'admin/orders') === false) ? '' : 'selected'}}"> <a class="sidebar-link sidebar-link" href="{{ route('admin_orders') }}"
                                aria-expanded="false"><i class="fas fa-clipboard-list"></i><span
                                    class="hide-menu">Заказы</span></a></li>
                                    @endif
                        @if(Auth::user()->role == "admin")
                        <li class="sidebar-item {{(strpos(url()->current(),'admin/paid_online') === false) ? '' : 'selected'}}"> <a class="sidebar-link sidebar-link" href="{{ route('admin_paid_online') }}"
                                aria-expanded="false"><i class="fas fa-clipboard-list"></i><span
                                    class="hide-menu">Оплата (онлайн)</span></a></li>
                        <li class="sidebar-item {{(strpos(url()->current(),'admin/news') === false) ? '' : 'selected'}}"> <a class="sidebar-link sidebar-link" href="{{ route('admin_news') }}"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Новости</span></a></li>
                        
                        </li>
                        <li class="sidebar-item {{(strpos(url()->current(),'admin/content') === false) ? '' : 'selected'}}"> <a class="sidebar-link" href="{{ route('admin_content') }}"
                                aria-expanded="false"><i class="fas fa-images"></i><span
                                    class="hide-menu">Слайдеры, блоки над футером </span></a>
                        </li>
                        <li class="sidebar-item {{(strpos(url()->current(),'admin/users') === false) ? '' : 'selected'}}"> <a class="sidebar-link" href="{{ route('users.index') }}"
                            aria-expanded="false"><i class="fas fa-user-circle"></i><span
                                class="hide-menu">Пользователи</span></a>
                        </li>



                            <li class="sidebar-item {{(strpos(url()->current(),'admin/content/gift') === false) ? '' : 'selected'}}"> <a class="sidebar-link" href="{{ route('admin_gift') }}"
                                                                                                                                  aria-expanded="false"><i class="fas fa-gift"></i><span
                                            class="hide-menu">Подарки</span></a>
                            </li>

                            <li class="sidebar-item {{(strpos(url()->current(),'admin/content/otzyw') === false) ? '' : 'selected'}}"> <a class="sidebar-link" href="{{ route('admin_otzyw') }}"
                                                                                                                                         aria-expanded="false"><i class="fas fa-comment"></i><span
                                            class="hide-menu">Отзывы и вопросы</span></a>
                            </li>

                            <li class="sidebar-item {{(strpos(url()->current(),'admin/content/eksklyuziw') === false) ? '' : 'selected'}}"> <a class="sidebar-link" href="{{ route('admin_eksklyuziw') }}"
                                                                                                                                          aria-expanded="false"><i class="fas fa-paper-plane"></i><span
                                            class="hide-menu">Эксклюзивные предложения для продуктов</span></a>
                            </li>



                            <li class="sidebar-item {{(strpos(url()->current(),'admin/warns') === false) ? '' : 'selected'}}"> <a class="sidebar-link" href="{{ route('admin_warns') }}"
                                                                                                                                               aria-expanded="false"><i class="fas fa-share-alt"></i><span
                                            class="hide-menu">Popup для скидков</span></a>
                            </li>


                        @endif 
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        @yield('content')
        
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    
    <script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{asset('admin/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('admin/dist/js/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('admin/dist/js/custom.min.js')}}"></script>

    <script>
        $(".user-dropdown-menu-1").click(function() {
            $('.user-dropdown-menu-2').css('display','block')
        })
        $(window).click(function(event) {
            var target = $( event.target );
            if(target.is('.user-dropdown-menu-1')) {
                if($('.user-dropdown-menu-2').css('display') == 'none') $('.user-dropdown-menu-2').css('display','block');
                else $('.user-dropdown-menu-2').css('display','none');
            }
            else {
                if($('.user-dropdown-menu-2').css('display') == 'block') $('.user-dropdown-menu-2').css('display','none');
            }
        })
    </script>
    
    @yield('scripts')
    
</body>
</html>
