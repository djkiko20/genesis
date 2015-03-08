/**
 * Created by User-Pc on 07.03.2015.
 */
/**
 * Created by User-Pc on 07.03.2015.
 */
$(document).ready(function() {

    function popup() {
        $("#logindiv").css("display", "block");
    }
    $("#login #cancelL").click(function() {
        $(this).parent().parent().hide();
    });
    $("#logiraj").click(function() {
        $("#loginDiv, #screen-overlay").css("display", "block");
    });
    $("#onclick1").click(function() {
        $("#loginDiv, #screen-overlay").css("display", "block");
    });
    $("#contactL #cancelL").click(function() {
        $(this).parent().parent().hide();
        $("#screen-overlay").hide();
    });
// Contact form popup send-button click event.
    $("#sendL").click(function(e) {

        var pass = $("#pass").val();
        var email = $("#email").val();


        if (pass == "" || email == "" ){
            alert("Пополнете ги сите полиња");
            e.preventDefault();}


// Login form popup login-button click event.
    });
});