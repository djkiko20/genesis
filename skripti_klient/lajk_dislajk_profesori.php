<?php
/**
 * Created by PhpStorm.
 * User: Sime
 * Date: 08.03.2015
 * Time: 08:21
 */
include_once('connection.php');
$tip=$_GET['tip'];
$komentarID=$_POST['komentarID'];


$sql="select lajk,dislajk from tbl_komentari_profesori where komentarID='".$komentarID."'";
$rez=$conn->query($sql);

foreach($rez as $r)
{

    $lajk=$r['lajk'];
    $dislajk=$r['dislajk'];
}
$faktor=1;

if($tip==1)
{
    //lajk
    $faktor=($lajk+2)/($dislajk+1)*1.0;
    $lajk+=1;

    $sql1="update tbl_komentari_profesori set lajk='".$lajk."',dislajk='".$dislajk."',faktor='".$faktor."' where komentarID='".$komentarID."'";
    if($conn->exec($sql1))

    {
        echo "Лајкнато :)";
    }
    else
    {
        echo "Неуспешно :(";
    }
}
else
{
    //dislajk
    $faktor=($lajk+1)/($dislajk+2)*1.0;
    $dislajk+=1;

    $sql1="update tbl_komentari_profesori set lajk='".$lajk."',dislajk='".$dislajk."',faktor='".$faktor."' where komentarID='".$komentarID."'";
    if($conn->exec($sql1))

    {
        echo "Дислајкнато :)";
    }
    else
    {
        echo "Неуспешно :(";
    }
}
