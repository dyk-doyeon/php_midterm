<?php

require_once('./models/database.php');
require_once('./models/model.php');

class User{

    
    private $UserModel;

    public function __construct() {
        $this->UserModel = new UserModel(); 
		$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=utf8";
		try {
		  $this->connection = new PDO($dsn, DB_USER, DB_PASS);
		} catch (Exception $e) {
		  error_log($e->getMessage());
		  exit('unable to connect');
		}
	}

    public function loadViews(){
      require_once('./views/header.php');
      require_once('./views/nav.php');
      require_once('./views/search.php');

      if(isset($_GET['user_id']) && !isset($_GET['task'])) {
        $users = $this->UserModel->getOne($_GET['user_id']);
        include('./views/user.php');
        } 
        
        else if(isset($_GET['str'])) {
          $employees = $this->model->search('user_fname',$_GET['str']);
          $rows = $this->model->rows;
          require_once('./views/users.php');
        } 
        
        else if(isset($_GET['task'])){
          if($_GET['task']=='create'){
            require_once('./views/user_form.php');
            if(isset($_POST['submit'])){
              $formvalues = array(
                $_POST['fname'],
                $_POST['lname'],
                $_POST['username'],
                $_POST['password'],
                // $_POST['photo'],
                $_POST['role']
              );
              $users = $this->UserModel->newUser($formvalues);
              header("location:index.php");
            }
          } 
          
          else if($_GET['task']=='delete'){
              $users = $this->UserModel->deleteUser($_GET['user_id']);
              header("location:index.php");
              echo "Deleted Successfully";
          } 
          
          else if($_GET['task']=='update'){
              include('./views/update_form.php');

              if(isset($_POST['submit'])){
                $formvalues = array(
                  $_POST['user_fname'],
                  $_POST['user_lname'],
                  $_POST['user_username'],
                  $_POST['user_password'],
                  // $_POST['user_photo'],
                  $_POST['user_role'],
                  $_GET['user_id']
                );
              $users = $this->UserModel->updateUser($formvalues);
              header("location:index.php");
              echo "Updated Successfully";
            }
          }
        } else {
            $users = $this->UserModel->getAll();
            $rows = $this->UserModel->rows;
            include('./views/users.php');    
        }
        require_once('./views/create_btn.php');
        require_once('./views/footer.php');
    }
}

?>