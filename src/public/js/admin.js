"use strict";
let dialogOpenButtons = document.querySelectorAll(".js_dialog_open");
let dialogCloseButtons = document.querySelectorAll(".js_dialog_close");

// Modal Open
dialogOpenButtons.forEach((button) => {
    const dialog = document.querySelector(button.dataset.dialog);
    button.addEventListener("click", () => {
        dialog.showModal();
    });
});

// Modal Close
dialogCloseButtons.forEach((button) => {
    const dialog = button.closest("dialog");

    button.addEventListener("click", () => {
        dialog.close();
    });
});