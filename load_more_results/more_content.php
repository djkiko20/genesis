<?php header('Content-Type: text/html; charset=utf-8');
include "dbConfig.php";

if(isSet($_POST['getLastContentId']))
{
$getLastContentId=$_POST['getLastContentId'];
$result=mysql_query("select * from tbl_komentari_predmeti where komentarID >".$getLastContentId." order by faktor desc limit 5");
$count=mysql_num_rows($result);
if($count>0){
while($row=mysql_fetch_array($result)) {
    $id = $row['komentarID'];
    echo "<form>";
    echo "<div class='a_comment' style='border-top: 2px solid #ffffff '>";
    echo "<p class='comment_text'>" . $row['tekst'] . "</p>";
    echo "<input type='hidden' id='komentarID' value='" . $row['komentarID'] . "' />";
    echo "<div class='meta-info float_right'>";
    echo "<div class='date-info'>" . $row['datum'] . "</div>";

    if($_SESSION['korisnik']=="user")
    {
        echo "<div class='reply-button'><a href='javascript:void(0)' class='like' title='" . $row['komentarID'] . "'>Like(" . $row['lajk'] . ")</a></div>";
        echo "<div class='reply-button'><a href='javascript:void(0)' class='dislike' title='" . $row['komentarID'] . "'>DisLike(" . $row['dislajk'] . ")</a></div>";
        echo "<div class='reply-button'><a href='javascript:void(0)' class='report' title='" . $row['komentarID'] . "'>Report</a></div>";
    }

    echo "</div>";
    echo "<div class='clearfix'></div>";
    echo "</div>";
    echo "</form>";
}
?>


    <div class="more_div"><a href="#"><div id="load_more_<?php echo $id; ?>" class="more_tab">
                <div class="sc_button medium blue more_button" id="<?php echo $id; ?>" style="margin-left: 400px;margin-top: 10px;margin-bottom: 10px;">Прикажи повеќе</div></a></div>


<?php
} else{
echo "<div class='all_loaded' style='text-align: center;'><h3>Нема повеќе коментари</h3></div>";
}
}
?>
