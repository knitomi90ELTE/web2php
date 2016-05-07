<?php

require_once('common/flash.php');

$errors = get_flash_data('errors') ?? [];

include('templates/login.template.php');