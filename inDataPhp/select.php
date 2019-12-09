<?php
include 'header.php';
include 'comm.php';
$d = new database();
$d->select("SELECT * FROM person");
?>