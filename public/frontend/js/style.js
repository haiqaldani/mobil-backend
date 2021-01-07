var sync1 = $("#sync1");

sync1.owlCarousel({
loop: true,
margin: 10,
nav: true,
items: 1,
dots: false,
center: true,
responsiveRefreshRate: 200,
autoplay: true,
autoplayTimeout: 5000,
autoplayHoverPause: true,
navText: ['<svg class="pl-2 w-5 h-8" width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #f7f7f7;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
            '<svg class="pl-2 w-5 h-8" width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #f7f7f7;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
}).on('changed.owl.carousel', syncPosition);
// responsive:{
//     0:{
//         items:1
//     },
//     600:{
//         items:3
//     },
//     1000:{
//         items:5
//     }
// }
// })
