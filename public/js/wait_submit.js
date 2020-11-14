/// 送出瘋狂發送的問題，不過會產生的問題是，萬一資料不正確，使用者就算更改了，也沒辦法送出，所以必須要確定資料正確後，才能disable按鈕
$(document).ready(function () {
    $("#formABC").submit(function () {
        $("#btnSubmit").attr("disabled", true);
        return true;
    });
});