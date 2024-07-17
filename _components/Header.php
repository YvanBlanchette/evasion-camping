<?php
include_once "include/config.php";
$mysqli = new mysqli($host, $username, $password, $database);
// Vérifier la connexion
if ($mysqli->connect_errno) {
  echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
  exit();
}

?>

<!DOCTYPE html>
<html lang="fr-CA">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Évasion Camping</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
  <!-- <link rel="stylesheet" href="css/styles.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            darkGreen: '#002D0F',
            mustard: '#F0A93F',
            brown: '#66401B',
            lightGreen: '#738C69'
          }
        }
      }
    }
  </script>


</head>

<body class="overflow-x-hidden">