<?php

require_once('common/fileio.php');
require_once('common/flash.php');
require_once('common/navigation.php');

function validate($input, &$data, &$errors, $jelszavak) {
    $errors = [];

    $felhnev = trim($input['felhnev']);
    $jelszo = $input['jelszo'];

    if (strlen($felhnev) == 0) {
        $errors[] = 'Nincs felhnev!';
    } else {
        $data['felhnev'] = $felhnev;
    }
    if (strlen($jelszo) == 0) {
        $errors[] = 'Nincs jelszo!';
    } else {
        $data['jelszo'] = $jelszo;
    }
    if (array_key_exists($felhnev, $jelszavak)) {
        $errors[] = 'Letezo felhnev!';
    }

    return !(bool)$errors;
}

$jelszavak = fajlbol_betolt('data/users.json');
$errors = [];

if (validate($_POST, $data, $errors, $jelszavak)) {
    $felhnev = $data['felhnev'];
    $jelszo = $data['jelszo'];

    $jelszavak[$felhnev] = md5($jelszo);
    fajlba_ment('data/users.json', $jelszavak);

    redirect('login');
} else {
    set_flash_data('errors', $errors);
    redirect('registration');
}