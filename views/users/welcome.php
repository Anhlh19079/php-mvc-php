<?php 
// session_start();
    if (isset($_SESSION['cust_email'])) {
        $name = $_SESSION['cust_name'];
        $email =$_SESSION['cust_email'];
        echo "Welcome $name".'<br>'.$email;
        
    }
    else {
        echo "Get away";
        echo $loginUser;
    }
?>
