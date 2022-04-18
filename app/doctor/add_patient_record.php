<h3>新增病歷資料</h3>
<form method="POST" action="./index.php">
    病患身分證號碼:
    <input type="text" name="patient_rec[]">
    醫生編號：
    <input list="doc_id" name="patient_rec[]">
    <datalist id="doc_id">
        <?php
        $sql =  "SELECT * FROM doctor";
        $result = mysqli_query($link, $sql);
        $datas = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }

        foreach ($datas as $d) {
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
    $sql = "SELECT * FROM medicine";
    $result = mysqli_query($link, $sql);
    $med = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $med[] = $row;
    }

    foreach ($med as $i => $m) {
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
    // print_r($patient_rec);
    // patient data
    $id_num = $patient_rec[0];
    $sql = "SELECT case_id FROM patient WHERE id_num = '$id_num'";
    $result = mysqli_query($link, $sql);
    $patient = array();
    if (mysqli_num_rows($result)) {

        $patient = mysqli_fetch_assoc($result);
        $case_id = $patient['case_id'];
        // insert patient records
        $sql = "INSERT INTO patient_records VALUES (NULL, '$case_id', '$patient_rec[1]', '$patient_rec[2]', '$patient_rec[3]', '$patient_rec[4]', '$patient_rec[5]')";
        mysqli_query($link, $sql);

        // get patient record_id
        $sql = "SELECT record_id FROM patient_records  ORDER BY record_id DESC LIMIT 0 , 1";
        $result = mysqli_query($link, $sql);
        $patient = mysqli_fetch_assoc($result);
        $record_id = $patient['record_id'];

        // insert patient medicine records
        if (isset($_POST["med_list"])) {
            $med_list = $_POST["med_list"];
            foreach ($med_list as $m_l) {
                $sql = "INSERT INTO med_list VALUES ('$record_id', '$m_l')";
                mysqli_query($link, $sql);
            }
        }
    } else {
        echo '無此患者資料';
    }

    // if (mysqli_query($link, $sql)) {
    //     echo '病患病歷新增成功';
    // } else {
    //     echo '病患病歷新增失敗';
    // }
}
?>