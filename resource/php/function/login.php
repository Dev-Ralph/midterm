<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
class login extends config{
public function __construct($username=null,$password=null){
  $this->username = $username;
  $this->password = $password;
}

public function login(){
    $config = new config;
    $pdo = $config ->Connect();
    if(isset($_POST['username'])){
    $username = $this->username;
    $password = $this->password;
    $sql = "SELECT * FROM `account` WHERE `username` = ?";
    $data = $pdo->prepare($sql);
    $data->execute([$username]);
    $rows = $data->fetchAll();
    foreach ($rows as $row) {
      $account_id2 = $row->account_id;
      $username2 = $row->username;
      $password2 = $row->password;
      $account_status2 = $row->account_status;
    }
    if ($username == $username2 && $password == $password2 && $account_status2 == "admin"){
    header('location: admin_homepage.php');
  }elseif ($username == $username2 && $password == $password2 && $account_status2 == "user") {
    $_SESSION['account_id'] = $account_id2;
    header('location: user_homepage.php');
  }else {
    $fail = "Failed to login!";
    echo "<script type='text/javascript'>alert('$fail')</script>";
    header('location: index.php');
  }
}
}
}
?>
