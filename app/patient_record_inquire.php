<h3>病患病歷查詢</h3>
<form method="POST" action="./index.php">
    請輸入病患身分證號碼：
    <input type="text" name="id_num">
    <input type="submit" value="查詢" name="searchBtn" id="searchBtn"><br>
</form>

<?php
if (isset($_POST['id_num'])) {
    $id_num = $_POST['id_num'];
    
    if ($Patient->patientExist($id_num)) {
        $patient_rec = $Patient->showpatInfo("$id_num");
        echo '病歷號碼：' . $patient_rec['case_id'] . '<br>';
        echo '病患身分證號碼：' . $patient_rec['id_num'] . '<br>';
        echo '病患名稱：' . $patient_rec['patient_name'] . '<br><br>';
        
        // patient allergy medicine
        if (!$Patient->medicineExist($id_num)) {
            echo '無病患過敏藥物<br><br>';
        } else {
            echo '病患過敏藥物 : ';
            foreach ($Patient->showpatAlleMed($id_num) as $i => $a_d) {
                echo (string)$a_d['allergy_med_id'];
                if ($i < $Patient->medicineExist($id_num) - 1) {
                    echo ' , ';
                }
            }
            echo '<br><br>';
        }
        // patient records
        foreach ($Patient->showRecords($id_num) as $p_d) {
            echo '看診紀錄編號：' . $p_d['record_id'] . '<br>';
            if ($p_d['comment'] == NULL) {
                $p_d['comment'] = 'NONE';
            }
            echo '醫生編號：' . $p_d['doc_id'] . ' 看診日期：' . $p_d['consulation_date'] . ' 疾病名稱：' . $p_d['disease_name'] . ' 用藥天數：' . $p_d['med_days'] . ' 備註：' . $p_d['comment'] . '<br><br>';
            // medicine id 
            if ($Patient->showMedicines($p_d['record_id'])) {
                echo '使用藥品編號：';
                foreach ($Patient->showMedicines($p_d['record_id']) as $i => $m_l) {
                    echo $m_l['med_id'];
                    if ($i < count($Patient->showMedicines($p_d['record_id'])) - 1) {
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