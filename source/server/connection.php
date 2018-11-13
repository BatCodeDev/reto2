<?php
	function connect(){
		try {
			$dbh = new PDO("mysql:host=localhost;dbname=retodos", "root");
			return $dbh;
		}catch(PDOException $e) {
			echo $e -> getMessage();
		}
	}

	function closeConnect($dbh){
		$dbh = null;
	}



?>