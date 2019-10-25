<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
class user_transaction extends config{
    public $book_id;
    public $bookName;
    public $author;
    public $datePublished;
    public $account_id;

public function __construct($book_id=null,$bookName=null,$author=null,$datePublished=null,$account_id=null){
    $this->book_id = $book_id;
    $this->bookName = $bookName;
    $this->author = $author;
    $this->datePublished = $datePublished;
    $this->account_id = $account_id;
  }

public function user_transaction(){
            $config = new config;
            $pdo = $config->Connect();
            $id = $this->book_id;
            $sql = "SELECT * FROM `book_tbl` WHERE `book_id`= '$id'";
            $data= $pdo->prepare($sql);
            $data->execute([':id' => $book_id]);
            $result = $data->fetchAll();
            $sql = "SELECT * FROM `book_tbl`";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row) {
                  $qty = $row->qty;
            }

            $sql = "SELECT * FROM `account`";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            $account_id = $this->account_id;
            foreach ($rows as $row) {
                  $this->account_id = $account_id;
                  $brw = $row->brw_status;
            }
              $qty--;
              $brw--;
              $sql = "UPDATE `book_tbl` SET `qty`= $qty WHERE `book_id` = $id";
              $data = $pdo->prepare($sql);
              $data->execute();
              $sql = "UPDATE `account` SET `brw_status`= $brw WHERE `account_id` = $account_id";
              $data = $pdo->prepare($sql);
              $data->execute();
              if ($qty <= 0) {
                $sql = "UPDATE `book_tbl` SET `qty`= 0 WHERE `book_id` = $id;";
                $data = $pdo->prepare($sql);
                $data->execute();
                $sql = "UPDATE `account` SET `brw_status`= 0 WHERE `account_id` = $account_id";
                $data = $pdo->prepare($sql);
                $data->execute();
              }
          }

public function user_transactionShow(){
            $config = new config;
            $pdo = $config->Connect();
            $id = $_GET['id'];
            $s = $pdo->prepare("SELECT * FROM `book_tbl` WHERE `book_id` = '$id'");
            $s->execute();
            $results = $s->fetchAll();
            $bookName = $this->bookName;
            foreach ($results as $result) {
              $this->book_id = $result->book_id;
              $this->bookName = $result->bookName;
              $this->author = $result->author;
              $this->datePublished = $result->datePublished;
              }
            }
          }
 ?>
