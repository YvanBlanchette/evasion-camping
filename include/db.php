<?php
// Connection to the database
$mysqli = new mysqli($host, $username, $password, $database);

// Verifying connection
if ($mysqli->connect_errno) {
  echo 'Échec de connexion à la base de données MySQL: ' . $mysqli->connect_error;
  exit();
}
