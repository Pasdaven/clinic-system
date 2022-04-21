<?php

require_once("model.php");

class Medicine_mod extends Model {
    protected $table = 'medicine';
    protected $keyname = 'med_id';

    protected function insert($med_id, $med_name, $med_academic_name, $med_effect) {
        return "INSERT INTO $this->table VALUES ('$med_id', '$med_name', '$med_academic_name', '$med_effect')";
    }
    protected function update($med_id, $change_place, $change_text) {
        return "UPDATE $this->table SET $change_place = '$change_text' WHERE med_id = '$med_id'";
    }
}
