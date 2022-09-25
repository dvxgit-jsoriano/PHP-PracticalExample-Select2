<?php
header('Content-Type: application/json; charset=utf-8');

$data = array();

for($i=100; $i<999; $i++)
{
    $result = ["id" => $i, "text" => $i];
    array_push($data, $result);
}

echo json_encode(["results" => $data]);
//echo json_encode($data);

