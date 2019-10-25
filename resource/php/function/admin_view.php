<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
class admin_view extends config{
  public function viewAllData(){
              $config = new config;
              $pdo = $config->Connect();
              $limit = 10;
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $s = $pdo->prepare("SELECT * FROM `book_tbl`");
              $s->execute();
              $all = $s->fetchAll(PDO::FETCH_ASSOC);
              $total_results = $s->rowCount();
              $total_pages = ceil($total_results/$limit);

              if (!isset($_GET['page'])) {
                $page = 1;
              } else{
                $page = $_GET['page'];
              }

              $start = ($page-1)*$limit;

              $sql = "SELECT * FROM `book_tbl` LIMIT $start, $limit";
              $data = $pdo->prepare($sql);
              $data->execute();
              $results = $data->fetchAll(PDO::FETCH_OBJ);
              echo '<div class="row float-right ">';
              echo '<td><a class="btn btn-success text-white mr-3 mt-3" href="new.php">+ Add New Member</a></td> <td><a class="btn btn-success text-white mr-3 mt-3" href="newbook.php">+ Add New Book</a></td>';
              echo "</div>'";
              echo '<table style="width:100%" class="table table-striped custab">';
              echo '<tr class="text-danger">';
              echo '<th>Book Name</th><th>Author</th><th>Published Date</th><th>Available</th><th>Action</th>';
              echo '</tr>';
              foreach ($results as $result) {
              echo '<tr>';
              echo '<td>'.$result->bookName.'</td>';
              echo '<td>'.$result->author.'</td>';
              echo '<td>'.$result->datePublished.'</td>';
              echo '<td>'.$result->qty.'</td>';
              echo '<form method="GET" action="">';
              echo  '<td><a class="btn btn-success" name="return" href="?returnid='.$result->book_id.'">+ Add New Stock</a></td>';
              echo '</form>';
              echo '</tr>';
              }
              echo '</table>';

              echo '<ul>';
              for ($p=1; $p <= $total_pages; $p++) {
                echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
                echo  '<a class="page-link" href="?page='.$p.'">'.$p;
                echo  '</a>';
                echo '</li>';
              }
              echo '</ul>';
    }

public function viewAllCriteria(){
  if(isset($_GET['search']) && isset($_GET['down'])){
          $config = new config;
          $pdo = $config->Connect();
          $search = $_GET['search'];
          $down = $_GET['down'];
          $s = $pdo->prepare("SELECT * FROM `book_tbl` where `$down` LIKE ?");
          $s->execute(["%$search%"]);
          $allResp = $s->fetchAll(PDO::FETCH_ASSOC);

          $limit = 10;
          $total_results = $s->rowCount();
          $total_pages = ceil($total_results/$limit);

          if (!isset($_GET['page'])) {
              $page = 1;
          } else{
                $page = $_GET['page'];
          }

          $start = ($page-1)*$limit;

          $sql = "SELECT * FROM `book_tbl` where `$down` LIKE ?  LIMIT $start, $limit";
          $data =$pdo->prepare($sql);
          $data->execute(["%$search%"]);
          $results = $data->fetchAll();

          echo '<table style="width:100%" class="table table-hover">';
          echo '<tr>';
          echo '<th>Book Name</th><th>Author</th><th>Published Date</th><th>Available</th><th>Action</th>';
          echo '</tr>';
          foreach ($results as $result) {
            echo '<tr>';
            echo '<td>'.$result->bookName.'</td>';
            echo '<td>'.$result->author.'</td>';
            echo '<td>'.$result->datePublished.'</td>';
            echo '<td>'.$result->qty.'</td>';
            echo  '<td> <a class="btn btn-primary" href="edit.php?id='.$result->book_id.'"">Edit</a></td>';

            echo '</tr>';
          }
          echo '</table>';

          echo '<ul>';
          for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?search='.$search.'&down='.$down.'&submit=Search&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
          }
          echo '</ul>';
          }
            }
        }
?>
