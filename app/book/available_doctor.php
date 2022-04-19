<?php

require_once("../../database/db_con.php");
require("../../model/doctor.php");

$Doctor = new Doctor();

// 系統時間（時區預設為歐洲）
// $week_day = date("I");
// $time = date("H");

// 自訂時間，$week_day為星期，使用數字表示，$time為時間（小時），使用24小時制
$week_day = "1";
$time = "9";

switch ($time) {
    case 9:
    case 10:
    case 11:
        $time_period = "morning";
        break;
    case 12:
    case 13:
    case 14:
    case 15:
        $time_period = "evening";
        break;
    case 17:
    case 18:
    case 19:
    case 20:
        $time_period = "noon";
        break;
    default:
        $time_period = "wrong";
        break;
}

$doctor_list = $Doctor->getAvailableDocList($week_day, $time_period);
$doctor_name = Array();
foreach ($doctor_list as $value) {
    array_push($doctor_name, $Doctor->showDocName($value['doc_id']));
}
