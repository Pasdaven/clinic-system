<?php
require_once("../../database/db_con.php");
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
    首頁：
    <input type="button" value="前往" onclick="location.href='../../'">
    <h3>病患病歷查詢</h3>
    <form method="POST" action="./index.php">
        請選擇病例號碼：
        <!-- <input type="text" value="請輸入病歷號碼" name="case_id" id="case_id"><br> -->
        <input list="patient_case_id" name="case_id"><br>
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
        <input type="submit" value="查詢" name="searchBtn" id="searchBtn"><br>
    </form>

    <input type="button" value="藥品資訊查詢" onclick="location.href='../medicine'"><br><br>

    <?php
    if (isset($_POST['case_id'])) {
        $case_id = trim($_POST["case_id"]);
        $patient_datas = array();
        $sql = "SELECT * FROM `patient_records` WHERE `case_id`='$case_id'";

        $result = mysqli_query($link, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                // patient records
                while ($row = mysqli_fetch_assoc($result)) {
                    $patient_datas[] = $row;
                }

                // patient data
                $sql = "SELECT * FROM `patient` WHERE `case_id` = '$case_id'";
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '病歷號碼：' . $row['case_id'] . ' 病患名稱：' . $row['patient_name'] . '<br><br>';
                }

                // patient allergy medicine
                $sql = "SELECT * FROM `allergy_list` WHERE `case_id` = '$case_id'";
                $result = mysqli_query($link, $sql);
                $allergy_datas = array();
                while ($row = mysqli_fetch_all($result)) {
                    $allergy_datas[] = $row;
                }

                if (count($allergy_datas) == 0) {
                    echo '無病患過敏藥物<br><br>';
                } else {
                    echo '病患過敏藥物 : ';
                    for ($i = 0; $i < count($allergy_datas[0]); $i++) {
                        echo (string)$allergy_datas[0][$i][1];
                        if ($i < count($allergy_datas[0]) - 1) {
                            echo ' , ';
                        }
                    }
                    echo '<br><br>';
                }

                // print patient records
                for ($i = 0; $i < count($patient_datas); $i++) {
                    echo '看診紀錄編號：' . $patient_datas[$i]['record_id'] . '<br>';
                    if ($patient_datas[$i]['comment'] == NULL) {
                        $patient_datas[$i]['comment'] = 'NONE';
                    }
                    echo '醫生編號：' . $patient_datas[$i]['doc_id'] . ' 看診日期：' . $patient_datas[$i]['consulation_date'] . ' 疾病名稱：' . $patient_datas[$i]['disease_name'] . ' 用藥天數：' . $patient_datas[$i]['med_days'] . ' 備註：' . $patient_datas[$i]['comment'] . '<br><br>';
                    $record_id = $patient_datas[$i]['record_id'];

                    $sql = "SELECT * FROM `med_list` WHERE `record_id` = '$record_id'";
                    $result = mysqli_query($link, $sql);
                    $med_list = array();


                    while ($row = mysqli_fetch_all($result)) {
                        $med_list[] = $row;
                    }

                    if (count($med_list) != 0) {
                        echo '使用藥品編號：';
                        for ($j = 0; $j < count($med_list); $j++) {
                            echo $med_list[0][$j][1];
                        }
                        echo '<br><br>';
                    }
                }
            } else {
                while ($row = mysqli_fetch_array($result)) {
                    echo '病歷編號：' . $row['case_id'] . ' 病患名稱：' . $row['patient_name'] . '<br><br>';
                }
                echo '尚無就診紀錄<br>';
            }
            mysqli_free_result($result);
        }
        // mysqli_close($link);
    }
    // if (!empty($result)) {
    //     // 如果結果不為空，就利用print_r方法印出資料
    //     echo count($patient_datas);
    //     print_r($patient_datas);
    // } else {
    //     // 為空表示沒資料
    //     echo "查無資料";
    // }
    ?>

    <h3>新增病歷資料</h3>
    <form method="POST" action="./index.php">
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
        <input type="text" id="comment" name="patient_rec[] value=" NONE"><br><br>
        治療藥品：<br><br>
        <?php
        $sql = "SELECT * FROM `medicine`";
        $result = mysqli_query($link, $sql);
        $med = array();
        while ($row = mysqli_fetch_array($result)) {
            $med[] = $row;
        }

        $counter = 0;
        for ($i = 0; $i < count($med); $i++) {
            echo '<input type="checkbox" name="med_list[]" value=' . $med[$i]['med_id'] . '>' . $med[$i]['med_id'] . $med[$i]['med_name'] . '</input>';
            $counter++;
            if ($counter % 5 == 0) {
                echo '<br>';
                $counter = 0;
            }
        }
        ?>
        <br><br>
        <input type="button" value="藥品資訊查詢" onclick="location.href='../medicine'"><br><br>
        <input type="submit" value="新增" id="sub_new_rec">
    </form>
    <?php
    require_once("../../database/db_con.php");
    if (isset($_POST["patient_rec"])) {
        $patient_rec = $_POST["patient_rec"];
        // print_r($patient_rec);

        // insert patient records
        $sql = "INSERT INTO `patient_records` VALUES (NULL, '$patient_rec[0]', '$patient_rec[1]', '$patient_rec[2]', '$patient_rec[3]', '$patient_rec[4]', '$patient_rec[5]')";
        mysqli_query($link, $sql);

        // get patient record_id
        $sql = "SELECT * FROM `patient_records`  ORDER BY record_id DESC LIMIT 0 , 1";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $record_id = $row['record_id'];
        }

        // insert patient medicine records
        if (isset($_POST["med_list"])) {
            $med_list = $_POST["med_list"];
            for ($i = 0; $i < count($med_list); $i++) {
                $sql = "INSERT INTO `med_list` VALUES ('$record_id', '$med_list[$i]')";
                mysqli_query($link, $sql);
            }
        }
        // if (mysqli_query($link, $sql)) {
        //     echo '病患病歷新增成功';
        // } else {
        //     echo '病患病歷新增失敗';
        // }
    }
    ?>
</body>

</html>