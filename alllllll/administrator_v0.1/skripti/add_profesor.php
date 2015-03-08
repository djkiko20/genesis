<?php
/**
 * Created by PhpStorm.
 * User: Hristian
 * Date: 07.03.2015
 * Time: 15:12
 */

include_once('connection.php');
if($_POST){


    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $biografija = $_POST['biografija'];
    $email = $_POST['email'];
    $fakulteti = $_POST['fakulteti'];
    $id = rand(100000, 900000);

    $fakultet = explode(',',$fakulteti);

    $pateka="gallery/profesori/";
        if ($_FILES["slika"]["error"] > 0){
            echo "Error: " . $_FILES["slika"]["error"] . "<br />";
        } else {
           //$ime = explode('.',$_FILES["slika"]["name"]);
            $imeFile = explode('.',$_FILES["slika"]["name"]);
            $ekstenzija = $imeFile[count($imeFile)-1];

            $novo_ime = "gallery/profesori/".$id.".".$ekstenzija;
            $samo_novo_ime = $id.".".$ekstenzija;

            $snimi = move_uploaded_file($_FILES["slika"]["tmp_name"], "../../gallery/profesori/" . $samo_novo_ime);
            if($snimi){
                echo "Fajlot e uspesno snimen vo <b> ../../gallery/profesori/". $novo_ime."</b><br/>";
            } else {
                echo "Prikaceniot fajl ne e uspesno zacuvan!!!!!";
            }

        $slika = $pateka.$_FILES["slika"]["name"];



    $sql = "INSERT INTO tbl_profesori (profesorID, ime, prezime, biografija, slika, email) VALUES ('$id', '$ime', '$prezime', '$biografija','$novo_ime', '$email')";
    if($conn->exec($sql) == 1){
        foreach($fakultet as $current){
            $sql_insert = "INSERT INTO tbl_profesori_fakulteti (profesorID, fakultetID) VALUES ('$id', '$current')";
            $conn->exec($sql_insert);
        }
        //echo "<p style='color: green;'>Успешно е додаден професор: ".$ime." ".$prezime."! </p>";
        header("Refresh:0; url=../profesor.php?success=1");
    }else{
        echo "Neuspesno dodavanje na zapis! ";
    }
    }
}

?>