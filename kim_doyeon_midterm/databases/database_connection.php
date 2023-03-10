<?php
		$dsn = "mysql:host=localhost:8888;dbname=db_users;charset=utf8";
		try {
		  $connection = new PDO($dsn, 'root', 'root');
		} catch (Exception $e) {
		  error_log($e->getMessage());
		  exit('unable to connect');
		}

		$stmt = $connection->prepare("SELECT * FROM tbl_users");
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		print_r($arr);
		$stmt = null;

?>