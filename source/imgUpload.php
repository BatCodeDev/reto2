<?php
session_start();
include_once "server/connection.php";
include ("server/profileDB.php");
if ($_FILES["file"]["error"] > 0){
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
}else{
    $extension = explode("/", $_FILES["file"]["type"])[1];
    $url = "img/userImgs/".$_SESSION["user"]["userName"].'.'.$extension;
    move_uploaded_file($_FILES["file"]["tmp_name"], $url);
    updateImg($_SESSION["user"]["userId"], $url);
    $_SESSION["user"]["userPhoto"] = $url;
    header("location:profile.php?id=".$_SESSION["user"]["userId"]);
}
?>