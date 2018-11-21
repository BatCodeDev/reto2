
<?php
        include ("server/connection.php");
        include ("server/questionDB.php");       
        include ("server/categoryDB.php"); 
        include ("server/favouriteDB.php");
        include ("server/profileDB.php");
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
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Nanum+Gothic" rel="stylesheet">
<body>
    <div id="grid">
        <?php
            include "sideBar.php";
            include "navBar.php";
        ?>
        <div id="content">
            <h2>Resultado</h2>
            <div id="found">
                <?php
                    if (isset($_POST["searchQuestion"])) {
                        $questions = searchQuestionHeader($_POST["searchQuestion"]);
                        for ($x = 0; $x < sizeof($questions); $x++){
                            $owner = selectDataProfile(selectOwnerOfQuestion($questions[$x]['id']));
                        echo '<div class="divfoundQuestion">';
                            echo '<div class="divVotes">';
                                echo "Votos     ".selectCountFavourites($questions[$x]['id']);
                            echo '</div>';
                            echo '<div class="divQuestionInfo">';
                                echo '<div class="questionHeader">';
                                    echo '<a href="question.php?idQ='.$questions[$x]['id'].'">'.$questions[$x]["header"].'</a>';
                                echo '</div>';
                                echo '<div class="questionData">';
                                    echo $questions[$x]["raw_data"];
                                echo '<div id="questionOwner">'.$owner[0]["user"].'</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                        }
                    }

                    if (isset($_GET["categoryName"])) {
                        if ($_GET["categoryName"]=="seeAllCategory") {
                            $resul = selectAllCategory();
                            foreach ($resul as $row){
                                echo "<div class='divfoundQuestion'><div class='questionHeader'>
                                        <a href='searchForQuestion.php?categoryName=".$row["name"]."'>".strtoupper($row["name"])."</a></div></div>";
                            }
                        }else{
                            $idC = selectIdCategory($_GET["categoryName"]);
                            $questions = selectQuestionByCategory($idC);

                            for ($x = 0; $x < sizeof($questions); $x++){
                                $owner = selectDataProfile(selectOwnerOfQuestion($questions[$x]['id']));
                            echo '<div class="divfoundQuestion">';
                                echo '<div class="divVotes">';
                                echo "Votos ".selectCountFavourites($questions[$x]['id']);
                                echo '</div>';
                                echo '<div class="divQuestionInfo">';
                                    echo '<div class="questionHeader">';
                                        echo '<a href="question.php?idQ='.$questions[$x]['id'].'">'.$questions[$x]["header"].'</a>';
                                    echo '</div>';
                                    echo '<div class="questionData">';
                                        echo $questions[$x]["raw_data"];
                                    echo '<div id="questionOwner">'.$owner[0]["user"].'</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            }
                        }
                    }

                    if (isset($_GET["history"])) {
                        $questions = selectAllQuestionByIdProfile($_SESSION["user"]["userId"]);
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
                    }

                    if (isset($_GET["favQ"])) {
                        $questions = selectFavouriteUserQuestion($_SESSION["user"]["userId"]);
                        for ($x = 0; $x < sizeof($questions); $x++){
                            $question =  selectQuestionById($questions[$x]["id_question"]);
                            foreach ($question as $question){
                                    echo '<div class="divfoundQuestion">';
                                    echo '<div class="divVotes">';

                                    echo '</div>';
                                    echo '<div class="divQuestionInfo">';
                                    echo '<div class="questionHeader">';
                                    echo '<a href="question.php?idQ='.$question['id'].'">'.$question["header"].'</a>';
                                    echo '</div>';
                                    echo '<div class="questionData">';
                                    echo $question["raw_data"];
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            
                        }
                    }
                ?>

            </div>
        </div>
    </div>
</body>
    <script src="js/main.js"></script>
</html>

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
                    $questions[$x]["id"];
                    $questions[$x]["header"];
                    echo '<a href="question.php?idQ='.$questions[$x]['id'].'">'.$questions[$x]["header"].'</a>', "<br>" ;
                }
            ?>

        </div>
    </div>
</body>
    <script src="js/main.js"></script>
</html>

