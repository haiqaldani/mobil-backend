var sync1 = $("#sync1");
sync1
    .owlCarousel({
        loop: true,
        nav: true,
        items: 1,
        dots: false,
        slidespeed: 1000,
        removeClass: true,
        responsiveRefreshRate: 200,
        navText: [
            '<svg class="pl-2 w-5 h-8" width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #f7f7f7;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
            '<svg class="pl-2 w-5 h-8" width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #f7f7f7;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
        ]
    })
    .on("changed.owl.carousel");

var sync2 = $("#sync2");
sync2
    .owlCarousel({
        nav: true,
        margin: 15,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                loop: false
            },
            600: {
                items: 2,
                nav: true,
                loop: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: false
            },
            1200: {
                items: 4,
                nav: true,
                loop: false
            }
        },
        removeClass: true,
        // slidespeed: 1000,
        responsiveRefreshRate: 200,
        navText: [
            '<svg class="pl-2 w-5 h-8" width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #f7f7f7;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
            '<svg class="pl-2 w-5 h-8" width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #f7f7f7;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
        ]
    })
    .on("changed.owl.carousel");

var sync3 = $("#sync3");
var sync4 = $("#sync4");
var slidesPerPage = 4; //globaly define number of elements per page
var syncedSecondary = true;

sync3
    .owlCarousel({
        items: 1,
        slideSpeed: 2000,
        // autoWidth: true,
        nav: true,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: [
            '<svg class="ml-1.5"  width="50%" height="50%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #ffff;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
            '<svg class="ml-2" width="50%" height="50%" viewBox="0 0 11 20" version="1.1"><path style="stroke: #ffff ;fill:none;stroke-width: 1px;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
        ]
    })
    .on("changed.owl.carousel", syncPosition);

sync4
    .on("initialized.owl.carousel", function() {
        sync4
            .find(".owl-item")
            .eq(0)
            .addClass("current");
    })
    .owlCarousel({
        items: slidesPerPage,
        dots: false,
        nav: true,
        margin: 5,
        smartSpeed: 200,
        slideSpeed: 500,
        slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
        responsiveRefreshRate: 100,
        navText: [
            '<svg class="ml-1.5"  width="50%" height="50%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #ffff;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
            '<svg class="ml-2" width="50%" height="50%" viewBox="0 0 11 20" version="1.1"><path style="stroke: #ffff ;fill:none;stroke-width: 1px;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
        ]
    })
    .on("changed.owl.carousel", syncPosition2);

function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;

    //if you disable loop you have to comment this block
    var count = el.item.count - 1;
    var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

    if (current < 0) {
        current = count;
    }
    if (current > count) {
        current = 0;
    }

    //end block

    sync4
        .find(".owl-item")
        .removeClass("current")
        .eq(current)
        .addClass("current");
    var onscreen = sync4.find(".owl-item.active").length - 1;
    var start = sync4
        .find(".owl-item.active")
        .first()
        .index();
    var end = sync4
        .find(".owl-item.active")
        .last()
        .index();

    if (current > end) {
        sync4.data("owl.carousel").to(current, 100, true);
    }
    if (current < start) {
        sync4.data("owl.carousel").to(current - onscreen, 100, true);
    }
}

function syncPosition2(el) {
    if (syncedSecondary) {
        var number = el.item.index;
        sync3.data("owl.carousel").to(number, 100, true);
    }
}

sync4.on("click", ".owl-item", function(e) {
    e.preventDefault();
    var number = $(this).index();
    sync3.data("owl.carousel").to(number, 300, true);
});

const btn = document.querySelector("button.mobile-menu-button");
const menu = document.querySelector(".mobile-menu");

// add event listeners
btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});

const expandableElements = document.querySelectorAll("[data-expandable]");
const expandableButtons = document.querySelectorAll("[data-expand-button]");

checkForOverflow();
expandableButtons.forEach(button => {
    button.addEventListener("click", toggleText);
    setExpandButtonText(button);
});

function checkForOverflow() {
    expandableElements.forEach(expandableElement => {
        if (expandableElement.classList.contains("expanded")) return;
        const expandableText = expandableElement.querySelector(
            "[data-expand-text]"
        );
        const overflowing =
            expandableText.scrollHeight > expandableText.clientHeight;
        expandableElement.dataset.overflow = overflowing;
    });
}

function toggleText(e) {
    const expandableElement = e.target.closest("[data-expandable]");
    expandableElement.classList.toggle("expanded");
    setExpandButtonText(e.target);
}

function setExpandButtonText(button) {
    const expandableElement = button.closest("[data-expandable]");
    const expanded = expandableElement.classList.contains("expanded");
    button.innerText = expanded
        ? "Tampilkan Lainnya"
        : "Tampilkan Lebih Sedikit";
}

const modal = document.querySelector(".main-modal");
const closeButton = document.querySelectorAll(".modal-close");

const modalClose = () => {
    modal.classList.remove("fadeIn");
    modal.classList.add("fadeOut");
    setTimeout(() => {
        modal.style.display = "none";
    }, 500);
};

const openModal = () => {
    modal.classList.remove("fadeOut");
    modal.classList.add("fadeIn");
    modal.style.display = "flex";
     var modelId = $(e.relatedTarget).data('model-id');
    $(e.currentTarget).find('input[name="car_model_id"]').val(modelId);
};

for (let i = 0; i < closeButton.length; i++) {
    const elements = closeButton[i];

    elements.onclick = e => modalClose();

    modal.style.display = "none";

    window.onclick = function(event) {
        if (event.target == modal) modalClose();
    };
}

$("#modalButton").click(function () { 
    var id = $("#model_id").val(); 
    $(".main-modal").find('input[name="car_model_id"]').val(id);
}); 