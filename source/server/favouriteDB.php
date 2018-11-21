
<?php
	include_once "connection.php";
	function selectFavouriteQuestion(){
		$dbh = connect();
		$stmt = $dbh -> prepare("SELECT id_question FROM favourite GROUP BY id_question ORDER BY COUNT(id_question) DESC LIMIT 3");
		$stmt -> execute();

		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;
	}

	function selectFavouriteUserQuestion($idProfile){
		$dbh = connect();
		$stmt = $dbh -> prepare("SELECT id_question from favourite where id_profile =".$idProfile);
		$stmt -> execute();
		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;

	}


    function selectCountFavourites($idQuestion){
        $dbh = connect();
        $stmt = $dbh -> prepare("SELECT COUNT(id_question) as votes FROM favourite where id_question = :idQ");
        $stmt -> execute(
            array(
                "idQ"=>$idQuestion
            )
        );
        $resul = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        return $resul["votes"];

    }


	function insertFavouriteQuestion($idProfile, $idQuestion){
        $dbh = connect();
		//INSERT CATEGORY
		$data = array("idProfile" => $idProfile,
						"idQuestion" => $idQuestion,
						"type" => "Q",
						);

		$stmt = $dbh -> prepare("INSERT INTO favourite (id_profile, id_question, type) values (:idProfile, :idQuestion, :type)");

		$stmt -> execute($data);
        $dbh = null;
	}

	function deleteFavouriteQuestion($idProfile, $idQuestion){
        $dbh = connect();
		//INSERT CATEGORY
		$stmt = $dbh -> prepare("DELETE FROM favourite WHERE id_profile = ".$idProfile." && id_question = ".$idQuestion);
		$stmt -> execute();
        $dbh = null;
	}
?>