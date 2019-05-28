jQuery(document).ready(function(){
	jQuery(".owl-carousel-banner").owlCarousel({
        autoplay:false,
        loop:true,
        margin:0,
        nav:true,
        navText: ["<i class=\"fas fa-chevron-left\"></i>","<i class=\"fas fa-chevron-right\"></i>"],
        dots:false,
        mouseDrag: true,
        touchDrag: true,
        lazyLoad: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            }
        }
    });
    jQuery(".owl-carousel-featured-product").owlCarousel({
        autoplay:false,
        loop:true,
        margin:30,
        nav:true,
        navText: ["<i class=\"fas fa-chevron-left\"></i>","<i class=\"fas fa-chevron-right\"></i>"],
        dots:false,
        mouseDrag: true,
        touchDrag: true,
        lazyLoad: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:3
            }
        }
    });
    jQuery(".owl-carousel-featured-product-category").owlCarousel({
        autoplay:false,
        loop:true,
        margin:30,
        nav:true,
        navText: ["<i class=\"fas fa-chevron-left\"></i>","<i class=\"fas fa-chevron-right\"></i>"],
        dots:false,
        mouseDrag: true,
        touchDrag: true,
        lazyLoad: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:6
            }
        }
    });
});