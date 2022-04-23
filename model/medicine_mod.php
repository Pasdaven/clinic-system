<?php

require_once("model.php");

class Medicine_mod extends Model {
    protected $table = 'medicine';
    protected $keyname = 'med_id';

    protected function insert($med_id, $med_name, $med_academic_name, $med_effect) {
        $sql = "INSERT INTO $this->table VALUES ('$med_id', '$med_name', '$med_academic_name', '$med_effect')";
        return $this->execute($sql);
    }
    protected function update($med_id, $change_place, $change_text) {
        $sql = "UPDATE $this->table SET $change_place = '$change_text' WHERE med_id = '$med_id'";
        return $this->execute($sql);
    }
}
