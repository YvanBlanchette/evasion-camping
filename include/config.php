<?php
session_start();

// User role toggle
if (isset($_POST['toggle_role'])) {
  $_SESSION['ADMIN'] = !$_SESSION['ADMIN'];
}

// ADMIN variable based on the session
$ADMIN = $_SESSION['ADMIN'] ?? false;

$username = "root";
$password = "Y11j09r85B";
$host = "localhost";
$database = "evasion_camping";
