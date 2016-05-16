<?php
require_once('common/fileio.php');
require_once('common/flash.php');

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

$levels = fajlbol_betolt('data/level.json');
$errors = get_flash_data('errors') ?? [];

include('templates/admin.template.php');