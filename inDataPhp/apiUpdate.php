<?php
include 'header.php';
include 'comm.php';

$sql = $_POST['sql'];

$d = new database();
$d->update($sql);

?>