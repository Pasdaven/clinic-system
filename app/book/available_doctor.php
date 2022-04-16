<?php

require_once("../../database/db_con.php");

// $week_day = date("I");
// $time = date("H");
$week_day = "1";
$time = "9";

switch ($week_day) {
  case 1:
    $search_week_day = "Mon";
    break;
  case 2:
    $search_week_day = "Tues";
    break;
  case 3:
    $search_week_day = "Wed";
    break;
  case 4:
    $search_week_day = "Thur";
    break;
  case 5:
    $search_week_day = "Fri";
    break;
  case 6:
    $search_week_day = "Sat";
    break;
  case 7:
    $search_week_day = "Sun";
    break;
  default:
    break;
}

switch ($time) {
  case 9:
  case 10:
  case 11:
    $search_time = "morning";
    break;
  case 12:
  case 13:
  case 14:
  case 15:
    $search_time = "evening";
    break;
  case 17:
  case 18:
  case 19:
  case 20:
    $search_time = "noon";
    break;
  default:
    $search_time = "wrong";
    break;
}

$sql = "SELECT * FROM schedule WHERE week_day = '$search_week_day' && time_period = '$search_time'";
$result = mysqli_query($link, $sql);
$doctor_list = array();
$doctor_name = array();
while ($row = mysqli_fetch_array($result)) {
  $doctor_list[] = $row;
}
foreach ($doctor_list as $value) {
  $doc_id = $value['doc_id'];
  $sql = "SELECT * FROM doctor WHERE doc_id = '$doc_id'";
  $result = mysqli_query($link, $sql);
  while ($row = mysqli_fetch_array($result)) {
    array_push($doctor_name, $row['doc_name']);
  }
}