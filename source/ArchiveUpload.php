<?php
/**
 * Created by PhpStorm.
 * User: 2gdaw05
 * Date: 15/11/2018
 * Time: 9:34
 */
include_once 'server/ArchiveDB.php';
function uploadFile($question,$date,$archive)
{
    if ($_FILES["file"]["error"] > 0){
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }else{
        $extension = explode("/", $_FILES["file"]["type"])[1];
        $url = "img/archive/".$date.'.'.$extension;
        move_uploaded_file($_FILES["file"]["tmp_name"], $url);
        save($url,$question);

    }
}
?>