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

        body{
            background-color: #D5F6F0;
        }

        header{
            background-color: white;
            height: auto;
        }

        #content{

            background-color: white;
            margin: 10px auto;
            width: 100%;
            padding: 0 .5em;
            width: 90%;
        }

        @media (max-width: 800px){
            #content{width: 90%;}

            background-color: lightblue;
            margin: 0 auto;
            width: 280px;

          
        }

        .divQuestion{
            background-color: white;
        }


        #header{
            font-size: 1.5em;
        }

        #content input{
            height: 40px;
            width: 95%;
            word-wrap: break-word;
            border: 0.5px grey solid;
            

        }

        #content input:disabled{
            outline: none;
            border-color: white;
            box-shadow: none;
            background-color: white;
            border:none;
        }


        .divQuestion textarea:disabled{
            outline: none;
            border-color: white;
            box-shadow: none;
            background-color: white;
            border:none;
        }

        #rawData{
            width: 95%;
        }

        h3{
            font-family: 'Josefin Sans', sans-serif;
            margin-bottom: 0px;
        }

        select{
            margin: 10px 0;
        }
        #answerDiv{
            background-color: white;

        }

        #answerDiv div{
            border: 1px #A9F7E8 solid;
            padding-top: 0px;
            margin: 5px 0px;
            width: 100%;

        }

        #answerDiv div *{
            margin-top: 0px;

        }



        #rawData{
            width: 100%;
            height: 120px;
        }


    </style>
