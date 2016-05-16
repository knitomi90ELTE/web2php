<?php

require_once('common/flash.php');
require_once('common/auth.php');
require_once('common/navigation.php');
if(logged_in()){
    redirect('admin');
}

$errors = get_flash_data('errors') ?? [];

include('templates/login.template.php');