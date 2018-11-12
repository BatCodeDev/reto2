
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
?>