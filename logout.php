<?php
session_start();

$_SESSION = array();

if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSESSID", '', time() - 1800, '/');
  }

session_destroy();

header("Location: https://256ch.net/");
?>