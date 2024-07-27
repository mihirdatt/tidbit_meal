<?php

session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
$uid = $_SESSION['user_id'];

if(isset($_POST['submit'] )) {
    $a = $_POST['username'];
    $b = $_POST['f_name'];
    $c = $_POST['l_name'];
    $d = $_POST['email'];
    $e = $_POST['phone'];
    $f = $_POST['password'];
    $g = $_POST['address'];

       
    $sql_2 = "UPDATE `customer_tbl` SET `username`= '$a',`f_name`= '$b',`l_name`= '$c',`email`='$d',`phone`='$e',`password`='$f',`address`='$g' WHERE u_id ='$uid'";
        
    $res = mysqli_query($db,$sql_2);
    if($res){

    	// echo "Done";
            
    }
    else{
        echo mysqli_error();
    }
    header('location: index.php');
}
   

?>

	