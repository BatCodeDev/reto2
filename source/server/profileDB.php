<?php

	function selectIdProfile($user){
		$dbh = connect();
		$data = array("user" => $user);
		$stmt = $dbh -> prepare("SELECT id from profile where user = :user");
		$stmt -> execute($data);

		$id = null;
		while($row = $stmt->fetch()) {
			$id =  $row['id'];
		}
		$dbh = null;
		return $id;
	}

	function selectDataProfile($id){
		$dbh = connect();
		$data = array("id" => $id);
		$stmt = $dbh -> prepare("SELECT * from profile where id = :id");
		$stmt -> execute($data);

		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;
	}

	function selectVerifyEmailProfile($dbh, $email){
		$data = array("email" => $email);
		$stmt = $dbh -> prepare("SELECT email from profile where email = :email");
		$stmt -> execute($data);

		$email = null;
		while($row = $stmt->fetch()) {
			$email =  $row['email'];
		}
		return $email;
	}


	function selectPasswordProfile($user){
		$dbh = connect();
		$data = array("user" => $user);
		$stmt = $dbh -> prepare("SELECT pass from profile where user = :user");
		$stmt -> execute($data);

		$password = null;
		while($row = $stmt->fetch()) {
			$password =  $row['pass'];
		}
		$dbh = null;
		return $password;
	}
	
	//REGISTRY USER
	function insertProfile($dbh, $email, $name, $surname, $user, $password){
		//INSERT PROFILE
		$data = array("email" => $email,  
						"name" => $name, 
						"surname" => $surname,
						"user" => $user, 
						"password" => $password);

		$stmt = $dbh -> prepare("INSERT INTO profile (name, surname, email, user, pass) values (:name, :surname, :email, :user, :password)");

		$stmt -> execute($data);
	}

?>