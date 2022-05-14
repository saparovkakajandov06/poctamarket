
$(document).ready(function(){
    
    $("__js-inc").click(function () {
        var idProd = $(this).attr("data-id");

        var $thisElem = $(this);

        $thisElem.prev().val('');
        $thisElem.prev().prev().prev().css('display','flex');

        $.ajax({
            url: "/cart/plus/" + idProd,
            data: {
                id: idProd
            },
            type: "GET",
            dataType : "JSON",
            success: function(html) {
                $('__count').css('display','none');
                $('#cart-count').html(html.cartCount);
                $('.card-product__card-info-bold card-product__card-info-summary-price').html(html.cartCount);
                
                $thisElem.prev().val(html.prodByIdCount);
                $thisElem.parent().find('__count').html(html.prodByIdCount);

                $thisElem.parent().next().html((+html.oneProdTotalPrice).toFixed(2) + " TMT");
                
                // if($('.courier').prop('checked')) {
                    $('.card-product__card-info-bold card-product__card-info-summary-price').html((+html.totalPrice + (+$('input[name="delivery_sum"]').val())).toFixed(2) + " TMT");
                // }
                // else {
                    $('.card-product__card-info-bold card-product__card-info-summary-price').html((+html.totalPrice).toFixed(2) + " TMT");
                // }
                
                $('.card-product__card-info-bold card-product__card-info-summary-price').html((+html.totalPrice).toFixed(2) + " TMT");
                
            },

            error: function(e) {
                alert('Saparov, you have an error!');
            }
        });
            
        return false;
    });
    
});


/*$(document).ready(function(){

    $(".card-product__quantity-button").click(function () {
        var idProd = $(this).attr("data-id");

        var $thisElem = $(this);

        $thisElem.prev().val('');
        $thisElem.prev().prev().prev().css('display','flex');

        $.ajax({
            url: "/cart/plus/" + idProd,
            data: {
                id: idProd
            },
            type: "GET",
            dataType : "JSON",
            success: function(html) {
                $('.p-m-loader-container').css('display','none');
                $('#cart-count').html(html.cartCount);
                $('#cart-count2').html(html.cartCount);

                $thisElem.prev().val(html.prodByIdCount);
                $thisElem.parent().find('.card-product__card-info-bold').html(html.prodByIdCount);

                $thisElem.parent().next().html((+html.oneProdTotalPrice).toFixed(2) + " TMT");

                if($('.courier').prop('checked')) {
                    $('#totalPrice').html((+html.totalPrice + (+$('input[name="delivery_sum"]').val())).toFixed(2) + " TMT");
                } else {
                    $('#totalPrice').html((+html.totalPrice).toFixed(2) + " TMT");
                }

                $('#totalPrice2').html((+html.totalPrice).toFixed(2) + " TMT");

            },
            error: function(e) {
                alert('Sapar, you have an error!');
            }
        });

        return false;
    });

});*/

