<?php
require_once("../db_con.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
</head>

<body>
    <h3>新增病歷資料</h3>
    <form method="GET" action="./doctor_addRec.php">
        病歷號碼:
        <input list="patient_case_id" name="patient_rec[]">
        <datalist id="patient_case_id">
            <?php
            $sql =  "SELECT * FROM `patient`";
            $result = mysqli_query($link, $sql);
            $datas = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $datas[] = $row;
            }

            for ($i = 0; $i < count($datas); $i++) {
                echo '<option value=' . $datas[$i]["case_id"] . '>';
            }
            ?>
        </datalist>
        醫生編號：
        <input list="doc_id" name="patient_rec[]">
        <datalist id="doc_id">
            <?php
            $sql =  "SELECT * FROM `doctor`";
            $result = mysqli_query($link, $sql);
            $datas = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $datas[] = $row;
            }

            for ($i = 0; $i < count($datas); $i++) {
                echo '<option value=' . $datas[$i]["doc_id"] . '>';
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
        <input type="text" id="comment" name="patient_rec[] value="NONE"><br><br>
        <input type="submit" value="新增" id="sub_new_rec">
    </form>
    <?php
    require_once("../db_con.php");
    if (isset($_GET["patient_rec"])) {
        $patient_rec = $_GET["patient_rec"];
        // print_r($patient_rec);

        $sql = "INSERT INTO `patient_records` VALUES (NULL, '$patient_rec[0]', '$patient_rec[1]', '$patient_rec[2]', '$patient_rec[3]', '$patient_rec[4]', '$patient_rec[5]')";
        if (mysqli_query($link, $sql)) {
            echo '病患病歷新增成功';
        } else {
            echo '病患病歷新增失敗';
        }
        // $sql_query = "INSERT INTO `patient_records` (`case_id`, `doc_id`, `consulation_date`, `disease_name`, `med_days`, `comment`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        // $stmt = $link->prepare($sql_query);
        // $stmt->bind_param($_POST["rec_case_id"], $_POST["doc_id"], $_POST["date"], $_POST["disease_name"], $_POST["med_days"], $_POST["comment"]);
        // $stmt->execute();
    }
    ?>
</body>

</html>