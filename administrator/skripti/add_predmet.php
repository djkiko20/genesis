<?php
/**
 * Created by PhpStorm.
 * User: Hristian
 * Date: 07.03.2015
 * Time: 18:09
 */

include_once('connection.php');
if($_POST){


    $naziv = $_POST['nazivP'];
    $opis = $_POST['opis'];
    $profesori = $_POST['profesori'];
    $fakulteti = $_POST['fakulteti'];
    $id = rand(100000, 900000);

    $profesor = explode(',',$profesori);
    $fakultet = explode(',',$fakulteti);

    $pateka="gallery/profesori/";
    if ($_FILES["slika"]["error"] > 0){
        echo "Error: " . $_FILES["fajl"]["error"] . "<br />";
    } else {
        //$ime = explode('.',$_FILES["slika"]["name"]);
        $imeFile = explode('.',$_FILES["fajl"]["name"]);
        $ekstenzija = $imeFile[count($imeFile)-1];

        $novo_ime = "fajlovi/predmeti/".$id.".".$ekstenzija;
        $samo_novo_ime = $id.".".$ekstenzija;

        $snimi = move_uploaded_file($_FILES["fajl"]["tmp_name"], "../../fajlovi/predmeti/" . $samo_novo_ime);
        if($snimi){
            echo "Fajlot e uspesno snimen vo <b> ../../fajlovi/predmeti/". $samo_novo_ime."</b><br/>";
        } else {
            echo "Prikaceniot fajl ne e uspesno zacuvan!!!!!";
        }

        $slika = $pateka.$_FILES["slika"]["name"];

        $fakultetID = $fakultet[0];


        $sql = "INSERT INTO tbl_predmeti (predmetID, fakultetID, nazivP, opisP, pateka) VALUES ('$id', '$fakultetID', '$naziv', '$opis','$novo_ime')";
        if($conn->exec($sql) == 1){
            foreach($profesor as $current){
                $sql_insert = "INSERT INTO tbl_profesori_predmeti (profesorID, predmetID) VALUES ('$current', '$id')";
                $conn->exec($sql_insert);
            }
            //echo "<p style='color: green;'>Успешно е додаден професор: ".$ime." ".$prezime."! </p>";
            header("Refresh:0; url=../predmet.php?success=1");
        }else{
            echo "Neuspesno dodavanje na zapis! ";
        }
    }
}

?>