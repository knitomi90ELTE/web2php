<?php

require_once('common/fileio.php');
require_once('common/flash.php');
require_once('common/navigation.php');
require_once('common/validation.php');

/*
Legyen lehetőség regisztrálni az alkalmazásba.
Ehhez név, jelszó, email cím megadása szükséges.
Mindegyik kötelező mező, email cím formátumának ellenőrzése szükséges.

*/
var_dump($_POST);
$jelszavak = fajlbol_betolt('data/users.json');
$errors = [];
$data = [];
$rules = [
    'name' => [
        'filter' => FILTER_DEFAULT,
    ],
    'email' => [
        'filter' => FILTER_VALIDATE_EMAIL,
        'errormsg' => 'Email nem megfelelő.',
    ],
    'password' => [
        'filter' => FILTER_DEFAULT,

    ],
];
if (validate($_POST, $rules, $data, $errors)) {
    //$name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];

    $jelszavak[$email] = md5($password);
    fajlba_ment('data/users.json', $jelszavak);

    redirect('login');
} else {
    set_flash_data('errors', $errors);
    redirect('registration');
}