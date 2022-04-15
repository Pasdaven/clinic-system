<?php
require_once("../db_con.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <h3>病患資料查詢</h3>
    <form method="POST" action="./doctor_noAjax.php">
        病患病歷號碼：
        <input type="text" value="請輸入病歷號碼" name="case_id" id="case_id"><br>
        <input type="submit" value="查詢" name="searchBtn" id="searchBtn"><br>
    </form>

    <?php
    if (isset($_POST['case_id'])) {
        $case_id = trim($_POST["case_id"]);
        $datas = array();
        $sql = "SELECT * FROM `patient_records` WHERE `case_id`='$case_id'";

        $result = mysqli_query($link, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $datas[] = $row;
                }

                $sql = "SELECT * FROM `patient` WHERE `case_id` = '$case_id'";
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '病歷編號：' . $row['case_id'] . ' 病患名稱：' . $row['patient_name'] . '<br><br>';
                }

                for ($i = 0; $i < count($datas); $i++) {
                    echo '看診紀錄編號：' . $datas[$i]['record_id'] . '<br>';
                    if ($datas[$i]['comment'] == NULL) {
                        $datas[$i]['comment'] = 'NONE';
                    }
                    echo '醫生編號：' . $datas[$i]['doc_id'] . ' 看診日期：' . $datas[$i]['consulation_date'] . ' 疾病名稱：' . $datas[$i]['disease_name'] . ' 用藥天數：' . $datas[$i]['med_days'] . ' 備註：' . $datas[$i]['comment'] . '<br><br>';
                }
            }
            mysqli_free_result($result);
        }
        mysqli_close($link);
    }
    // if (!empty($result)) {
    //     // 如果結果不為空，就利用print_r方法印出資料
    //     print_r($datas);
    // } else {
    //     // 為空表示沒資料
    //     echo "查無資料";
    // }
    ?>
</body>

</html>