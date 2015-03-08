<?php
/**
 * Created by PhpStorm.
 * User: Hristian
 * Date: 08.03.2015
 * Time: 15:55
 */

if($_GET){
    include_once('connection.php');

    $id = $_GET['id'];

    $sql = "DELETE from tbl_prijavi where komentarID = '".$id."'";

    if($conn->exec($sql) == 1){
        echo "<p style='color: green;'>Успешно е избришан коментарот! </p>";
        header( "refresh:2;url=../prijavi.php" );
    }else{
        echo "Неуспешно е избришан коментарот! ";
        header( "refresh:2;url=../prijavi.php" );
    }
}