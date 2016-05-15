<?php

require_once('common/fileio.php');
require_once('common/flash.php');
require_once('common/navigation.php');


function validate($input, &$errors, $jelszavak) {
    $errors = [];

    $email = trim($input['email']);
    $jelszo = trim($input['password']);
    if (!(array_key_exists($email, $jelszavak) && $jelszavak[$email]['password'] == md5($jelszo))) {
        $errors[] = 'Hibás bejelentkezési adatok!';
    }
    return !(bool)$errors;
}

$jelszavak = fajlbol_betolt('data/users.json');
$errors = [];

if (validate($_POST, $errors, $jelszavak)) {
    $_SESSION['belepve'] = true;
    $email = $_POST['email'];
    $user = [
        'name' => $jelszavak[$email]['name'],
        'email' => $jelszavak[$email]['email'],
        'score' => $jelszavak[$email]['score']
    ];
    $_SESSION['user'] = $user;

    $_SESSION['admin'] = (bool)($email == 'admin@admin.hu');

    redirect('admin');
} else {
    set_flash_data('errors', $errors);
    redirect('login');
}