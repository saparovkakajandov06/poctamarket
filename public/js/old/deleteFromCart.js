$(document).ready(function(){
                
    $(".__js-remove-item").click(function () {
        var $myElem = $(this);

        var idProd = $(this).attr("data-id");
        
        $.ajax({
            url: "/cart/delete/" + idProd,
            data: {
                id: idProd
            },
            type: "GET",
            dataType : "JSON",
            success: function(html) {
                $('#cart-count').html(html.cartCount);
                $('.card-summary__info-value __js-sum').html(html.cartCount);
                $('.card-summary__info-value __js-dostavka').html(html.totalPrice + 10 + " TMT");
                $('.card-summary__info-value __js-last-sum').html(html.totalPrice + " TMT");

                $myElem.parent().parent().remove();

                if(!html.cartCount) {
                    $('.card').remove();
                    // $('.section').remove();
                    $('.cart').append(`<h1>Sebet boş</h1>`);
                }
            },
            error: function(e) {
                alert('Saparov, you have an error!');
                console.log(e.message);
            }
        })
            
        return false;
    });
    
});


/*$(document).ready(function(){

    $(".cart_quantity_delete").click(function () {
        var $myElem = $(this);

        var idProd = $(this).attr("data-id");

        $.ajax({
            url: "/cart/delete/" + idProd,
            data: {
                id: idProd
            },
            type: "GET",
            dataType : "JSON",
            success: function(html) {
                $('#cart-count').html(html.cartCount);
                $('#cart-count2').html(html.cartCount);
                $('#totalPrice').html(html.totalPrice + 10 + " TMT");
                $('#totalPrice2').html(html.totalPrice + " TMT");

                $myElem.parent().parent().remove();

                if(!html.cartCount) {
                    $('.cart-table table').remove();
                    $('.section-9').remove();
                    $('.cart-table').append(`<h1>Sebet boş</h1>`);
                }
            },
            error: function(e) {
                alert('Sapar, you have an error!');
                console.log(e.message);
            }
        });

        return false;
    });

});*/
