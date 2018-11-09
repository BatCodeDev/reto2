<?php $user = "1"; ?>
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
                <!--<img src="img/profile.png">-->
                <img id="userImg" src="<?=$_SESSION['img']?>">
                <a href="profile.php?id=<?=$user?>"><?=$_SESSION['user']?></a>
            </div>
            <?php
        }else{
            ?>
            <div class="navLinks">
                <!--<img src="img/profile.png">-->
                <img id="loginImg" src="img/login.png">
                <a href="profile.php">Login/Registro</a>
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