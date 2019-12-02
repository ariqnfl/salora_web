$(document).ready(function () {
    $(".regist-form").hide();
    $(".regist-mitra").hide();

    $("#btn-dont-have").click(function () {
        $(".login-form").fadeOut();
        $(".regist-form").fadeIn("slow");
    });
    $("#btn-mitra").click(function () {
        $(".login-form").fadeOut();
        $(".regist-form").fadeOut();
        $(".regist-mitra").fadeIn("slow");
    });
    $("#btn-close-mitra").click(function () {
        $(".login-form").fadeOut();
        $(".regist-form").fadeIn("slow");
    });
    $("#btn-have").click(function () {
        $(".regist-form").fadeOut();
        $(".regist-mitra").fadeOut();
        $(".login-form").fadeIn("slow");
    });
});
