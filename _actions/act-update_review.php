<?php
// Verifying that the form is submitted and all required fields are set
if (isset($_POST['id'], $_POST['camping_id'], $_POST['username'], $_POST['email'], $_POST['date'], $_POST['nb_stars'], $_POST['review'])) {

  // Connecting to the database
  include_once('../include/db.php');

  // Preparing the UPDATE SQL Query
  if ($request = $mysqli->prepare("UPDATE reviews SET camping_id=?, username=?, email=?, date=?, nb_stars=?, review=? WHERE id=?")) {

    // SQL injection (XSS) protection
    $camping_id = (int)$_POST['camping_id'];
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $nb_stars = (int)$_POST['nb_stars'];
    $review = htmlspecialchars($_POST['review']);
    $id = (int)$_POST['id'];

    // Binding the parameters to the prepared query
    $request->bind_param("issssii", $camping_id, $username, $email, $date, $nb_stars, $review, $id);

    // Executing the query
    if ($request->execute()) {
      // Redirecting to the camping page after update
      header("Location: /evasion-camping/fiche_camping.php?id=" . $_POST['camping_id']);
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
