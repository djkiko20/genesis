<?php
/**
 * Created by PhpStorm.
 * User: User-Pc
 * Date: 08.03.2015
 * Time: 09:50
 */
include_once('skripti_klient/connection.php');
if($_POST)
{
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $niza=array();
    $niza=explode("@",$email);
    if(substr_count($niza[1],".ukim.mk")==1 && count($niza)==2)
    {
            echo "Vleze";
        $sql="Insert into tbl_korisnici(ime,prezime,email,lozinka) VALUES (:ime,:prezime,:email,:lozinka)";
        $rez=$conn->prepare($sql);
        $rez->bindParam(':ime',$ime);
        $rez->bindParam(':prezime',$prezime);
        $rez->bindParam(':email',$email);
        $rez->bindParam(':lozinka',$pass);
        if($rez->execute())
        {
         Header('Location: index.php');
        }
        else
        {
            echo "Neuspesna registracija";
        }




    }






}