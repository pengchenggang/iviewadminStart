<?php
$mSession = '';
$mToken = '';
if($_SERVER['HTTP_TOKEN'] != '') {
  $tokenTT = explode('-',$_SERVER['HTTP_TOKEN']);
  $mSession = $tokenTT[0];
  $mToken = $tokenTT[1];
}
session_id($mSession);
session_start();
error_reporting(0);//加上error_reporting(0);就不会弹出警告了  
// header("Content-type:text/html;charset=utf-8");

// 为了能用 $_POST
header('Content-Type:application/x-www-form-urlencoded; charset=utf-8');

// 接收 同意带cookie
header('Access-Control-Allow-Credentials: true');

// header('Content-Type:application/json; charset=utf-8');
// 不能是*
header("Access-Control-Allow-Origin:http://localhost:8081");

header('Access-Control-Allow-Methods:GET, POST, PUT,DELETE,POSTIONS');

header('Access-Control-Allow-Headers:x-requested-with, content-type,token');
ini_set("error_reporting","E_ALL & ~E_NOTICE");

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
  // session_write_close();
  session_commit();
  exit();
}

if($_SESSION['token'] != $mToken) {
  $object = (object) [
    'status' => 40
  ];
  print_r(json_encode($object));
  exit();
}

// $token = Request::header('Token');

?>