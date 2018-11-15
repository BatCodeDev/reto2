<?php
        include ("server/connection.php");
        include ("server/questionDB.php");       
        include ("server/categoryDB.php"); 
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
    <link rel="stylesheet" href="css/foundQuestion.css">
<body>
    <div id="grid">
        <?php
            include "sideBar.php";
            include "navBar.php";
        ?>
        <div id="found">
            <?php
                if (isset($_POST["searchQuestion"])) {
                    $questions = searchQuestionHeader($_POST["searchQuestion"]);
                    for ($x = 0; $x < sizeof($questions); $x++){
                        $questions[$x]["id"];
                        $questions[$x]["header"];
                        echo '<a href="question.php?idQ='.$questions[$x]['id'].'">'.$questions[$x]["header"].'</a>', "<br>" ;
                    }
                }

                if (isset($_GET["categoryName"])) {
                    $idC = selectIdCategory($_GET["categoryName"]);
                    $questions = selectQuestionByCategory($idC);
                    for ($x = 0; $x < sizeof($questions); $x++){
                        $questions[$x]["id"];
                        $questions[$x]["header"];
                        echo '<a href="question.php?idQ='.$questions[$x]['id'].'">'.$questions[$x]["header"].'</a>', "<br>" ;
                    }
                }
            ?>

        </div>
    </div>
</body>
    <script src="js/main.js"></script>
</html>
