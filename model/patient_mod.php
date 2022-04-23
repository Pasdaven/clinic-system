<?php

require_once("model.php");

class Patient_mod extends Model {

    protected $table = 'patient';
    protected $key_name = 'case_id';

    public function add_records($case_id, $doc_id, $consulation_date, $disease_name, $med_days, $comment) {
        return "INSERT INTO patient_records VALUES (NULL, '$case_id', '$doc_id', '$consulation_date', '$disease_name', '$med_days', '$comment')";
    }
    public function add_med_list($record_id, $i) {
        return "INSERT INTO med_list VALUES ($record_id, $i)";
    }
    public function add_patient($id_num, $patient_name, $sex, $birth, $blood_type, $phone_num) {
        return "INSERT INTO $this->table VALUES ('$id_num', NULL, '$patient_name', '$sex', '$birth', '$blood_type', '$phone_num')";
    }
    public function update_patient($id_num, $change_place, $change_text) {
        return "UPDATE $this->table SET $change_place = '$change_text' WHERE id_num = '$id_num'";
    }
}
