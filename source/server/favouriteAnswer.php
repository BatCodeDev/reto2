<?php
    require("favouriteDB.php");
    $ansId = $_POST["ansId"];
    $profId = $_POST["profId"];
    $divId = $_POST["divId"];
    echo '{"reload":"'.$divId.'"}';
    insertFavouriteAnswer($profId, $ansId);
?>