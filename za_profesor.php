<?php

include_once('skripti_klient/connection.php');
$univId=$_GET['univerzitet'];
$fakultetId=$_GET['fakultet'];
$profId=$_GET['predmet'];



$sql="Select tbl_predmeti.fakultetID as fak, tbl_predmeti.nazivP as naziv, tbl_profesori_predmeti.predmetID as predmet,tbl_profesori.ime as ime, tbl_profesori.prezime as prezime,tbl_profesori.biografija as bio ,tbl_profesori.slika as slika ,tbl_profesori.email as email from tbl_profesori JOIN tbl_profesori_predmeti ON tbl_profesori.profesorID=tbl_profesori_predmeti.profesorID
 JOIN tbl_predmeti ON tbl_profesori_predmeti.predmetID=tbl_predmeti.predmetID
 WHERE tbl_profesori.profesorID=$profId";
$row=$conn->query($sql);

$predmet=array();
$golema=array();
foreach($row as $pr)
{
   $profIme= $pr['ime'];
    $profPrezime= $pr['prezime'];
    $profBio=$pr['bio'];
    $profSlika=$pr['slika'];
    $profMail=$pr['email'];
    array_push($predmet,$pr['predmet']);
    array_push($predmet,$pr['naziv']);
    array_push($predmet,$pr['fak']);
    array_push($golema,$predmet);
    $predmet=array();


}



?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<meta name="author" content="DesignForLife" />
<meta name="description" content="A Multi Purpose Responsive Template - Created by DesignForLife" />
<title>DreamLife Responsive Multi-Purpose Template</title>

<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/blue.css" />
    <!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="assets/css/ie8.css" />
