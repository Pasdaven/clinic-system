<?php

require_once("../../database/db_con.php");

// $week_day = date("I");
// $time = date("H");
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

$sql = "SELECT * FROM schedule WHERE week_day = '$week_day' && time_period = '$time_period'";
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