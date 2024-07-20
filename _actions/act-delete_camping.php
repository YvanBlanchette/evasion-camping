<?php
// Verifying that the form is submitted and the camping ID is set
if (isset($_POST['id'])) {

  // Connecting to the database
  include('../include/db.php');

  // Preparing the DELETE SQL Query
  if ($request = $mysqli->prepare("DELETE FROM campings WHERE id = ?")) {

    // Binding the camping ID parameter to the prepared query
    $request->bind_param("i", $_POST['id']);

    // Executing the query
    if ($request->execute()) {

      // Redirecting to the dashboard after the deletion
      header("Location: /evasion-camping/dashboard.php");
      exit();
    } else {
      echo 'Erreur lors de l\'exécution de la requête: ' . $request->error;
    }

    // Closing the query
    $request->close();
  } else {
    echo $mysqli->error;
  }

  // Closing the database connection
  $mysqli->close();
}
