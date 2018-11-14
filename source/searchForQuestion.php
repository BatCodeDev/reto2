<?php
    if(isset($_POST["searchQuestion"])){
        include ("server/connection.php");
        include ("server/questionDB.php");
        $questions = searchQuestionHeader($_POST["searchQuestion"]);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">
<style>
    #found{
        grid-column: 1 / 9;
        grid-row: 2 / 10;
    }
</style>
<body>
    <div id="grid">
        <?php
            include "sideBar.php";
            include "navBar.php";
        ?>
        <div id="found">
            <?php
                for ($x = 0; $x < sizeof($questions); $x++){
                    echo $questions[$x]["id"], $questions[$x]["header"], "<br>";
                }
            ?>
        </div>
    </div>
</body>
    <script src="js/main.js"></script>
</html>
