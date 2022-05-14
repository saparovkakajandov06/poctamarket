$(window).click(function(event) {
    var target = $( event.target );
    if(target.is('.mobile-menu-title')) {
        if($('.mobile-menu-ul-section').css('right') == '-258px') $('.mobile-menu-ul-section').animate({
            right: '0'
        },500);
        else $('.mobile-menu-ul-section').animate({
            right: '-258px'
        },500);
    }

    if(target.is('.link-acc')) {
        return false
    }

    else {
        if($('.mobile-menu-ul-section').css('right') == '0px') $('.mobile-menu-ul-section').animate({
            right: '-258px'
        },500);
    }
})

