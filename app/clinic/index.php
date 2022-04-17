<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
</head>
<body>
    首頁：
    <input type="button" value="前往" onclick="location.href='../../'">
    <?php
    //連接資料庫
    require_once("../../database/db_con.php");
    //病患個人資料查詢
    //病患病歷資料查詢
    require_once("../patient_record_inquire.php");
    //醫生個人資料查詢
    //新增病人資料
    //刪除病人資料
    //更改病人資料
    //新增藥物
    //病患線上掛號
    require_once("../book/index.php");
    //更新醫生看診時間
    //關閉連接
    mysqli_close($link);
    ?>
</body>
</html>