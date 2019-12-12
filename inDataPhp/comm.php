<?php
class database {
  var $servername = "127.0.0.1";
  var $username = "root";
  var $password = "123456";
  var $dbname = "database";
  var $conn;

  function openConn() {
    // 创建连接
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    
    // Check connection
    if ($this->conn->connect_error) {
      die("连接失败: " . $this->conn->connect_error);
    } 
    mysqli_query($this->conn, "set names utf8"); //**设置字符集***
  }

  function closeConn() {
    $this->conn->close();
  }

  function __construct() {
    $this->openConn();
  }

  function __destruct() {
      $this->closeConn();
  }

  function select($sqlStr)
  {
    // $sql = "SELECT * FROM person";
    $sql = $sqlStr;
    $result = $this->conn->query($sql);
    
    $arr1 = array();
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
          array_push($arr1, $row);
        }
    }

    // return $arr1;

    $object = (object) [
      'kkk' => $_SESSION['token'],
      'data' => $arr1,
      "status" => 20
    ];
    
    print_r(json_encode($object));
  }

  function login($username,$userpass) {
    // session_start();
    // $sql = "SELECT * FROM person";
    // $sql = "SELECT * FROM person ";
    $sql = "SELECT * FROM person where username='{$username}' and userpass='{$userpass}'";
    // console.log($sql)
    $result = $this->conn->query($sql);
    
    $arr1 = array();
    $token = '';
    // $status = 20;
    $object = (object) ['status' => 20];
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
          array_push($arr1, $row);
        }

        $_SESSION['token']='122token';
        // session_commit();
        // 设置 token
        // $object->data->token = '11' . 'jk' . $arr1[0]['username'] . $arr1[0]['userpass'] . $_SESSION['token'] . session_id();
        $object->data->token = session_id() . '-' . $_SESSION['token'];
        // $object->data->token = "SELECT * FROM person where username='{$username}' and userpass='{$userpass}'";
        // $object->list = $arr1;
       
    } else {
      $object->msg = '用户名密码错误';
      $object->status = 40;
    }

    // return $arr1;

    // $object = (object) [
    //   // 'data' => $arr1,
    //   // "token" => $token,
    //   'data' => (object) [
    //     "token" => $token
    //   ],
    //   "status" => $status
    // ];

    // $object = (object) [
    //   'data' => $arr1,
    //   "token" => $token,
    //   "status" => 20
    // ];
    
    print_r(json_encode($object));
  }

  function update($sqlStr) {
    if (mysqli_query($this->conn, $sqlStr)) {
      $object = (object) [
        "status" => 20
      ];
    } else {
      $object = (object) [
        "status" => 40
      ];
    }
    print_r(json_encode($object));
  }
}

?>