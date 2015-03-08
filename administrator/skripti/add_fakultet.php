<?php header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: Hristian
 * Date: 07.03.2015
 * Time: 15:03
 */
if($_POST){
    include_once('connection.php');

    $univerzitetID = $_POST['univerzitetID'];
    $nazivF = $_POST['nazivF'];

    $sql = "INSERT INTO tbl_fakulteti (univerzitetID, nazivF) VALUES ('$univerzitetID','$nazivF')";

    if($conn->exec($sql) == 1){
        echo "<p style='color: green;'>Успешно е додаден факултетот: ".$nazivF."! </p>";
    }else{
        echo "Neuspesno dodavanje na zapis! ";
    }
}

?>