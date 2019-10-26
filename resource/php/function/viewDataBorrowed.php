<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
class viewDataBorrowed extends config{
public function __construct($username=null, $book_id=null){
              $this->username = $username;
              $this->book_id = $book_id;
            }

public function viewAllData(){
              $config = new config;
              $pdo = $config->Connect();
              $limit = 10;
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $s = $pdo->prepare("SELECT * FROM `borrowed_tbl`");
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

              $id = $this->book_id;
              $sql = "SELECT * FROM `book_tbl` WHERE `book_id` = '$id'";
              $data = $pdo->prepare($sql);
              $data->execute();
              $rows = $data->fetchAll();
              foreach ($rows as $row) {
                    $qty = $row->qty;
              }

              $username = $this->username;
              $sql = "SELECT * FROM `borrowed_tbl` WHERE `username` = '$username' LIMIT $start, $limit";
              $data = $pdo->prepare($sql);
              $data->execute();
              $results = $data->fetchAll(PDO::FETCH_OBJ);

              echo '<div class="row float-right ">';
              echo '</div>';
              echo '<table style="width:100%" class="table table-striped custab">';
              echo '<tr class="text-danger">';
              echo '<th class="text-center">Username</th><th class="text-center">Book Name</th><th class="text-center">Author</th><th class="text-center">Action</th>';
              echo '</tr>';
              foreach ($results as $result) {
              echo '<tr>';
              echo '<td class="text-center">'.$result->username.'</td>';
              echo '<td class="text-center">'.$result->bookName.'</td>';
              echo '<td class="text-center">'.$result->author.'</td>';
              echo '<td class="text-center"><a class="btn btn-success" href="?delete='.$result->borrowed_id.'">Return</a></td>';

              }
              if (isset($_GET['id'])) {
              $qty++;
              $sql = "UPDATE `book_tbl` SET `qty`= $qty WHERE `book_id` = $id";
              $data = $pdo->prepare($sql);
              $data->execute();
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

        }
?>
