let langItemAll = document.querySelectorAll('.lang__item');
let langItems = document.querySelector('.lang__items');
let langCurrent = document.querySelector('.lang__current');

langItemAll.forEach((e) => {
  e.addEventListener('click', (item) => {
    langItemAll.forEach((className) => className.classList.remove('lang__item_active'));
    e.classList.add('lang__item_active');
    document.querySelector('.lang__current>p').innerHTML = e.innerHTML;
  });
});
//
langCurrent ? langCurrent.addEventListener('click', (e) => langItems.classList.toggle('lang__items_visible')) : null;

window.addEventListener('click', function (e) {
  if (langItems) {
    if (!(langItems.contains(e.target) || langCurrent.contains(e.target)) || langItems.contains(e.target)) {
      langItems.classList.remove('lang__items_visible');
    }
  }
});

$('.header__burger').click(function (event) {
  $('.header__burger, .menu__body').toggleClass('active');
  $('body').toggleClass('_lock');
});

$('.openSearch').click(function (event) {
   $('.header__search').addClass('active');
   $('.searchClose').show();
});

$('.searchClose').click(function (event) {
   $('.header__search').removeClass('active'); 
});

$('.searchClose, .searchClose_desktop').click(function (event) {
   $('.header__search input').val(''); 
   $(".search_list, .searchSubmit, .searchClose ").hide();

});
$(".searchSubmit").hide();
$(".input-search").keyup(function () {
    var inp = $(".input-search").val().length;
   
    if (inp > 0){
      $(".searchSubmit, .searchClose").show();

    }else{
      $(".searchSubmit, .searchClose").hide();
    }
})

$(".input-search").focus(function () {
    var inp = $(".input-search").val().length;
    if (inp > 0){
      $(".searchSubmit, .searchClose").show();
    }else{
      $(".searchSubmit, .searchClose").hide();
    }
})




// $('.header__search input').focus(function(){
//   $('.header__search .searchSubmit').css("right", "60px")
//   $('.header__search .searchClose').css("display", "block")
// });




$('.marquee').marquee({
  speed: 50,
  gap: 0,
  delayBeforeStart: 0,
  direction: 'left',
  duplicated: true,
  pauseOnHover: true,
  startVisible: true,
});

mybutton = document.getElementById('scrollTop');

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

$('.new-product__categoryes-title').click(function () {
  $('.new-product__categoryes-title, .new-product__categoryes-links').toggleClass('visible');
});

const maxWidth = 1024;
$('.f-dropdown__button').click(function (e) {
  if (window.innerWidth > maxWidth || $(this).parents('.product-filters__items').length > 0) {
    $(this).parent().children('.f-dropdown__menu').slideToggle(300);
  }
});

let fMenu = document.querySelectorAll('.f-dropdown__menu');
fMenu.forEach((elem) => {
  window.addEventListener('click', function (e) {
    if (window.innerWidth > maxWidth) {
      if (!(elem.contains(e.target) || elem.parentNode.contains(e.target))) {
        $(elem).slideUp(300);
      }
    }
  });
});

$('.__js-filter-butoon').click(function (e) {
  $(this).parents('.__js-filter-wrapper').children('.__js-filter').addClass('__menu-active');
  e.preventDefault();
});
$('.__js-filter-close').click(function (e) {
  $(this).parents('.__js-filter').removeClass('__menu-active');
});
$(window).on('resize', function () {
  if ($(window).width() <= 1024) {
    $('.f-dropdown__menu').css('display', '');
  }
});

let heart = document.querySelectorAll('.new-product__favorite');
heart.forEach((e) => {
  e.addEventListener('click', (item) => {
    e.classList.toggle('active');
    if (e.classList.contains('active')) {
      e.children[0].className = '_icon-heart-active';
    } else {
      e.children[0].className = '_icon-heart';
    }
  });
});
// ======================

window.onload = function () {
  document.body.classList.add('loaded');
  document.body.classList.remove('_lock');
  $('.new-product__category-active-slider').addClass('hide');
};
// ======================

