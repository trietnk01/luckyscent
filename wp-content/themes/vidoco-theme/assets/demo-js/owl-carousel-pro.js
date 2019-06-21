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
            360:{
                items:3
            },
            576:{
                items:6
            }
        }
    });
    jQuery(".owl-carousel-featured-videos").owlCarousel({
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
    jQuery(".owl-carousel-product-detail-img").owlCarousel({
        autoplay:true,
        loop:true,
        margin:0,
        nav:false,
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
    jQuery(".owl-carousel-new-product").owlCarousel({
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
    jQuery(".owl-carousel-product-thumbnail").owlCarousel({
        autoplay:false,
        loop:true,
        margin:5,
        nav:true,
        navText: ["<i class=\"fas fa-chevron-left\"></i>","<i class=\"fas fa-chevron-right\"></i>"],
        dots:false,
        mouseDrag: true,
        touchDrag: true,
        lazyLoad: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:4
            }
        }
    });
    jQuery(".owl-carousel-brand").owlCarousel({
        autoplay:false,
        loop:true,
        margin:100,
        nav:true,
        navText: ["<i class=\"fas fa-chevron-left\"></i>","<i class=\"fas fa-chevron-right\"></i>"],
        dots:false,
        mouseDrag: true,
        touchDrag: true,
        lazyLoad: true,
        responsiveClass:true,
        responsive:{
            240:{
                items:1,
                margin:0,
                autoplay:true,
                nav:false,
            },
            360:{
                items:2,
                margin:20,
                autoplay:true,
                nav:false,
            },
            740:{
                margin:20,
            },
            768:{
                items:5,
                margin:20,
            },
            1140:{
                items:5,
                margin:10,
            },
        }
    });
    jQuery(".owl-carousel-sale-off-on-day").owlCarousel({
        autoplay:false,
        loop:true,
        margin:60,
        nav:false,
        navText: ["<i class=\"fas fa-chevron-left\"></i>","<i class=\"fas fa-chevron-right\"></i>"],
        dots:false,
        mouseDrag: true,
        touchDrag: true,
        lazyLoad: true,
        responsiveClass:true,
        responsive:{
            240:{
                margin:0,
                items:1,
            },
            414:{
                margin:30,
                items:2,
            },
            740:{
                margin:40,
                items:2,
            },
            768:{
                margin:35,
            },
            1024:{
                items:4
            }
        }
    });
    jQuery(".owl-carousel-product-related").owlCarousel({
        autoplay:true,
        loop:true,
        margin:60,
        nav:false,
        navText: ["<i class=\"fas fa-chevron-left\"></i>","<i class=\"fas fa-chevron-right\"></i>"],
        dots:false,
        mouseDrag: true,
        touchDrag: true,
        lazyLoad: true,
        responsiveClass:true,
        responsive:{
            240:{
                margin:0,
                items:1,
            },
            414:{
                margin:30,
                items:2,
            },
            740:{
                margin:40,
                items:2,
            },
            768:{
                margin:35,
            },
            1024:{
                items:3
            }
        }
    });
});