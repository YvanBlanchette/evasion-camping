<?php
// Verifying that the form is submitted and all required fields are set
if (
  isset($_POST['name']) &&
  isset($_POST['description'])
) {

  // Connecting to the database
  include_once('../include/db.php');

  // Preparing the CREATE SQL query
  $sql = "INSERT INTO experiences (name, description) VALUES (?, ?)";

  if ($stmt = $mysqli->prepare($sql)) {
    // SQL injection (XSS) protection 
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);

    // Binding the parameters to the prepared statement
    $stmt->bind_param("ss", $name, $description);

    // Executing the query
    if ($stmt->execute()) {
      // Redirect to the camping page 
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
} else {
  echo 'Tous les champs requis doivent être remplis.';
}
