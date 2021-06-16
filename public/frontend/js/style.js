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
