<?php session_start(); ?>
<div id="fullfade" onclick="toggleNavbar();"></div>
<nav id="navBar">
    <div id="navBarHeader">
        <div id="navBarHeaderTxt">
            <h2>Menu</h2>
        </div>
    </div>
    <div id="navBarContent">
        <?php
        if(isset($_SESSION['user'])){
        ?>
        <div class="navLinks">
            <?php
            if (isset($_SESSION["user"]["userPhoto"])) {
                if ($_SESSION["user"]["userPhoto"] != "") {
            ?>
                    <img id="userImg" src="<?= $_SESSION['user']['userPhoto'] ?>">
            <?php
                } else {
            ?>
                    <img id="userImg" src="img/default.png">
            <?php
                }
            }
            ?>
                <a href="profile.php?id=<?=$_SESSION['user']["userId"]?>"><?=$_SESSION['user']["userName"]?></a>
                <form action="logOut.php"><button type="submit">Cerrar Session</button></form>
            </div>
            <?php
        }else{
            ?>
            <div class="navLinks">
                <!--<img src="img/profile.png">-->
                <img id="loginImg" src="img/login.png">
                <a href="loginRegistry.php">Login/Registro</a>
            </div>
            <?php
        }
        ?>
        <div class="navLinks">
            <img src="img/history.png"">
            <a href="">Historial de preguntas</a>
        </div>
        <div class="navLinks">
            <img src="img/logo.png"">
            <a href="">link</a>
        </div>
        <div class="navLinks">
            <img src="img/logo.png"">
            <a href="">link</a>
        </div>
    </div>
</nav>