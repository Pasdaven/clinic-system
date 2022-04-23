<?php

require_once("../model/patient.php");

class Patient extends Patient_mod {

    //顯示病人姓名
    public function showpatName($case_id) {
        $pat = $this->getSingle($this->table, $this->key_name, $case_id);
        return $pat['patient_name'];
    }
    //顯示全部病人姓名
    public function showAllpatName() {
        $result = $this->getSingleAttrAll('patient_name');
        $pat = array();
        foreach ($result as $value) {
            array_push($pat, $value['patient_name']);
        }
        return $pat;
    }
    //顯示病人資料
    public function showpatInfo($param) {
        $id_num = $param['id_num'];
        return $this->getSingle($this->table, 'id_num', $id_num);
    }
    //顯示病人病歷
    public function showRecords($param) {
        $id_num = $param['id_num'];
        $case_id = $this->getOtherAttr('id_num', $id_num, 'case_id');
        $result = $this->getMultiple('patient_records', $this->key_name, $case_id[0]['case_id']);
        return $result;
    }
    //顯示當次病歷使用藥品
    public function showMedicines($record_id) {
        return $this->getMultiple('med_list', 'record_id', $record_id);
    }
    //通過身分證判斷有無此病人
    public function patientExist($id_num) {
        return $this->Exist($this->table, 'id_num', $id_num);
    }
    //判斷病人是否有過敏藥物
    public function medicineExist($id_num) {
        $case_id = $this->getOtherAttr('id_num', $id_num, 'case_id');
        return $this->Exist('allergy_list', $this->key_name, $case_id[0]['case_id']);
    }
    //顯示病人過敏藥物
    public function showPatAlleMed($id_num) {
        $case_id = $this->getOtherAttr('id_num', $id_num, 'case_id');
        $result = $this->getMultiple('allergy_list', $this->key_name, $case_id[0]['case_id']);
        return $result;
    }
    //新增病人病歷資料
    public function addPatRec($param) {
        $case_id = $param['case_id'];
        $doc_id = $param['doc_id'];
        $consulation_date = $param['consulation_date'];
        $disease_name = $param['disease_name'];
        $med_days = $param['med_days'];
        $comment = $param['comment'];
        $sql = $this->add_records($case_id, $doc_id, $consulation_date, $disease_name, $med_days, $comment);
        return $this->execute($sql);
    }
    //新增病人藥品資料
    public function addPatMed($param) {
        $record_id = $param['record_id'];
        $med_id = $param['med_id'];
        foreach ($med_id as $i) {
            $sql = $this->add_med_list($record_id, $i);
            return $this->execute($sql);
        }
    }
    //新增病人資料
    public function addPatInfo($param) {
        $id_num = $param['id_num'];
        $patient_name = $param['patient_name'];
        $sex = $param['sex'];
        $birth = $param['birth'];
        $blood_type = $param['blood_type'];
        $phone_num = $param['phone_num'];
        $sql = $this->add_patient($id_num, $patient_name, $sex, $birth, $blood_type, $phone_num);
        return $this->execute($sql);
    }
    //修改病人資料  
    // change place : 修改屬性, change text : 修改內容
    public function updatePatInfo($param) {
        $id_num = $param['id_num'];
        $change_place = $param['change_place'];
        $change_text = $param['change_text'];
        if ($change_place == "case_id") { // case_id is PK 不能修改
            return "PK error";
        }
        $sql = $this->update_patient($id_num, $change_place, $change_text);
        return $this->execute($sql);
    }
}
