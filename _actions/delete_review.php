<?php
include_once('../include/config.php');

// Verify that the form has been submitted and the review ID is set
if (isset($_POST['review_id'])) {
  // Connect to the database
  $mysqli = new mysqli($host, $username, $password, $database);

  // Check connection
  if ($mysqli->connect_errno) {
    echo 'Échec de connexion à la base de données MySQL: ' . $mysqli->connect_error;
    exit();
  }

  // Prepare the DELETE SQL Query
  if ($request = $mysqli->prepare("DELETE FROM reviews WHERE review_id = ?")) {
    // Bind the review_id parameter to the prepared query
    $request->bind_param("i", $_POST['review_id']);

    // Execute the query
    if ($request->execute()) {
      // Redirect to another page after deletion
      header("Location: /evasion-camping/fiche_camping.php?id=" . $_POST['camping_id']);
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
