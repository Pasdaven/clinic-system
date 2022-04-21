<?php

require_once("../model/book.php");

class Book extends Book_mod {

    public function generateUrl($id_num, $time) {
        $sql = $this->select($id_num, $time);
        $result = $this->execute($sql);
        $row = mysqli_fetch_assoc($result);
        $book_id = $row['book_id'];
        $book_url = md5($book_id);
        $sql = $this->update($book_url, $book_id);
        $this->execute($sql);
        return $book_url;
    }
    public function createBook($patient_name, $id_num, $email_address, $doc_id, $time) {
        $sql = $this->insert($patient_name, $id_num, $email_address, $doc_id, $time);
        $this->execute($sql);
        return $this->generateUrl($id_num, $time);
    }
}
