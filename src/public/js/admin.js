const showButton = document.getElementById("showDialog");
const favDialog = document.getElementById("favDialog");
const outputBox = document.querySelector("output");
const selectEl = favDialog.querySelector("select");
const confirmBtn = favDialog.querySelector("#confirmBtn");

// "Show the dialog" ボタンで <dialog> をモーダルに開く
showButton.addEventListener("click", () => {
    favDialog.showModal();
});

// "Favorite animal" 入力で、送信ボタンの値を設定する
selectEl.addEventListener("change", (e) => {
    confirmBtn.value = selectEl.value;
});

// "Cancel" ボタンで [formmethod="dialog"] による送信を行わずにダイアログを閉じ、close イベントを発行する
favDialog.addEventListener("close", (e) => {
    outputBox.value =
        favDialog.returnValue === "default"
            ? "No return value."
            : `ReturnValue: ${favDialog.returnValue}.`; // 空文字列ではなく、既定値かどうかを調べる必要がある
});

// ［確認］ボタンが既定でフォームを送信しないようにし、`close()` メソッドでダイアログを閉じ、"close" イベントを発生させる
confirmBtn.addEventListener("click", (event) => {
    event.preventDefault(); // この偽フォームを送信しない
    favDialog.close(selectEl.value); // ここで選択ボックスの値を送る必要がある
});