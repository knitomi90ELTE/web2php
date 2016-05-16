<?php
require_once('common/auth.php');
require_once('common/fileio.php');
if(!logged_in()){
    echo 'Not logged in.';
    die();
}

$levels = fajlbol_betolt('data/level.json');
$users = fajlbol_betolt('data/users.json');
$newscore = $_POST['score'];
$levelID = 'lvl'.(string)$_POST['levelID'];

if(!isset($_SESSION['user']['scores'][$levelID])){
    $_SESSION['user']['scores'][$levelID] = $newscore;
} else {
    $prevScore = $_SESSION['user']['scores'][$levelID];
    if($newscore > $prevScore){
        $_SESSION['user']['scores'][$levelID] = $newscore;
    }
}

$users[$_SESSION['user']['email']] = $_SESSION['user'];

fajlba_ment('data/users.json',$users);

$levels[$levelID]['scoreboard'][] = [
    'name' => $_SESSION['user']['name'],
    'score' => $newscore
];

fajlba_ment('data/level.json',$levels);

$scoreboard = $levels[$levelID]['scoreboard'];

usort($scoreboard, function($a, $b) {
    return $a['score'] <=> $b['score'];
});

$scoreboard = array_reverse($scoreboard);
$spliced = array_splice($scoreboard, 0, 10);
echo json_encode($spliced);