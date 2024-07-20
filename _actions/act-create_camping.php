<?php
// Verifying that the form is submitted and all required fields are set (since there is a lot of fields to validate, I used a foreach loop to validate all required fields)
$required_fields = ['name', 'region', 'address', 'city', 'postal_code', 'description', 'nb_terrains', 'popularite', 'nb_stars', 'actif', 'accept_animals', 'date_inscription', 'experience_id', 'id_picsum'];
foreach ($required_fields as $field) {
  if (!isset($_POST[$field])) {
    echo 'Tous les champs requis doivent être remplis.';
    exit();
  }
}

// Connecting to the database
include_once('../include/db.php');

// Preparing the CREATE SQL query
$sql = "INSERT INTO campings (name, region, address, city, postal_code, description, nb_terrains, popularite, nb_stars, actif, accept_animals, date_inscription, experience_id, id_picsum) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $mysqli->prepare($sql)) {
  // SQL injection (XSS) protection 
  $name = htmlspecialchars($_POST['name']);
  $region = htmlspecialchars($_POST['region']);
  $address = htmlspecialchars($_POST['address']);
  $city = htmlspecialchars($_POST['city']);
  $postal_code = htmlspecialchars($_POST['postal_code']);
  $description = htmlspecialchars($_POST['description']);
  $nb_terrains = (int)$_POST['nb_terrains'];
  $popularite = (int)$_POST['popularite'];
  $nb_stars = (int)$_POST['nb_stars'];
  $actif = (int)$_POST['actif'];
  $accept_animals = isset($_POST['accept_animals']) ? 1 : 0;
  $date_inscription = htmlspecialchars($_POST['date_inscription']);
  $experience_id = (int)$_POST['experience_id'];
  $id_picsum = (int)$_POST['id_picsum'];

  // Binding the parameters to the prepared statement
  $stmt->bind_param('ssssssiiiiisii', $name, $region, $address, $city, $postal_code, $description, $nb_terrains, $popularite, $nb_stars, $actif, $accept_animals, $date_inscription, $experience_id, $id_picsum);

  // Executing the query
  if ($stmt->execute()) {
    // Redirect to dashboard after creation
    header("Location: /evasion-camping/dashboard.php");
    exit();
  } else {
    echo 'Erreur lors de l\'exécution de la requête: ' . $stmt->error;
  }

  // Closing the query
  $stmt->close();
} else {
  echo 'Erreur de préparation de la requête: ' . $mysqli->error;
}

// Closing the database connection
$mysqli->close();
