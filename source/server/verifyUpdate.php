<?php
include_once "connection.php";
include_once "profileDB.php";

if (isset($_POST["userId"], $_POST["name"], $_POST["surname"])) {
    $id = $_POST["userId"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    try{
        updateProfile($id, $name, $surname);
        echo "success";
    }catch(Exception $e){
        echo "errorUpdate catch";
    }
}else{
    echo "errorUpdate";
}
?>