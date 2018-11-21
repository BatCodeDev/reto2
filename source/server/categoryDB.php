<?php
	include_once "connection.php";
	function selectIndexCategory(){
		$dbh = connect();
		$stmt = $dbh -> prepare("SELECT name FROM category LIMIT 8");
		$stmt -> execute();

		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;
	}

	function selectAllCategory(){
		$dbh = connect();
		$stmt = $dbh -> prepare("SELECT name FROM category");
		$stmt -> execute();

		$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$dbh = null;
		return $resul;
	}

	function selectCategoryById($id){
		$dbh = connect();
		$data = array("id" => $id);
		$stmt = $dbh -> prepare("SELECT name from category where id = :id");
		$stmt -> execute($data);

		$name = null;
		while($row = $stmt->fetch()) {
			$name =  $row['name'];
		}
		$dbh = null;
		return $name;
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