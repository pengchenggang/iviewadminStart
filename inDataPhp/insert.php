<?php
include 'header.php';
include 'comm.php';

$username = $_POST['username'];
$userpass = $_POST['userpass'];
$sql = "INSERT INTO person (username, userpass) VALUES ('$username', '$userpass')";
 
$d = new database();
$d->update($sql);
?>