<?php
// Verifying that the form is submitted and all required fields are set (since there is a lot of fields to validate, I used a foreach loop to validate all required fields)
$required_fields = ['id', 'name', 'region', 'address', 'city', 'postal_code', 'description', 'nb_terrains', 'popularite', 'nb_stars', 'actif', 'date_inscription', 'experience_id', 'id_picsum'];
foreach ($required_fields as $field) {
  if (!isset($_POST[$field])) {
    echo 'All required fields must be filled.';
    exit();
  }
}

// Connecting to the database
include_once('../include/db.php');

// Preparing the UPDATE SQL query
$sql = "UPDATE campings SET name=?, region=?, address=?, city=?, postal_code=?, description=?, nb_terrains=?, popularite=?, nb_stars=?, actif=?, accept_animals=?, date_inscription=?, experience_id=?, id_picsum=? WHERE id=?";

if ($stmt = $mysqli->prepare($sql)) {
  // SQL injection (XSS) protection
  $id = (int)$_POST['id'];
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

  // Binding parameters to the prepared statement
  $stmt->bind_param('ssssssiiiiisiii', $name, $region, $address, $city, $postal_code, $description, $nb_terrains, $popularite, $nb_stars, $actif, $accept_animals, $date_inscription, $experience_id, $id_picsum, $id);

  // Executing the query
  if ($stmt->execute()) {
    // Redirecting to dashboard after update
    header("Location: /evasion-camping/dashboard.php");
    exit();
  } else {
    echo "Erreur lors de la mise à jour : " . $stmt->error;
  }

  // Closing the prepared statement
  $stmt->close();
} else {
  echo 'Erreur de préparation de la requête: ' . $mysqli->error;
}

// Closing the database connection
$mysqli->close();
