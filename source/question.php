<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">
    <style type="text/css">
        #content{
            background-color: lightblue;
            margin: 0 auto;
            width: 280px;
        }

        .divQuestion{
            background-color: white;
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
                    <input type="submit" id="subQuestion" name="subQuestion" value="Formular pregunta">
                </div>
            </form>

            <?php
                if (isset($_GET["idQ"])) {
                    echo "<form method='POST'>
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
            

            if (isset($_POST["subQuestion"])) {
                $idCategory = selectIdCategory($_POST["category"]);
                if ($idCategory == null) {
                    insertCategory($_POST["category"]);
                    $idCategory = selectIdCategory($_POST["category"]);
                }
                insertQuestion($_POST["header"], $_POST["rawData"], date("m-d-Y H:i:s"), $_SESSION["user"]["userId"], $idCategory);
                header("Location: index.php");
            }

            if (isset($_POST["subAnswer"])) {
                insertAnswer($_POST["rawDataA"], date("m-d-Y H:i:s"), $_SESSION["user"]["userId"], $_GET["idQ"]);
                header("Location: question.php?idQ=".$_GET["idQ"]);
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