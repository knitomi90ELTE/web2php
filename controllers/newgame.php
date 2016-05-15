<?php

require_once('common/fileio.php');
var_dump($_POST);
$input = $_POST;
$name = $input['name'];
$x = $input['x'];
$y = $input['y'];
$obs = $input['obs'];

$response = [
    'name' => $name,
    'x' => $x,
    'y' => $y,
    'obs' => $obs,
];

echo json_encode($response);