<?php
session_start();
unset($_SESSION["cust_id"]);
unset($_SESSION["cust_name"]);
unset($_SESSION["cust_email"]);
unset($_SESSION["cust_address"]);
unset($_SESSION["cust_status"]);
header("Location: index.php");
?>