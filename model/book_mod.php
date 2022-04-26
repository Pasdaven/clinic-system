<?php

require_once("model.php");

class Book_mod extends Model {

    protected $table = 'book';
    protected $key_name = 'book_id';

    public function insert($patient_name, $id_num, $email_address, $schedule_id, $time, $date) {
        $sql = "INSERT INTO $this->table (patient_name, id_num, email_address, schedule_id, create_at, create_date) VALUES ('$patient_name', '$id_num', '$email_address', '$schedule_id', '$time', '$date')";
        return $this->execute($sql);
    }
    public function select($id_num, $time) {
        $sql = "SELECT * FROM $this->table WHERE id_num = '$id_num' && create_at = '$time'";
        $result = $this->execute($sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function selectUrl($book_url) {
        return $this->getSingle($this->table, 'book_url', $book_url);
    }
    public function updateUrl($book_url, $book_id) {
        $sql = "UPDATE $this->table SET book_url = '$book_url' WHERE book_id = $book_id";
        return $this->execute($sql);
    }
    public function updateQueueNum($queue_num, $book_id) {
        $sql = "UPDATE $this->table SET queue_num = '$queue_num' WHERE book_id = $book_id";
        return $this->execute($sql);
    }
    public function selectSameTime($date, $schedule_id) {
        $sql = "SELECT * FROM $this->table WHERE create_date = '$date' AND schedule_id = '$schedule_id'";
        return $this->execute($sql);
    }
}
