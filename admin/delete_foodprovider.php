<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM foodprovider_tbl WHERE fp_id = '".$_GET['fp_del']."'");
header("location:all_foodprovider.php");  

?>
