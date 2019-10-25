<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
class addbook extends config{
    public $bookName;
    public $author;
    public $datePublished;
    public $qty;

public function __construct($bookName=null,$author=null,$datePublished=null,$qty=null){
  $this->bookName = $bookName;
  $this->author = $author;
  $this->datePublished = $datePublished;
  $this->qty = $qty;
}

public function addbook(){
    $config = new config;
    $pdo = $config ->Connect();
    $bookName = $this->bookName;
    $author = $this->author;
    $datePublished = $this->datePublished;
    $qty = $this->qty;
    $sql = "INSERT INTO `book_tbl`(`bookName`, `author`, `datePublished`, `qty`) VALUES (?,?,?,?)";
    $data = $pdo->prepare($sql);
    $data->execute([$bookName,$author,$datePublished,$qty]);
}
}
?>
