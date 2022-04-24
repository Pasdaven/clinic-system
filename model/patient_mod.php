<?php

require_once("model.php");

class Patient_mod extends Model {

    protected $table = 'patient';
    protected $key_name = 'case_id';

    public function add_records($case_id, $doc_id, $consulation_date, $disease_name, $med_days, $comment) {
        $sql = "INSERT INTO patient_records VALUES (NULL, '$case_id', '$doc_id', '$consulation_date', '$disease_name', '$med_days', '$comment')";
        return $this->execute($sql);
    }
    public function add_med_list($record_id, $i) {
        $sql = "INSERT INTO med_list VALUES ($record_id, $i)";
        return $this->execute($sql);
    }
    public function add_patient($id_num, $patient_name, $sex, $birth, $blood_type, $phone_num) {
        $sql = "INSERT INTO $this->table VALUES ('$id_num', NULL, '$patient_name', '$sex', '$birth', '$blood_type', '$phone_num')";
        return $this->execute($sql);
    }
    public function update_patient($id_num, $change_place, $change_text) {
        $sql = "UPDATE $this->table SET $change_place = '$change_text' WHERE id_num = '$id_num'";
        return $this->execute($sql);
    }

    public function add_pat_allergy($case_id, $allergy_med_id) {
        $sql = "INSERT INTO allergy_list VALUES ('$case_id', '$allergy_med_id')";
        return $this->execute($sql);
    }

    public function del_pat_allergy($case_id, $allergy_med_id) {
        $sql = "DELETE FROM allergy_list WHERE allergy_med_id = '$allergy_med_id' AND case_id = '$case_id'";
        return $this->execute($sql);
    }
}
