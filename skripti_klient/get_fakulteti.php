<?php
/**
 * Created by PhpStorm.
 * User: Hristian
 * Date: 08.03.2015
 * Time: 02:42
 */
include_once('connection.php');

$sql = "SELECT * FROM tbl_fakulteti WHERE univerzitetID = '".$_POST['idU']."'";
$rez = $conn->query($sql);
echo '<label>Факултет: <span>*</span></label>';
echo '<select name="fakultet" id="fakultet" class="target2"> ';
foreach($rez as $current){
    echo "<option value='".$current['fakultetID']."'>".$current['nazivF']."</option>";
}
echo '</select>';