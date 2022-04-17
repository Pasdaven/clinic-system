<?php

class Model {

  protected function getDB() {
    $host = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'Clinic_System';
    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);
    
    return $link;
  }

}

?>