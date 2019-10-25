<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/function/borrow.php';
$borrow = new borrow;
$borrow->borrowBook();
$borrow->returnBook();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <link rel="stylesheet" href="vendor/css/bootstrap.css">
  <link rel="stylesheet" href="resource/css/style.css">
  </head>
  <body>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/function/view.php';
      $view = new view;
      if(isset($_GET['submit'])){
      $view->viewAllCriteria();
      }else{
      $view->viewAllData();
      }
    ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="vendor/js/bootstrap.min.js"></script>
  </html>
