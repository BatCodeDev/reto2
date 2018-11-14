<?php
	include_once "connection.php";

	//SELECT RECIENTE QUESTION TO INDEX
	function selectRecientAnswer($idQ){
		$dbh = connect();
		$data = array("idQ" => $idQ);
		$stmt = $dbh -> prepare("SELECT * FROM answer where id_question = :idQ ORDER BY dateA DESC");
		$stmt -> execute($data);

		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;
	}


	function insertAnswer($rawData, $dateA, $idProfile, $idQuestion){
        $dbh = connect();
		//INSERT PROFILE
		$data = array("rawData" => $rawData,  
						"dateA" => $dateA,
						"idProfile" => $idProfile,
						"idQuestion" => $idQuestion);

		$stmt = $dbh -> prepare("INSERT INTO answer (raw_data, dateA, id_profile, id_question) values (:rawData, :dateA, :idProfile, :idQuestion)");

		$stmt -> execute($data);
        $dbh = null;
	}


	/*


	function selectIdProfile($dbh, $email){

		$data = array("email" => $email);
		$stmt = $dbh -> prepare("SELECT id from profile where email = :email");
		$stmt -> execute($data);

		$id = null;
		while($row = $stmt->fetch()) {
			$id =  $row['id'];
		}
		return $id;

	}
	
	//REGISTRY USER
	function insertRegistryUser($dbh, $email, $user, $password, $name, $surname){
		//INSERT PROFILE
		$data = array("email" => $email,  
						"name" => $name, 
						"surname" => $surname);

		$stmt = $dbh -> prepare("INSERT INTO profile (name, surname, email) values (:name, :surname, :email)");

		$stmt -> execute($data);


		//SELECT PROFILE ID TO FOREIGN KEY
		$id = selectIdProfile($dbh, $email);


		//INSERT LOGIN USER
		if ($id !=null) {
			# code...
		}
		$data = array("user" => $user, 
						"password" => $password,
						"id" => $id);

		$stmt = $dbh -> prepare("INSERT INTO login (user, pass, id_profile) values (:user, :password, :id)");

		$stmt -> execute($data);

	}*/

?>