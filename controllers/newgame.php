<?php
require_once('common/auth.php');
require_once('common/fileio.php');
if(!logged_in()){
    echo 'Not logged in.';
    die();
}
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
    'scoreboard' => json_decode ("[]")
];
$levels['lvl'.(string)$index] = $response;

fajlba_ment('data/level.json', $levels);

echo json_encode($response);