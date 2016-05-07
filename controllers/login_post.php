<?php

require_once('common/fileio.php');
require_once('common/flash.php');
require_once('common/navigation.php');

function validate($input, &$data, &$errors, $jelszavak) {
    $errors = [];

    $felhnev = trim($input['felhnev']);
    $jelszo = $input['jelszo'];

    if (!(array_key_exists($felhnev, $jelszavak) &&
        $jelszavak[$felhnev] == md5($jelszo))) {
        $errors[] = 'Nem jó!';
    }

    return !(bool)$errors;
}

$jelszavak = fajlbol_betolt('data/users.json');
$errors = [];

if (validate($_POST, $data, $errors, $jelszavak)) {
    $felhnev = $_POST['felhnev'];

    $_SESSION['belepve'] = true;
    $_SESSION['felhnev'] = $felhnev;

    redirect('index');
} else {
    set_flash_data('errors', $errors);
    redirect('login');
}