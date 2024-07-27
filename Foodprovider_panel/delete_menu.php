<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM fooditem_tbl WHERE fi_id = '".$_GET['menu_del']."'");
header("location:all_menu.php");  

?>
