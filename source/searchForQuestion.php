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
    <link rel="stylesheet" href="css/foundQuestion.css">
<body>
    <div id="grid">
        <?php
            include "sideBar.php";
            include "navBar.php";
        ?>
        <div id="found">
            <?php
                for ($x = 0; $x < sizeof($questions); $x++){
                    echo '<div class="divfoundQuestion">';
                        echo '<div class="divVotes">';

                        echo '</div>';
                        echo '<div class="divQuestionInfo">';
                            echo '<div class="questionHeader">';
                                echo '<a href="question.php?idQ='.$questions[$x]['id'].'">'.$questions[$x]["header"].'</a>';
                            echo '</div>';
                            echo '<div class="questionData">';
                                echo $questions[$x]["raw_data"];
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            ?>

        </div>
    </div>
</body>
    <script src="js/main.js"></script>
</html>
