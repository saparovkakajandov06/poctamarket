$('.category-slider__slids').slick({
  arrows: false,
  dots: true,
  autoplay: true,
})

$('.new-product__slider').slick({
  slidesToShow: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
      },
    },

    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      },
    },
  ],
})

$('.new-product__slider-similar').slick({
  slidesToShow: 5,
  infinite: false,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
      },
    },

    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      },
    },
  ],
})

$('.brands-slider__row').slick({
  slidesToShow: 7,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 6,
      },
    },

    {
      breakpoint: 880,
      settings: {
        slidesToShow: 5,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 4,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 425,
      settings: {
        slidesToShow: 2,
      },
    },
  ],
})

var $slickElement = $('.trends__slider')

$slickElement.slick({
  slidesToShow: 3,
  dots: true,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
      },
    },

    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      },
    },
  ],

  dotsClass: 'custom_paging',
  customPaging: function (slider, i) {
    return i + 1 + '/' + slider.slideCount
  },
})

$('.slider-for').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: true,
  asNavFor: '.slider-nav',
  infinite: false,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 1,
      },
    },
  ],
})
$('.slider-nav').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  infinite: false,
  arrows: true,
  vertical: true,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 3,
      },
    },
  ],
})
// ================================================
// product page menzeser slider me nav===================

