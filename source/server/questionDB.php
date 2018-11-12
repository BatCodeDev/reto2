<?php
	include_once "connection.php";

	//SELECT RECIENTE QUESTION TO INDEX
	function selectRecientQuestion(){
		$dbh = connect();
		$stmt = $dbh -> prepare("SELECT * FROM question ORDER BY date DESC LIMIT 3");
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