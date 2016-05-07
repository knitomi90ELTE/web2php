<?php

function set_flash_data($key, $value) {
  $_SESSION[$key] = $value;
}

function get_flash_data($key) {
  $value = isset($_SESSION[$key]) ? $_SESSION[$key] : null;
  unset($_SESSION[$key]);
  return $value;
}
