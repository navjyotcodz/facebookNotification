<?php
include('database.inc.php');
session_start();
$uid=$_SESSION['UID'];
mysqli_query($con,"update messages set status=1 where to_id=$uid");
?>