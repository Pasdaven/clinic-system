<?php

require_once("model.php");

class Doctor extends Model {

    protected $table = 'doctor';
    protected $key_name = 'doc_id';

    public function showDocName($doc_id) {
        $doc = $this->getSingle($this->table, $this->key_name, $doc_id);
        return $doc['doc_name'];
    }

    public function showAllDocName() {
        $result = $this->getSingleAttrAll('doc_name');
        $doc = array();
        foreach ($result as $value) {
            array_push($doc, $value['doc_name']);
        }
        return $doc;
    }
    public function showDocInfo($id_num) {
        return $this->getSingle($this->table, 'id_num', $id_num);
    }
    public function doctorExist($id_num) {
        return $this->Exist($this->table, 'id_num', $id_num);
    }

    //新增醫生資料
    public function insertDocInfo($doc_id, $id_num, $doc_name, $sex, $birth, $phone_num, $doc_state) {
        $sql = "INSERT INTO $this->table VALUES ('$doc_id', '$id_num', '$doc_name', '$sex', '$birth', '$phone_num', '$doc_state')";
        if (!$this->execute($sql)) {
            return "SQL error";
        }
    }

    //修改醫生資料
    // change place : 修改屬性, change text : 修改內容
    public function updateDocInfo($doc_id, $change_place, $change_text) {
        $sql = "UPDATE $this->table SET $change_place = '$change_text' WHERE doc_id = '$doc_id'";
        if ($change_place == "doc_id") { // doc_id is PK 不能修改
            return "PK error";
        } else {
            if ($this->execute($sql)) {
                return "SQL error";
            } else {
                return true;
            }
        }
    }

    // 取得傳入時間參數對應班表的醫生列表
    public function getAvailableDocList($week_day, $time_period) {
        $sql = "SELECT * FROM schedule WHERE week_day = '$week_day' && time_period = '$time_period'";
        $result = $this->execute($sql);
        $doctor_list = array();
        $doctor_name = array();
        while ($row = mysqli_fetch_array($result)) {
            $doctor_list[] = $row;
        }
        return $doctor_list;
    }

    //取得所有醫生資料
    public function getAllDocInfo() {
        return $this->getAll();
    }
}
