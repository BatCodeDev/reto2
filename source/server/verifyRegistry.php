<?php
    include_once "connection.php";
     include_once "profileDB.php";
     
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        $user = $_POST["user"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];

        //Comprobation
        if(selectVerifyEmailProfile($email)===null){
            if (selectIdProfile($user)===null) {
                insertProfile($email, $name, $surname, $user, $password);
                echo "success";
            }else{
                echo "errorUser";
            }
        }else{
                echo "errorEmail";
        }
    }
?>