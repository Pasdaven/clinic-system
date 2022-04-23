<?php

require_once("model.php");

class Doctor_mod extends Model {

    protected $table = 'doctor';
    protected $key_name = 'doc_id';

    protected function insert($doc_id, $id_num, $doc_name, $sex, $birth, $phone_num, $doc_state) {
        return "INSERT INTO $this->table VALUES ('$doc_id', '$id_num', '$doc_name', '$sex', '$birth', '$phone_num', '$doc_state')";
    }
    protected function update($doc_id, $change_place, $change_text) {
        return "UPDATE $this->table SET $change_place = '$change_text' WHERE doc_id = '$doc_id'";
    }
    protected function get_schedule($week_day, $time_period) {
        return "SELECT * FROM schedule WHERE week_day = '$week_day' && time_period = '$time_period'";
    }
}
