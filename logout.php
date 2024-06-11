<?php
session_start();
unset($_SESSION['UID']);
header('location:index.php');
die();

?>