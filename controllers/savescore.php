<?php

require_once('common/fileio.php');

$levels = fajlbol_betolt('data/level.json');
$users = fajlbol_betolt('data/users.json');
$newscore = $_POST['score'];
$levelID = $_POST['levelID'];

if(!isset($_SESSION['user']['scores'][$levelID])){
    $_SESSION['user']['scores'][$levelID] = $newscore;
} else {
    $prevScore = $_SESSION['user']['scores'][$levelID];
    if($newscore > $prevScore){
        $_SESSION['user']['scores'][$levelID] = $newscore;
    }
}
$users[$_SESSION['user']['email']] = $_SESSION['user'];
fajlba_ment($users, 'data/users.json');

echo var_dump($users);

