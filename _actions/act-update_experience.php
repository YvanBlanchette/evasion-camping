<?php
// Verifying that the form is submitted and all required fields are set
if (isset($_POST['id'], $_POST['name'], $_POST['description'])) {

  // Connecting to the database
  include_once('../include/db.php');

  // Preparing the UPDATE SQL Query
  if ($request = $mysqli->prepare("UPDATE experiences SET name=?, description=? WHERE id=?")) {

    // SQL injection (XSS) protection
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $id = (int)$_POST['id'];

    // Binding the parameters to the prepared query
    $request->bind_param("ssi", $name, $description, $id);

    // Executing the query
    if ($request->execute()) {
      // Redirecting to the cdaqshboard after the update
      header("Location: /evasion-camping/dashboard.php");
      exit();
    } else {
      echo "Erreur lors de la mise à jour : " . $mysqli->error;
    }

    // Closing the query
    $request->close();
  } else {
    echo "Erreur de préparation de la requête : " . $mysqli->error;
  }

  // Closing the database connection
  $mysqli->close();
}
