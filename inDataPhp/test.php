<?php
include 'header.php';
include 'comm.php';
// $sql = $_POST['sql'];
// print_r($_SESSION['token']);
// $d = new database();
// $d->select($sql);
// $d->select("SELECT * FROM person");
// $_SESSION['token'] = '555';
$object = (object) [
  'sessionToken' => $_SESSION['token'],
  'session_id' => session_id(),
  'mToken' => $mToken,
  // 'token' => Request::header('token'),
  'token' => $_SERVER['HTTP_TOKEN'],
  'status' => 20
];
// if($_SESSION['token'] != $mToken) {
//   $object = (object) [
//     'status' => 40
//   ];
// }
print_r(json_encode($object));
?>