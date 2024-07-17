<?php
include_once('../include/config.php');

// Verify that the form has been submitted and all required fields are set
if (isset($_POST['username']) && isset($_POST['date']) && isset($_POST['nb_stars']) && isset($_POST['camping_id']) && isset($_POST['email']) && isset($_POST['review'])) {

  // Connect to the database
  $mysqli = new mysqli($host, $username, $password, $database);
  // Check connection
  if ($mysqli->connect_errno) {
    echo 'Échec de connexion à la base de données MySQL: ' . $mysqli->connect_error;
    exit();
  }

  // Prepare the CREATE SQL Query
  if ($request = $mysqli->prepare("INSERT INTO reviews(camping_id, username, email, date, nb_stars, review) VALUES(?, ?, ?, ?, ?, ?)")) {
    // Bind the parameters to the prepared query
    $request->bind_param("isssis", $_POST['camping_id'], $_POST['username'], $_POST['email'], $_POST['date'], $_POST['nb_stars'], $_POST['review']);

    // Execute the query
    if ($request->execute()) {
      // Refresh page
      header("Location: /evasion-camping/fiche_camping.php?id=" . $_POST['camping_id']);
      exit();
    }

    // Close the query
    $request->close(); // Fermeture du traitement

  } else {
    echo $mysqli->error;
  }

  // Close the database connection
  $mysqli->close();
}
