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

	function selectVerifyEmailProfile($email){
        $dbh = connect();
		$data = array("email" => $email);
		$stmt = $dbh -> prepare("SELECT email from profile where email = :email");
		$stmt -> execute($data);

		$email = null;
		while($row = $stmt->fetch()) {
			$email =  $row['email'];
		}
        $dbh = null;
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
	function insertProfile($email, $name, $surname, $user, $password){
        $dbh = connect();
		//INSERT PROFILE
		$dbh = connect();
		$data = array("email" => $email,  
						"name" => $name, 
						"surname" => $surname,
						"user" => $user, 
						"password" => $password);

		$stmt = $dbh -> prepare("INSERT INTO profile (name, surname, email, user, pass) values (:name, :surname, :email, :user, :password)");

		$stmt -> execute($data);
        $dbh = null;
	}
function updateProfile($id, $name, $surname){
    $dbh = connect();
    $data = array("name" => $name,
        "surname" => $surname,
        "id" => $id);
    $stmt = $dbh -> prepare("UPDATE profile SET NAME = :name, SURNAME = :surname WHERE ID = :id");
    $stmt -> execute($data);
    $dbh = null;
}
function updateImg($id, $img){
    $dbh = connect();
    $stmt = $dbh -> prepare("UPDATE profile SET photo = :img WHERE ID = :id");
    $stmt -> execute(array(
        "img" => $img,
        "id" => $id
        ));
    echo $stmt->rowCount();
    $dbh = null;
}
?>