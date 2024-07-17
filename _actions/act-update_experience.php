<?php
// Include necessary files
include_once('../include/config.php');

// Verify that the form has been submitted and all required fields are set
if (isset($_POST['id'], $_POST['name'], $_POST['description'])) {

  // Connect to the database
  include_once('../include/db.php');

  // Prepare the UPDATE SQL Query
  if ($request = $mysqli->prepare("UPDATE experiences SET name=?, description=? WHERE id=?")) {
    // Bind the parameters to the prepared query
    $request->bind_param("ssi", $_POST['name'], $_POST['description'], $_POST['id']);

    // Execute the query
    if ($request->execute()) {
      // Redirect to the camping page or wherever appropriate
      header("Location: /evasion-camping/dashboard.php");
      exit(); // Ensure no further code is executed after redirection
    } else {
      echo "Erreur lors de la mise à jour : " . $mysqli->error;
    }

    // Close the query
    $request->close();
  } else {
    echo "Erreur de préparation de la requête : " . $mysqli->error;
  }

  // Close the database connection
  $mysqli->close();
}
