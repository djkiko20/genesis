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
    $("#login #cancelP").click(function() {
        $(this).parent().parent().hide();
    });
    $("#najdiProf").click(function() {
        $("#profDiv, #screen-overlay").css("display", "block");
    });

    $("#contactP #cancelP").click(function() {
        $(this).parent().parent().hide();
        $("#screen-overlay").hide();
    });
// Contact form popup send-button click event.
    $("#sendP").click(function(e) {

        var fakultet = $("#fakultetP").val();
        var univerzitet = $("#univerzitetP").val();
        var profesor = $("#prof").val();

        if (fakultet == "" || univerzitet == "" || profesor == ""){
            alert("Пополнете ги сите полиња");
            e.preventDefault();}


// Login form popup login-button click event.
    });
});