<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/question.css">
    <link rel="stylesheet" href="css/grid.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Nanum+Gothic" rel="stylesheet">
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
            include_once "server/archiveDB.php";
            include_once 'archiveUpload.php';
            $userImg = "img/alexddo.png";
        ?>
        <div id="content">
            <?php
            /*
            if(!isset($_GET["idQ"]))
            {
                ?>
                <h3>Subir archivos</h3>
                <form id="archiveForm"  enctype="multipart/form-data" onsubmit="return request2server2(this, './archiveUpload.php')">
                    <input type="file" name="file2">
                    <button type="reset">Descartar</button>
                    <button type="submit" name="send">Aceptar</button>
                </form>
                <div id="errorUpload">

                </div>
                <?php
            }
            ?>
            */
            ?>
            <form id="questionForm" method="POST" enctype="multipart/form-data" onsubmit="return request2server2(this, './archiveUpload.php')">
                <div class="divQuestion">
                    <h3>Cabecera</h3><input type="text" id="header" name="header" required maxlength="25">
                    <h3>Cuerpo</h3><textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden" id="rawData" maxlength="255" name="rawData" required></textarea>
                    <?php
                    /*
                     *onsubmit="return request2server2(this.id, 'archiveUpload.php')"
                     *
                     */

                    if(isset($_GET["idQ"]))
                    {
                        ?>
                    <div id="urls">
                        <h3>Link</h3>
                        <?php
                            $question=getLastQuestion();
                            $question2=$question->id;
                            $archives=getAllByQuestion($question2);
                            foreach ($archives as $key=>$value)
                            {
                                $url= substr($value['url'],2);
                                ?>
                                <a href="<?php echo $url ?>"><?php echo $url?> </a><br>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                    }
                    else
                    {
                        ?>
                        <h3>Subir archivo</h3>

                            <input type="file" name="file2">


                        <div id="errorUpload">

                        </div>
                        <?php

                    }
                    ?>
                    <h3>Categoría</h3><input type="text" id="category" name="category" placeholder="Escribe o selecciona catergoría" maxlength="7">
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
                    <input type="submit" id="subQuestion" name="subQuestion" value="Formular pregunta">
                </div>
            </form>


            <?php


            if (isset($_POST["subQuestion"])) {
                $idCategory = selectIdCategory($_POST["category"]);
                if ($idCategory == null) {
                    insertCategory($_POST["category"]);
                    $idCategory = selectIdCategory($_POST["category"]);
                }
                insertQuestion($_POST["header"], $_POST["rawData"], date("m-d-Y H:i:s"), $_SESSION["user"]["userId"], $idCategory);
            }

            if (isset($_POST["subQuestion"])) {
                $question=getLastQuestion();
                $question2=$question->id;
                //var_dump(die($question2));
                update($question2);
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
                        $votesAns = selectCountFavouritesAns($rowQ["id"]);
                        $userName = selectNameProfile($rowQ["id_profile"]);
                        $usrId = null;
                        if(isset($_SESSION['user'])){
                            $usrId = $_SESSION['user']["userId"];
                        }
                        $favAns = selectFavouriteUserAnswer($usrId, $rowQ["id"]);
                        if($favAns == 1){
                            $target = '"server/favouriteAnswer.php?action=unfav"';
                            $butt = "Quitar";
                        }else{
                            $target = '"server/favouriteAnswer.php?action=fav"';
                            $butt = "Votar";
                        }
                        echo "<div><div id='v".$rowQ['id']."' class='votes'>Votos<br>".$votesAns."<br><form id='".$rowQ['id']."favouriteAnswerForm' 
                            onsubmit='return request2server(this.id,$target)'>
                            <input type='hidden' name='ansId' value='".$rowQ['id']."'>
                            <input type='hidden' name='profId' value='".$usrId."'>
                            <input type='hidden' name='divId' value='v".$rowQ["id"]."'>
                            <button type='submit'>".$butt."</button></form></div>".
                        "<div class='answerTxt'><h3>".$userName."</h3>"."<p>".$rowQ["raw_data"]."</p></div>"
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
        function textAreaAdjust(o) {
          o.style.height = "1px";
          o.style.height = (25+o.scrollHeight)+"px";
        }

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