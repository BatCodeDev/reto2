<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Nanum+Gothic" rel="stylesheet">
    <style type="text/css">
        #grid{
            background-color: #D5F6F0;
        }

        header{
            background-color: white;
            height: auto;
        }

        h2{
            font-family: 'Josefin Sans', sans-serif;
        }

        .divCategory{
            width: 90%;
            margin: 0 auto;
        }

        .category{
            background-color: #FC3667;
            margin-bottom: 3%;
        }

        .verticalTxt{
            border: dashed 1px grey;
            background-color: white;
        }

        .verticalTxt a {
            font-family: 'Nanum Gothic', sans-serif;
            color: white;
            text-decoration: none;
            line-height: 40px;
            width: 90%;
        }

        #questions {
            width: 90%;
            margin: 0 auto;
            text-align: left;
        }

        #questions a{
            background-color: #FC3667;
            border-radius: 3px;
            line-height: 0px;
            padding-left: 5px;
            margin: .1em;

        }
        
    </style>


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
                <h2>Categorias:</h2>
                <div class="verticalTxt">
                    <?php
                        $resul = selectAllCategory();
                            foreach ($resul as $row){
                                echo "<div class='category'>
                                        <a href='searchForQuestion.php?categoryName=".$row["name"]."'>".strtoupper($row["name"])."</a></div>";
                            }
                    ?>
                </div>
            </div>
            <div id="questions">
                <div class="verticalHalf">
                    <h2>Preguntas recientes:</h2>
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
                <h2>Preguntas destacadas:</h2>
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