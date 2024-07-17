<?php
include_once('../include/config.php');

// Verify that the form has been submitted and all required fields are set
if (isset($_POST['review_id'], $_POST['camping_id'], $_POST['username'], $_POST['email'], $_POST['date'], $_POST['nb_stars'], $_POST['review'])) {

  // Connect to the database
  $mysqli = new mysqli($host, $username, $password, $database);

  // Check connection
  if ($mysqli->connect_errno) {
    echo 'Échec de connexion à la base de données MySQL: ' . $mysqli->connect_error;
    exit();
  }

  // Prepare the UPDATE SQL Query
  if ($request = $mysqli->prepare("UPDATE reviews SET camping_id=?, username=?, email=?, date=?, nb_stars=?, review=? WHERE review_id=?")) {
    // Bind the parameters to the prepared query
    $request->bind_param("issssii", $_POST['camping_id'], $_POST['username'], $_POST['email'], $_POST['date'], $_POST['nb_stars'], $_POST['review'], $_POST['review_id']);

    // Execute the query
    if ($request->execute()) {
      // Redirect to the camping page or wherever appropriate
      header("Location: /evasion-camping/fiche_camping.php?id=" . $_POST['camping_id']);
      exit();
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
