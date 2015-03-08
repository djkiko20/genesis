<?php
include_once('skripti_klient/connection.php');
session_start();

if($_SESSION['korisnik']!="user") {

    echo "<div class='sime' style='  height: 30px; margin-top: 2px;padding-bottom: 17px; margin-left: 850px;'>
       <div class='loginRegister'>
           <div class='sc_button medium blue' id='logiraj'>Login</div>
           <div class='sc_button medium blue' id='registriraj'>Register</div>
       </div>

       </div>";

}
else {


    echo "<div class='sime' style='  height: 30px; margin-top: 2px;padding-bottom: 17px; margin-left: 850px;'>
       <div class='loginRegister'>
           <div class='sc_button medium blue' style='margin-left: 150px;' id='logout'><a style='color: white;text-decoration: none;' href='logout.php'>Log out </a></div>

       </div>

       </div>";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="author" content="DesignForLife" />
    <meta name="description" content="A Multi Purpose Responsive Template - Created by DesignForLife" />
    <title>Genesis</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/blue.css" />

    <!--[if lte IE 8]>
        <link rel="stylesheet" type="text/css" href="assets/css/ie8.css" />


                <!--ovde se skriptite za popUP-->

    <script src="administrator/js/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/popUp.css" />
    <script src="assets/js/popUp.js"></script>



    <link rel="stylesheet" href="assets/css/login.css" />
    <script src="assets/js/loginUp.js"></script>

    <link rel="stylesheet" href="assets/css/register.css" />
    <script src="assets/js/registerUp.js"></script>


    <link rel="stylesheet" href="assets/css/prof.css" />
    <script src="assets/js/profUp.js"></script>

    <script type="text/javascript" src="assets/js/jquery.tokeninput.js"></script>

    <link rel="stylesheet" href="assets/css/token-input.css" type="text/css" />
    <script type="text/javascript">
        $(document).ready(function() {
            $("input[type=button]").click(function () {
                //alert("Would submit: " + $(this).siblings("#demo-input").val());
            });
        });
    </script>
    <![endif]-->



</head>
<body>
<!-- container full -->

<div class="container_full">
<!-- header -->

<div id="header_wrapper">

    <!-- menu -->
    <div id="header" style=" height: 65px; ">
        <!-- logo -->
        <div id="logo"><h2>Genesis</h2></div>
        <!-- logo end -->
        <!-- main menu -->
        <ul id="mainmenu" style=" height: 65px;  margin-right: -150px;     width: 700px;">

            <li style="padding-left: 20px; margin-left: 80px;">
                <a href="index.php">Почетна</a>

            </li>
            <li style=" margin-left: 80px;">
                <a href="pravila.html">Правила</a>

            </li>
            <li style=" margin-left: 80px;">
                <a href="za_nas.html">За нас</a>

            </li>



        </ul>
        <!-- main menu end -->
        <!-- search bar -->

        <!-- search bar end -->
    </div>
    <!-- menu end -->
    <!-- slider -->

    <!-- slider end -->
</div>
<!-- header end -->
<div class="clearfix"></div>
<!-- header text -->
<!-- header text end -->
<!-- container 12 -->
<div class="container_12" >
<!-- features boxes -->
<div class="grid_12">
<div class="divider_page"></div>

<div class="grid_3 lambda">
<!-- a feature box -->
<div class="feature_box">
    <div class="feature_icon"><p  class="id_icons32 icon32_2" style="margin-bottom: -25px;"></p></div>
    <div class="feature_content" id="onclick">
        <div class="feature_heading">
            <div class="medium" >  Побарај  </div>
            <div class="large"  >  Предмет  </div>
        </div>
        <p class="feature_desc">Во овој дел можете да најдете,прочитате и споделите најразлични мислења за зададен предмет.</p>
    </div>

</div>
<!-- ovde e formata so pop up PRONAJDI PREDMET-->
<div id="contactdiv">
    <form class="form" action="za_predmet.php" id="contact">

        <h3>Пронајди предмет</h3>
        <label>Универзитет <span>*</span></label>
        <select name="univerzitet" id="univerzitet" style="width: 100%;" class="target1">
            <option value="0">Избери универзитет...</option>
            <?php
            $sql = "SELECT * FROM tbl_univerziteti";
            $rez = $conn->query($sql);

            foreach($rez as $current){
                echo "<option value='".$current['univerzitetID']."'>".$current['nazivU']."</option>";
            }
            ?>
        </select>
        <script>
            $( document ).ready(function() {
                $( ".target1" ).change(function() {
                    var idU = $(this).val();
                    $.ajax({
                        url: "skripti_klient/get_fakulteti.php",
                        type: "POST",
                        dataType:'html',
                        data: {idU: idU},
                        success: function(data){
                            $("#fakulteti").html(data);
                            f();
                        }
                    });
                });
            });
        </script>
        <div id="fakulteti"></div>
        <script>
            function f () {
                $(".target2").change(function() {
                    var idF = $(this).val();

                    $(".predmeti").attr("style", "visibility: visible");
                    autoPredmeti();
                });
            }


        </script>
        <!--                        <input type="text" id="demo-input" class="predmeti" style="visibility: hidden;"/>-->
        <div class="pred">
            <label class="naslovPredmet" style="visibility: hidden">Предмет <span>*</span></label>
            <input type="text" id="demo-input" name="profesori" style="visibility: hidden"/>
        </div>
        <script type="text/javascript">
            function autoPredmeti () {
                var idF = $('#fakultet').val();
                $(".demo-input").attr("style", "visibility: visible");
                $(".naslovPredmet").attr("style", "visibility: visible");
                $("#demo-input").tokenInput("skripti_klient/lista_auto_complete_predmeti.php?idF="+idF, {tokenLimit: 1});
            }
        </script>


        <input type="submit" id="send" value="Пребарај"/>
        <input type="button" id="cancel" value="Откажи"/>
        <br/>
    </form>
</div>







<!--pronajdiProf-->

<div id="profDiv">
    <form class="form" action="za_profesor.php" id="contactP">

        <h3>Пронајди професор</h3>
        <label>Универзитет <span>*</span></label>
        <select name="univerzitet" id="univerzitetP" class="target3" style="width: 100%;">
            <option value="0">Избери универзитет...</option>
            <?php
            $sql = "SELECT * FROM tbl_univerziteti";
            $rez = $conn->query($sql);

            foreach($rez as $current){
                echo "<option value='".$current['univerzitetID']."'>".$current['nazivU']."</option>";
            }
            ?>
        </select>
        <script>
            $( document ).ready(function() {
                $( ".target3" ).change(function() {
                    var idU = $(this).val();

                    $.ajax({
                        url: "skripti_klient/get_fakulteti.php",
                        type: "POST",
                        dataType:'html',
                        data: {idU: idU},
                        success: function(data){
                            $("#fakulteti1").html(data);
                            f1();
                        }
                    });
                });
            });
        </script>
        <div id="fakulteti1"></div>
        <script>
            function f1 () {
                $(".target2").change(function() {
                    var idF = $(this).val();

                    $(".predmeti1").attr("style", "visibility: visible");
                    autoPredmeti1();
                });
            }
        </script>

        <label class="naslovPredmet1" style="visibility: hidden">Професор <span>*</span></label>
        <input type="text" class="demo-input1" id="demo-input1" name="predmet1" style="visibility: hidden"/>
        <script type="text/javascript">
            function autoPredmeti1 () {
                var idF = $('#fakultet').val();

                $(".demo-input1").attr("style", "visibility: visible");
                $(".naslovPredmet1").attr("style", "visibility: visible");

                $("#demo-input1").tokenInput("skripti_klient/lista_auto_complete_profesori.php?idF="+idF, {tokenLimit: 1});
            }
        </script>


        <input type="submit" id="sendP" value="Пребарај"/>
        <input type="button" id="cancelP" value="Откажи"/>
        <br/>
    </form>
</div>






<!-- Login Form -->

<div id="loginDiv">
    <form class="form" action="Login.php" id="contactL" method="post">

        <h3>Логирај се</h3>
        <label>Email <span>*</span></label>
        <input type="email" name="email" id="email">
        <label>Лозинка <span>*</span></label>
        <input type="password" name="pass" id="pass">


        <input type="submit" id="sendL" value="Логирај се"/>
        <input type="button" id="cancelL" value="Откажи"/>
        <br/>
    </form>
</div>

<!-- Login Form END-->



<!-- Register Form -->

<div id="regDiv">
    <form class="form" action="register.php" id="contactR" method="post">

        <h3>Регистрирај се</h3>
        <label>Име <span>*</span></label>
        <input type="text" name="ime" id="ime">

        <label>Презиме <span>*</span></label>
        <input type="text" name="prezime" id="prezime">

        <label>Email <span>*</span></label>
        <input type="email" name="email" id="emailR">

        <label>Лозинка <span>*</span></label>
        <input type="password" name="pass" id="passR">


        <input type="submit" id="sendR" value="Регистрирај се"/>
        <input type="button" id="cancelR" value="Откажи"/>
        <br/>
    </form>
</div>

<!-- Register Form END-->

















<div id="screen-overlay"></div>

<!--ovde kraj -->


<!-- a feature box end -->
</div>
<div class="grid_3 lambda">
    <!-- a feature box -->
    <div class="feature_box">
        <div class="feature_icon"><div  class="users_icons32 icon32_5" style="margin-bottom: -25px; "></div></div>
        <div class="feature_content" id="najdiProf">
            <div class="feature_heading">
                <div class="medium" > Побарај </div>
                <div class="large">Професор</div>
            </div>
            <p class="feature_desc">Во овој дел можете да најдете,прочитате и споделите најразлични мислења за зададен професор.</p>
        </div>

    </div>
    <!-- a feature box end -->
</div>
<div class="grid_3 omega">
    <!-- a feature box -->

    <!-- a feature box end -->
</div>
</div>

</div>
<!-- recent works end -->
<div class="clearfix"></div>


<!-- container 12 end -->
<!-- footer -->
<div id="footer">

    <!-- footer container -->

    <!-- footer container end -->
    <div class="clearfix"></div>
    <!-- footer bottom -->
    <div class="footer_bottom">
        <div class="container_12">
            <div class="grid_6">
                <div class="footer_text">Copyright  2013 &copy;, by <a href="http://www.mafiashare.net" target="_blank">DesignForLife</a></div>
            </div>
            <div class="grid_6">
                <div class="float_right socialicons">
                    <a href="http://facebook.com/" target="_blank" class="social_colored facebook" title="Facebook"></a>

                    <a href="http://twitter.com/" target="_blank" class="social_colored twitter" title="Twitter"></a>

                    <a href="mailto:yourmail@mail.com" class="social_colored mail" title="Mail"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom end -->
</div>
<!-- footer end -->
</div>

</body>
</html>