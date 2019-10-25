<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
class add extends config{
    public $username;
    public $password;
    public $password_again;

public function __construct($username=null,$password=null,$password_again=null){
  $this->username = $username;
  $this->password = $password;
  $this->password_again = $password_again;
}

public function add(){
    $config = new config;
    $pdo = $config ->Connect();
    $username = $this->username;
    $password = $this->password;
    $password_again = $this->password_again;
    if ($password == $password_again) {
      $sql = "INSERT INTO `account`(`username`, `password`, `account_status`, `brw_status`) VALUES (?,?,'user','2')";
      $data = $pdo->prepare($sql);
      $data->execute([$username,$password]);
    }else {
      $fail = "Failed to add  new member!";
      echo "<script type='text/javascript'>alert('$fail')</script>";
    }
}
}
?>
