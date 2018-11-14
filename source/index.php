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
            <div class="divCategory">
                <div class="verticalHeader">
                    <h2>Categorias:</h2>
                </div>
                <div class="verticalTxt">
                    <?php
                        $resul = selectAllCategory();
                            foreach ($resul as $row){
                                echo "<div class='category'>
                                        <div class='cetegoryDecoration'>
                                        <div class='cDecoration'></div>
                                        </div>".$row["name"]."</div>";
                            }
                    ?>
                </div>
            </div>
            <div id="questions">
                <div class="verticalHalf">
                    <div class="verticalHeader">
                        <h2>Preguntas recientes:</h2>
                    </div>
                    <div class="verticalTxt">
                        <?php
                            $resul = selectRecientQuestion();
                            foreach ($resul as $row){
                                echo "<a href='question.php?idQ=".$row["id"]."'>".$row["header"]." ".$row["dateQ"].PHP_EOL."</a><br>";
                            }
                        ?>
                    </div>
                </div>
                <div class="verticalHalf">
                    <div class="verticalHeader">
                        <h2>Preguntas destacadas:</h2>
                    </div>
                    <div class="verticalTxt">
                        <?php
                            $resulF = selectFavouriteQuestion();
                            foreach ($resulF as $rowF){
                                $resulF = selectQuestionById($rowF["id_question"]);
                                foreach ($resulF as $rowQ){
                                    echo $rowQ["header"]." ".$rowQ["dateQ"].PHP_EOL."<br>";
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