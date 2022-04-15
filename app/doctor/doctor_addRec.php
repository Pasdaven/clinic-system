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
        <input list="patient_case_id" name="rec_case_id">
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
        <input list="doc_id" name="doc_id">
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
        <input type="date" id="date"><br><br>
        疾病名稱：
        <input type="text" id="disease_name">
        用藥天數：
        <input type="text" id="med_days">
        備註：
        <input type="text" id="comment"><br><br>
        <input type="submit" value="新增" id="sub_new_rec">
    </form>
    <?php
    require_once("../db_con.php");
    // if (isset($_POST['case_id']) && isset($_POST['doc_id']) && isset($_POST['date']) && isset($_POST['disease_name']) && isset($_POST['med_days'])) {
        $rec_case_id = $_GET["rec_case_id"];
        $doc_id = $_GET["doc_id"];
        $date = $_GET["date"];
        $disease_name = $_GET["disease_name"];
        $med_days = $_GET["med_days"];
        $comment = $_GET["comment"];

        $sql = "INSERT INTO `patient_records` VALUES (NULL, '$rec_case_id', '$doc_id', '$date', '$disease_name', '$med_days', '$comment')";
        if (mysqli_query($link, $sql)) {
            echo '病患病歷新增成功';
        } else {
            echo '病患病歷新增失敗';
        }
        // $sql_query = "INSERT INTO `patient_records` (`case_id`, `doc_id`, `consulation_date`, `disease_name`, `med_days`, `comment`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        // $stmt = $link->prepare($sql_query);
        // $stmt->bind_param($_POST["rec_case_id"], $_POST["doc_id"], $_POST["date"], $_POST["disease_name"], $_POST["med_days"], $_POST["comment"]);
        // $stmt->execute();
    // }
    ?>
</body>

</html>