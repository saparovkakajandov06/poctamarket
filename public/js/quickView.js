
// mini-card show ==========================
$('.js-show-mini-card-button').click(function (e) {
    var thisBtn = $(this);
    var id = $(this)[0].getAttribute('data-id')

    if (window.innerWidth > 1024) {
        var o = `https://onlinetoleg.com.tm/productBystryyProsmotr/${id}`;

        $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } })


        $.ajax({
            type: "GET",
            url: o,
            beforeSend: function () {
                thisBtn.addClass('button--load');
            },
            success: function (o) {
                console.log(o);
                miniCardItemsGet(o, id);
            },
            error: function (o) {
                console.log(o.responseJSON);
            },
            complete: function () {
                $('.js-pop-up[data-pop-up-name="product-mini-card"]').addClass('show');
                thisBtn.removeClass('button--load');
            },
        })

        // $(this).addClass('button--load');
        // setTimeout(() => {
        //     $(this).removeClass('button--load');
        //     $('.js-pop-up[data-pop-up-name="product-mini-card"]').addClass('show');
        // }, 2000);
        // miniCardItemsGet($(this)[0].getAttribute('data-id'));
    }
});

//? mini card cykanda suratlar update function
async function miniCardItemsGet(data, id) {

    productSwiper.removeAllSlides();

    // colorSwiper.removeAllSlides();
    var status = data.prod.new ? 'Täze':'';
    status += data.prod.recommended ? ' Maslahat berilýär':'';
    status += data.prod.status ? ' Meşhur':'';



    for (var key of Object.keys(data.prod.img)) {

        productSwiper.appendSlide(
            `<div class="swiper-slide">
                <img src="/images/products/big/${data.prod.img[key]}" alt="">
            </div>`
        );
    }

    $('#mini-content').html(`
    
    <div class="basic-info description-column js-coordinate-wrapper-button-block js-info-product">
        <div class="mini-product-info-block">
            <div style="width: 100%">
                <div class="js-shield-mini-card-block js-shield-block">
                    <div class="shield-wrapper js-shield-container">
                        <div class="shield" style="background: #c3dbf8;color: #272b31">
                            <p class="caption--uppercase">${status}</p>
                        </div>
                    </div>
                </div>
                <a id="mini-p-title" class="basic-info__caption caption-24-tablet-16 margin-right-50 js-name-product js-link-for-product-page"
                    style="cursor: pointer" href="/product/${id}">${data.prod.name_tk}</a>
                <div class="basic-info__row">
                    <p class="basic-info__row-item basic-info__row-item--grey-dark js-vendor-code">Satyjy kody:</p>
                    &nbsp;
                    <p class="basic-info__row-item js-vendor-code-number">${data.prod.code}</p>
                    <br>
                    <a href="/product/${id}" class="mini-product-link js-link-for-product-page">Önüme git</a>
                </div>
            </div>
            <div class="wrapper-price js-base-price">
                <span class="price price--old-price" style="display: none;">
                    <span class="strike-diag js-old-price-info"></span>
                </span>
                <span class="price  js-price-info"> ${data.prod.price} TMT</span>
            </div>
            <div class="wrapper-color wrapper-color--product-card-page js-color-block">
                <p class="wrapper-color__title">
                    ${data.prod.description_tk}
                </p>
                

            </div>
            <div class="wrapper-size js-activating-block">
                

                <div class="block-size js-block-size-sku">
                    <div>
                        <div class="block-size__item js-size-item">
                            XS/176</div>
                    </div>
                    <div>
                        <div class="block-size__item js-size-item">
                            S/182</div>
                    </div>
                    <div>
                        <div class="block-size__item js-size-item">
                            M/182</div>
                    </div>
                    <div>
                        <div class="block-size__item js-size-item">
                            L/182</div>
                    </div>
                    <div>
                        <div class="block-size__item js-size-item">
                            XL/182</div>
                    </div>
                </div>

                <p class="wrapper-size__availability js-quantity-stock" data-text-one="Осталось"
                    data-text-two="шт. в этом размере" data-empty-text="Нет в наличии" data-relative-quantity="enough">
                    7 sany galdy</p>
            </div>

            

        </div>
        <div class="follow-button-wrapper">
            <div class="wrapper-button wrapper-button--follow-top wrapper-button--product" style="align-items: center;">
                <p class="button-text--error margin-bottom-16" style="display:none">
                    Невозможна
                    доставка в ваш регион</p>
                <button type="button" class="press-button js-product-details-add-to-cart" onclick='addToCart(${id})'>
                    Sebede goş</button>

                <form action="https://onlinetoleg.com.tm/wishlist" id="contact_form" method="post">
                    <input type="hidden" name="_token" value="tw1xC8eCGWhEgYMo5HmhBrTwc5uLaTXJSupMyfVc">
                    <input name="product_id" type="hidden" value="${id}">
                    <button type="butoon" style="background: none;">
                        <div class="product-info__wish-block">
                            <svg class="icon icon--heart product-info__wish js-add-to-wish-button">
                                <g>
                                    <path
                                        d="M20.4578 4.59133C19.9691 4.08683 19.3889 3.68663 18.7503 3.41358C18.1117 3.14054 17.4272 3 16.7359 3C16.0446 3 15.3601 3.14054 14.7215 3.41358C14.0829 3.68663 13.5026 4.08683 13.0139 4.59133L11.9997 5.63785L10.9855 4.59133C9.99842 3.57276 8.6596 3.00053 7.26361 3.00053C5.86761 3.00053 4.52879 3.57276 3.54168 4.59133C2.55456 5.6099 2 6.99139 2 8.43187C2 9.87235 2.55456 11.2538 3.54168 12.2724L4.55588 13.3189L11.9997 21L19.4436 13.3189L20.4578 12.2724C20.9467 11.7681 21.3346 11.1694 21.5992 10.5105C21.8638 9.85148 22 9.14517 22 8.43187C22 7.71857 21.8638 7.01225 21.5992 6.35328C21.3346 5.69431 20.9467 5.09559 20.4578 4.59133V4.59133Z">
                                    </path>
                                </g>
                            </svg>
                         </div>
                    </button>
                </form>

               
            </div>
        </div>
    </div>
    
    `)

    // item['color-items'].forEach((e) => {
    //     colorSwiper.appendSlide(
    //         `<span class="wrapper-color__item swiper-slide js-color-item ${e.active ? 'active' : ''}" style="margin-right: 8px;" data-id=${e.id}>
    //       <img class="wrapper-color__item-img" src="${e.img}" title="${e.color}" alt="${e.color}">
    //     </span>`
    //     );
    // });
    // refresh new js color item click scripts
    // document.querySelectorAll('.js-color-item').forEach((item) => {
    //     item.addEventListener('click', (e) => {
    //         miniCardItemsGet(item.getAttribute('data-id'));
    //     });
    // });






}

// close top pop up ==================================
let topPopUp = document.querySelector('.top-popup__close');
topPopUp
    ? topPopUp.addEventListener('click', () => {
        document.querySelector('.top-popup').style.display = 'none';
    })
    : null;
  // ===============================================================
