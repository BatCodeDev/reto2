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
            <a href="<?php echo isset($_SESSION['user'])? 'question.php':'loginRegistry.php';?>">FORMULAR UNA PREGUNTA</a>
        </div>
        <div class="navLinks">
            <a href="<?php echo isset($_SESSION['user'])? 'searchForQuestion.php?history=true':'loginRegistry.php';?>">MIS PREGUNTAS</a>
        </div>
        <div class="navLinks">
            <a href="<?php echo isset($_SESSION['user'])? 'searchForQuestion.php?favQ=true':'loginRegistry.php';?>">MIS FAVORITOS</a>
        </div>
        <br>
        <?php
            if(isset($_SESSION['user'])){
            echo '<form id="closeSession" action="logOut.php"><button type="submit">Cerrar Sesión</button></form>';
            }
        ?>
    </div>
</nav>