<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/midterm/resource/php/db/config.php';
class delete extends config{
public function deleteData(){
              $config = new config;
              $pdo = $config->Connect();
              if(!isset($_GET['delete'])){
              $delete = Null;
              }else {
              $delete = $_GET['delete'];
              $sql = "DELETE FROM `borrowed_tbl` WHERE `borrowed_id` = ?";
              $data = $pdo->prepare($sql);
              $data->execute([$delete]);
              }
            }
          }
 ?>
