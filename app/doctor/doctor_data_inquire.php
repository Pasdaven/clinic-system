<?php
require_once("../../model/Doctor.php");
$Doctor = new Doctor();

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType === "application/json") {
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);
    
    $doc_id_num = $decoded['parameter']['doc_id_num'];
    $doctor_data = $Doctor->showDocInfo($doc_id_num);
    $result = json_encode($doctor_data);
}

header("Content-Type: application/json; charset=UTF-8");
echo $result;
