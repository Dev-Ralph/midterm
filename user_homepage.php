<?php
// require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/function/borrow.php';
// $borrow = new borrow;
// $borrow->borrowBook();
// $borrow->returnBook();
 ?>
 <?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/function/logout.php';
$log = new logout;
$log->logoutAccount();
?>
<!DOCTYPE html>
<html  lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <link rel="stylesheet" href="vendor/css/bootstrap.css">
  <link rel="stylesheet" href="resource/css/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  </head>
  <header>
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="#"><IMG SRC="resource/img/logo1.png" ALT="Logo" WIDTH=210 HEIGHT=80></a>
          <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse " id="navbarNav">
              <ul class="navbar-nav ml-auto navbar-light">
                <form action="" method="POST" class="form-inline my-2 my-lg-0">
                  <li class="nav-item"><button class="btn text-danger mr-3 mt-sm-3" name="logout" style="background-color:transparent">Log Out</button></li>
                </form>
              </ul>
            </div>
          </div>
        </nav>
  </header>
  <body>
    <div class="pt-4 bg-dark"></div>
<div class="container">
  <?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/function/view.php';
    $view = new view;
    if(isset($_GET['submit'])){
    $view->viewAllCriteria();
    }else{
    $view->viewAllData();
    }
  ?>
</div>

  </body>
  <footer>
    <div class="footer-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <h3>ABOUT BOOKUP </h3>
          <div class="footer-logo"><img src="resource/img/logo1.png" width= 150 height= 80 alt=""></div>
          <p>Integer ac lorem sit amet est rhoncus dapi bus don cad pede acus morbi elit nunc molestie at ultrices eu eleifen lorem ut dictum erat masa... <a href="#">Read More</a></p>
        </div>
        <div class="col-md-2 col-sm-6">
          <h3>Book Up Links</h3>
          <ul class="footer-links">
            <li><a href="#.">Home</a></li>
            <li><a href="#.">About Us</a></li>
            <li><a href="#.">Categories</a></li>
            <li><a href="#.">Genres</a></li>
        </div>
        <div class="col-md-3 col-sm-6">
          <h3>MAIN CATEGORIES</h3>
          <ul class="footer-category">
            <li><a href="#.">Information Technology</a></li>
            <li><a href="#.">Sci-Fi</a></li>
            <li><a href="#.">Romance</a></li>
            <li><a href="#.">Animals</a></li>
            <li><a href="#.">Literature</a></li>
            <li><a href="#.">Architecture</a></li>
            <li><a href="#.">Marketing</a></li>
            <li><a href="#.">Livelihood</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-3 col-sm-6">
          <h3>CONTACT US</h3>
          <div class="address">CEU Malolos PHL BLDG. </div>
          <div class="info"><i class="fa fa-phone" aria-hidden="true"></i> <a href="#.">(099) 123 4567</a></div>
          <div class="info"><i class="fa fa-fax" aria-hidden="true"></i> <a href="#.">(099) 123 4567</a></div>
        </div>
      </div>
      <div class="copyright">Copyright © 2019 BOOK UP BOOK RENTALS - All Rights Reserved.</div>
    </div>
  </div>
  </footer>
  </html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
