<?php
include_once('db.php');
include_once('functions.php');
?>
<?php 
$_SESSION['u_id'] = null;
session_destroy();
$o = "logout successfully";
header('location:login.php?='.urlencode($o));
?>