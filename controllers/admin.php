<?php
require_once('common/fileio.php');
require_once('common/flash.php');
require_once('common/auth.php');
require_once('common/navigation.php');

if(!logged_in()){
    redirect('login');
}
$logged_in = true;

$levels = fajlbol_betolt('data/level.json');
$errors = get_flash_data('errors') ?? [];

$recorders = [];
foreach ($levels as $level => $data) {
    if (sizeof($levels[$level]['scoreboard']) > 0) {
        usort($levels[$level]['scoreboard'], function($a, $b) {
            return $a['score'] <=> $b['score'];
        });
        $levels[$level]['scoreboard'] = array_reverse($levels[$level]['scoreboard']);
        $recorders[$level] = [
            'name' => reset($levels[$level]['scoreboard'])['name'],
            'score' => reset($levels[$level]['scoreboard'])['score']
        ];
    }
}

include('templates/admin.template.php');