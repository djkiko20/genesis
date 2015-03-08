/**
 * Created by User-Pc on 07.03.2015.
 */
$(document).ready(function() {

    function popup() {
        $("#logindiv").css("display", "block");
    }
    $("#login #cancel").click(function() {
        $(this).parent().parent().hide();
    });
    $("#onclick").click(function() {
        $("#contactdiv, #screen-overlay").css("display", "block");
    });

    $("#contact #cancel").click(function() {
        $(this).parent().parent().hide();
        $("#screen-overlay").hide();
    });
// Contact form popup send-button click event.
    $("#send").click(function(e) {

        var fakultet = $("#fakultet").val();
        var univerzitet = $("#univerzitet").val();
        var predmet = $("#predmet").val();

        if (fakultet == "" || univerzitet == "" || predmet == ""){
            alert("Пополнете ги сите полиња");
            e.preventDefault();}


// Login form popup login-button click event.
    });
});