<?php
include "dbConfig.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Load More Results in PHP, Ajax, Mysql | Twitter/Facebook Like Load More Result</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
$(function() {

$('.more_button').live("click",function()
{
var getId = $(this).attr("id");
if(getId)
{
$("#load_more_"+getId).html('<img src="load_img.gif" style="padding:10px 0 0 100px;"/>');
$.ajax({
type: "POST",
url: "more_content.php",
data: "getLastContentId="+ getId,
cache: false,
success: function(html){
$("ul#load_more_ctnt").append(html);
$("#load_more_"+getId).remove();
}
});
}
else
{
$(".more_tab").html('The End');
}
return false;
});
});

</script>
<style>
body {
	font:normal 14px tahoma, Arial, Helvetica, sans-serif;
	margin:0;
	padding:0;
}
a{text-decoration:none;}
.main_div{margin:30px 0 0 50px; width:580px }	
ul.load_content{ margin:0; padding:0; list-style-type:none;}
ul.load_content li {
	border-bottom: 1px solid #ddd;
    color: #000000;
    display: block;
    font: 14px Arial,Helvetica,sans-serif;
    padding: 10px 0 0 15px;
    text-decoration: none;
}
.more_button {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    border-radius: 5px;
    color: #000;
    font-weight: bold;
    height: auto;
    line-height: 32px;
    text-align: center;
    text-transform: none;
}
.more_div{padding:10px;}
.all_loaded{font: bold 15px arial; color:#0D92E1; padding:20px 0 0 100px;}
</style>
</head>

<body>
<div class='main_div'>
<ul class="load_content" id="load_more_ctnt">
<?php
$sql=mysql_query("select komentarID, tekst from tbl_komentari_predmeti LIMIT 2");
while($row=mysql_fetch_array($sql))
{
$id=$row['komentarID'];

$message=$row['tekst'];
?>
<li>
<a href="<?=$row['url']?>.htm"><?php echo $message; ?></a>
</li>
<?php } ?>
</ul>
<div class="more_div"><a href="#"><div id="load_more_<?php echo $id; ?>" class="more_tab">
<div class="more_button" id="<?php echo $id; ?>">Load More Content</div></a></div>
</div>
</div>
</body>
</html>
