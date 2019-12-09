<?php
include 'header.php';
include 'comm.php';

$id = $_POST['id'];
$username = $_POST['username'];
$userpass = $_POST['userpass'];

$sql = "UPDATE person SET 
username='$username',
userpass='$userpass'
 WHERE id = '$id'";

$d = new database();
$d->update($sql);

?>