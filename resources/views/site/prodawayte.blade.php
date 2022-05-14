@extends('layouts.app')

@section('content')


    <style type="text/css">
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            outline: 0;
        }

        .sell-on-wb .sell-on-wb__wrapper {
            max-width: 1196px;
            margin: 0 auto;
            padding: 0;
        }

        @media (min-width: 767.501px) {
            .sell-on-wb .sell-on-wb__wrapper {
                padding: 28px 0 0;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-on-wb__wrapper {
                padding: 58px 0 0;
            }
        }

        .sell-on-wb .sell-on-wb__footer {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 16px 0 0;
        }

        @media (min-width: 575.501px) {
            .sell-on-wb .sell-on-wb__footer {
                margin: 12px 0 0;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-on-wb__footer {
                margin: 72px 0 0;
            }
        }

        .sell-on-wb .sell-on-wb__info {
            font-size: 20px;
            line-height: 28px;
            text-align: center;
            margin: 0 auto 24px;
            font-weight: 700;
        }

        @media (min-width: 767.501px) {
            .sell-on-wb .sell-on-wb__info {
                font-size: 32px;
                line-height: 46px;
                margin: 0 auto 30px;
            }
        }

        .sell-on-wb .sell-on-wb__link {
            font-size: 14px;
            line-height: 20px;
            transition: background 0.3s ease 0s;
            display: inline-block;
            vertical-align: top;
            color: #ffffff;
            font-weight: 700;
            text-align: center;
            padding: 13px 12px 15px;
            border-radius: 8px;
            background-color: #a0bdff;
            min-width: 100%;
            text-decoration: none;
        }

        @media (min-width: 575.501px) {
            .sell-on-wb .sell-on-wb__link {
                font-size: 16px;
                line-height: 22px;
                min-width: 258px;
                padding: 14px 12px 16px;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-on-wb__link {
                font-size: 18px;
                line-height: 24px;
            }

            .sell-on-wb .sell-on-wb__link:hover {
                background-color: #a0bdff;
            }
        }

        .sell-on-wb .sell-wb-banner {
            min-height: initial;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-image: linear-gradient(-90deg, #A5C2FF 100%, #A5C2FF 100%);
            border-radius: 32px;
            padding: 20px;
            position: relative;
            margin-bottom: 50px;
        }

        @media (min-width: 767.501px) {
            .sell-on-wb .sell-wb-banner {
                padding: 28px;
                margin-bottom: 75px;
                min-height: 292px;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-banner {
                padding: 28px 40px;
                margin-bottom: 160px;
                min-height: 393px;
            }
        }

        @media (min-width: 1199.501px) {
            .sell-on-wb .sell-wb-banner {
                padding: 28px 72px;
            }
        }

        .sell-on-wb .sell-wb-banner__title {
            font-size: 20px;
            line-height: 28px;
            font-weight: bold;
            color: #000000;
            margin: 0 0 12px;
            position: relative;
            z-index: 1;
        }

        @media (min-width: 575.501px) and (max-width: 767.5px) {
            .sell-on-wb .sell-wb-banner__title {
                max-width: 50%;
            }
        }

        @media (min-width: 767.501px) {
            .sell-on-wb .sell-wb-banner__title {
                font-size: 28px;
                line-height: 36px;
                margin: 0 0 20px;
            }

            .sell-on-wb .sell-wb-banner__title span {
                display: block;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-banner__title {
                font-size: 40px;
                line-height: 53px;
            }
        }

        .sell-on-wb .sell-wb-banner__desc {
            font-size: 14px;
            line-height: 20px;
            margin: 0 0 20px;
            color: rgba(0, 0, 0, 0.6);
            position: relative;
            z-index: 1;
        }

        @media (min-width: 575.501px) {
            .sell-on-wb .sell-wb-banner__desc {
                max-width: 57%;
            }
        }

        @media (min-width: 767.501px) {
            .sell-on-wb .sell-wb-banner__desc {
                font-size: 16px;
                line-height: 22px;
                margin: 0 0 28px;
                max-width: 380px;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-banner__desc {
                font-size: 20px;
                line-height: 28px;
                font-weight: normal;
                max-width: 460px;
            }
        }

        .sell-on-wb .sell-wb-banner__link {
            font-size: 14px;
            line-height: 20px;
            transition: background 0.3s ease 0s;
            display: inline-block;
            vertical-align: top;
            color: #ffffff;
            font-weight: 700;
            text-align: center;
            padding: 13px 12px 15px;
            border-radius: 8px;
            background-color: #A649D2;
            margin-right: auto;
            min-width: 100%;
            position: relative;
            z-index: 1;
            text-decoration: none;
        }

        @media (min-width: 767.501px) {
            .sell-on-wb .sell-wb-banner__link {
                font-size: 16px;
                line-height: 22px;
                min-width: 223px;
                padding: 14px 12px 16px;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-banner__link {
                font-size: 18px;
                line-height: 24px;
                min-width: 258px;
            }

            .sell-on-wb .sell-wb-banner__link:hover {
                background-color: #9c35cd;
            }
        }

        .sell-on-wb .sell-wb-banner__img {
            margin: 24px auto -47px;
            width: 212px;
            height: auto;
        }

        @media (min-width: 767.501px) {
            .sell-on-wb .sell-wb-banner__img {
                position: absolute;
                right: 28px;
                top: -28px;
                margin: 0;
                width: 339px;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-banner__img {
                width: 491px;
                right: 40px;
                top: -59px;
            }
        }

        @media (min-width: 1199.501px) {
            .sell-on-wb .sell-wb-banner__img {
                right: 72px;
            }
        }

        .sell-on-wb .sell-wb-set {
            display: flex;
            flex-wrap: wrap;
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-set {
                margin: 0 -14px;
            }
        }

        .sell-on-wb .sell-wb-set__item {
            width: 100%;
            margin: 0 0 24px;
            display: flex;
            box-shadow: 0px 4px 70px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            flex-direction: column;
        }

        @media (min-width: 575.501px) {
            .sell-on-wb .sell-wb-set__item {
                margin: 0 0 60px;
                flex-direction: row-reverse;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-set__item {
                flex-direction: column;
                width: calc(100% / 3 - 28px);
                margin: 0 14px;
            }
        }

        .sell-on-wb .sell-wb-set__side {
            position: relative;
            background-image: linear-gradient(90deg, #A6C2FF 0%, #A6C2FF 0%);
            display: block;
            border-radius: 16px 16px 0 0;
            min-height: 144px;
            width: 100%;
        }

        @media (min-width: 575.501px) {
            .sell-on-wb .sell-wb-set__side {
                min-height: 204px;
                width: 50%;
                flex-shrink: 0;
                border-radius: 0 16px 16px 0;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-set__side {
                width: 100%;
                min-height: 282px;
                border-radius: 16px 16px 0 0;
            }
        }

        .sell-on-wb .sell-wb-set__main {
            padding: 16px 20px 20px;
            width: 100%;
        }

        @media (max-width: 575.5px) {
            .sell-on-wb .sell-wb-set__main {
                min-height: 160px;
            }
        }

        @media (min-width: 575.501px) {
            .sell-on-wb .sell-wb-set__main {
                padding: 28px;
                width: 50%;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-set__main {
                padding: 30px 40px 59px;
                width: 100%;
            }
        }

        .sell-on-wb .sell-wb-set__title {
            font-size: 20px;
            line-height: 26px;
            font-weight: 700;
            margin: 0 0 10px;
        }

        @media (min-width: 767.501px) {
            .sell-on-wb .sell-wb-set__title {
                font-size: 24px;
                line-height: 32px;
                margin: 0 0 20px;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-set__title {
                font-size: 32px;
                line-height: 43px;
            }
        }

        .sell-on-wb .sell-wb-set__img {
            position: absolute;
            left: 50%;
            bottom: 0;
            height: auto;
            transform: translateX(-50%);
        }

        .sell-on-wb .sell-wb-set__img:nth-of-type(1) {
            width: 116px;
        }

        @media (min-width: 575.501px) {
            .sell-on-wb .sell-wb-set__img:nth-of-type(1) {
                width: 195px;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-set__img:nth-of-type(1) {
                width: 279px;
            }
        }

        .sell-on-wb .sell-wb-set__img:nth-of-type(2) {
            width: 131px;
        }

        @media (min-width: 575.501px) {
            .sell-on-wb .sell-wb-set__img:nth-of-type(2) {
                width: 221px;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-set__img:nth-of-type(2) {
                width: 278px;
            }
        }

        .sell-on-wb .sell-wb-set__img:nth-of-type(3) {
            width: 147px;
        }

        @media (min-width: 575.501px) {
            .sell-on-wb .sell-wb-set__img:nth-of-type(3) {
                width: 239px;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-set__img:nth-of-type(3) {
                width: 307px;
            }
        }

        .sell-on-wb .sell-wb-set__desc {
            font-size: 14px;
            line-height: 22px;
            color: rgba(0, 0, 0, 0.5);
            margin: 0;
        }

        @media (min-width: 767.501px) {
            .sell-on-wb .sell-wb-set__desc {
                font-size: 16px;
                line-height: 24px;
            }
        }

        @media (min-width: 1023.501px) {
            .sell-on-wb .sell-wb-set__desc {
                font-size: 20px;
                line-height: 28px;
                font-weight: normal;
            }
        }
    </style>

    <div class="service-page-iframe" id="container" style="margin: 8px;">

        <div class="sell-on-wb">
            <div class="sell-on-wb__wrapper">
                <section class="sell-wb-banner">
                    <h1 class="sell-wb-banner__title"><span>Satmak üçin TürkmenPoçtaMarket</span> FBS ulgamy (bazar)
                    </h1>

                    <p class="sell-wb-banner__desc">
                        Müşderilerden sargyt alyň, haryt getiriň we satuwda uly komissiýa alyň</p>
                    <a class="sell-wb-banner__link" href="/"
                       target="_blank">Satyjy boluň</a>
                    <img alt="commerce" class="sell-wb-banner__img"
                         src="{{asset('images/img-top.png')}}">
                </section>

                <section class="sell-wb-set">
                    <div class="sell-wb-set__item">
                        <div class="sell-wb-set__side"><img alt="percent" class="sell-wb-set__img"
                                                            src="{{asset('images/percent.png')}}"></div>

                        <div class="sell-wb-set__main">
                            <h2 class="sell-wb-set__title">Girdeji</h2>

                            <p class="sell-wb-set__desc">
                                Komissiýa 1–5%, ammar amallary üçin töleg ýok, TürkmenPoçtaMarket ammarynda aksiýany doňdurmagyň zerurlygy ýok
                            </p>
                        </div>
                    </div>

                    <div class="sell-wb-set__item">
                        <div class="sell-wb-set__side"><img alt="basket" class="sell-wb-set__img"
                                                            src="{{asset('images/basket.png')}}"></div>

                        <div class="sell-wb-set__main">
                            <h2 class="sell-wb-set__title">Çalt</h2>

                            <p class="sell-wb-set__desc">TürkmenPoçtaMarket saýda harytlary çalt ýüklemek</p>
                        </div>
                    </div>

                    <div class="sell-wb-set__item">
                        <div class="sell-wb-set__side"><img alt="product" class="sell-wb-set__img"
                                                            src="{{asset('images/product.png')}}"></div>

                        <div class="sell-wb-set__main">
                            <h2 class="sell-wb-set__title">Amatly</h2>

                            <p class="sell-wb-set__desc">
                                Müşderiden sargyt alyň we sargyt edilen önümleri amatly wagtda bize getiriň
                            </p>
                        </div>
                    </div>
                </section>

                <section class="sell-on-wb__footer">
                    <h3 class="sell-on-wb__info">
                        TürkmenPoçtaMarket bilen
                        <br>
                        satyjy boluň we gazanç ediň
                    </h3>
                    <a class="sell-on-wb__link" href="/" target="_blank">
                        Satyjy boluň
                    </a>
                </section>
            </div>
        </div>
        <br><br>
    </div>



@endsection
