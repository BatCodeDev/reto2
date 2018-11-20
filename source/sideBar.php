<?php session_start(); ?>
<div id="fullfade" onclick="toggleNavbar();"></div>
<nav id="navBar">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Nanum+Gothic" rel="stylesheet">
    <div id="navBarHeader">
        <div id="navBarHeaderTxt">
            <h2>MENÚ</h2>
        </div>
    </div>
    <div id="navBarContent">
        <?php
        if(isset($_SESSION['user'])){
        ?>
        <div class="navLinks"  id="userProfile">
        <a href="profile.php?id=<?=$_SESSION['user']["userId"]?>">
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
            </a>
                <a id="userProfileLink" href="profile.php?id=<?=$_SESSION['user']["userId"]?>"><?=$_SESSION['user']["userName"]?></a>
                
        </div>
            <?php
        }else{
            ?>
            <div class="navLinks">
                <!--<img src="img/profile.png">-->
                <!--<img id="loginImg" src="img/login.png">-->
                <a href="loginRegistry.php">LOGIN/REGISTRO</a>
            </div>
            <?php
        }
        ?>
        <div class="navLinks">
            <!--<img src="img/logo.png"">-->
            <a href="question.php">FORMULAR UNA PREGUNTA</a>
        </div>
        <div class="navLinks">
            <!--<img src="img/history.png"">-->
            <a href="searchForQuestion.php?history=true">MIS PREGUNTAS</a>
        </div>
        <div class="navLinks">
            <!--<img src="img/logo.png"">-->
            <a href="searchForQuestion.php?favQ=true">MIS FAVORITOS</a>
        </div>
        <br>
        <?php
            if(isset($_SESSION['user'])){
            echo '<form id="closeSession" action="logOut.php"><button type="submit">Cerrar Sesión</button></form>';
            }
        ?>
    </div>
</nav>