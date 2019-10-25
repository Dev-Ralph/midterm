<?php
class logout{
public function logoutAccount(){
if(isset($_POST['logout'])){
  session_destroy();
  header("Location: index.php");
}
}
}
?>
