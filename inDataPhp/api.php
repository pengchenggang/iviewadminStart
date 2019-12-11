<?php
include 'header.php';
include 'comm.php';
$sql = $_POST['sql'];
// print_r('$sql');
$d = new database();
$d->select($sql);
// $d->select("SELECT * FROM person");
?>