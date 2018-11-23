<?php
    require("favouriteDB.php");
    $ansId = $_POST["ansId"];
    $profId = $_POST["profId"];
    $divId = $_POST["divId"];
    echo '{"reload":"'.$divId.'"}';
    if($_GET["action"]=="fav") {
        insertFavouriteAnswer($profId, $ansId);
    }else{
        deleteFavouriteAnswer($profId, $ansId);
    }
?>