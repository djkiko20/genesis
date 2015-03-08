/**
 * Created by User-Pc on 07.03.2015.
 */
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
    $("#login #cancelR").click(function() {
        $(this).parent().parent().hide();
    });
    $("#registriraj").click(function() {
        $("#regDiv, #screen-overlay").css("display", "block");
    });
    $("#onclick1").click(function() {
        $("#regDiv, #screen-overlay").css("display", "block");
    });
    $("#contactR #cancelR").click(function() {
        $(this).parent().parent().hide();
        $("#screen-overlay").hide();
    });
// Contact form popup send-button click event.
    $("#sendR").click(function(e) {

        var passR = $("#passR").val();
        var emailR = $("#emailR").val();

        var ime = $("#ime").val();
        var prezime = $("#prezime").val();


        if (passR == "" || emailR == "" || ime=="" || prezime==""){
            alert("Пополнете ги сите полиња");
            e.preventDefault();}


// Login form popup login-button click event.
    });
});