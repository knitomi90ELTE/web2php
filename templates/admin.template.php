<?php
require_once('common/auth.php');
require_once('common/navigation.php');

if(!logged_in()){
    redirect('login');
}
$logged_in = true;

$keys = [
    'name' => 'Név',
    'x' => 'Szélesség',
    'y' => 'Magasság',
    'obs' => 'Akadályok száma',
    'highscore' => 'Max pont',
    'recorder' => 'Legtöbb pontot elért',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web-fejlesztés 2.</title>
    <title>Beadandó - Webfejlesztés 2.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/sandstone/bootstrap.min.css" rel="stylesheet"
          integrity="sha256-oqtj+Pkh1c3dgdH6V9qoS7qwhOy2UZfyVK0qGLa9dCc= sha512-izanB/WZ07hzSPmLkdq82m5xS7EH/qDMgl5aWR37EII+rJOi5c6ouJ3PYnrw6K+DWQcnMZ+nO1NqDr6SBKLBDg=="
          crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index">Webfejlesztés 2.</a>
            <?php if ($logged_in): ?>
                <a class="navbar-brand" href="logout">Kijelentkezés</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container">
    <div class="page-header">
        <h1>Pályalista</h1>
    </div>
    <h2 class="lead">Üdvözlet <?= $_SESSION['user']['name'] ?></h2>
    <?php if ($_SESSION['admin']): ?>
        <h3>Új pálya hozzáadása</h3>
        <form action="" id="form">
            <label>Név:</label>
            <input type="text" name="name" id="name">
            <label>Szélesség:</label>
            <input type="number" name="x" id="x">
            <label>Magasság:</label>
            <input type="number" name="y" id="y">
            <label>Akadályok száma:</label>
            <input type="number" name="obs" id="obs">
            <input type="button" value="Mentés" id="newLevelButton">
        </form>
    <?php endif; ?>
    <ul id="levelList">
        <?php foreach($levels as $id => $arr) : ?>
            <li>
            <div><strong><?=$arr['name'] ?></strong></div>
                <ul>
                    <li>Szélesség: <?=$arr['x'] ?></li>
                    <li>Magasság: <?=$arr['y'] ?></li>
                    <li>Akadályok száma: <?=$arr['obs'] ?></li>
                    <li>Rekord: <?=$arr['recorder'] ?>, pont: <?=$arr['highscore'] ?></li>
                    <?php if (isset($_SESSION['user']['scores'][$id])): ?>
                        <li>Saját legjobb: <?=$_SESSION['user']['scores'][$id]?></li>
                    <?php else: ?>
                        <li>Saját legjobb: még nincs</li>
                    <?php endif; ?>
                </ul>
                <a class="btn btn-success btn-sm" href="game?x=<?= $arr['x']?>&y=<?= $arr['y']?>&obs=<?= $arr['obs']?>&levelID=<?= $id ?>">START</a>
            </li>
        <?php endforeach ?>
    </ul>
</div>
<?php if ($_SESSION['admin']): ?>
<script src="http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/templates/js/ajax.js" type="text/javascript"></script>
<script src="http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/templates/js/admin.js" type="text/javascript"></script>
<?php endif; ?>
</body>
</html>