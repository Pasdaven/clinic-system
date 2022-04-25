<?php

require_once("model.php");

class Doctor_mod extends Model {

    protected $table = 'doctor';
    protected $key_name = 'doc_id';

    protected function insert($doc_id, $id_num, $doc_name, $sex, $birth, $phone_num, $doc_state) {
        $sql = "INSERT INTO $this->table VALUES ('$doc_id', '$id_num', '$doc_name', '$sex', '$birth', '$phone_num', '$doc_state')";
        return $this->execute($sql);
    }
    protected function update($doc_id, $change_place, $change_text) {
        $sql = "UPDATE $this->table SET $change_place = '$change_text' WHERE doc_id = '$doc_id'";
        return $this->execute($sql);
    }
    protected function get_schedule($week_day, $time_period) {
        $sql = "SELECT * FROM schedule WHERE week_day = '$week_day' && time_period = '$time_period'";
        $result = $this->execute($sql);
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        return $list;
    }
}