</head>
<body>
    <div id="grid">
        <?php 
        if (isset($_POST["subQuestion"])) {
            header('location:searchForQuestion.php?history=true');
        }
            include "navBar.php"; 
            include "sideBar.php"; 
            include_once "server/questionDB.php";
            include_once "server/favouriteDB.php";
            include_once "server/categoryDB.php";
            include_once "server/answerDB.php";
            include_once "server/profileDB.php";
            $userImg = "img/alexddo.png";
        ?>
        <div id="content">
            <form method="POST">
                <div class="divQuestion">

                    <h3>Cabecera</h3><input type="text" id="header" name="header" required maxlength="25">
                    <h3>Cuerpo</h3><textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" id="rawData" maxlength="255" name="rawData" required></textarea>
                    <h3>Categoría</h3><input type="text" id="category" name="category" placeholder="Escribe o selecciona catergoría" maxlength="7">

                    <h3>Cabecera</h3><input type="text" id="header" name="header" required>
                    <h3>Cuerpo</h3><textarea id="rawData" maxlength="255" name="rawData" required></textarea>
                    <h3>Categoría</h3><input type="text" id="category" name="category" placeholder="Escribe o selecciona catergoría">

                    <select id="selectCategory" onchange="selectCategoryF()">
                        <option selected>---</option>
                    <?php
                        $resul = selectAllCategory();
                            foreach ($resul as $row){
                                echo "<option>".$row["name"]."</option>";
                            }
                    ?>
                    </select>
                    <br>
                    <input type="file" name="file">
                    <button type="reset">Descartar</button>
                    <br>

                    <input type="submit" id="subQuestion" name="subQuestion" value="Formular pregunta">

                </div>
            </form>

            <?php
                if (isset($_GET["idQ"])) {
                    echo "<form method='POST'>";
                    $resul = selectFavouriteUserQuestion($_SESSION["user"]["userId"]);
                    if ($resul != null) {
                        foreach ($resul as $row){
                            if ($row["id_question"]!==$_GET["idQ"]) {
                                echo "<input type='submit' name='favQA' value='Marcar esta pregunta como favorita'>";
                            }else{
                                echo "<input type='submit' name='favQQ' value='Quitar esta pregunta como favorita'>";
                            }
                        }   
                    }else{
                        echo "<input type='submit' name='favQA' value='Marcar esta pregunta como favorita'>";
                    }
                                         
                    echo "</form><form method='POST'>
                    <h3>Respuestas</h3>";
                    if (isset($_SESSION['user'])) {
                        echo "<input type='text' name='rawDataA' required><br>
                        <input type='submit' id='subAnswer' name='subAnswer' value='Responder'>";
                    }else{
                        echo "<a href='loginRegistry.php'>Inicia sesión para poder responder</a>";
                    }
                    echo "</form>";
                    $resulF = selectRecientAnswer($_GET["idQ"]);
                    foreach ($resulF as $rowQ){
                        $userName = selectNameProfile($rowQ["id_profile"]);
                        echo "<div>".
                        "<h3>".$userName."</h3>"."<p>".$rowQ["raw_data"]."</p>"
                        ."</div>";
                    }
                }
            ?>
        </div>
        <?php
            if (isset($_GET["idQ"])) {
                $id = $_GET["idQ"];
                $resulF = selectQuestionById($id);
                foreach($resulF as $rowQ){
                    echo  "<input type='hidden' id='headerH' value='".$rowQ["header"]."'>";
                    echo  "<input type='hidden' id='rawDataH' value='".$rowQ["raw_data"]."'>";
                    echo  "<input type='hidden' id='dateQH' value='".$rowQ["dateQ"]."'>";
                    echo  "<input type='hidden' id='idProfileH' value='".$rowQ["id_profile"]."'>";

                    echo  "<input type='hidden' id='categoryH' value='".selectCategoryById($rowQ["id_category"])."'>";
                }
            }

            if (isset($_POST["file"]))
            {
                $question = getLastQuestion();
                //$archive=getLastArchive();
                $date= microtime(true);
                uploadFile($question,$date);
            }
            

            if (isset($_POST["subQuestion"])) {
                $idCategory = selectIdCategory($_POST["category"]);
                if ($idCategory == null) {
                    insertCategory($_POST["category"]);
                    $idCategory = selectIdCategory($_POST["category"]);
                }
                insertQuestion($_POST["header"], $_POST["rawData"], date("m-d-Y H:i:s"), $_SESSION["user"]["userId"], $idCategory);
                header("Location: index.php");
            }

            if (isset($_POST["favQA"])) {
                insertFavouriteQuestion($_SESSION["user"]["userId"], $_GET["idQ"]);
                header("Location: question.php?idQ=".$_GET["idQ"]);
            }

            if (isset($_POST["favQQ"])) {
                deleteFavouriteQuestion($_SESSION["user"]["userId"], $_GET["idQ"]);
                header("Location: question.php?idQ=".$_GET["idQ"]);
            }

            if (isset($_POST["subAnswer"])) {
                insertAnswer($_POST["rawDataA"], date("m-d-Y H:i:s"), $_SESSION["user"]["userId"], $_GET["idQ"]);
                header("Location: question.php?idQ=".$_GET["idQ"]);
            }


            if (isset($_POST["subAnswer"])) {
                insertAnswer($_POST["rawDataA"], date("m-d-Y H:i:s"), $_SESSION["user"]["userId"], $_GET["idQ"]);
            }

            if (isset($_POST["favQA"])) {
                insertFavouriteQuestion($_SESSION["user"]["userId"], $_GET["idQ"]);
            }

            if (isset($_POST["favQQ"])) {
                deleteFavouriteQuestion($_SESSION["user"]["userId"], $_GET["idQ"]);
            }
            $fav = false;
            echo "<form method='POST'>";
                if (isset($_GET["idQ"], $_SESSION["user"]["userId"])) {
                    $resul = selectFavouriteUserQuestion($_SESSION["user"]["userId"]);
                        foreach ($resul as $row){
                            if ($row["id_question"]==$_GET["idQ"]) {
                                $fav = true;
                            }
                        }
                    if ($fav) {
                        echo "<input type='submit' name='favQQ' value='Quitar esta pregunta como favorita'>";
                    }else{
                        echo "<input type='submit' name='favQA' value='Marcar esta pregunta como favorita'>";
                    }
                    echo "</form>";
                }

                if (isset($_GET["idQ"])) {
                    echo "<div id='answerDiv'><form method='POST'>
                    <h3>Respuestas</h3>";
                    if (isset($_SESSION['user'])) {
                        echo "<input type='text' name='rawDataA' required><br>
                        <input type='submit' id='subAnswer' name='subAnswer' value='Responder'>";
                    }else{
                        echo "<a href='loginRegistry.php'>Inicia sesión para poder responder</a>";
                    }
                    echo "</form>";
                    $resulF = selectRecientAnswer($_GET["idQ"]);
                    foreach ($resulF as $rowQ){
                        $userName = selectNameProfile($rowQ["id_profile"]);
                        echo "<div>".
                        "<h3>".$userName."</h3>"."<p>".$rowQ["raw_data"]."</p>"
                        ."</div>";
                    }
                }
            ?>
        </div>
        <?php
            if (isset($_GET["idQ"])) {
                $id = $_GET["idQ"];
                $resulF = selectQuestionById($id);
                foreach($resulF as $rowQ){
                    echo  "<input type='hidden' id='headerH' value='".$rowQ["header"]."'>";
                    echo  "<input type='hidden' id='rawDataH' value='".$rowQ["raw_data"]."'>";
                    echo  "<input type='hidden' id='dateQH' value='".$rowQ["dateQ"]."'>";
                    echo  "<input type='hidden' id='idProfileH' value='".$rowQ["id_profile"]."'>";

                    echo  "<input type='hidden' id='categoryH' value='".selectCategoryById($rowQ["id_category"])."'></div>";

                }
            }

            




        ?>
    </div>
</body>
    <script type="text/javascript">
        if (document.getElementById("headerH").value != null) {
            document.getElementById("header").value = document.getElementById("headerH").value;
            document.getElementById("header").disabled = true;
            document.getElementById("rawData").value = document.getElementById("rawDataH").value;
            document.getElementById("rawData").disabled = true;
            document.getElementById("category").value = document.getElementById("categoryH").value;
            document.getElementById("category").disabled = true;
            document.getElementById("selectCategory").style.display = "none";
            document.getElementById("subQuestion").style.display = "none";
        }



        function selectCategoryF(){
            var e = document.getElementById("selectCategory");
            console.log(e.options[e.selectedIndex].value);
            if (e.options[e.selectedIndex].value === "---") {
                document.getElementById("category").value = "";
            }else{
                document.getElementById("category").value = e.options[e.selectedIndex].value;
            }
        }
    </script>
    <script src="js/main.js"></script>
</html>