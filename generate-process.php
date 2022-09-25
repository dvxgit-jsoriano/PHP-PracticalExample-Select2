<?php
header('Content-Type: application/json; charset=utf-8');

$data = array();

file_put_contents('test.log', "Search is ".$_GET['search'].PHP_EOL, FILE_APPEND);
file_put_contents('test.log', "Page is ".$_GET['page'].PHP_EOL, FILE_APPEND);

for ($i = 100; $i < 999; $i++) {
    $result = ["id" => $i, "text" => $i];
    array_push($data, $result);
}

//echo json_encode(["results" => $data]);
echo json_encode($data);
