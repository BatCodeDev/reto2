<?php 
    session_start();
    $userImg = "img/alexddo.png";
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">
    <style>
        #grid{
            display: grid;
            grid-template-columns: repeat(10, 10%);
            grid-template-rows: repeat(10, 10%);                       
        }        
    </style>
</head>
<body>
    <div id="grid">
        <script>
            $("body").width($(window).width());
            $("body").height($(window).height());
            $("#grid").height($(window).height());
        </script>
        <div id="fullfade" onclick="toggleNavbar();"></div>
        <nav id="navBar">
            <div id="navBarHeader">
                <div id="navBarHeaderTxt">
                    <h2>Menu</h2>
                </div>
            </div>
            <div id="navBarContent">
                <?php 
                    if(isset($_SESSION['img'], $_SESSION['user'])){
                ?>
                <div class="navLinks">
                    <!--<img src="img/profile.png">-->
                    <img id="userImg" src="<?=$_SESSION['img']?>">
                    <a href="profile.php"><?=$_SESSION['user']?></a>
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
        <header>
            <div id="divLogo">
                <img src="img/logo.png">
            </div>
            <div id="divSearch">
                <form method="post">
                    <input type="text">
                    <button type="submit" id="search">

                    </button>
                </form>
            </div>
            <div id="divNavTrigger" onclick="toggleNavbar();">
                <div class="divNavAxis"></div>
                <div class="divNavAxis"></div>
                <div class="divNavAxis"></div>
            </div>
        </header>
        <div id="content">
            <div class="verticalThird">
                <div class="verticalHeader">
                    <h2>Categorias:</h2>
                </div>
                <div class="verticalTxt">                    
                    
                    <div class="category">
                        <div class="cetegoryDecoration">
                            <div class="cDecoration"></div>
                        </div>
                        Problema
                    </div>                    
                    <div class="category">
                        <div class="cetegoryDecoration">
                            <div class="cDecoration"></div>
                        </div>
                        dsfndes
                    </div>                    
                    <div class="category">
                        <div class="cetegoryDecoration">
                            <div class="cDecoration"></div>
                        </div>
                        wrewt
                    </div>                    
                    <div class="category">
                        <div class="cetegoryDecoration">
                            <div class="cDecoration"></div>
                        </div>
                        rthrejrm
                    </div>                    
                    <div class="category">
                        <div class="cetegoryDecoration">
                            <div class="cDecoration"></div>
                        </div>
                        werg rwgej
                    </div>
            </div>
            </div>
            <div class="verticalThird">
                <div class="verticalHeader">
                    <h2>Preguntas recientes:</h2>
                </div>
                <div class="verticalTxt">                    

                </div>
            </div>
            <div class="verticalThird">
                <div class="verticalHeader">
                    <h2>Preguntas destacadas:</h2>
                </div>
                <div class="verticalTxt">                    

                </div>
            </div>
        </div>
        <footer>
            footer
        </footer>
    </div>
</body>
<script src="js/main.js"></script>
</html>
