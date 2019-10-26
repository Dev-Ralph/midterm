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
              echo '<th class="text-center">Book Name</th><th class="text-center">Author</th><th class="text-center">Published Date</th><th class="text-center">Available</th><th class="text-center">Action</th>';
              echo '</tr>';
              foreach ($results as $result) {
              echo '<tr>';
              echo '<td class="text-center">'.$result->bookName.'</td>';
              echo '<td class="text-center">'.$result->author.'</td>';
              echo '<td class="text-center">'.$result->datePublished.'</td>';
              echo '<td class="text-center">'.$result->qty.'</td>';
              echo '<form method="GET" action="">';
              echo  '<td class="text-center"><a class="btn btn-success" name="return" href="?returnid='.$result->book_id.'">+ Add New Stock</a></td>';
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
        }
?>
