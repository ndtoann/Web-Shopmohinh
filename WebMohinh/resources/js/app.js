// require('./bootstrap');

$(document).ready(function () {
    $(".icon-menu").click(function () {
        $(".menu-mobile").addClass("active");
    })
    $(".close-menu").click(function () {
        $(".menu-mobile").removeClass("active");
    });
})

$('.has-child').hover(function(){
    $('.header').toggleClass('is-hover');
})


// slider
$(document).ready(function () {
    $(".slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        responsive: [
            // {
            //   breakpoint: 1025,
            //   settings: {
            //     slidesToShow: 1,
            //   },
            // },
            {
                breakpoint: 740,
                settings: {
                    arrows: false,
                    infinite: false,
                },
            },
        ],
        autoplay: true,
        autoplaySpeed: 3000,
    });
});


//home privacy
$(document).ready(function () {
    $(".slide-home-privacy").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 740,
                settings: {
                    slidesToShow: 2,
                },
            },
        ],
        autoplay: true,
        autoplaySpeed: 5000,
    });
});



//brand
$(document).ready(function () {
    $(".brand-slider").slick({
        slidesToShow: 5,
        slidesToScroll: 2,
        infinite: false,
        arrows: false,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 740,
                settings: {
                    slidesToShow: 2,
                },
            },
        ],
    });
});


var tabLinks = document.querySelectorAll(".tablinks");
var tabContent = document.querySelectorAll(".tabcontent");

tabLinks.forEach(function (el) {
    el.addEventListener("click", openTabs);
});


function openTabs(el) {
    var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
    var electronic = btn.dataset.electronic; // lấy giá trị trong data-electronic

    tabContent.forEach(function (el) {
        el.classList.remove("active");
    }); //lặp qua các tab content để remove class active

    tabLinks.forEach(function (el) {
        el.classList.remove("active");
    }); //lặp qua các tab links để remove class active

    document.querySelector("#" + electronic).classList.add("active");
    // trả về phần tử đầu tiên có id="" được add class active

    btn.classList.add("active");
    // các button mà chúng ta click vào sẽ được add class active
}


//slide chi tiết ảnh sản phẩm
var galleryThumbs = new Swiper(".gallery-thumbs", {
    centeredSlides: true,
    centeredSlidesBounds: true,
    slidesPerView: 3,
    watchOverflow: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    direction: 'vertical'
});

var galleryMain = new Swiper(".gallery-main", {
    watchOverflow: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    preventInteractionOnTransition: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    thumbs: {
        swiper: galleryThumbs
    }
});

galleryMain.on('slideChangeTransitionStart', function () {
    galleryThumbs.slideTo(galleryMain.activeIndex);
});

galleryThumbs.on('transitionStart', function () {
    galleryMain.slideTo(galleryThumbs.activeIndex);
});
//******/


// tăng giảm số lượng
$('input.input-qty').each(function () {
    var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
    if (min == 0) {
        var d = 0
    } else d = min
    $(qty).on('click', function () {
        if ($(this).hasClass('minus')) {
            if (d > min) d += -1
        } else if ($(this).hasClass('plus')) {
            var x = Number($this.val()) + 1
            if (x <= max) d += 1
        }
        $this.attr('value', d).val(d)
    })
})
//****** */

// slide sản phẩm liên quan
$(document).ready(function () {
    $(".slide-product-related").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        prevArrow: `<button type='button' class='slick-prev slick-arrow'><i class="fa-solid fa-chevron-left"></i></button>`,
        nextArrow: `<button type='button' class='slick-next slick-arrow'><i class="fa-solid fa-chevron-right"></i></button>`,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                },
            },
            {
                breakpoint: 740,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                },
            },
            {
                breakpoint: 391,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                },
            },
        ],
    });
});
////** */


// slide bài viết liên quan
$(document).ready(function () {
    $(".list-post").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
        arrows: false,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 740,
                settings: {
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 391,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });
});
////*** */