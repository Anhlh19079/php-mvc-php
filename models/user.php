<?php
class User  
{
  public $cust_id;
  public $cust_name;
  public $cust_email;

  function __construct($cust_id, $cust_name, $cust_email)
  {
    $this->cust_id = $cust_id;
    $this->cust_name = $cust_name;
    $this->cust_email = $cust_email;
  }
 
  static function getAll()
  {
    $list = [];
    $db = DBConnection::getInstance();
    $req = $db->query('SELECT * FROM customers');

    foreach ($req->fetchAll() as $item) {
      $list[] = new User($item['cust_id'], $item['cust_name'], $item['cust_email']);
    }

    return $list;
  }

  static function find($cust_id)
  {
    $db = DBConnection::getInstance();
    $req = $db->prepare('SELECT * FROM customers WHERE cust_id = :cust_id');
    $req->execute(array('cust_id' => $cust_id));
    $item = $req->fetch();
    if (isset($item['cust_id'])) {
      return new User($item['cust_id'], $item['cust_name'], $item['cust_email']);
    }
    return null;
  }

  static function insert($cust_name, $cust_email,$cust_address,$hashed_passcode)
  {
    $db = DBConnection::getInstance();
    if (isset($cust_name) && isset($cust_email)&&isset($cust_address) && isset($hashed_passcode)) { 
      $req = $db->prepare('INSERT INTO customers (cust_name,cust_email,cust_address,cust_password,cust_status) VALUES ( :cust_name, :cust_email,:cust_address,:cust_password,1)');
      $re = $req->execute(array('cust_name' => $cust_name, 'cust_email' => $cust_email, 'cust_address' => $cust_address, 'cust_password' => $hashed_passcode));
      if ($re) {
        return "Sing Up Successfull!";
        // header('localhost: asmcp');
            }else{
              return "Has error !!!";
      }
    }
  }

  static function login($cust_email,$cust_password){
    $db=DBConnection::getInstance();
    $req = $db->query('SELECT * FROM customers WHERE cust_email = "'.$cust_email.'" ');
    // echo $cust_password;
    $item = $req->fetch();
    // echo 'Pass hashedcode: '.$item['cust_password'];
    

    if(isset($item['cust_email']) &&  $item['cust_password'] == $cust_password){
      
      if(session_id() ===''){
        session_start();
    }
        $_SESSION['cust_name']=$item['cust_name'];
        $_SESSION['cust_id']=$item['cust_id'];
        $_SESSION['cust_email']=$item['cust_email'];
        $_SESSION['cust_address']=$item['cust_address'];
        $_SESSION['cust_status']=$item['cust_status'];
        // header('location: views/users/welcome.php');
        return true;
          // return new User($item['cust_id'],$item['cust_name'],$item['cust_email']);
    }else{
      return false;
      // return "Email or Password is incorrect!!!";
    }
  }

  public static function update($cust_address,$cust_name)
  {
      session_start();
      $db = DBConnection::getInstance();
      $query = 'UPDATE customers SET cust_name= :cust_name,cust_address = :cust_address WHERE cust_id = :cust_id AND cust_email = :cust_email';
      $stmt = $db->prepare($query);
      $res = $stmt->execute(array('cust_name' => $cust_name, 'cust_address' => $cust_address,'cust_email' => $_SESSION['cust_email'],'cust_id' => $_SESSION['cust_id']));
      if ($res) {
        $_SESSION['cust_name'] = $cust_name;
        $_SESSION['cust_address'] = $cust_address;
          return 'ok';
      }
      return 'fail';
  }
//   static function check_email_exits($cust_email,$cust_password){
//     $db = DBConnection::getInstance();
// //Getform input
// $cust_email = $_POST['cust_email'];
// $cust_password = $_POST['cust_password'];
// //GEt resultfrom SELECT query
// $query = "SELECT cust_name,cust_email FROM customers WHERE cust_email = '".$cust_email."'";
// $result = $db->query($query);
// $count = $result->num_rows;

// $rows = $result->fetch(MYSQLI_NUM);
// if ($count>=1) {
//     echo "true";
// }else {
//     //if it did not run ok.
//     echo  "false";
// }
//   }
    // static function loginUser($email) {
    // $db=DBConnection::getInstance();
    // $stmt = $db->prepare('SELECT * FROM users WHERE email= :email');

    // $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    // $stmt->execute();
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
      
    //   if(isset($row['email'])){
    //     session_start();
    //     $_SESSION['name']=$row['name'];
    //     $_SESSION['id']=$row['id'];
    //     $_SESSION['email']=$row['email'];

    //     header('location: views/users/welcome.php');
    //       //return new User($item['id'],$item['name'],$item['email']);
    //   } 
    //   else {
    //     return "Wrong username or password.";
    //     die();
    //   }
    // }
  }
  
  

  