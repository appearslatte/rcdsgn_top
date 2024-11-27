var mySwiper = new Swiper ('.mv_slider', {
    loop:true,
    speed:1500,
    slidesPerView:1,
    spaceBetween:0,
    direction:'horizontal',
    effect:'fade',
    centeredSlides:true,
    loopAdditionalSlides:1,
    autoplay: {
        delay: 5000, 
        stopOnLast:false,
        disableOnInteraction:true
    },

    breakpoints: {
        1000: {
        slidesPerView: 1,
        },
    },
});


var mySwiper = new Swiper ('.scene_slider', {
    loop:true,
    speed:600,
    slidesPerView:5,
    spaceBetween:0,
    direction:'horizontal',
    effect:'slide',
    centeredSlides:true,
    loopAdditionalSlides:1,
    autoplay: {
        delay: 3000, 
        stopOnLast:false,
        disableOnInteraction:true
    },

    breakpoints: {
        1000: {
        slidesPerView: 2,
        },
    },
});
  
  