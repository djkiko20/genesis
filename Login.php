<?php
/**
 * Created by PhpStorm.
 * User: User-Pc
 * Date: 08.03.2015
 * Time: 09:48
 */


include_once('skripti_klient/connection.php');



if($_POST)
{

    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $sql="Select email,lozinka from tbl_korisnici where email=:em AND lozinka=:p";
    $rez=$conn->prepare($sql);
    $niza=array(':em'=>$email,':p'=>$pass);
    $rez->execute($niza);
    $broj=$rez->rowCount();
    if($broj > 0)
    {
        echo "Vleze";
        session_start();
        $_SESSION['korisnik']="vklucen";
        header('Location: index.php');
    }
    else{
        echo"Neuspesna najava";
        Header('Location : index.php');
    }

}


?>