$('.size-dropdown__button').click(function (e) {
  $(this).toggleClass('active');
  $(this).parent().children('.size-dropdown__menu').toggleClass('active');
});
// size dropdown menu

$('.size-dropdown__menu>ul>li').click(function (e) {
  if ($(this).hasClass('size-dropdown__header')) {
    if ($(this).hasClass('s-header-active')) {
      $(this).next().remove();
    } else {
      $(this).after(`
      <div class="size-dropdown__form">
       <form action="#">
        <div>
          адрес email
        </div>
        <input type="text">
        <button type="submit">OK</button>
        </form>
      </div>
      `);
    }
    $(this).toggleClass('s-header-active');
  } else {
    $('.size-dropdown__menu>ul>li, .size-dropdown__button, .size-dropdown__menu').removeClass('active');
    $(this).addClass('active');
    $('.size-dropdown__button>p')[0].innerHTML = $(this)[0].innerHTML;
  }
});


// ========================================================
let dropdown = document.querySelector('.size-dropdown');
window.addEventListener('click', function (e) {
  if (dropdown) {
    if (!dropdown.contains(e.target)) {
      $('.size-dropdown__button, .size-dropdown__menu').removeClass('active');
    }
  }
});

$('.card-content__cart-confirmation-add-to-favs>button').click(function (e) {
  $(this).children().toggleClass('_icon-heart-active');
});

$('.info-section__button').click(function (e) {
  if (!$(this).hasClass('active')) {
    $('.info-section__button, .info-section__textarea').removeClass('active');
  }
  $(this).toggleClass('active');
  $(this).parent().children('.info-section__textarea').toggleClass('active');
});

// video script ===================================

$('.card-slider__video-controller').click(function (e) {
  $(this).toggleClass('active');
  $('.card-video').toggleClass('active');
  if ($(this).hasClass('active')) {
    $('#video').get(0).play();
  } else {
    $('#video').get(0).pause();
  }
});

$('.card-video__play-stop').click(function (e) {
  if ($(this).hasClass('_icon-play-video')) {
    $('#video').get(0).play();
  } else {
    $('#video').get(0).pause();
  }
  $(this).toggleClass('_icon-play-video');
});
$('.card-video__resize').click(function (e) {
  $('.card-video').toggleClass('full-page');
});

// <top-popup> ========================================================================================================

if ($('.top-popup__item').length > 0) {
  $('.top-popup__item')[0].classList.add('active');
  let popupLenth = $('.top-popup__item').length;
  let popupCurrentItem = 1;
  const topPopupSlider = () => {
    setInterval(() => {
      $('.top-popup__item').removeClass('active');
      $('.top-popup__item')[popupCurrentItem].classList.add('active');
      popupCurrentItem++;
      popupCurrentItem = popupCurrentItem % popupLenth;
    }, 3000);
  };
  topPopupSlider();
}
// </top-popup> ===========================================================================================================

let productSwiper = new Swiper('.js-product-images-block', {
  loop: true,
  navigation: {
    nextEl: '.next',
    prevEl: '.prev',
  },
  pagination: {
    el: '.pagination',
    clickable: true,
  },
});

let colorSwiper = new Swiper('.js-color-item-swiper', {
  slidesPerView: 'auto',
  navigation: {
    nextEl: '.nextItem',
    prevEl: '.previous',
  },
});

