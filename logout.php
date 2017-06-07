<?php
session_start();
ob_start();

$_SESSION['logged_in'] = 'false';
$_SESSION['auth'] = "";
header('Location: login.php');