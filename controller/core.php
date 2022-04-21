<?php

$decoded = json_decode(file_get_contents('php://input'), true);

require_once($decoded['controller'] . '.php');
$obj = new $decoded['controller']();
if (array_key_exists('parameter', $decoded)) {
    $string =  implode(',', $decoded['parameter']);
    $func = $decoded['method'];
    $data = $obj->$func($string);
} else {
    $func = $decoded['method'];
    $data = $obj->$func();
}

$result = json_encode($data);

header("Content-Type: application/json; charset=UTF-8");
echo $result;
