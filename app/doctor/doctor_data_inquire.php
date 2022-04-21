<?php
require_once("../../model/Doctor.php");
$Doctor = new Doctor();

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType === "application/json") {
    $content = trim(file_get_contents("php://input"));

    $decoded = json_decode($content, true);

    $doc_id_num = $decoded["doc_id_num"];

    $doctor_data = $Doctor->showDocInfo($doc_id_num);
    
    $decoded['doc_id'] = $doctor_data['doc_id'];
    $decoded['id_num'] = $doctor_data['id_num'];
    $decoded['doc_name'] = $doctor_data['doc_name'];
    $decoded['sex'] = $doctor_data['sex'];
    $decoded['birth'] = $doctor_data['birth'];
    $decoded['phone_num'] = $doctor_data['phone_num'];
    $decoded['doc_state'] = $doctor_data['doc_state'];

    // $decoded['bar'] = "Hello World AGAIN!";    // Add some data to be returned.

    $reply = json_encode($decoded);
}

header("Content-Type: application/json; charset=UTF-8");
echo $reply;
