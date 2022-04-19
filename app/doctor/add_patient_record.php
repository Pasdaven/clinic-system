<h3>新增病歷資料</h3>
<form method="POST" action="./index.php">
    病患身分證號碼:
    <input type="text" name="patient_rec[]">
    醫生編號：
    <input list="doc_id" name="patient_rec[]">
    <datalist id="doc_id">
        <?php
        $doc_datas = $Doctor->getAllDocInfo();
        foreach ($doc_datas as $d) {
            echo '<option value=' . $d["doc_id"] . '>';
        }
        ?>
    </datalist>
    看診日期：
    <input type="date" id="date" name="patient_rec[]"><br><br>
    疾病名稱：
    <input type="text" id="disease_name" name="patient_rec[]">
    用藥天數：
    <input type="text" id="med_days" name="patient_rec[]">
    備註：
    <input type="text" id="comment" name="patient_rec[] value=" NONE"><br><br>
    治療藥品：<br><br>
    <?php
    $med_datas = $Medicine->getAllMedInfo();
    foreach ($med_datas as $i => $m) {
        echo '<input type="checkbox" name="med_list[]" value=' . $m['med_id'] . '>' . $m['med_id'] . $m['med_name'] . '</input>';
        if (($i + 1) % 5 == 0) {
            echo '<br>';
        }
    }
    ?>
    <br><br>
    <input type="submit" value="新增" id="sub_new_rec">
</form>
<?php

if (isset($_POST["patient_rec"])) {
    $patient_rec = $_POST["patient_rec"];
    if ($Patient->patientExist($patient_rec[0])) {
        $patient_data = $Patient->showpatInfo("$patient_rec[0]");
        $Patient->addPatRec($patient_data['case_id'], $patient_rec[1], $patient_rec[2], $patient_rec[3], $patient_rec[4], $patient_rec[5]);
        if (isset($_POST["med_list"])) {
            $patient_med = $_POST["med_list"];
            $patient_show_rec = $Patient->showRecords($patient_rec[0]);
            $Patient->addPatMed($patient_show_rec[count($patient_show_rec) - 1]['record_id'], $patient_med);
        }
    } else {
        echo '無此患者資料';
    }
}
?>