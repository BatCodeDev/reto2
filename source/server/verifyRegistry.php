<?php
    include_once "connection.php";
     include_once "loginRegistryDB.php";
    
    
    if (isset($_POST["email"])) {
        $dbh = connect();
        $email = $_POST["email"];
        $user = $_POST["user"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];

        //Comprobation
        if(selectIdProfile($dbh, $email)===null){
            if (selectIdLogin($dbh, $user)===null) {
                insertRegistryUser($dbh, $email, $user, $password, $name, $surname);
                echo "success";
            }else{
                echo "errorUser";
            }
        }else{
                echo "errorEmail";
        }
        closeConnect($dbh);
    }
?>