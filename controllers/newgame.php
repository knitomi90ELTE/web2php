<?php

require_once('common/fileio.php');

$input = $_POST;
$name = $input['name'];
$x = $input['x'];
$y = $input['y'];
$obs = $input['obs'];

$levels = fajlbol_betolt('data/level.json');

$index = sizeof($levels);

$response = [
    'name' => $name,
    'x' => $x,
    'y' => $y,
    'obs' => $obs,
    'highscore' => 0,
    'recorder' => 'senki',
];
$levels[$index] = $response;

fajlba_ment('data/level.json', $levels);

echo json_encode($response);