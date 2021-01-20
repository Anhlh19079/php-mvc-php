<?php
require_once('controllers/base_controller.php');
require_once('models/user.php');

class UsersController extends BaseController {
  function __construct() {
    $this->folder = 'users';
  }

  // public function index() {
  //   $users = User::getAll();
  //   $data = array('users' => $users);
  //   $this->render('index', $data);
  // }

  public function showUser() {
    if (isset($_SESSION['cust_id'])) {
    $user = User::find($_SESSION['cust_id']);
    if ($user === false ) {
      echo 'loixxxxx';
    }
    $data = array('user' => $user);
    $this->render('user_details', $data);
    }
    
  }

  public function insertUser(){
    // $result =[];
    if(isset($_POST['cust_name'])&&isset($_POST['cust_email'])&&isset($_POST['cust_address'])&&isset($_POST['cust_password']))
    
    $hashed_passcode = md5($_POST['cust_password']); 
    
      $result = User::insert($_POST['cust_name'],$_POST['cust_email'],$_POST['cust_address'],$hashed_passcode);
      $data = array('result' => $result);
      $this->render('user_register',$data);
    
  }
  public function update()
  {
      $result = '';
      if (isset($_POST['update-name'])) {
          $result =  User::update($_POST['update-address'], $_POST['update-name']);
      }
      
      if($result && $result === 'ok'){
          $result = "Cập nhật thành công!";
      }
      
      $this->render('user_update', array('update' => $result));
  }
  // public function loginUser(){
  //   $cust_email= $_POST['cust_email'];
  //   $hashed_passcode = md5($_POST['cust_password']); 
    
  //   $loginUser = User::login($cust_email,$hashed_passcode);
  //   $data = array('loginUser' => $loginUser);
  //   $this->render('welcome',$data);
  // }
}
?>