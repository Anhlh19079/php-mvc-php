<?php 
require_once('db_connection.php');

$db = DBConnection::getInstance();
$cust_email_login = $_POST['cust_email_login'];
$cust_password_login = $_POST['cust_password_login'];
$query = 'SELECT * FROM customr WHERE cust_email = "'.$cust_email_login.'" ';
$stmt = $db->query($query);
$res  = $stmt->fetch();
if (!$res) {
    echo 'Email không tồn tại';
    // return;
}
$md5 = md5($cust_password_login);
$query = $query . ' AND user_password = "' . $md5 . '"';
$stmt = $db->query($query);
$res  = $stmt->fetch();
if (!$res) {
    echo 'Sai mật khẩu!';
    // return;
}

echo 'ok';


?>
    