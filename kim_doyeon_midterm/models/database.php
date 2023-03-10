<?php

require_once("./includes/config.php");

class UserDatabase {  // our base model class we will extend

	protected $connection;
	protected $table;
	public $rows;
	protected $fields = array();
	

	public function __construct() {
		$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=utf8";
		try {
		  $this->connection = new PDO($dsn, DB_USER, DB_PASS);
		} catch (Exception $e) {
		  error_log($e->getMessage());
		  exit('unable to connect');
		}
	}
	
	public function getAll() {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table);
		$stmt->execute();
		$this->rows = $stmt->rowCount();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		return $arr;
		$stmt = null;
	}
	
	public function getOne($user_id) {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table." WHERE user_id = ?");
		$stmt->execute([$user_id]);
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No results returned.');
		return $arr;
		$stmt = null;
	}

  public function search($fld, $str) {
		$stmt = $this->connection->prepare("SELECT * FROM ".$this->table." WHERE ".$fld." LIKE ?");
		$stmt->execute(["%$str%"]);
		$this->rows = $stmt->rowCount();
		$arr = $stmt->fetchAll(PDO::FETCH_OBJ);
		if(!$arr) exit('No Results Found.');
		return $arr;
		$stmt = null;
	}

	protected function create($statement,$values) {
		$stmt = $this->connection->prepare("INSERT INTO ".$this->table.$statement);
		$stmt->execute($values);
		$stmt = null;
	}

	protected function update($statement,$values) {
		$stmt = $this->connection->prepare("UPDATE ".$this->table.$statement);
		$stmt->execute($values);
    echo "update from database";
		$stmt = null;
	}

	protected function delete($user_id) {
		$stmt = $this->connection->prepare("DELETE FROM ".$this->table." WHERE user_id=?");
		$stmt->execute([$user_id]);
		$stmt = null;
	}


}

?>