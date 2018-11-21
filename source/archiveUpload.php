<?php
/**
 * Created by PhpStorm.
 * User: 2gdaw05
 * Date: 15/11/2018
 * Time: 9:34
 */

include_once "server/connection.php";
include_once 'server/ArchiveDB.php';


/**
 * @param $date2
 * Funcion que renombra un archivo y lo sube
 */

function uploadFile($date2)
{


    if ($_FILES["file2"]["error"] > 0){
        echo "Error: " . $_FILES["file2"]["error"] ."<br />";
    }else{
        $nombreArchivo = $_FILES['file2']['name'];
        $nombreTmpArchivo = $_FILES['file2']['tmp_name'];
        $extension = explode(".", $_FILES['file2']['name']);
        $ext = end($extension);
        $destino = "./img/archive/".$date2.".".$ext;
        move_uploaded_file($nombreTmpArchivo, $destino);
        save($destino);

    }
}




?>