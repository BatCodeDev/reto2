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
?>