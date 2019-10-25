<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/function/add.php';
if(isset($_POST['add'])){
  $edit = new add($_POST['username'],$_POST['password'],$_POST['password_again']);
  $edit->add();
  header("Location: admin_homepage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <link rel="stylesheet" href="vendor/css/bootstrap.css">
  <link rel="stylesheet" href="resource/css/style2.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
          <a class="navbar-brand" href="register.php"><IMG SRC="resource/img/logo1.png" ALT="Logo" WIDTH=210 HEIGHT=80></a>
            <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ml-auto navbar-light">
                    <li class="nav-item"><a class="nav-link text-danger mr-3 mt-sm-3" href="admin_homepage.php">Go back</a></li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
    <section class="container-fluid">
      <section class="row justify-content-center mt-5">
        <section class="col-12 col-sm-6 col-md-3">
          <div class="card">
            <div class="card-header">Add new member</div>
            <div class="card-body">
              <form class="form-container" action="" method="POST">
                  <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control"" autocomplete="off>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control bg-light text-dark" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="password_again">Re: Enter your password</label>
                    <input type="password" name="password_again" id="password_again" class="form-control bg-light text-dark" required>
                  </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Add member" name="add" class="btn btn-block text-white" style="background-color: #2c296e;"/>
                  </div>
              </form>
            </div>
          </div>
        </section>
      </section>
    </section>

  </body>
  </html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
