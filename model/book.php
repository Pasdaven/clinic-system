<?php

require_once("model.php");

class Book extends Model {

    protected $table = 'book';
    protected $key_name = 'book_id';

    public function createBook($patient_name, $id_num, $email_address, $doc_id, $time) {
        $sql = "INSERT INTO $this->table (patient_name, id_num, email_address, doc_id, consulation_time) VALUES ('$patient_name', '$id_num', '$email_address', '$doc_id', '$time')";
        $this->execute($sql);
    }

    public function generateUrl($id_num, $time) {
        $sql = "SELECT * FROM $this->table WHERE id_num = '$id_num' && consulation_time = '$time'";
        $result = $this->execute($sql);
        $row = mysqli_fetch_assoc($result);
        $book_id = $row['book_id'];
        $book_url = md5($book_id);
        $sql = "UPDATE $this->table SET book_url = '$book_url' WHERE book_id = $book_id";
        $this->execute($sql);

        return $book_url;
    }

}
