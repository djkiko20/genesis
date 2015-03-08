<?php
/**
 * Created by PhpStorm.
 * User: Sime
 * Date: 08.03.2015
 * Time: 06:28
 */
if($_POST)
{
    include_once('connection.php');
    $komentar=$_POST['komentar'];
    $univerzitet=$_POST['univerzitet'];
    $fakultet=$_POST['fakultet'];
    $predmetID=$_POST['predmetID'];
    $datum=date("Y-m-d h:i:s");
    $lajk=0;
    $dislajk=0;
    $faktor=0;
    if(strlen(trim($komentar))<1)
    {
        echo "<p style='color: #ff0000'>Неуспешно коментирање</p>";
    }
    else
    {


    $sql="insert into tbl_komentari_predmeti (predmetID,datum,lajk,dislajk,faktor,tekst) values('$predmetID','$datum','$lajk','$dislajk','$faktor','$komentar')";
    if($conn->exec($sql))
    {
        echo "<p style='color: green'>Успешно коментирање</p>";
       // header("location: ../za_predmet.php?predmet=".$predmetID."&univerzitet=".$univerzitet."&fakultet=".$fakultet);
    }
    else
    {
        echo "<p style='color: #ff0000'>Неуспешно коментирање</p>";

    }
    }

}
else
{
    echo "ne e postirano";
}
