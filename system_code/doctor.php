<?php
// 載入db.php來連結資料庫
require_once 'database.php';
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
    <h3>病患資料查詢</h3>
    <form name="search_patient_records">
        病患身分證號碼：
        <input type="text" value="請輸入病患身分證字號" name="patient_id"><br>
        <input type="submit" value="查詢" name="search"><br>
    </form>
</body>
</html>