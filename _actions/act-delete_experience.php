<?php
include_once('../include/config.php');

// Verify that the form has been submitted and the review ID is set
if (isset($_POST['id'])) {

  // Connect to the database
  include_once('../include/db.php');

  // Prepare the DELETE SQL Query
  if ($request = $mysqli->prepare("DELETE FROM experiences WHERE id = ?")) {
    // Bind the id parameter to the prepared query
    $request->bind_param("i", $_POST['id']);

    // Execute the query
    if ($request->execute()) {
      // Redirect to another page after deletion
      header("Location: /evasion-camping/dashboard.php");
      exit();
    } else {
      echo "<div class='alert alert-danger'>Une erreur s'est produite. Svp réessayer !</div>";
    }

    // Close the query
    $request->close();
  } else {
    echo $mysqli->error;
  }

  // Close the database connection
  $mysqli->close();
}
