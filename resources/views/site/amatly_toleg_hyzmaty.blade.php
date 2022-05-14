@extends('layouts.app')

@section('content')


<div class="service-page-iframe" id="container">
        <style type="text/css">
            .payment-method p.c-h3 {
                margin-bottom: 28px;
            }

            .payment-method img {
                border: none;
                margin: 0;
                padding: 0;
            }

            .payment-method .dropdown-content {
                padding: 0 0 10px;
            }

            .payment-method ul.list-text li {
                margin-bottom: 0;
            }

            .payment-method ul.list-text li.list-text-title {
                margin-left: -21px;
            }

            .payment-method ul.list-text li.list-text-title:before {
                display: none;
            }

            .payment-method p+ul.list-text {
                margin-top: 28px;
            }

            * {
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                outline: 0
            }

            ::after,
            ::before {
                -webkit-box-sizing: border-box;
                box-sizing: border-box
            }

            :focus {
                outline: 0
            }


            .service-page-iframe {
                font-size: 14px;
                line-height: 20px;
                width: 100%;
                padding: 40px 32px;
                -moz-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
                text-size-adjust: 100%
            }

            .service-page-iframe.bold {
                font-weight: 700
            }

            .service-page-iframe.gray {
                color: #8b8b8b
            }

            .service-page-iframe.wb {
                color: #cb11ab
            }

            @media (max-width:1199.98px) {
                .service-page-iframe {
                    padding: 0 16px
                }
            }

            @media (min-width:1024px) {
                .service-page-iframe {
                    font-size: 16px;
                    line-height: 22px
                }

                .service-page-iframe.bold {
                    font-weight: 700
                }

                .service-page-iframe.gray {
                    color: #8b8b8b
                }

                .service-page-iframe.wb {
                    color: #cb11ab
                }
            }

            @media (min-width:1024px) and (max-width:1023.98px) {
                .service-page-iframe {
                    font-size: 14px;
                    line-height: 20px
                }

                .service-page-iframe.bold {
                    font-weight: 700
                }

                .service-page-iframe.gray {
                    color: #8b8b8b
                }

                .service-page-iframe.wb {
                    color: #cb11ab
                }
            }


            .service-page-iframe .wrap-helper p {
                margin-bottom: 12px
            }

            .service-page-iframe .wrap-helper ul {
                list-style: none;
                padding-left: 21px;
                margin: 0 0 28px
            }

            .service-page-iframe .wrap-helper ul li {
                position: relative;
                color: #000;
                margin: 0 0 16px
            }

            .service-page-iframe .wrap-helper ul li:before {
                content: '—';
                position: absolute;
                top: 0;
                left: -20px
            }

            .service-page-iframe .dropdown-number {
                counter-reset: number-drop
            }

            .service-page-iframe .dropdown-number .dropdown-title:before {
                counter-increment: number-drop;
                content: counter(number-drop) ". "
            }

            .service-page-iframe .dropdown-item {
                border-top: 1px solid #e8e8e8
            }

            .service-page-iframe .dropdown-item:last-child {
                border-bottom: 1px solid #e8e8e8
            }

            .service-page-iframe .dropdown-title {
                font-size: 16px;
                line-height: 22px;
                font-weight: 600;
                margin: 0;
                padding: 9px 30px 11px 0;
                position: relative;
                cursor: pointer
            }

            @media (min-width:768px) {
                .service-page-iframe .dropdown-title {
                    font-size: 20px;
                    line-height: 28px
                }
            }

            @media (min-width:1024px) {
                .service-page-iframe .dropdown-title {
                    padding: 13px 50px 16px 0
                }
            }

            .service-page-iframe .dropdown-title:after {
                content: '';
                display: block;
                width: 9px;
                height: 9px;
                position: absolute;
                right: 1px;
                top: 16px;
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg);
                -webkit-transform-origin: 3px 6px;
                transform-origin: 3px 6px;
                border-left: 2px solid;
                border-bottom: 2px solid;
                border-color: #000;
                -webkit-transition: border-color .3s ease, -webkit-transform .3s ease;
                transition: border-color .3s ease, -webkit-transform .3s ease;
                transition: transform .3s ease, border-color .3s ease;
                transition: transform .3s ease, border-color .3s ease, -webkit-transform .3s ease
            }

            @media (min-width:768px) {
                .service-page-iframe .dropdown-title:after {
                    top: 18px
                }
            }

            @media (min-width:1024px) {
                .service-page-iframe .dropdown-title:after {
                    top: 24px;
                    right: 21px;
                    border-color: #a7a7a7
                }
            }

            .service-page-iframe .dropdown-title.selected::after {
                -webkit-transform: rotate(135deg);
                transform: rotate(135deg)
            }

            @media (min-width:1024px) {
                .service-page-iframe .dropdown-title.selected::after {
                    border-color: #646464
                }
            }

            .service-page-iframe .dropdown-content {
                display: none;
                padding: 0 0 10px;
                margin: 0
            }

            .service-page-iframe .dropdown__item {
                -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, .1);
                box-shadow: 0 0 20px rgba(0, 0, 0, .1);
                border-radius: 20px
            }

            .service-page-iframe .dropdown__title-wrap {
                width: 100%;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: start;
                -ms-flex-align: start;
                align-items: flex-start;
                padding: 16px 12px;
                cursor: pointer
            }

            @media (min-width:1024px) {
                .service-page-iframe .dropdown__title-wrap {
                    padding: 24px
                }
            }

            .service-page-iframe .dropdown__title {
                word-wrap: break-word;
                overflow-wrap: break-word;
                word-break: break-word;
                font-size: 16px;
                line-height: 22px;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1
            }

            @media (min-width:1024px) {
                .service-page-iframe .dropdown__title {
                    font-size: 20px;
                    line-height: 28px
                }
            }

            .service-page-iframe .dropdown__decor {
                width: 16px;
                height: 16px;
                display: inline-block;
                position: relative;
                font-size: 0;
                line-height: 1;
                border: none;
                background-color: transparent;
                cursor: pointer;
                -webkit-transform: rotate(45deg);
                transform: rotate(45deg);
                -ms-flex-negative: 0;
                flex-shrink: 0;
                margin: 4px 0 0 16px
            }

            .service-page-iframe .dropdown__decor:after,
            .service-page-iframe .dropdown__decor:before {
                -webkit-transition: background .3s ease 0s;
                transition: background .3s ease 0s;
                background-color: #000;
                border-radius: 4px;
                content: '';
                display: block;
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%) rotate(45deg);
                transform: translate(-50%, -50%) rotate(45deg)
            }

            .service-page-iframe .dropdown__decor:before {
                width: 4px;
                height: 16px
            }

            .service-page-iframe .dropdown__decor:after {
                width: 16px;
                height: 4px
            }

            @media (min-width:1024px) {
                .service-page-iframe .dropdown__decor {
                    margin-top: 8px
                }
            }

            .service-page-iframe .dropdown__decor::after,
            .service-page-iframe .dropdown__decor::before {
                border-radius: 0
            }

            .service-page-iframe .dropdown__decor::after {
                -webkit-transition: -webkit-transform .3s ease 0s;
                transition: -webkit-transform .3s ease 0s;
                transition: transform .3s ease 0s;
                transition: transform .3s ease 0s, -webkit-transform .3s ease 0s;
                -webkit-transform: translate(-50%, -50%) rotate(45deg) scale(1);
                transform: translate(-50%, -50%) rotate(45deg) scale(1)
            }

            .service-page-iframe .dropdown__title-wrap.selected .dropdown__decor::after {
                -webkit-transform: translate(-50%, -50%) rotate(45deg) scale(0);
                transform: translate(-50%, -50%) rotate(45deg) scale(0)
            }

            .service-page-iframe .dropdown__content {
                display: none;
                padding: 16px 12px;
                position: relative
            }

            @media (min-width:1024px) {
                .service-page-iframe .dropdown__content {
                    padding: 24px
                }
            }

            .service-page-iframe .dropdown__content::before {
                content: "";
                display: block;
                height: 1px;
                position: absolute;
                top: 0;
                left: 12px;
                right: 12px;
                background-color: #e8e8e8
            }

            @media (min-width:1024px) {
                .service-page-iframe .dropdown__content::before {
                    left: 24px;
                    right: 24px
                }
            }

            .service-page-iframe .c-h1 {
                font-size: 36px;
                line-height: 48px;
                margin-bottom: 20px;
                font-weight: 700px;
            }
        </style>
        <div class="payment-method wrap-helper">
            <h1 class="c-h1">Töleg usullary</h1>

            <p class="c-h3 gray">Aşakdaky usullary ulanyp halaýan harytlaryňyzy üçin töläp bilersiňiz.</p>

            <div class="dropdown j-dropdown">
                <div class="dropdown-item">
                    <h2 class="dropdown-title j-dropdown-title">“Altyn –Asyr” bank kartlary</h2>

                    <div class="dropdown-content j-dropdown-content"
                        style="display: none; height: auto; padding-top: 0px; margin-top: 0px; padding-bottom: 10px; margin-bottom: 0px;">
                        <p><b>“Altyn –Asyr” bank kartlary, internet arkaly töleg ulgamlary bilen tölemek mümkindir.</b>
                        </p>

                        <p>Kart belgisinde (PAN) azyndan 15 we 19 simwoldan köp bolmaly däldir.</p>

                        <p><b>Sahypadan aşakdaky bank kartalaryny ulanyp tölegleri kabul edýäris</b></p>

                        <div class="block-cards">
                        <img src="{{asset('img/altyn asyr.jpg')}}" height="200px" alt="">
                            
                        </div>
                    </div>
                </div>



                <div class="dropdown-item">
                    <h2 class="dropdown-title j-dropdown-title">Karz ýa-da möhlet bilen tölemek</h2>

                    <div class="dropdown-content j-dropdown-content"
                        style="height: auto; display: none; padding-top: 0px; margin-top: 0px; padding-bottom: 10px; margin-bottom: 0px;">
                        <ul class="list-text">
                            <li>Halaýan önümleriňizi saýlaň we söwda sebedine goşuň</li>
                            <li>Töleg usulyny "Möhletli" ýa-da "Karz" saýlaň</li>
                            <li>Anketany dolduryň we bankyň kararyna garaşyň</li>
                            <li>Karz şertnamasyna SMS arkaly gol çekiň we sargydyňyzy alyň</li>
                        </ul>

                        <p>Karz şertleri her bir alyjy üçin aýratyn. Şertler we karz şertnamasy hasaba alnanda elýeterli bolar.<br>
                            Karz, sebet bahasy 5000 TMT bolan ähli harytlar üçin elýeterlidir</p>

                        <ul class="list-text">
                            <li class="list-text-title">Karz almak üçin zerur bolanlar:</li>
                            <li>Türkmenistanyň raýaty bolmaly</li>
                            <li>Hemişelik bellige alyň</li>
                            <li>18 ýaşdan uly bolmaly</li>
                            <li>Yzygiderli girdejiňiz bolmaly</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

    <script>
        (function () {
            var timeDrop = 300; //время расскрытия dropdown

            $('.j-dropdown').on('click', '.j-dropdown-title', function () {
                //Подсветка заголовка dropdown
                if ($(this).hasClass('selected')) {
                    $('.j-dropdown .j-dropdown-title').removeClass('selected');
                } else {
                    $('.j-dropdown .j-dropdown-title').removeClass('selected');
                    $(this).toggleClass('selected');

                    $('html, body').animate({ scrollTop: 0 }, timeDrop);
                }
                //Раскрытие dropdown
                $('.j-dropdown .j-dropdown-title').siblings('.j-dropdown-content').stop().slideUp({
                    duration: timeDrop,
                    easing: 'linear'
                });
                $(this).siblings('.j-dropdown-content').stop().slideToggle({
                    duration: timeDrop,
                    easing: 'linear',
                    'complete': function () {
                        $('.j-dropdown .j-dropdown-title').siblings('.j-dropdown-content').css('height', 'auto');
                    }
                });

                if ($(this).siblings('.j-dropdown-content').hasClass('drop-show')) {
                    $('.j-dropdown .j-dropdown-title').siblings('.j-dropdown-content').removeClass('drop-show');
                } else {
                    $('.j-dropdown .j-dropdown-title').siblings('.j-dropdown-content').removeClass('drop-show');
                    $(this).siblings('.j-dropdown-content').toggleClass('drop-show');
                }
            });

            var scrollTo = function (to) {
                $("html,body").stop().animate({
                    scrollTop: to.offset().top
                }, 1500);
            }

            var urlParams = location.search.split(/[?&]+/);
            if (urlParams.length <= 1) return;

            var numbersArr = urlParams[1].split('_');
            if (numbersArr.length > 0 && numbersArr[0] && !isNaN(numbersArr[0])) {
                var $selectedLi = $('.j-dropdown-title').eq(numbersArr[0] - 1);
                $selectedLi.click();
                scrollTo($selectedLi);
            }
        }());

    </script>




@endsection