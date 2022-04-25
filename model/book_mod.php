<?php

require_once("model.php");

class Book_mod extends Model {

    protected $table = 'book';
    protected $key_name = 'book_id';

    public function insert($patient_name, $id_num, $email_address, $doc_id, $time) {
        $sql = "INSERT INTO $this->table (patient_name, id_num, email_address, doc_id, consulation_time) VALUES ('$patient_name', '$id_num', '$email_address', '$doc_id', '$time')";
        return $this->execute($sql);
    }
    public function select($id_num, $time) {
        $sql = "SELECT * FROM $this->table WHERE id_num = '$id_num' && consulation_time = '$time'";
        $result = $this->execute($sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function selectUrl($book_url) {
        return $this->getSingle($this->table, 'book_url', $book_url);
    }
    public function update($book_url, $book_id) {
        $sql = "UPDATE $this->table SET book_url = '$book_url' WHERE book_id = $book_id";
        return $this->execute($sql);
    }
}
