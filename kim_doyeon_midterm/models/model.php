<?php

require_once('database.php');

class UserModel extends UserDatabase {

public function __construct() {
	parent::__construct();
	$this->table = 'tbl_users';
	$this->fields = "user_fname,user_lname,user_username,user_password";
}

public function newUser($formvalues) {
	$statement = "(" . $this->fields . ") VALUES (?,?,?,?)";
	$this->create($statement,$formvalues);
	
}

public function updateUser($formvalues) {
	$statement = " SET user_fname=?,user_lname=?,user_username=?,user_password=? WHERE user_id=?";
	$this->update($statement,$formvalues);
}

public function deleteUser($user_id) {
	$this->delete($user_id);
}


}

?>