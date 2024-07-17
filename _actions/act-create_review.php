<?php
include_once('../include/config.php');

// Verifying the form has been submitted andrequired fields have been set
if (
  isset($_POST['username']) &&
  isset($_POST['date']) &&
  isset($_POST['nb_stars']) &&
  isset($_POST['camping_id']) &&
  isset($_POST['email']) &&
  isset($_POST['review'])
) {

  // Connect to the database
  include_once('../include/db.php');

  // Prepare the CREATE SQL query
  $sql = "INSERT INTO reviews (camping_id, username, email, date, nb_stars, review) VALUES (?, ?, ?, ?, ?, ?)";

  if ($stmt = $mysqli->prepare($sql)) {
    // Bind parameters to the prepared statement
    $stmt->bind_param(
      "isssis",
      $_POST['camping_id'],
      $_POST['username'],
      $_POST['email'],
      $_POST['date'],
      $_POST['nb_stars'],
      $_POST['review']
    );

    // Execute the query
    if ($stmt->execute()) {
      // Redirect to the camping page 
      header("Location: /evasion-camping/fiche_camping.php?id=" . $_POST['camping_id']);
      exit();
    } else {
      echo 'Erreur lors de l\'exécution de la requête: ' . $stmt->error;
    }

    // Close the query
    $stmt->close();
  } else {
    echo 'Erreur de préparation de la requête: ' . $mysqli->error;
  }

  // Close the database connection
  $mysqli->close();
} else {
  echo 'Tous les champs requis doivent être remplis.';
}
