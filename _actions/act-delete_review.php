<?php
// Verifying that the form is submitted and that the review ID is set
if (isset($_POST['review_id'])) {

  // Connecting to the database
  include_once('../include/db.php');

  // Preparing the DELETE SQL Query
  if ($request = $mysqli->prepare("DELETE FROM reviews WHERE review_id = ?")) {
    // Binding the review ID parameter to the prepared query
    $request->bind_param("i", $_POST['review_id']);

    // Executing the query
    if ($request->execute()) {
      // Redirecting to the camping page after deletion
      header("Location: /evasion-camping/fiche_camping.php?id=" . $_POST['camping_id']);
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
