<?php

$decoded = json_decode(file_get_contents('php://input'), true);

require_once($decoded['controller'] . '.php');
$obj = new $decoded['controller']();
$string =  implode(',', $decoded['parameter']);
$data = $obj->$decoded['method']($string);

$result = json_encode($data);


header("Content-Type: application/json; charset=UTF-8");
echo 'test';