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
<?php
include_once("skripti_klient/connection.php");
$univerzitet=$_GET['univerzitet'];
$fakultet=$_GET['fakultet'];
$predmet=$_GET['predmet'];



?>
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
    <div class="header_text">
        <div class="container_12">
            <div class="grid_12">
                <?php
                    $sql="select * from tbl_predmeti where predmetID=".$predmet;
                $rez=$conn->query($sql);
                foreach($rez as $r)
                {
                    $opisP=$r['opisP'];
                    $pateka=$r['pateka'];
                    $nazivP=$r['nazivP'];
                }

                 ?>
                <h1>Назив на предмет: <?php echo $nazivP ?></h1>
            </div>
        </div>
    </div>
	<!-- header text end -->
	<!-- container 12 -->
	<div class="container_12">
		<!-- mission and vision -->

		<div class="grid_6" style="width:940px;">
			<div class="divider_page"><h2>Опис</h2></div>
			<p><?php echo $opisP ?></p>

		</div>
		<!-- mission and vision end -->
	</div>
	<!-- container 12 end -->
	<!-- container 12 -->
	<div class="container_12">
		<!-- tabs -->
		<div class="grid_6">

			<div class="divider_page"><h2>Професори</h2></div>
			<!-- accordion -->
			<div class="accordion">
                <?php
                $sql="select prr.profesorID as profID,prof.ime as ime,prof.prezime as prezime from tbl_profesori_predmeti prr
                      join tbl_profesori prof on prof.profesorID=prr.profesorID
                      where predmetID=".$predmet;
                $rez=$conn->query($sql);
                foreach($rez as $r)
                {
                   echo "<h5><a href='za_profesor.php?univerzitet=".$univerzitet."&fakultet=".$fakultet."&predmet=".$r['profID']."'>".$r['ime']." ".$r['prezime']."</a></h5>";
                }


                ?>




			</div>
			<!-- accordion end -->
		</div>
		<!-- tabs end -->
		<!-- progress bar -->
		<div class="grid_6">
			<div class="divider_page"><h2>Детални информации</h2>

            </div>

            <p>
            <a href="<?php echo $pateka ?>" class="sc_button medium blue" target="_blank">детали</a>
            </p>



		</div>
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
            <form method="post" action="skripti_klient/vnesi_komentar.php">
                <textarea name="komentar" id="komentar" placeholder="Внесете коментар" style="width: 953px;height: 70px;"></textarea>
                <input type="hidden" name="predmetID" id="predmetID" value="<?php echo $predmet ?>">
                <input type="hidden" name="univerzitet" id="univerzitet" value="<?php echo $univerzitet ?>">
                <input type="hidden" name="fakultet" id="fakultet" value="<?php echo $fakultet ?>">

            <!-- comment text end -->
            <!-- comment info -->
            <div class="meta-info float_right">

                <input type="button"  id="vnesi_komentar" class="sc_button medium blue" value="Внеси коментар" style="height: 35px; margin-right: 5px;" />
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
                            url: "skripti_klient/vnesi_komentar.php",
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

        <script>
            function reportFunction(komentarID) {
                var pricina = prompt("Зошто го пријавувате овој коментар?", "");
                if (pricina != null) {
                    //alert(komentarID)
                    vnesiReport(pricina, komentarID);
                }
            }

            function vnesiReport(pricina, komentarID) {
                $.ajax({ //DO OVDE SUMMMMMMMMMM
                    url: "skripti_klient/add_report.php?tip=1",
                    type: "POST",
                    dataType:'html',
                    data: {pricina: pricina,
                        komentarID: komentarID},
                    success: function(data){
                        alert(data);
                    }
                });

            }
        </script>


<div id="load_more_ctnt">
        <?php
        $sql="select * from tbl_komentari_predmeti where predmetID=".$predmet." order by faktor desc LIMIT 5";
        $rez=$conn->query($sql);
        foreach ($rez as $r) {
            $id=$r['komentarID'];
            echo "<form>";
            echo "<div class='a_comment' style='border-top: 2px solid #ffffff '>";
            echo  "<p class='comment_text'>".$r['tekst']."</p>";
            echo "<input type='hidden' id='komentarID' value='".$r['komentarID']."' />";
            echo "<div class='meta-info float_right'>";
            echo "<div class='date-info'>".$r['datum']."</div>";
            echo "<div class='reply-button'><a href='javascript:void(0)' class='like' title='".$r['komentarID']."'>Like(".$r['lajk'].")</a></div>";
            echo "<div class='reply-button'><a href='javascript:void(0)' class='dislike' title='".$r['komentarID']."'>DisLike(".$r['dislajk'].")</a></div>";
            echo "<div class='reply-button'><a href='javascript:void(0)' class='report' title='".$r['komentarID']."' onclick='reportFunction(".$r['komentarID'].")'>Report</a></div>";
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
                            url: "load_more_results/more_content.php",
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
                            url: "skripti_klient/lajk_dislajk.php?tip=1",
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
                        url: "skripti_klient/lajk_dislajk.php?tip=2",
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
        <!--
        <div class="a_comment" style="border-top: 2px solid #ffffff ">
            <!-- avatar -->

            <!-- avatar end -->
            <!-- comment text -->
        <!--   <p class="comment_text">Aliquam  magnitae est accumsan id dignissim nulla condimentum.</p>
           <!-- comment text end -->
            <!-- comment info -->
        <!--  <div class="meta-info float_right">

              <div class="date-info">January 2st, 2013 at 1:38 pm</div>

              <div class="reply-button"><a href="#reply">Like</a></div>
              <div class="reply-button"><a href="#reply">DisLike</a></div>

              <div class="reply-button"><a href="#reply">Reply</a></div>
          </div>
          <div class="clearfix"></div>
          <!-- comment info end -->
        <!-- </div> -->









         </div>








         <!-- our clients end -->
	</div>
	<!-- container 12 end -->
	<!-- footer -->

	<!-- footer end -->
</div>
<!-- container full end -->


</body>
</html>