// <listing-item-scripts>=============================================================================================================
$('.js-add-to-wish-button').click(function (e) {
  $(this).toggleClass('load');
  // son ocurmeli set time oudy
  setTimeout(() => {
    $(this).toggleClass('load');
    $(this).toggleClass('active');
  }, 2000);
});
// // mini-card show ==========================
// $('.js-show-mini-card-button').click(function (e) {
//   console.log('ssgg');
//   if (window.innerWidth > 1024) {
//     $(this).addClass('button--load');
//     setTimeout(() => {
//       $(this).removeClass('button--load');
//       $('.js-pop-up[data-pop-up-name="product-mini-card"]').addClass('show');
//     }, 2000);
//     miniCardItemsGet($(this)[0].getAttribute('data-id'));
//   }
// });
// korzina gosmak basanda size sayla popup =================================
$('.js-product-details-add-to-cart').click(function (e) {
  $(this).addClass('button--load');
  setTimeout(() => {
    $(this).removeClass('button--load');
    updateSizeAddCardWrapper();
    $('.js-pop-up[data-pop-up-name="selectSizeAddToCartPopUp"').addClass('show');
  }, 1000);
});
// olceg table popup ==========================
$('.js-show-sizes-table').click(function (e) {
  $('.js-pop-up[data-pop-up-name="size-table"]').addClass('show');
});
// razmer saylananda popup ayyrta we basket cykyar================
$('.js-add-to-basket-size').click(function (e) {
  $('.js-pop-up[data-pop-up-name="selectSizeAddToCartPopUp"]').removeClass('show');
  $('.js-pop-up[data-pop-up-name="mini-basket"]').addClass('show');
});
// ============
  $('.js-close-button, .js-close').click(function (e) {
  $(this).parents('.js-pop-up').first().removeClass('show');
});



  $('.js-close-button_ocur').click(function (e) {
  $(this).parents('.js-pop-up_skidku').first().removeClass('show');
});

  // ============
$('.js-size-item').click(function (e) {
  $('.js-size-item').removeClass('active');
  $(this).addClass('active');
});
// =================================
function updateSizeAddCardWrapper() {
  let item = $('.js-block-product-information');
  let pos = item.offset();
  let width = item.width();
  let bottom = $('.js-mini-product-page-block').position().top;
  $('.js-pop-up-info-block').css({
    left: pos.left,
    width: width,
    bottom: bottom,
  });
}
$(window).resize(function () {
  $('.js-pop-up[data-pop-up-name="selectSizeAddToCartPopUp"').removeClass('show');
});
// </listing-item-scripts>============================================================================================================

//? mini card cykanda suratlar update function
// async function miniCardItemsGet(dataId = null) {
//   let items = {};
//   await fetch('./js/items.json')
//     .then((response) => {
//       return response.json();
//     })
//     .then((data) => (items = data));
//   const item = items[dataId];
//   productSwiper.removeAllSlides();
//   colorSwiper.removeAllSlides();

//   item.images.forEach((e) => {
//     productSwiper.appendSlide(
//       `<div class="swiper-slide">
//         <img src="${e}" alt="">
//       </div>`
//     );
//   });
//   item['color-items'].forEach((e) => {
//     colorSwiper.appendSlide(
//       `<span class="wrapper-color__item swiper-slide js-color-item ${e.active ? 'active' : ''}" style="margin-right: 8px;" data-id=${e.id}>
//         <img class="wrapper-color__item-img" src="${e.img}" title="${e.color}" alt="${e.color}">
//       </span>`
//     );
//   });
//   // refresh new js color item click scripts
//   document.querySelectorAll('.js-color-item').forEach((item) => {
//     item.addEventListener('click', (e) => {
//       miniCardItemsGet(item.getAttribute('data-id'));
//     });
//   });
// }

// // close top pop up ==================================
// let topPopUp = document.querySelector('.top-popup__close');
// topPopUp
//   ? topPopUp.addEventListener('click', () => {
//       document.querySelector('.top-popup').style.display = 'none';
//     })
//   : null;
// // ===============================================================

// hity prodaz
$('.product-categorys__item').first().addClass('product-categorys__item_active');
$('.new-product__category-active-slider').first().addClass('active');
//
$('.product-categorys__item').each(function (index, e) {
  $(this).attr('data-xit', index);
});
$('.product-categorys__item').click(function (e) {
  $('.product-categorys__item').removeClass('product-categorys__item_active');
  $(this).addClass('product-categorys__item_active');
  let index = $(this).attr('data-xit');
  $('.new-product__category-active-slider').removeClass('active');
  $('.new-product__category-active-slider')[index].classList.add('active');
});

// countdown

$(function () {
  if ($('.js-countdown-banner').length > 0) {
    $('.js-countdown-banner').countdown();
  }
  $('body').on('click', '.js-action-banner-head', function () {
    $(this).closest('.top-info-banner').toggle();
    $(this).closest('.top-info-banner').next().toggle();
  });
  $('body').on('click', '.js-collapsed-top-line', function () {
    $(this).closest('.collapse-info-banner').toggle();
    $(this).closest('.collapse-info-banner').prev().toggle();
  });
});

