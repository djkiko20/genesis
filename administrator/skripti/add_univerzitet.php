<?php header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: Hristian
 * Date: 07.03.2015
 * Time: 14:08
 */
if($_POST){
    include_once('connection.php');

    $nazivU = $_POST['nazivU'];

    $sql = "INSERT INTO tbl_univerziteti (nazivU) VALUES ('$nazivU')";

    if($conn->exec($sql) == 1){
        echo "<p style='color: green;'>Успешно е додаден универзитетот: ".$nazivU."! </p>";
    }else{
        echo "Neuspesno dodavanje na zapis! ";
    }
}

?>