<?php

require("model.php");

class Patient extends Model
{

    protected $table = 'patient';
    protected $key_name = 'case_id';
    //顯示病人姓名
    public function showpatName($case_id)
    {
        $pat = $this->getSingle($this->table, $this->key_name, $case_id);
        return $pat['patient_name'];
    }
    //顯示全部病人姓名
    public function showAllpatName()
    {
        $result = $this->getSingleAttrAll('patient_name');
        $pat = array();
        foreach ($result as $value) {
            array_push($pat, $value['patient_name']);
        }
        return $pat;
    }
    //顯示病人資料
    public function showpatInfo($id_num)
    {
        return $this->getSingle($this->table, 'id_num', $id_num);
    }
    //顯示病人病歷
    public function showRecords($id_num)
    {
        $case_id = $this->getOtherAttr('id_num', $id_num, 'case_id');
        $result = $this->getMultiple('patient_records', $this->key_name, $case_id[0]['case_id']);
        return $result;
    }
    //顯示當次病歷使用藥品
    public function showMedicines($record_id)
    {
        return $this->getMultiple('med_list', 'record_id', $record_id);
    }
    //通過身分證判斷有無此病人
    public function patientExist($id_num)
    {
        return $this->Exist($this->table, 'id_num', $id_num);
    }
    //判斷病人是否有過敏藥物
    public function medicineExist($id_num)
    {
        $case_id = $this->getOtherAttr('id_num', $id_num, 'case_id');
        return $this->Exist('allergy_list', $this->key_name, $case_id[0]['case_id']);
    }
    //顯示病人過敏藥物
    public function showpatAlleMed($id_num)
    {
        $case_id = $this->getOtherAttr('id_num', $id_num, 'case_id');
        $result = $this->getMultiple('allergy_list', $this->key_name, $case_id[0]['case_id']);
        return $result;
    }
}