function copyToClipboard(element) {
  element = $(element);
  let $temp = $('<input>');
  $('body').append($temp);
  let promocode = element.text();
  $temp.val(promocode).select();
  document.execCommand('copy');
  $temp.remove();
  $.cookie('promocodeBanner', promocode, { path: '/' });
  element.closest('.js-copy-code').find('.js-banner-hint-copy').addClass('show-hint');
  setTimeout(function () {
    $('.js-copy-code').find('.js-banner-hint-copy').removeClass('show-hint');
  }, 3000);
}

(function ($) {
  function pad(n) {
    return n < 10 ? '0' + n : n;
  }
  $.fn.showclock = function () {
    var currentDate = new Date();
    var fieldDate = $(this).data('date').split('-');
    var futureDate = new Date(fieldDate[0], fieldDate[1] - 1, fieldDate[2]);
    var seconds = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
    if (seconds <= 0 || isNaN(seconds)) {
      this.hide();
      return this;
    }
    var days = Math.floor(seconds / 86400);
    seconds = seconds % 86400;
    var hours = Math.floor(seconds / 3600);
    seconds = seconds % 3600;
    var minutes = Math.floor(seconds / 60);
    seconds = Math.floor(seconds % 60);
    var html = '';
    if (days != 0) {
      html += "<div class='countdown-container days'>";
      html += "<span class='countdown-value days-bottom'>" + pad(days) + '</span>';
      html += "<span class='countdown-heading days-top'>д</span>";
      html += '</div>';
    } else {
      html += "<div class='countdown-container days'>";
      html += "<span class='countdown-value days-bottom'>" + '00' + '</span>';
      html += "<span class='countdown-heading days-top'>д</span>";
      html += '</div>';
    }
    html += "<div class='countdown-container hours'>";
    html += "<span class='countdown-value hours-bottom'>" + pad(hours) + '</span>';
    html += "<span class='countdown-heading hours-top'>ч</span>";
    html += '</div>';
    html += "<div class='countdown-container minutes'>";
    html += "<span class='countdown-value minutes-bottom'>" + pad(minutes) + '</span>';
    html += "<span class='countdown-heading minutes-top'>м</span>";
    html += '</div>';
    html += "<div class='countdown-container seconds'>";
    html += "<span class='countdown-value seconds-bottom'>" + pad(seconds) + '</span>';
    html += "<span class='countdown-heading seconds-top'>с</span>";
    html += '</div>';
    this.html(html);
  };
  $.fn.countdown = function () {
    var el = $(this);
    el.showclock();
    setInterval(function () {
      el.showclock();
    }, 1000);
  };
})(jQuery);

// ==================================

function copyToClipboard(element) {
  element = $(element);
  let $temp = $('<input>');
  $('body').append($temp);
  let promocode = element.text();
  $temp.val(promocode).select();
  document.execCommand('copy');
  $temp.remove();
  element.closest('.js-copy-code').find('.js-banner-hint-copy').addClass('show-hint');
  setTimeout(function () {
    $('.js-copy-code').find('.js-banner-hint-copy').removeClass('show-hint');
  }, 3000);
}

// log and reg scripts==================================================================

$('.js-show-log-and-reg').click(function (e) {
  e.preventDefault();
  $('.js-pop-up[data-pop-up-name="log-in-and-reg"]').addClass('show');
});

$('.js-show-hocu-skidku').click(function (e) {
  e.preventDefault();
  $('.js-pop-up_skidku[data-pop-up-name="hocu-skidku"]').addClass('show');
});

