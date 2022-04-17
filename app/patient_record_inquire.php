<h3>病患病歷查詢</h3>
<form method="POST" action="./index.php">
    請輸入病患身分證號碼：
    <input type="text" name="id_num">
    <input type="submit" value="查詢" name="searchBtn" id="searchBtn"><br>
</form>

<?php
require_once("../model/Doctor.php");

if (isset($_POST['id_num'])) {
    $id_num = trim($_POST['id_num']);
    // patient data
    $sql = "SELECT * FROM patient WHERE id_num = '$id_num'";
    $result = mysqli_query($link, $sql);
    $patient = array();
    if (mysqli_num_rows($result)) {

        $patient = mysqli_fetch_assoc($result);
        echo '病歷號碼：' . $patient['case_id'] . '<br>病患身分證號碼：' . $patient['id_num'] . '<br>病患名稱：' . $patient['patient_name'] . '<br><br>';

        // patient allergy medicine
        $sql = "SELECT * FROM allergy_list WHERE case_id = {$patient['case_id']}";
        $result = mysqli_query($link, $sql);
        $allergy_datas = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $allergy_datas[] = $row;
        }
        // print patient allergy medicine
        if (count($allergy_datas) == 0) {
            echo '無病患過敏藥物<br><br>';
        } else {
            echo '病患過敏藥物 : ';
            foreach ($allergy_datas as $i => $a_d) {
                echo (string)$a_d['allergy_med_id'];
                if ($i < count($allergy_datas) - 1) {
                    echo ' , ';
                }
            }
            echo '<br><br>';
        }

        // patient records
        $sql = "SELECT * FROM patient_records WHERE case_id = {$patient['case_id']}";
        $result = mysqli_query($link, $sql);
        $patient_datas = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $patient_datas[] = $row;
        }
        // print patient records
        foreach ($patient_datas as $p_d) {
            echo '看診紀錄編號：' . $p_d['record_id'] . '<br>';
            if ($p_d['comment'] == NULL) {
                $p_d['comment'] = 'NONE';
            }
            echo '醫生編號：' . $p_d['doc_id'] . ' 看診日期：' . $p_d['consulation_date'] . ' 疾病名稱：' . $p_d['disease_name'] . ' 用藥天數：' . $p_d['med_days'] . ' 備註：' . $p_d['comment'] . '<br><br>';

            // medicine id
            $sql = "SELECT * FROM med_list WHERE record_id = {$p_d['record_id']}";
            $result = mysqli_query($link, $sql);
            $med_list = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $med_list[] = $row;
            }
            // print medicine id
            if (count($med_list) != 0) {
                echo '使用藥品編號：';
                foreach ($med_list as $i => $m_l) {
                    echo $m_l['med_id'];
                    if ($i < count($med_list) - 1) {
                        echo ' , ';
                    }
                }
                echo '<br><br>';
            }
        }
    } else {
        echo '尚無就診紀錄<br>';
    }
    mysqli_free_result($result);
}
?>