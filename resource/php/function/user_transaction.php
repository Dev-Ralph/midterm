<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
class user_transaction extends config{
    public $book_id;
    public $bookName;
    public $author;
    public $datePublished;
    public $account_id;
    public $username;

public function __construct($book_id=null,$bookName=null,$author=null,$datePublished=null,$account_id=null,$username=null){
    $this->book_id = $book_id;
    $this->bookName = $bookName;
    $this->author = $author;
    $this->datePublished = $datePublished;
    $this->account_id = $account_id;
    $this->username = $username;
  }

public function user_transaction(){
            $config = new config;
            $pdo = $config->Connect();
            $id = $this->book_id;
            $sql = "SELECT * FROM `book_tbl` WHERE `book_id`= '$id'";
            $data= $pdo->prepare($sql);
            $data->execute([':id' => $book_id]);
            $result = $data->fetchAll();
            $sql = "SELECT * FROM `book_tbl` WHERE `book_id` = '$id'";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row) {
                  $book_id = $row->book_id;
                  $bookName = $row->bookName;
                  $author = $row->author;
                  $datePublished = $row->datePublished;
                  $qty = $row->qty;
            }
            $_SESSION['book_id'] = $book_id;
            $_SESSION['qty'] = $qty;

            $account_id = $this->account_id;
            $sql = "SELECT * FROM `account` WHERE `account_id` = $account_id";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row) {
                  $username = $row->username;
                  $book_bor = $row->book_bor;

            }
            if($book_bor == 2){
              $book_bor++;
              $sql = "UPDATE `account` SET `book_bor`= $book_bor WHERE `account_id` = $account_id";
              $data = $pdo->prepare($sql);
              $data->execute();
              if ($qty >= 0) {
              $sql = "INSERT INTO `borrowed_tbl`(`bookName`, `username`, `author`, `date`) VALUES ('$bookName','$username','$author','$datePublished')";
              $data = $pdo->prepare($sql);
              $data->execute();
              $qty--;
              $sql = "UPDATE `book_tbl` SET `qty`= $qty WHERE `book_id` = $id";
              $data = $pdo->prepare($sql);
              $data->execute();
              // if ($qty <= 0) {
              //   $sql = "UPDATE `book_tbl` SET `qty`= 0 WHERE `book_id` = $id;";
              //   $data = $pdo->prepare($sql);
              //   $data->execute();
              // }
              }
              }else {
                echo "max books bor";
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
