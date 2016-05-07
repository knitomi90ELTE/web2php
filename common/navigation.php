<?php

function redirect($page) {
  header("Location: index.php?{$page}");
  exit();
}
