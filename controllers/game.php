<?php

require_once('common/flash.php');
require_once('common/navigation.php');
require_once('common/auth.php');

if(logged_in()){
    if(!isset($_GET['levelID']) || !is_numeric($_GET['levelID'])){
        $errors[] = 'Váratlan hiba lépett fel, kérlek válassz pályát!';
        set_flash_data('errors', $errors);
        redirect('admin');
    }
}

include('templates/game.template.php');