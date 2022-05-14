$(document).ready(function(){
                
    $(".add-to-cart").click(function () {
        console.log(this);
        
        $('.cart-loader-container').css('display','flex');

        var idProd = $(this).attr("data-id");

        var $thisElem = $(this);

        $.ajax({
            url: "/cart/add/" + idProd,
            data: {
                id: idProd
            },
            type: "GET",
            dataType : "JSON",
            success: function(html) {
                console.log(html);
                $('#cart-count').html(html.cartCount);
                $('#cart-count2').html(html.cartCount);
                $('.cart-loader-container').css('display','none');
                showToast()
            },
            error: function(e) {
                alert('Sapar, you have an error!');
            }
        })
            
        return false;
    });
    
});


function addToCart(idProd) {
    $.ajax({
        url: "/cart/add/" + idProd,
        data: {
            id: idProd
        },
        type: "GET",
        dataType : "JSON",
        success: function(html) {
            $('#cart-count').html(html.cartCount);
            $('#cart-count2').html(html.cartCount);
            $('.cart-loader-container').css('display','none');

            showToast()
        },
        error: function(e) {
            alert('Sapar, you have an error!');
        }
    })
        
    return false;

}


function showToast() {
    Toastify({
        text: "Önüm sebede goşuldy",
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
          fontSize:"14px"
        },
        onClick: function(){} // Callback after click
      }).showToast();
}



/*
$(document).ready(function(){

    $(".add-to-cart").click(function () {

        $('.cart-loader-container').css('display','flex');

        var idProd = $(this).attr("data-id");

        var $thisElem = $(this);

        $.ajax({
            url: "/cart/add/" + idProd,
            data: {
                id: idProd
            },
            type: "GET",
            dataType : "JSON",
            success: function(html) {
                console.log(html);
                $('#cart-count').html(html.cartCount);
                $('#cart-count2').html(html.cartCount);
                $('.cart-loader-container').css('display','none');
            },
            error: function(e) {
                alert('Sapar, you have an error!');
            }
        });

        return false;
    });

});*/