$('.__js-forgot-pass').click(function (e) {
  $('.js-pop-up[data-pop-up-name="forgot-pass"]').addClass('show');
});
$(document).ready(function () {
  $('.reg-and-log__show-area').last().addClass('display');
  $('.reg-and-log__reg-area').first().addClass('display');
  $('.__js-show-log-area').addClass('active');
  //
  $('.__js-show-reg-area').click(function (e) {
    $('.__js-nav-reg-area').addClass('display');
    $('.__js-show-reg-area').addClass('active');
    $('.__js-show-log-area').removeClass('active');
    $('.__js-reg-area').removeClass('display');
    $('.__js-log-area').addClass('display');
    $('.__js-nav-log-area').removeClass('display');
  });
  $('.__js-show-log-area').click(function (e) {
    $('.__js-nav-log-area').addClass('display');
    $('.__js-show-log-area').addClass('active');
    $('.__js-show-reg-area').removeClass('active');
    $('.__js-log-area').removeClass('display');
    $('.__js-reg-area').addClass('display');
    $('.__js-nav-reg-area').removeClass('display');
  });
  $('.__js-show-password').click(function (e) {
    let type = $(this).parent().children('input').attr('type');
    if (type === 'password') {
      $(this).parent().children('input').attr('type', 'text');
    } else {
      $(this).parent().children('input').attr('type', 'password');
    }
  });
  function generatePassword() {
    var length = 16,
      charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',
      retVal = '';
    for (var i = 0, n = charset.length; i < length; ++i) {
      retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
  }
  $('#random-password').click(function (e) {
    if (e.target.value === 'on') {
      let pass = generatePassword();
      document.getElementById('password').value = pass;
    }
  });
});

// card scripts
$('.coupon-template__couponForm').css('display', 'none');
$('.coupon-template__toggle-view').css('display', 'flex');

$('.answear-club-points__points-form').css('display', 'none');

$('.coupon-template__toggle-view').click(function (e) {
  e.preventDefault();
  $('.coupon-template__toggle-view').css('display', 'none');
  $('.coupon-template__couponForm').css('display', 'flex');
});
$('.coupon-template__close').click(function (e) {
  e.preventDefault();
  $('.coupon-template__couponForm').css('display', 'none');
  $('.coupon-template__toggle-view').css('display', 'flex');
});

$('.answear-club-points__toggle-view').click(function (e) {
  $('.answear-club-points__toggle-view').css('display', 'none');
  $('.answear-club-points__points-form').css('display', 'flex');
});

// card sum count

let quantity = document.querySelectorAll('.__quantity');
disabledButton();
quantity.forEach((e) => {
  e.addEventListener('click', updateCount);
});

function updateCount(event) {
  const count = parseInt(event.target.parentNode.children[1].innerHTML);
  if (event.target.classList.contains('__js-inc')) {
    event.target.parentNode.children[1].innerHTML = count + 1;
    updateItemSum(event, count + 1);
  } else if (event.target.classList.contains('__js-dec') && count > 1) {
    event.target.parentNode.children[1].innerHTML = count - 1;
    updateItemSum(event, count - 1);
  }
  disabledButton();
  updateSum();
}
function disabledButton() {
  quantity.forEach((e) => {
    e.children[1].innerHTML === '1' ? e.children[0].setAttribute('disabled', true) : e.children[0].removeAttribute('disabled');
  });
}

function updateItemSum(event, count) {
  let price = parseFloat(event.path[4].children[1].children[0].children[1].children[0].children[0].innerHTML);
  let sum = price * count;
  event.path[4].children[1].children[1].children[1].children[0].innerHTML = sum;
}

function updateSum() {
  let allPrice = document.querySelectorAll('.card-product__card-info-summary-price>span');
  let sum = 0;

  allPrice.forEach((e) => {
    sum = sum + parseFloat(e.innerHTML);
  });

  document.querySelector('.__js-sum>span').innerHTML = sum;
  let skidka = parseFloat(document.querySelector('.__js-skidka>span').innerHTML);
  let dostavka = parseFloat(document.querySelector('.__js-dostavka>span').innerHTML);
  // document.querySelector('.__js-last-sum>span').innerHTML = sum - skidka + dostavka;
  document.querySelector('.__js-last-sum>span').innerHTML = sum  + dostavka;
}

// favourites scripts========================================================================

// dropdown script
$('.base-select-dropdown__header').click(function (e) {
  $(this).toggleClass('active');
  $(this).parent().children('.base-select-dropdown__menu').toggleClass('active');
});
$('.base-select-dropdown__item_select-item').click(function (e) {
  $(this).parent().children('.base-select-dropdown__item_select-item').removeClass('base-select-dropdown__item_select-item_selected');
  $(this).parent().children('.base-select-dropdown__item_select-item').children('._icon-check').remove();
  //
  $(this)
    .parents('.base-select-dropdown')
    .children('.base-select-dropdown__header')
    .children('.base-select-dropdown__select-container-has-a-filter')[0].innerHTML =
    $(this).children('.base-select-dropdown__item-title')[0].innerHTML;
  //
  $(this).addClass('base-select-dropdown__item_select-item_selected');
  $(this).append('<span class="_icon-check"></span>');
});
$('.base-select-dropdown__menu').click(function (e) {
  $(this).toggleClass('active');
  $(this).parent().children('.base-select-dropdown__header').toggleClass('active');
});
document.querySelectorAll('.base-select-dropdown').forEach((item) => {
  window.addEventListener('click', function (e) {
    if (!item.contains(e.target)) {
      $(item).children('.base-select-dropdown__header').removeClass('active');
      $(item).children('.base-select-dropdown__menu').removeClass('active');
    }
  });
});
var checkbox = document.querySelector('#check-all-favourites');

if (checkbox) {
  checkbox.addEventListener('change', function () {
    if (this.checked) {
      $('.favourites-header-block__button').addClass('visible');
    } else {
      $('.favourites-header-block__button').removeClass('visible');
    }
  });
}
// ===========================================================================================

// remove fav element
$('.__js-remove-fav').click(function (e) {
  $(this).parents('.favourites-products__column').remove();
});

// news filter dropdown
$('.news-filter__header').click(function (e) {
  $(this).toggleClass('active');
  $('.news-filter__menu').toggleClass('active');
});

document.querySelectorAll('.news-filter').forEach((item) => {
  window.addEventListener('click', function (e) {
    if (!item.contains(e.target)) {
      $(item).children('.news-filter__header').removeClass('active');
      $(item).children('.news-filter__menu').removeClass('active');
    }
  });
});

// MY ACCOUNT ==============================================================================

const expandShow = document.querySelectorAll('.text-expander__text-wrapper-expand_show');
const expandHide = document.querySelectorAll('.text-expander__text-wrapper-expand_hide');

expandShow.forEach((elem) => {
  elem.addEventListener('click', expandUpdate);
});
expandHide.forEach((elem) => {
  elem.addEventListener('click', expandUpdate);
});

function expandUpdate(event) {
  if (event.target.className === expandShow[0].className) {
    event.path[2].children[1].children[0].children[1].style.display = 'block';
    event.path[1].children[1].style.display = 'block';
    event.path[1].children[0].style.display = 'none';
  } else if (event.target.className === expandHide[0].className) {
    event.path[2].children[1].children[0].children[1].style.display = 'none';
    event.path[1].children[1].style.display = 'none';
    event.path[1].children[0].style.display = 'block';
  }
}

$('.__js-show-password').click(function (e) {
  if ($(this).hasClass('active')) {
    $(this).parent().children('input').attr('type', 'text');
  } else {
    $(this).parent().children('input').attr('type', 'password');
  }
  $(this).toggleClass('active');
});

$('.__js-account-inf-button').click(function (e) {
  $('.__js-account-inf-box, .__js-account-inf-form').toggleClass('my-account__hide');
});
$('.__js-account-adress-button').click(function (e) {
  $('.__js-account-adress-box, .__js-account-adress-form').toggleClass('my-account__hide');
});
$('.__js-account-password-button').click(function (e) {
  $('.__js-account-password-box, .__js-account-password-form').toggleClass('my-account__hide');
});

// razmer sahypa acordion

sidedrawer = document.querySelectorAll('.sizelisting__item');
sidedrawer.forEach((item) => {
  item.addEventListener('click', (event) => {
    if (event.target.className === 'sizelisting__list-button') {
      item.classList.toggle('is-open');
    }
  });
});
