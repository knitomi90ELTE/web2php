<?php

function logged_in() {
    return isset($_SESSION['belepve']);
}

function logout() {
    unset($_SESSION['belepve']);
    unset($_SESSION['user']);
    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
    }
}