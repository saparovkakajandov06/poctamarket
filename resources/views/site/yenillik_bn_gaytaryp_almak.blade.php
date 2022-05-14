@extends('layouts.app')

@section('content')



<div class="service-page-iframe" id="container">
        <style type="text/css">
            .service-page-iframe{

                margin-top: 30px;
            }
            h3 {
                font-family: system, -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Segoe WP', Roboto, Ubuntu, Oxygen, Cantarell, 'Fira Sans', 'Helvetica Neue', Helvetica, 'Lucida Grande', 'Droid Sans', Tahoma, 'Microsoft Sans Serif', sans-serif;
                color: #000000;
                font-weight: normal;
                font-weight: bold;
                font-size: 16px;
                line-height: 22px;
                margin: 0 0 16px;
            }

            .c-h2_1 {
                margin: 0 0 20px;
            }

            .c-important-msg {
                margin: 25px 0;
            }

            .c-important-msg p:last-of-type {
                margin: 0;
            }

            *{-webkit-box-sizing:border-box;box-sizing:border-box;outline:0}::after,::before{-webkit-box-sizing:border-box;box-sizing:border-box}:focus{outline:0}body{overflow-anchor:none}body,button,fieldset,h1,h2,h3,h4,h5,h6,p{margin:0;padding:0}ol,ul{list-style:none;margin:0;padding:0}button,input{font-family:inherit;border:none}input::-ms-clear,input::-ms-reveal{display:none;width:0;height:0}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration,input[type=search]::-webkit-search-results-button,input[type=search]::-webkit-search-results-decoration{display:none}button{cursor:pointer;background-color:transparent}img{max-width:100%;height:auto;border:0;user-drag:none;-moz-user-select:none;-webkit-user-drag:none}a{text-decoration:none}abbr,fieldset{border:none;padding:0;margin:0}legend{padding:0}textarea{resize:none}input,select,textarea{font-family:inherit;font-size:inherit;font-weight:inherit}table{border-collapse:collapse;border-spacing:0}.i-tooltipster-presscenter{position:absolute;z-index:50;cursor:default;background:#fff;border-radius:8px;-webkit-box-shadow:0 0 20px rgba(0,0,0,.1);box-shadow:0 0 20px rgba(0,0,0,.1);display:block}.i-tooltipster-presscenter .tooltipster-content{font-size:14px;line-height:20px;padding:16px;width:378px}.i-tooltipster-presscenter .tooltipster-arrow{display:none;width:100%;height:100%;position:absolute;top:0;left:0;z-index:-1}.i-tooltipster-presscenter .tooltipster-arrow span{width:0;height:0;position:absolute}.i-tooltipster-presscenter .tooltipster-arrow-right span{border-top:9px solid transparent!important;border-bottom:9px solid transparent!important;border-right:10px solid;top:50%;margin-top:-9px;left:-10px}.i-tooltipster-presscenter .tooltipster-arrow-left span{border-top:9px solid transparent!important;border-bottom:9px solid transparent!important;border-left:10px solid;top:50%;margin-top:-9px;right:-10px}.i-tooltipster-presscenter .tooltipster-arrow-top span,.i-tooltipster-presscenter .tooltipster-arrow-top-left span,.i-tooltipster-presscenter .tooltipster-arrow-top-right span{border-left:9px solid transparent!important;border-right:9px solid transparent!important;border-top:10px solid;bottom:-10px}.i-tooltipster-presscenter .tooltipster-arrow-bottom span,.i-tooltipster-presscenter .tooltipster-arrow-bottom-left span,.i-tooltipster-presscenter .tooltipster-arrow-bottom-right span{border-left:9px solid transparent!important;border-right:9px solid transparent!important;border-bottom:10px solid;top:-10px}.i-tooltipster-presscenter .tooltipster-arrow-bottom span,.i-tooltipster-presscenter .tooltipster-arrow-top span{left:0;right:0;margin:auto}.i-tooltipster-presscenter .tooltipster-arrow-bottom-left span,.i-tooltipster-presscenter .tooltipster-arrow-top-left span{left:20px}.i-tooltipster-presscenter .tooltipster-arrow-bottom-right span,.i-tooltipster-presscenter .tooltipster-arrow-top-right span{right:20px}.i-tooltipster-presscenter .tooltipster-content{display:block}@media (max-width:1023.98px){.i-tooltipster-presscenter .tooltipster-content{width:320px}}.i-tooltipster-presscenter .tooltipster-content .tips-title{margin-bottom:4px}.i-tooltipster-presscenter .tooltipster-content .tips-title.c-text-base{font-size:16px;line-height:22px}.i-tooltipster-presscenter .tooltipster-content .tips-title.c-text-base.bold{font-weight:700}.i-tooltipster-presscenter .tooltipster-content .tips-text,.i-tooltipster-presscenter .tooltipster-content .tips-title{display:block}.i-tooltipster-presscenter .tooltipster-content .tips-text{font-size:14px;line-height:20px}.service-page-iframe{font-size:14px;line-height:30px;width:100%;padding:0 32px;-moz-text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;text-size-adjust:100%}.service-page-iframe.bold{font-weight:700}.service-page-iframe.gray{color:#8b8b8b}.service-page-iframe.wb{color:#cb11ab}@media (max-width:1199.98px){.service-page-iframe{padding:0 16px}}@media (min-width:1024px){.service-page-iframe{font-size:16px;line-height:30px}.service-page-iframe.bold{font-weight:700}.service-page-iframe.gray{color:#8b8b8b}.service-page-iframe.wb{color:#cb11ab}}@media (min-width:1024px) and (max-width:1023.98px){.service-page-iframe{font-size:14px;line-height:30px}.service-page-iframe.bold{font-weight:700}.service-page-iframe.gray{color:#8b8b8b}.service-page-iframe.wb{color:#cb11ab}}.service-page-iframe .c-h1{font-size:18px;line-height:30px;font-weight:700;margin-bottom:12px}@media (min-width:768px){.service-page-iframe .c-h1{font-size:20px;line-height:28px}}@media (min-width:1024px){.service-page-iframe .c-h1{font-size:36px;line-height:48px}}@media (min-width:768px){.service-page-iframe .c-h1{font-size:32px;line-height:36px;margin-bottom:16px}}@media (min-width:1024px){.service-page-iframe .c-h1{font-size:36px;line-height:48px;margin-bottom:20px}}.service-page-iframe .c-h2{font-size:18px;line-height:24px;font-weight:700}@media (min-width:768px){.service-page-iframe .c-h2{font-size:20px;line-height:28px}}@media (min-width:1024px){.service-page-iframe .c-h2{font-size:28px;line-height:36px}}.service-page-iframe .c-h2_1{font-size:16px;line-height:22px}@media (min-width:768px){.service-page-iframe .c-h2_1{font-size:20px;line-height:28px}}@media (min-width:1024px){.service-page-iframe .c-h2_1{font-size:24px;line-height:32px}}.service-page-iframe .c-h2_1.bold{font-weight:700}.service-page-iframe .c-h2_1.gray{color:#8b8b8b}.service-page-iframe .c-h3{font-size:14px;line-height:30px}@media (min-width:768px){.service-page-iframe .c-h3{font-size:16px;line-height:32px}}@media (min-width:1024px){.service-page-iframe .c-h3{font-size:20px;line-height:28px}}.service-page-iframe .c-h3.bold{font-weight:700}.service-page-iframe .c-h3.gray{color:#8b8b8b}.service-page-iframe .c-text-md{font-size:18px;line-height:24px}.service-page-iframe .c-text-md.bold{font-weight:700}.service-page-iframe .c-text-md.gray{color:#8b8b8b}.service-page-iframe .c-text-md.wb{color:#cb11ab}.service-page-iframe .c-text-base{font-size:16px;line-height:22px}@media (max-width:1023.98px){.service-page-iframe .c-text-base{font-size:14px;line-height:20px}.service-page-iframe .c-text-base.bold{font-weight:700}.service-page-iframe .c-text-base.gray{color:#8b8b8b}.service-page-iframe .c-text-base.wb{color:#cb11ab}}.service-page-iframe .c-text-base.bold{font-weight:700}.service-page-iframe .c-text-base.gray{color:#8b8b8b}.service-page-iframe .c-text-base.wb{color:#cb11ab}.service-page-iframe .c-text-sm{font-size:14px;line-height:30px}.service-page-iframe .c-text-sm.bold{font-weight:700}.service-page-iframe .c-text-sm.gray{color:#8b8b8b}.service-page-iframe .c-text-sm.wb{color:#cb11ab}.service-page-iframe .c-text-xsm{font-size:12px;line-height:16px}.service-page-iframe .c-link-out2,.service-page-iframe .service-link{border-bottom:1px solid;font-size:16px;line-height:22px;border-color:initial;text-decoration:none;background-color:transparent;cursor:pointer;color:#000;border-color:#000}.service-page-iframe .c-link-out2:hover,.service-page-iframe .service-link:hover{color:#cb11ab;border-color:initial}.service-page-iframe .c-link-out2:hover,.service-page-iframe .service-link:hover{color:#000;border-color:transparent}@media (max-width:1023.98px){.service-page-iframe .c-link-out2,.service-page-iframe .service-link{font-size:14px;line-height:20px}.service-page-iframe .c-link-out2.bold,.service-page-iframe .service-link.bold{font-weight:700}.service-page-iframe .c-link-out2.gray,.service-page-iframe .service-link.gray{color:#8b8b8b}.service-page-iframe .c-link-out2.wb,.service-page-iframe .service-link.wb{color:#cb11ab}}.service-page-iframe .c-link-out{font-size:16px;line-height:22px;color:#000;text-decoration:none;background-color:transparent;cursor:pointer;color:#cb11ab;border-color:initial;font-weight:600}.service-page-iframe .c-link-out:hover{color:#cb11ab;border-color:initial}.service-page-iframe .c-link-out:hover{color:#cb11ab;border-color:initial}@media (max-width:1023.98px){.service-page-iframe .c-link-out{font-size:14px;line-height:20px}.service-page-iframe .c-link-out.bold{font-weight:700}.service-page-iframe .c-link-out.gray{color:#8b8b8b}.service-page-iframe .c-link-out.wb{color:#cb11ab}}.service-page-iframe .breadcrumbs{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:baseline;-ms-flex-align:baseline;align-items:baseline}.service-page-iframe .breadcrumbs .breadcrumbs__back{margin-right:20px;-ms-flex-negative:0;flex-shrink:0}@media (max-width:1023.98px){.service-page-iframe .breadcrumbs .breadcrumbs__back{font-size:12px;line-height:16px;text-transform:initial;padding:3px 6px 5px;margin-right:12px}}.service-page-iframe .breadcrumbs .breadcrumbs__container{scrollbar-width:none;overflow-x:auto}.service-page-iframe .breadcrumbs .breadcrumbs__container::-webkit-scrollbar{display:none}@media (min-width:1024px){.service-page-iframe .breadcrumbs .breadcrumbs__container{overflow:initial}}.service-page-iframe .breadcrumbs .breadcrumbs__list{font-size:12px;line-height:16px;color:#8b8b8b;display:-webkit-box;display:-ms-flexbox;display:flex}@media (min-width:1024px){.service-page-iframe .breadcrumbs .breadcrumbs__list{font-size:14px;line-height:20px;-ms-flex-wrap:wrap;flex-wrap:wrap}}.service-page-iframe .breadcrumbs .breadcrumbs__item{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-negative:0;flex-shrink:0;margin-right:12px;padding:4px 0}@media (min-width:1024px){.service-page-iframe .breadcrumbs .breadcrumbs__item{word-wrap:break-word;overflow-wrap:break-word;word-break:break-word;max-width:100%;-webkit-box-align:baseline;-ms-flex-align:baseline;align-items:baseline;margin-right:8px}.service-page-iframe .breadcrumbs .breadcrumbs__item::after{content:"/";color:#ccc;margin-left:8px}}.service-page-iframe .breadcrumbs .breadcrumbs__item:last-of-type::after{display:none}.service-page-iframe .breadcrumbs .breadcrumbs__link{border-bottom:1px solid;font-size:16px;line-height:22px;color:#000;border-color:initial;text-decoration:none;background-color:transparent;cursor:pointer;color:#8b8b8b;border-color:transparent;font-size:12px;line-height:16px}.service-page-iframe .breadcrumbs .breadcrumbs__link:hover{color:#cb11ab;border-color:initial}.service-page-iframe .breadcrumbs .breadcrumbs__link:hover{color:#000;border-color:#000}@media (min-width:1024px){.service-page-iframe .breadcrumbs .breadcrumbs__link{font-size:14px;line-height:20px}}.service-page-iframe .service-page-iframe__breadcrumbs{margin-bottom:16px}@media (min-width:1024px){.service-page-iframe .service-page-iframe__breadcrumbs{margin-bottom:12px}}.service-page-iframe .wrap-helper p{margin-bottom:12px}.service-page-iframe .wrap-helper ul{list-style:none;padding-left:21px;margin:0 0 28px}.service-page-iframe .wrap-helper ul li{position:relative;color:#000;margin:0 0 16px}.service-page-iframe .wrap-helper ul li:before{content:'—';position:absolute;top:0;left:-20px}.service-page-iframe .dropdown-number{counter-reset:number-drop}.service-page-iframe .dropdown-number .dropdown-title:before{counter-increment:number-drop;content:counter(number-drop) ". "}.service-page-iframe .dropdown-item{border-top:1px solid #e8e8e8}.service-page-iframe .dropdown-item:last-child{border-bottom:1px solid #e8e8e8}.service-page-iframe .dropdown-title{font-size:16px;line-height:22px;font-weight:600;margin:0;padding:9px 30px 11px 0;position:relative;cursor:pointer}@media (min-width:768px){.service-page-iframe .dropdown-title{font-size:20px;line-height:28px}}@media (min-width:1024px){.service-page-iframe .dropdown-title{padding:13px 50px 16px 0}}.service-page-iframe .dropdown-title:after{content:'';display:block;width:9px;height:9px;position:absolute;right:1px;top:16px;-webkit-transform:rotate(-45deg);transform:rotate(-45deg);-webkit-transform-origin:3px 6px;transform-origin:3px 6px;border-left:2px solid;border-bottom:2px solid;border-color:#000;-webkit-transition:border-color .3s ease,-webkit-transform .3s ease;transition:border-color .3s ease,-webkit-transform .3s ease;transition:transform .3s ease,border-color .3s ease;transition:transform .3s ease,border-color .3s ease,-webkit-transform .3s ease}@media (min-width:768px){.service-page-iframe .dropdown-title:after{top:18px}}@media (min-width:1024px){.service-page-iframe .dropdown-title:after{top:24px;right:21px;border-color:#a7a7a7}}.service-page-iframe .dropdown-title.selected::after{-webkit-transform:rotate(135deg);transform:rotate(135deg)}@media (min-width:1024px){.service-page-iframe .dropdown-title.selected::after{border-color:#646464}}.service-page-iframe .dropdown-content{display:none;padding:0 0 10px;margin:0}.service-page-iframe .dropdown__item{-webkit-box-shadow:0 0 20px rgba(0,0,0,.1);box-shadow:0 0 20px rgba(0,0,0,.1);border-radius:20px}.service-page-iframe .dropdown__title-wrap{width:100%;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:start;-ms-flex-align:start;align-items:flex-start;padding:16px 12px;cursor:pointer}@media (min-width:1024px){.service-page-iframe .dropdown__title-wrap{padding:24px}}.service-page-iframe .dropdown__title{word-wrap:break-word;overflow-wrap:break-word;word-break:break-word;font-size:16px;line-height:22px;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1}@media (min-width:1024px){.service-page-iframe .dropdown__title{font-size:20px;line-height:28px}}.service-page-iframe .dropdown__decor{width:16px;height:16px;display:inline-block;position:relative;font-size:0;line-height:1;border:none;background-color:transparent;cursor:pointer;-webkit-transform:rotate(45deg);transform:rotate(45deg);-ms-flex-negative:0;flex-shrink:0;margin:4px 0 0 16px}.service-page-iframe .dropdown__decor:after,.service-page-iframe .dropdown__decor:before{-webkit-transition:background .3s ease 0s;transition:background .3s ease 0s;background-color:#000;border-radius:4px;content:'';display:block;position:absolute;top:50%;left:50%;-webkit-transform:translate(-50%,-50%) rotate(45deg);transform:translate(-50%,-50%) rotate(45deg)}.service-page-iframe .dropdown__decor:before{width:4px;height:16px}.service-page-iframe .dropdown__decor:after{width:16px;height:4px}@media (min-width:1024px){.service-page-iframe .dropdown__decor{margin-top:8px}}.service-page-iframe .dropdown__decor::after,.service-page-iframe .dropdown__decor::before{border-radius:0}.service-page-iframe .dropdown__decor::after{-webkit-transition:-webkit-transform .3s ease 0s;transition:-webkit-transform .3s ease 0s;transition:transform .3s ease 0s;transition:transform .3s ease 0s,-webkit-transform .3s ease 0s;-webkit-transform:translate(-50%,-50%) rotate(45deg) scale(1);transform:translate(-50%,-50%) rotate(45deg) scale(1)}.service-page-iframe .dropdown__title-wrap.selected .dropdown__decor::after{-webkit-transform:translate(-50%,-50%) rotate(45deg) scale(0);transform:translate(-50%,-50%) rotate(45deg) scale(0)}.service-page-iframe .dropdown__content{display:none;padding:16px 12px;position:relative}@media (min-width:1024px){.service-page-iframe .dropdown__content{padding:24px}}.service-page-iframe .dropdown__content::before{content:"";display:block;height:1px;position:absolute;top:0;left:12px;right:12px;background-color:#e8e8e8}@media (min-width:1024px){.service-page-iframe .dropdown__content::before{left:24px;right:24px}}

            #returnProd hr {
                border: 0;
                border-top: 1px solid #e8e8e8;
                margin-top: 0;
                margin-bottom: 15px;
            }

            #returnProd .footnote ol {
                margin: 10px 0;
            }

            #returnProd .footnote ol li {
                line-height: 20px;
                color: #8b8b8b;
            }

            #returnProd .footnote ul {
                margin: 10px 0;
                padding-left: 50px;
            }

            #returnProd .footnote ul li {
                color: #8b8b8b;
            }

            #returnProd .footnote {
                margin: 0;
            }

            #returnProd .footnote p {
                position: relative;
                color: #8b8b8b;
                padding-left: 30px;
                margin-bottom: 10px;
            }

            #returnProd .footnote p a {
                left: 0;
                top: -2px;
                position: absolute;
                width: 24px;
                display: inline-block;
                text-align: right;
                float: none;
                margin-left: 0;
                padding-right: 0;
            }

            #returnProd .note {
                font-size: 14px;
                color: #CB11AB;
                text-decoration: none;
                border: none;
            }

            #returnProd .note:hover {
                font-size: 14px;
                color: #CB11AB;
                text-decoration: none;
            }

            #returnProd .list-text {
                padding-left: 19px;
            }
        </style>
        <div class="wrap-helper" id="returnProd">
            <h1 class="c-h1">Yza gaýdyp almak düzgüni</h1>

            <h2 class="c-h2_1">Gowy hilli harytlaryň yzyna gaýtarylmagy</h2>

            <h3>Yzyna gaýdyp almak wagty</h3>

            <p>Gowy hilli harytlary yzyna gaýtarmagyň möhleti, haryt satylanda başgaça ylalaşylmadyk bolsa, haryt alnan senesinden 21 gün.</p>

            <p>Satyn alyjy tarapyndan harytlaryň yzyna gaýtarylmagynyň sebäpleri aşakdakylar bolup biler:</p>

            <ul>
                <li>
                    <p>Ululygy, stili, reňki, uzynlygy we ş.m. gabat gelmedi.</p>
                </li>
                <li>
                    <p>Alnan önümiň kölegesi, sahypadaky suratdan modeliň kölegesinden tapawutlanýar.</p>
                </li>
            </ul>

            <div class="c-important-msg"><span class="msg-icon"> </span>

                <p class="msg-text">
                    <b>Harytlar diňe bir kemsiz doly toplumda, paketleri we ýazgylary bilen bilelikde, ulanylmadyk şertde</b>
                </p>
            </div>

            

            <h3>1. Öz- özüňe gaýdyp gelmek</h3>

            <p class="list-text">Satyn alyjy önümi markaly nokatlarymyza özbaşdak gaýtaryp biler.</p>

            <h3>2. Kurýer bilen gaýtarmak</h3>

            <p class="list-text">Bu hyzmat kurýer tarapyndan amala aşyrylýan hasaplaşyklar üçin elýeterlidir.</p>

            <p class="list-text">Bir günüň dowamynda 10 elementden köp bolmadyk kurýeriň kömegi bilen yzyna gaýtarmak mümkin. Berlen nokatlarynda yzyna gaýtaryljak zatlaryň sanynda hiç hili çäklendirme ýok.</p>

            <h2 class="c-h2_1" style="margin-top: 30px;">Ýeterlik däl harytlaryň yzyna gaýtarylmagy</h2>

            <h3>Yzyna gaýtarma wagty</h3>

            <p>Satyn alyjy tarapyndan harytlaryň yzyna gaýtarylmagynyň sebäbi harytlaryň önümçilik kemçiligi bolup biler.
                 Satyn alyjy öndüriji tarapyndan kesgitlenen kepillik möhletinde şeýle harytlaryň yzyna gaýtarylmagyny talap edip biler. 
                 Harytlar üçin kepillik möhleti öndüriji tarapyndan kesgitlenmedik bolsa, şeýle harytlary yzyna gaýtarmak möhleti 2 (iki) ýyl.</p>

            <h3>Ýeterlik däl harytlary yzyna gaýtarmak aşakdaky usul bilen amala aşyrylýar:</h3>

            <ul>
                <li>
                    <p>Harytlary yzyna gaýtarmak Şahsy hasabyndaky anketany doldurmak arkaly amala aşyrylýar.</p>
                </li>
                <li>
                    <p>Arza garamagyň möhleti 7 (ýedi) iş gününden geçmeli däldir.</p>
                </li>
      
                <li>
                    <p>Arza ret edilen halatynda alyjynyň garaşsyz synaga ýüz tutmaga hukugy bar.
                         Garaşsyz synag alyjynyň harydy yzyna gaýtarmak hukugyny tassyklasa, alyjynyň garaşsyz synag geçirmek bilen 
                         baglanyşykly ähli çykdajylary Satyjy tarapyndan öwezini dolýar.</p>
                </li>
            </ul>

            <hr>
            <div class="footnote">
                <p class="c-text-xsm"><a class="note" id="footnote1">*</a>Bu düzgünler tebigatda maslahat 
                    beriji bolup, alyjylara degişli kanunlarda göz öňünde tutulan talaplary satyja
                     hödürlemek bilen baglanyşykly hukuklary çäklendirmeýär.</p>
            </div>
        </div>

    </div>



@endsection