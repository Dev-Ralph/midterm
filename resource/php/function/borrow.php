<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
error_reporting (E_ALL ^ E_NOTICE);
class borrow extends config{
public function borrowBook(){
  $config = new config;
  $pdo = $config->Connect();
  $borrowid = $_GET['borrowid'];
  $sql = "SELECT * FROM `book_tbl`";
  $data = $pdo->prepare($sql);
  $data->execute();
  $results = $data->fetchAll();
  foreach ($results as $result) {
        $qty = $result->qty;
  }
  if(isset($_GET['borrowid'])){
    $qty--;
    $sql = "UPDATE `book_tbl` SET `qty`= $qty WHERE `book_id` = $borrowid";
    $data = $pdo->prepare($sql);
    $data->execute();
    if ($qty <= 0) {
      $sql = "UPDATE `book_tbl` SET `qty`= 0 WHERE `book_id` = $borrowid";
      $data = $pdo->prepare($sql);
      $data->execute();
    }
  }
  }

public function returnBook(){
    $config = new config;
    $pdo = $config->Connect();
    $returnid = $_GET['returnid'];
    $sql = "SELECT * FROM `book_tbl`";
    $data = $pdo->prepare($sql);
    $data->execute();
    $results = $data->fetchAll();
    foreach ($results as $result) {
          $qty = $result->qty;
    }
    if(isset($_GET['returnid'])){
      $qty++;
      $sql = "UPDATE `book_tbl` SET `qty`= $qty WHERE `book_id` = $returnid";
      $data = $pdo->prepare($sql);
      $data->execute();
    }
    }
}
 ?>
