<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
class user_changepassword extends config{
  public $account_id;
  public $changepassword;

public function __construct($account_id=null,$changepassword=null){
  $this->account_id = $account_id;
  $this->changepassword = $changepassword;
}

public function user_changepassword(){
            $config = new config;
            $pdo = $config->Connect();
            $id = $this->account_id;
            $sql = "SELECT * FROM `account` WHERE `account_id`= '$id'";
            $data= $pdo->prepare($sql);
            $data->execute([':id' => $account_id]);
            $result = $data->fetchAll();
            $date = $this->date;
            $changepassword = $this->changepassword;
            $sql = "UPDATE `account` SET `password`= '$changepassword' WHERE `account_id`= '$id'";
            $data= $pdo->prepare($sql);
            $data->execute();
            }
          }
 ?>
