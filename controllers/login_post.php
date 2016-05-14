<?php

require_once('common/fileio.php');
require_once('common/flash.php');
require_once('common/navigation.php');


function validate($input, &$errors, $jelszavak) {
    $errors = [];

    $email = trim($input['email']);
    $jelszo = trim($input['password']);
    if (!(array_key_exists($email, $jelszavak) && $jelszavak[$email] == md5($jelszo))) {
        $errors[] = 'Hibás bejelentkezési adatok!';
    }
    return !(bool)$errors;
}

$jelszavak = fajlbol_betolt('data/users.json');
$errors = [];

if (validate($_POST, $errors, $jelszavak)) {
    $email = $_POST['email'];
    $_SESSION['belepve'] = true;
    $_SESSION['email'] = $email;
    redirect('index');
} else {
    set_flash_data('errors', $errors);
    redirect('login');
}