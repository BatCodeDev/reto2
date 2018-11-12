<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">
</head>
<body>
    <div id="grid">
        <?php 
            include "navBar.php"; 
            include "sideBar.php"; 
            include_once "server/questionDB.php";
            include_once "server/favouriteDB.php";
            include_once "server/categoryDB.php";
            $userImg = "img/alexddo.png";
        ?>
        <div id="content">
            <form method="POST">
                <div class="divQuestion">
                    <h3>Cabecera</h3><input type="text" name="header" required>
                    <h3>Cuerpo</h3><input type="text" name="rawData" required>
                    <input type="submit" name="subQuestion" value="Formular pregunta">
                </div>
            </form>
        </div>
        <?php
            if (isset($_POST["subQuestion"])) {
                insertQuestion($_POST["header"], $_POST["rawData"], date("m-d-Y H:i:s"), $_SESSION["user"]["userId"], "1");
            }
        ?>
    </div>
</body>
    <script src="js/main.js"></script></hmtl>
</html>