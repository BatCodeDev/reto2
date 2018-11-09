<?php
session_start();
include("server/connection.php");
include ("sideBar.php");
$con = connect();

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <script>
        $("body").width($(window).width());
        $("body").height($(window).height());
        $("#grid").height($(window).height());
    </script>
    <div id="grid">
        <?php include("navBar.php")?>
        <div id="profile">
            <div id="profileImg">
                <?php if(isset($_SESSION['user'])){ ?>
                    <img src="<?=$_SESSION['img']?>" alt="">
                <?php }else{ ?>
                    <img src="img/default.png" alt="">
                <?php } ?>
                <form action="">
                    <input type="file"></input>
                    <button type="submit">Aceptar</button>
                </form>
            </div>
            <div id="profileData"></div>
        </div>
    </div>
</body>
    <script src="js/main.js"></script>
</html>