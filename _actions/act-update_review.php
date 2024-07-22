<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifying that the form is submitted and all required fields are set
if (isset($_POST['review_id'], $_POST['camping_id'], $_POST['username'], $_POST['email'], $_POST['date'], $_POST['nb_stars'], $_POST['review'])) {

  // Connecting to the database
  include_once('../include/db.php');

  // Preparing the UPDATE SQL Query
  if ($request = $mysqli->prepare("UPDATE reviews SET camping_id=?, username=?, email=?, date=?, nb_stars=?, review=? WHERE review_id=?")) {

    // SQL injection (XSS) protection
    $camping_id = (int)$_POST['camping_id'];
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $nb_stars = (int)$_POST['nb_stars'];
    $review = htmlspecialchars($_POST['review']);
    $review_id = (int)$_POST['review_id'];

    // Binding the parameters to the prepared query
    // Corrected parameter types: "i" for integer, "s" for string
    $request->bind_param("isssssi", $camping_id, $username, $email, $date, $nb_stars, $review, $review_id);

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
?>
