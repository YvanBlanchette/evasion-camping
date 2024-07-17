<?php
include_once('../include/config.php');

// Verifying the form has been submitted andrequired fields have been set
if (
  isset($_POST['name']) &&
  isset($_POST['description'])
) {

  // Connect to the database
  include_once('../include/db.php');

  // Prepare the CREATE SQL query
  $sql = "INSERT INTO experiences (name, description) VALUES (?, ?)";

  if ($stmt = $mysqli->prepare($sql)) {
    // Bind parameters to the prepared statement
    $stmt->bind_param(
      "ss",
      $_POST['name'],
      $_POST['description']
    );

    // Execute the query
    if ($stmt->execute()) {
      // Redirect to the camping page 
      header("Location: /evasion-camping/dashboard.php");
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
