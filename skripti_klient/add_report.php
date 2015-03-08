<?php
/**
 * Created by PhpStorm.
 * User: Hristian
 * Date: 08.03.2015
 * Time: 13:05
 */

if($_POST) {
    include_once('connection.php');
    $komentarID = $_POST['komentarID'];
    $pricina = $_POST['pricina'];
    $tip = $_GET['tip'];

    if($tip == 1){
        $sql="insert into tbl_prijavi (komentarID,tip,tekst) values('$komentarID','$tip','$pricina')";
        if($conn->exec($sql))
        {
            echo "Успешно испратена пријава";
            // header("location: ../za_predmet.php?predmet=".$predmetID."&univerzitet=".$univerzitet."&fakultet=".$fakultet);
        }
        else
        {
            echo "Неуспешно испратена пријава";

        }
    } else{
        $sql="insert into tbl_prijavi (komentarID,tip,tekst) values('$komentarID','$tip','$pricina')";
        if($conn->exec($sql))
        {
            echo "Успешно испратена пријава";
            // header("location: ../za_predmet.php?predmet=".$predmetID."&univerzitet=".$univerzitet."&fakultet=".$fakultet);
        }
        else
        {
            echo "Неуспешно испратена пријава";

        }
    }


}