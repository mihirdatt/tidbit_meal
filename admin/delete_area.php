<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM area_tbl WHERE ar_id = '".$_GET['area_del']."'");
header("location:add_area.php");  

?>