$('.js_recommended-slider').slick({
  slidesToShow: 5,
  arrows: true,
  dots: true,
  appendDots: $('.rec-slick-dots'),
  prevArrow: $('.rec-slick-prev'),
  nextArrow: $('.rec-slick-next'),
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
      },
    },

    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      },
    },
  ],
})
$('.js_vieved-slider').slick({
  slidesToShow: 5,
  arrows: true,
  dots: true,
  appendDots: $('.viv-slick-dots'),
  prevArrow: $('.viv-slick-prev'),
  nextArrow: $('.viv-slick-next'),
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
      },
    },

    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      },
    },
  ],
})
$(document).ready(function () {
  $('.js-title-tab').first().addClass('active')
  $('.md-prod-slier').first().addClass('active')
  setTimeout(() => {
    $('.md-prod-slier').addClass('absolute')
  }, 100)
})
$('.js-title-tab').click(function (e) {
  $('.js-title-tab').removeClass('active')
  $(this).addClass('active')
  $('.md-prod-slier').removeClass('active')
  let blockedClass = '.' + $(this).attr('data-tab')
  $(blockedClass).addClass('active')
})
// ===================================================
$('.object-thumbnail-list__slider').slick({
  slidesToShow: 6,
  arrows: true,
  dots: false,
  slidesToScroll: 3,
  infinite: false,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToScroll: 2,
        slidesToShow: 4,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToScroll: 2,
        slidesToShow: 2,
      },
    },

    {
      breakpoint: 480,
      settings: {
        slidesToScroll: 1,
        slidesToShow: 1,
      },
    },
  ],
})
// =====================================================
var $grid = $('.grid').isotope({
  // options
  filter: '.all',
})
// filter items on button click
$('.filter-button-group').on('click', 'button', function () {
  $('.portfolio-categorys__item').removeClass('portfolio-categorys__item_active')
  $(this).addClass('portfolio-categorys__item_active')
  var filterValue = $(this).attr('data-filter')
  $grid.isotope({ filter: '.' + filterValue })
})
// ===============================================
var initPhotoSwipeFromDOM = function (gallerySelector) {
  // parse slide data (url, title, size ...) from DOM elements
  // (children of gallerySelector)
  var parseThumbnailElements = function (el) {
    var thumbElements = el.childNodes,
      numNodes = thumbElements.length,
      items = [],
      figureEl,
      linkEl,
      size,
      item

    for (var i = 0; i < numNodes; i++) {
      figureEl = thumbElements[i] // <figure> element

      // include only element nodes
      if (figureEl.nodeType !== 1) {
        continue
      }

      linkEl = figureEl.children[0] // <a> element

      console.log(linkEl.offsetHeight)
      // create slide object
      item = {
        src: linkEl.getAttribute('href'),
        w: linkEl.offsetWidth * 2,
        h: linkEl.offsetHeight * 2,
      }

      if (figureEl.children.length > 1) {
        // <figcaption> content
        item.title = figureEl.children[1].innerHTML
      }

      if (linkEl.children.length > 0) {
        // <img> thumbnail element, retrieving thumbnail url
        item.msrc = linkEl.children[0].getAttribute('src')
      }

      item.el = figureEl // save link to element for getThumbBoundsFn
      items.push(item)
    }

    return items
  }

  // find nearest parent element
  var closest = function closest(el, fn) {
    return el && (fn(el) ? el : closest(el.parentNode, fn))
  }

  // triggers when user clicks on thumbnail
  var onThumbnailsClick = function (e) {
    e = e || window.event
    e.preventDefault ? e.preventDefault() : (e.returnValue = false)

    var eTarget = e.target || e.srcElement

    // find root element of slide
    var clickedListItem = closest(eTarget, function (el) {
      return el.tagName && el.tagName.toUpperCase() === 'FIGURE'
    })

    if (!clickedListItem) {
      return
    }

    // find index of clicked item by looping through all child nodes
    // alternatively, you may define index via data- attribute
    var clickedGallery = clickedListItem.parentNode,
      childNodes = clickedListItem.parentNode.childNodes,
      numChildNodes = childNodes.length,
      nodeIndex = 0,
      index

    for (var i = 0; i < numChildNodes; i++) {
      if (childNodes[i].nodeType !== 1) {
        continue
      }

      if (childNodes[i] === clickedListItem) {
        index = nodeIndex
        break
      }
      nodeIndex++
    }

    if (index >= 0) {
      // open PhotoSwipe if valid index found
      openPhotoSwipe(index, clickedGallery)
    }
    return false
  }

  // parse picture index and gallery index from URL (#&pid=1&gid=2)
  var photoswipeParseHash = function () {
    var hash = window.location.hash.substring(1),
      params = {}

    if (hash.length < 5) {
      return params
    }

    var vars = hash.split('&')
    for (var i = 0; i < vars.length; i++) {
      if (!vars[i]) {
        continue
      }
      var pair = vars[i].split('=')
      if (pair.length < 2) {
        continue
      }
      params[pair[0]] = pair[1]
    }

    if (params.gid) {
      params.gid = parseInt(params.gid, 10)
    }

    return params
  }

  var openPhotoSwipe = function (index, galleryElement, disableAnimation, fromURL) {
    var pswpElement = document.querySelectorAll('.pswp')[0],
      gallery,
      options,
      items

    items = parseThumbnailElements(galleryElement)

    // define options (if needed)
    options = {
      // define gallery index (for URL)
      galleryUID: galleryElement.getAttribute('data-pswp-uid'),

      getThumbBoundsFn: function (index) {
        // See Options -> getThumbBoundsFn section of documentation for more info
        var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
          pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
          rect = thumbnail.getBoundingClientRect()

        return { x: rect.left, y: rect.top + pageYScroll, w: rect.width }
      },
    }

    // PhotoSwipe opened from URL
    if (fromURL) {
      if (options.galleryPIDs) {
        // parse real index when custom PIDs are used
        // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
        for (var j = 0; j < items.length; j++) {
          if (items[j].pid == index) {
            options.index = j
            break
          }
        }
      } else {
        // in URL indexes start from 1
        options.index = parseInt(index, 10) - 1
      }
    } else {
      options.index = parseInt(index, 10)
    }

    // exit if index not found
    if (isNaN(options.index)) {
      return
    }

    if (disableAnimation) {
      options.showAnimationDuration = 0
    }

    // Pass data to PhotoSwipe and initialize it
    gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options)
    gallery.init()
  }

  // loop through all gallery elements and bind events
  var galleryElements = document.querySelectorAll(gallerySelector)

  for (var i = 0, l = galleryElements.length; i < l; i++) {
    galleryElements[i].setAttribute('data-pswp-uid', i + 1)
    galleryElements[i].onclick = onThumbnailsClick
  }

  // Parse URL and open gallery if it contains #&pid=3&gid=1
  var hashData = photoswipeParseHash()
  if (hashData.pid && hashData.gid) {
    openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true)
  }
}

// execute above function
initPhotoSwipeFromDOM('.card-slider__slider')

// ===============================================

var $grid = $('.grid').isotope({
  // options
})
