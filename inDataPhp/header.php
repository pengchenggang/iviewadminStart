<?php
error_reporting(0);//加上error_reporting(0);就不会弹出警告了  
// header("Content-type:text/html;charset=utf-8");

// 为了能用 $_POST
header('Content-Type:application/x-www-form-urlencoded; charset=utf-8');

// header('Content-Type:application/json; charset=utf-8');
header("Access-Control-Allow-Origin:*");

header('Access-Control-Allow-Methods:POST');

header('Access-Control-Allow-Headers:x-requested-with, content-type');
ini_set("error_reporting","E_ALL & ~E_NOTICE");

?>