<![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <script src="administrator/js/jquery.min.js"></script>
</head>
<body>
<!-- container full -->
<div class="container_full">
	<!-- header -->
    <div id="header_wrapper">
        <div class="sime" style="  height: 30px; margin-top: 2px;padding-bottom: 17px; margin-left: 823px;">
            <div class="loginRegister">
                <div class="sc_button medium blue" id="logiraj">Login</div>
                <div class="sc_button medium blue" id="registriraj">Register</div>
            </div>

        </div>
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
	<div class="container_12">
		<!-- mission and vision -->
		<div class="grid_6">
			<!-- page slider -->
			<div class="sliderinPage theme-dark" id="slika" style="width: 300px; height: 250px;margin-left: 75px;margin-top: 10px;">
            <img src="<?php echo $profSlika ?>" style="width: 300px; height: 250px;" >
    		</div>


			<!-- page slider end -->
		</div>
		<div class="grid_6">
			<div class="divider_page"><h2><?php echo $profIme." ".$profPrezime ?></h2></div>
			<p><?php echo $profBio ?> </p>
		</div>
		<!-- mission and vision end -->
	</div>
	<!-- container 12 end -->
	<!-- container 12 -->
	<div class="container_12">
		<!-- tabs -->
		<div class="grid_6">
			<div class="divider_page"><h2>Контакт</h2></div>
			<!-- accordion -->
			<div class="accordion">
    		    <h3>E-mail</h3>
                <h3><?php echo $profMail ?></h3>



			</div>
			<!-- accordion end -->
		</div>

        <div class="grid_6">
            <div class="divider_page"><h2>Предмети кои ги предава</h2></div>
            <!-- accordion -->
            <div class="accordion">

                <?php
                foreach($golema as $podniza)
                {
                  echo "<h3><a href='za_predmet.php?univerzitet=".$univId."&predmet=".$podniza[0]."&fakultet=".$podniza[2]."'>$podniza[1]</a> </h3>";
                }







                ?>



            </div>
            <!-- accordion end -->
        </div>
		<!-- tabs end -->
		<!-- progress bar -->

		<!-- progress bar end -->
	</div>
	<!-- container 12 end -->
	<!-- container 12 -->

	<!-- container 12 end -->
	<!-- container 12 -->
	<div class="container_12" style="background: url('assets/images/pattern/pattern.png')">
	<!-- our clients -->

        <div class="divider_page">
            <h2>Коментари</h2>
            <div class="heading_button">

            </div>
        </div>



        <div id="responsecontainer">

        </div>
        <form>
            <textarea name="komentar" id="komentar" placeholder="Внесете коментар" style="width: 953px;height: 70px;"></textarea>


            <!-- comment text end -->
            <!-- comment info -->
            <div class="meta-info float_right">

                <input type="button" id="vnesi_komentar"  class="sc_button medium blue" value="Внеси коментар" style="height: 35px; margin-right: 5px;" />
                <input type="hidden" name="predmetID" id="predmetID" value="<?php echo $profId ?>">
                <input type="hidden" name="univerzitet" id="univerzitet" value="<?php echo $univId ?>">
                <input type="hidden" name="fakultet" id="fakultet" value="<?php echo $fakultetId ?>">
            </div>
            <div class="clearfix" ></div>
            <!-- comment info end -->
        </form>






        <!-- AJAX POVIK ZA DODAVANJE VO BAZA -->
        <script type="text/javascript">
            $(document).ready(function() {

                $("#vnesi_komentar").click(function() {
                    var komentar = $("#komentar").val();
                    var predmetID = $("#predmetID").val();
                    var univerzitet = $("#univerzitet").val();
                    var fakultet = $("#fakultet").val();

                    $.ajax({
                        url: "skripti_klient/vnesi_komentar_profesor.php",
                        type: "POST",
                        dataType:'html',
                        data: {komentar: komentar,
                            predmetID: predmetID,
                            univerzitet: univerzitet,
                            fakultet: fakultet},
                        success: function(data){
                            $("#responsecontainer").html(data);
                            $("#komentar").val("");
                        }
                    });


                });
            });
        </script>
        <div id="load_more_ctnt">
        <?php

        //$sql="select * from tbl_komentari_profesori where profesorID=".$profId." order by faktor desc LIMIT 5";
        $sql="select * from tbl_komentari_profesori where profesorID=".$profId." order by faktor desc LIMIT 5";
        $rez=$conn->query($sql);
        foreach ($rez as $r) {
            $id=$r['komentarID'];
            echo "<form>";
            echo "<div class='a_comment' style='border-top: 2px solid #ffffff '>";
            echo  "<p class='comment_text'>".$r['tekst']."</p>";
            echo "<input type='hidden' value='".$r['profesorID']."' />";
            echo "<div class='meta-info float_right'>";
            echo "<div class='date-info'>".$r['datum']."</div>";
            echo "<div class='reply-button'><a href='javascript:void(0)' class='like' title='".$r['komentarID']."'>Like(".$r['lajk'].")</a></div>";
            echo "<div class='reply-button'><a href='javascript:void(0)' class='dislike' title='".$r['komentarID']."'>DisLike(".$r['dislajk'].")</a></div>";
            echo "<div class='reply-button'><a href='javascript:void(0)' class='report' title='".$r['komentarID']."'>Report</a></div>";
            echo "</div>";
            echo "<div class='clearfix'></div>";
            echo "</div>";
            echo "</form>";

        }
        ?>
            <div class="more_div"><a href="#"><div id="load_more_<?php echo $id; ?>" class="more_tab">
                        <div class="sc_button medium blue more_button" id="<?php echo $id; ?>" style="margin-left: 400px;margin-top: 10px;margin-bottom: 10px;">Прикажи повеќе</div></a></div>


        </div>


        <!--        LOAD MORE-->
        <script type="text/javascript">
            $(function() {
                $('.more_button').live("click", function () {

                    var getId = $(this).attr("id");

                    if (getId) {
                        $("#load_more_" + getId).html('<img src="load_more_results/load_img.gif" style="padding:10px 0 0 100px;"/>');
                        $.ajax({
                            type: "POST",
                            url: "load_more_results/more_content_profesor.php",
                            data: "getLastContentId=" + getId,
                            cache: false,
                            success: function (html) {
                                $("#load_more_ctnt").append(html);
                                $("#load_more_" + getId).remove();
                            }
                        });
                    }
                    else {
                        $(".more_tab").html('The End');
                    }
                    return false;
                });
            });

</script>



            <script>
            $( document ).ready(function() {
                $('.like').on("click",function(){
                    //alert("Like")
                    var komentarID = $(this).attr('title');
                    $.ajax({
                        url: "skripti_klient/lajk_dislajk_profesori.php?tip=1",
                        type: "POST",
                        dataType:'html',
                        data: {komentarID: komentarID},
                        success: function(data){
                            alert(data);
                        }
                    });
                });
                $('.dislike').on("click",function(){
                    var komentarID = $(this).attr('title');
                    $.ajax({
                        url: "skripti_klient/lajk_dislajk_profesori.php?tip=2",
                        type: "POST",
                        dataType:'html',
                        data: {komentarID: komentarID},
                        success: function(data){
                            alert(data);
                        }
                    });
                })
            });
        </script>





		<!-- our clients end -->
	</div>

	<!-- container 12 end -->
	<!-- footer -->

	<!-- footer end -->
</div>
<!-- container full end -->

</body>
</html>