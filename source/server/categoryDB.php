<?php
	include_once "connection.php";
	function selectAllCategory(){
		$dbh = connect();
		$stmt = $dbh -> prepare("SELECT name FROM category LIMIT 8");
		$stmt -> execute();

		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;
	}

	function selectIdCategory($name){
		$dbh = connect();
		$data = array("name" => $name);
		$stmt = $dbh -> prepare("SELECT id from category where name = :name");
		$stmt -> execute($data);

		$id = null;
		while($row = $stmt->fetch()) {
			$id =  $row['id'];
		}
		$dbh = null;
		return $id;
	}

	function insertCategory($name){
        $dbh = connect();
		//INSERT CATEGORY
		$data = array("name" => $name);

		$stmt = $dbh -> prepare("INSERT INTO category (name) values (:name)");

		$stmt -> execute($data);
        $dbh = null;
	}
?>