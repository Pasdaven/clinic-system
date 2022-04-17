<?php

class Model {

  private function getDB() {
    $host = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'Clinic_System';
    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);
    
    return $link;
  }

  public function execute($sql) {
    $result = mysqli_query($this->getDB(), $sql);
    return $result;
  }

  public function getAll() {
    $sql = "SELECT * FROM $this->table";
    $list = $this->execute($sql);
    while ($row = mysqli_fetch_array($list)) {
      $result = $row;
    }
    return $result;
  }

  public function getSingleAttrAll($attr) {
    $sql = "SELECT $attr FROM $this->table";
    $list = $this->execute($sql);
    while ($row = mysqli_fetch_array($list)) {
      $result[] = $row;
    }
    return $result;
  }
  
  public function getSingle($key) {
    $sql = "SELECT * FROM $this->table WHERE $this->key_name = $key";
    $result = $this->execute($sql);
    $row = mysqli_fetch_array($result);
    return $row;
  }

}