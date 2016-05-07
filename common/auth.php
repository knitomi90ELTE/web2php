<?php

function azonositott_e() {
  return isset($_SESSION['belepve']);
}

function logout() {
  unset($_SESSION['belepve']);
}