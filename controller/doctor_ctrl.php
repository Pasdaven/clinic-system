<?php

require_once("../model/doctor_mod.php");
require_once("schedule_ctrl.php");

class Doctor_ctrl extends Doctor_mod {

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
    public function showDocInfo($param) {
        $id_num = $param['id_num'];
        return $this->getSingle($this->table, 'doc_id', $id_num);
    }
    public function doctorExist($id_num) {
        return $this->Exist($this->table, 'id_num', $id_num);
    }

    //新增醫生資料
    public function insertDocInfo($param) {
        $doc_id = $param['doc_id'];
        $id_num = $param['id_num'];
        $doc_name = $param['doc_name'];
        $sex = $param['sex'];
        $birth = $param['birth'];
        $phone_num = $param['phone_num'];
        $doc_state = $param['doc_state'];
        return $this->insert($doc_id, $id_num, $doc_name, $sex, $birth, $phone_num, $doc_state);
    }

    //修改醫生資料
    // change place : 修改屬性, change text : 修改內容
    public function updateDocInfo($param) {
        $doc_id = $param['doc_id'];
        $change_place = $param['change_place'];
        $change_text = $param['change_text'];
        if ($change_place == "doc_id") { // doc_id is PK 不能修改
            return "PK error";
        }
        return $this->update($doc_id, $change_place, $change_text);
    }

    //取得所有醫生資料
    public function getAllDocInfo() {
        return $this->getAll();
    }
}
