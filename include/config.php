<?php
session_start();

// User role toggle
if (isset($_POST['toggle_role'])) {
  $_SESSION['ADMIN'] = !$_SESSION['ADMIN'];
}

// ADMIN variable based on the session
$ADMIN = isset($_SESSION['ADMIN']) ?? $_SESSION['ADMIN'];

$username = "root";
$password = "mysql";
$host = "localhost";
$database = "evasion_camping";
