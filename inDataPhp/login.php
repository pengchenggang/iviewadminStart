<?php
include 'header.php';
include 'comm.php';
$username = $_POST['username'];
// $userpass = $_POST['userpass'];
$userpass = $_POST['password'];
// $sql = `SELECT * FROM person where username='$username' and userpass='$userpass'`
$d = new database();
// $d->select($sql);
$d->login($username,$userpass);
// $d->select("SELECT * FROM person");

// $object = (object) [
//   // 'data' => $arr1,
//   // "token" => $token,
//   'data' => (object) [
//     "token" => '111222'
//   ],
//   "status" => 20
// ];

// print_r(json_encode($object));
?>