<?php
require_once('db_connection.php');

    //code...
$db = DBConnection::getInstance();
//Getform input
$cust_email = $_POST['cust_email'];
//GEt resultfrom SELECT query
$query = "SELECT * FROM customers WHERE cust_email = '".$cust_email."'";
$result = $db->query($query);
// $count = $result->num_rows;

$rows = $result->fetch();
if ($rows>=1) {
    echo "true";
}else {
    //if it did not run ok.
    echo  "false";
}


//close connection

?>