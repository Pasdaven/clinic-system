<h3>病患病歷查詢</h3>
<form method="POST" action="./index.php">
    請輸入病患身分證號碼：
    <input type="text" name="id_num">
    <input type="submit" value="查詢" name="searchBtn" id="searchBtn"><br>
</form>

<?php
require_once("../../model/patient.php");

if (isset($_POST['id_num'])) {
    $id_num = trim($_POST['id_num']);
    // patient data
    $patient = new Patient();
    $patient->showpatInfo($id_num);
    if ($patient->patientExist($id_num)) {
        echo '病歷號碼：' . $patient->showpatInfo($id_num)['case_id'] . '<br>病患身分證號碼：' . $patient->showpatInfo($id_num)['id_num'] . '<br>病患名稱：' . $patient->showpatInfo($id_num)['patient_name'] . '<br><br>';
        // patient allergy medicine
        if (!$patient->medicineExist($id_num)) {
            echo '無病患過敏藥物<br><br>';
        } else {
            echo '病患過敏藥物 : ';
            foreach ($patient->showpatAlleMed($id_num) as $i => $a_d) {
                echo (string)$a_d['allergy_med_id'];
                if ($i < $patient->medicineExist($id_num) - 1) {
                    echo ' , ';
                }
            }
            echo '<br><br>';
        }
        // patient records
        foreach ($patient->showRecords($id_num) as $p_d) {
            echo '看診紀錄編號：' . $p_d['record_id'] . '<br>';
            if ($p_d['comment'] == NULL) {
                $p_d['comment'] = 'NONE';
            }
            echo '醫生編號：' . $p_d['doc_id'] . ' 看診日期：' . $p_d['consulation_date'] . ' 疾病名稱：' . $p_d['disease_name'] . ' 用藥天數：' . $p_d['med_days'] . ' 備註：' . $p_d['comment'] . '<br><br>';
            // medicine id 
            if ($patient->showMedicines($p_d['record_id'])) {
                echo '使用藥品編號：';
                foreach ($patient->showMedicines($p_d['record_id']) as $i => $m_l) {
                    echo $m_l['med_id'];
                    if ($i < count($patient->showMedicines($p_d['record_id'])) - 1) {
                        echo ' , ';
                    }
                }
                echo '<br><br>';
            }
        }
    } else {
        echo '尚無就診紀錄<br>';
    }
}
?>