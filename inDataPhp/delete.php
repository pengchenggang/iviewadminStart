<?php
include 'header.php';
include 'comm.php';

$id = $_POST['id'];
$sql = "DELETE FROM person WHERE id = '$id'";

$d = new database();
$d->update($sql);
 
?>