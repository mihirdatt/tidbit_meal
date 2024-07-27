<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM customer_tbl WHERE u_id = '".$_GET['customer_del']."'");
header("location:all_customer.php");  

?>
