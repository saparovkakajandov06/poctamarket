$(window).click(function(event) {
    var target = $( event.target );
    if(target.is('.current-lang .lang-icon')) {
        if($('.other-langs').css('display') == 'none') $('.other-langs').slideDown();
        else $('.other-langs').slideUp();
        return false;
    }
    else {
        if($('.other-langs').css('display') == 'block') $('.other-langs').slideUp();
    }
})