<?php
	include_once "connection.php";

	//SELECT RECIENTE QUESTION TO INDEX
	function selectRecientQuestion(){
		$dbh = connect();
		$stmt = $dbh -> prepare("SELECT * FROM question ORDER BY dateQ DESC LIMIT 5");
		$stmt -> execute();

		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;
	}

	//SELECT RECIENTE QUESTION TO INDEX
	function selectQuestionById($id){
		$dbh = connect();
		$data = array("id" => $id);
		$stmt = $dbh -> prepare("SELECT * FROM question where id = :id");
		$stmt -> execute($data);

		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;
	}

	function selectAllQuestionByIdProfile($idProfile){
		$dbh = connect();
		$data = array("id" => $idProfile);
		$stmt = $dbh -> prepare("SELECT * FROM question where id_profile = :id ORDER BY dateQ DESC");
		$stmt -> execute($data);

		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;
	}

	function selectQuestionByCategory($idCategory){
		$dbh = connect();
		$data = array("idCategory" => $idCategory);
		$stmt = $dbh -> prepare("SELECT * FROM question where id_category = :idCategory");
		$stmt -> execute($data);

		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;
	}

	//INSERT QUESTION
	function insertQuestion($header, $rawData, $date, $idProfile, $idCategory){
		$dbh = connect();
		echo $header, $rawData, $date, $idProfile, $idCategory;
		$data = array("header" => $header,  
						"rawData" => $rawData, 
						"dateQ" => $date,
						"idProfile" => $idProfile,
						"idCategory" => $idCategory);

		$stmt = $dbh -> prepare("INSERT INTO question (header, raw_data, dateQ, id_profile, id_category) values (:header, :rawData, :dateQ, :idProfile, :idCategory)");

		$stmt -> execute($data);
		$dbh = null;
	}
function searchQuestionHeader($data){
    $dbh = connect();

    $stmt = $dbh -> prepare("SELECT * FROM question where header like '%$data%'");

    $stmt -> execute();
    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    return $resul;
}
function selectOwnerOfQuestion($data){
    $dbh = connect();

    $stmt = $dbh -> prepare("SELECT id_profile FROM question where id = :id");

    $stmt -> execute(array(
        "id" => $data
    ));
    $resul = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    return $resul["id_profile"];
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