<?php
require_once('controllers/base_controller.php');
require_once('controllers/users_controller.php');
// require_once('include/header.php');
class PagesController extends BaseController {

  function __construct() {
    $this->folder = 'pages';
  }

  public function check($name,$email,$address,$nameErr,$emailErr,$addErr,$passErr,$repassErr,$success) {
    $data = array(
      // $username = $name,
      // $useremail = $email,
      // $useradd = $address,
      // $addError = $addErr,
      // $passError = $passErr,
      // $repassError = $repassErr,
      // $nameError = $nameErr,
      // $emailError = $emailErr,
      // $Success = $success,
    );
    
  }
  // public function insertUser() {
  //   $name = $_POST['cust_name'];
  //   $email = $_POST['cust_email'];
  //   $result = User::insert($name, $email);
  //   $data = array('result' => $result);
  //   $this->render('user_form', $data);
  // }
public function home(){
  // $user_controller = new UsersController;
  $data = array(
    
    'result' => "aaaa"

  );

    

  $this->render('home',$data);
}

  
  public function error() {
    $this-> render('error');
  }
}
?>