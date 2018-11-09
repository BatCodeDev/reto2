<?php
	//NO EMAIL DUPLICATE
	function selectIdLogin($dbh,$user){
		$data = array("user" => $user);
		$stmt = $dbh -> prepare("SELECT id from login where user = :user");
		$stmt -> execute($data);

		$id = null;
		while($row = $stmt->fetch()) {
			$id =  $row['id'];
		}
		return $id;
	}

	function selectPasswordLogin($dbh, $user){
		$data = array("user" => $user);
		$stmt = $dbh -> prepare("SELECT pass from login where user = :user");
		$stmt -> execute($data);

		$password = null;
		while($row = $stmt->fetch()) {
			$password =  $row['pass'];
		}
		return $password;
	}

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

	}

?>