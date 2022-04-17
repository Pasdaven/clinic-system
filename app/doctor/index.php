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
    <?php
    //連接資料庫
    require_once("../../database/db_con.php");
    //病患病歷資料查詢
    require_once("../patient_record_inquire.php");
    //新增病患病例資料
    require_once("./add_patient_record.php");
    //藥品資料查詢
    require_once("./medicine_inquire.php");
    //關閉連接
    mysqli_close($link);
    //test
    ?>


</body>

</html>