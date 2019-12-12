<?php
include 'header.php';
include 'comm.php';
$sql = $_POST['sql'];
// print_r($_SESSION['token']);
// print_r('34321');
$d = new database();
$d->select($sql);
// $d->select("SELECT * FROM person");
?>