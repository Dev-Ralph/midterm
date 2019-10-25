<?php
class config{
    private $user = 'root';
    private $pass = '';

    public function Connect(){
      $this->con = new PDO('mysql:host=localhost;dbname=midterm_db', $this->user, $this->pass);
      $this->con -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      $this->con -> setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
        return $this->con;
    }
}
?>
