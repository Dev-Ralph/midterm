<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
class user_changepassword extends config{
  public $account_id;
  public $changepassword;

public function __construct($changepassword=null){
  $this->changepassword = $changepassword;
}

public function user_changepassword(){
            $config = new config;
            $pdo = $config->Connect();
            $account_id = $_SESSION['account_id'];
            // $sql = "SELECT * FROM `account` WHERE `account_id`= '$account_id'";
            // $data= $pdo->prepare($sql);
            // $data->execute();
            $changepassword = $this->changepassword;
            $sql = "UPDATE `account` SET `password`= '$changepassword' WHERE `account_id`= '$account_id'";
            $data= $pdo->prepare($sql);
            $data->execute();
            }
          }
 ?>
