<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/grid.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Nanum+Gothic" rel="stylesheet">


</head>
<body>
    <div id="grid">
        <?php 
            include "navBar.php"; 
            include "sideBar.php"; 
            include_once "server/questionDB.php";
            include_once "server/favouriteDB.php";
            include_once "server/categoryDB.php";
        ?>
        <div id="content">
            <div class="divCategory">
                <h2>Categorias:</h2>
                <div class="verticalTxt">
                    <?php
                        $resul = selectIndexCategory();
                            foreach ($resul as $row){
                                echo "<div class='category'>
                                        <a href='searchForQuestion.php?categoryName=".$row["name"]."'>".strtoupper($row["name"])."</a></div>";
                            }
                        if (isset($resul)) {
                            echo "<div class='category'>
                                        <a href='searchForQuestion.php?categoryName=seeAllCategory'>TODOS</a></div>";
                        }
                    ?>
                    <a id="seeAllCategory" href='searchForQuestion.php?categoryName=seeAllCategory'>VER TODOS</a>
                </div>
            </div>
            <div id="questions">
                <div class="verticalHalf">
                    <h2>Recientes:</h2>
                    <div class="verticalTxt">
                        <?php
                            $resul = selectRecientQuestion();
                            foreach ($resul as $row){
                                echo "<a href='question.php?idQ=".$row["id"]."'><p>".strtoupper($row["header"])." ".substr($row["dateQ"], 0, -9).PHP_EOL."</p></a>";
                            }
                        ?>
                    </div>
                </div>
                <br>
                <div class="verticalHalf">
                <h2>Destacadas:</h2>
                    <div class="verticalTxt">
                        <?php
                            $resulF = selectFavouriteQuestion();
                            foreach ($resulF as $rowF){
                                $resulF = selectQuestionById($rowF["id_question"]);
                                foreach ($resulF as $rowQ){
                                    $out = "<a href='question.php?idQ=".$rowQ["id"]."'><p>".strtoupper($rowQ["header"])." ".substr($rowQ["dateQ"], 0, -9).PHP_EOL."</p></a>";
                                    echo $out;
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="js/main.js"></script></hmtl>
</html>