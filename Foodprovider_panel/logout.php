<?php
session_start();
session_destroy();
$url = '/tidbit/index.php';
header('Location: ' . $url);

?>