<?php

require_once("model.php");

class Medicine extends Model {
    protected $table = 'medicine';
    protected $keyname = 'med_id';

    //顯示藥品資料
    public function showMedInfo($med_id) {
        return $this->getSingle($this->table, $this->keyname, $med_id);
    }

    //新增藥品資料
    public function insertMedInfo($med_id, $med_name, $med_academic_name, $med_effect) {
        $sql = "INSERT INTO $this->table VALUES ('$med_id', '$med_name', '$med_academic_name', '$med_effect')";
        if (!$this->execute($sql)) {
            return "SQL error";
        }
    }

    //更改藥品資料
    // change place : 修改屬性, change text : 修改內容
    public function updateMedInfo($med_id, $change_place, $change_text) {
        $sql = "UPDATE $this->table SET $change_place = '$change_text' WHERE med_id = '$med_id'";
        if ($change_place == "med_id") { // med_id is PK 不能修改
            return "PK error";
        } else {
            if (!$this->execute($sql)) {
                return "SQL error";
            } else {
                return true;
            }
        }
    }

    //取得所有藥品
    public function getAllMedInfo() {
        return $this->getAll();
    }
}
