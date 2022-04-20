<h3>病患個人資料查詢</h3>
<form method="POST" action="./index.php">
    請輸入病患身分證號碼：
    <input type="text" name="search_data_id_num">
    <input type="submit" value="查詢" name="searchBtn" id="searchBtn"><br>
</form>
<?php
if (isset($_POST["search_data_id_num"])) {
    $search_data_id_num = $_POST["search_data_id_num"];
    if ($Patient->patientExist($search_data_id_num)) {
        $patient_data = $Patient->showpatInfo($search_data_id_num);
        echo '病歷號碼：' . $patient_data['case_id'] . '<br>';
        echo '病患身分證號碼：' . $patient_data['id_num'] . '<br>';
        echo '病患名稱：' . $patient_data['patient_name'] . '<br>';
        echo '性別：' . $patient_data['sex'] . '<br>';
        echo '生日：' . $patient_data['birth'] . '<br>';
        echo '血型：' . $patient_data['blood_type'] . '<br>';
        echo '手機號碼：' . $patient_data['phone_num'] . '<br><br>';
    } else {
        echo '無此病患資料';
    }
}
?>