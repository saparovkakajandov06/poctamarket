/*
$(document).ready(function(){
                
    $(".card-product__quantity-button __js-dec").click(function () {
        var idProd = $(this).attr("data-id");

        var $thisElem = $(this);
        $thisElem.next().val('');
        $thisElem.prev().css('display','flex');

        $.ajax({
            url: "/cart/subtract/" + idProd,
            data: {
                id: idProd
            },
            type: "GET",
            dataType : "JSON",
            success: function(html) {
                $('.card-product__card-info-bold __count').css('display','none');
                $('#cart-count').html(html.cartCount);
                $('.summary__cart-summary-info-value').html(html.cartCount);

                if($('.courier').prop('checked')) {
                    $('.summary__cart-summary-info-value').html((+html.totalPrice + (+$('input[name="delivery_sum"]').val())).toFixed(2) + " TMT");
                } else {
                    $('.summary__cart-summary-info-value').html((+html.totalPrice).toFixed(2) + " TMT");
                }
                
                $('.courier').html((+html.totalPrice).toFixed(2) + " TMT");

                if(html.prodByIdCount > 0) {
                    $thisElem.next().val(html.prodByIdCount);
                    $thisElem.parent().find('.card-product__card-info-bold __count').html(html.prodByIdCount);

                    $thisElem.parent().next().html(
                        (+html.oneProdTotalPrice).toFixed(2) + " TMT"
                    );
                } else {
                    $thisElem.parent().parent().parent().find('.card-product__img').remove();
                    $thisElem.parent().parent().remove();
                }   
                
                if(!html.cartCount) {
                    $('.card').remove();
                    $('.section').remove();
                    $('.cart').append(`<h1>Sebet boş</h1>`);
                }
            },
            error: function(e) {
                alert('Saparov, you have an error!');
                console.log(e);
            }
        });
            
        return false;
    });
    
});*/


$(document).ready(function(){

    $(".card-product__quantity-button_down").click(function () {
        var idProd = $(this).attr("data-id");

        var $thisElem = $(this);
        $thisElem.next().val('');
        $thisElem.prev().css('display','flex');

        $.ajax({
            url: "/cart/subtract/" + idProd,
            data: {
                id: idProd
            },
            type: "GET",
            dataType : "JSON",
            success: function(html) {
                $('.p-m-loader-container').css('display','none');
                $('#cart-count').html(html.cartCount);
                $('#cart-count2').html(html.cartCount);

                if($('.courier').prop('checked')) {
                    $('#deliveryMethod_radio_0').html((+html.totalPrice + (+$('input[name="delivery_sum"]').val())).toFixed(2) + " TMT");
                } else {
                    $('#deliveryMethod_radio_0').html((+html.totalPrice).toFixed(2) + " TMT");
                }

                $('#deliveryMethod_radio_0').html((+html.totalPrice).toFixed(2) + " TMT");

                if(html.prodByIdCount > 0) {
                    $thisElem.next().val(html.prodByIdCount);
                    $thisElem.parent().find('.card-product__card-info-bold').html(html.prodByIdCount);

                    $thisElem.parent().next().html(
                        (+html.oneProdTotalPrice).toFixed(2) + " TMT"
                    );
                } else {
                    $thisElem.parent().parent().parent().find('.card-product__img').remove();
                    $thisElem.parent().parent().remove();
                }

                if(!html.cartCount) {
                    $('.cart-table table').remove();
                    $('.section-9').remove();
                    $('.cart-table').append(`<h1>Sebet boş</h1>`);
                }
            },
            error: function(e) {
                alert('Sapar, you have an error!');
                console.log(e);
            }
        });

        return false;
    });

});