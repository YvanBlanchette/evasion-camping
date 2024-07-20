<?php
// Verifying the form is submitted and all required fields are set
if (
  isset($_POST['username']) &&
  isset($_POST['date']) &&
  isset($_POST['nb_stars']) &&
  isset($_POST['camping_id']) &&
  isset($_POST['email']) &&
  isset($_POST['review'])
) {

  // Connecting to the database
  include_once('../include/db.php');

  // Preparing the CREATE SQL query
  $sql = "INSERT INTO reviews (camping_id, username, email, date, nb_stars, review) VALUES (?, ?, ?, ?, ?, ?)";

  if ($stmt = $mysqli->prepare($sql)) {
    // SQL injection (XSS) protection 
    $username = htmlspecialchars($_POST['username']);
    $date = htmlspecialchars($_POST['date']);
    $nb_stars = (int)$_POST['nb_stars'];
    $camping_id = (int)$_POST['camping_id'];
    $email = htmlspecialchars($_POST['email']);
    $review = htmlspecialchars($_POST['review']);

    // Binding the parameters to the prepared statement
    $stmt->bind_param("isssis", $camping_id, $username, $email, $date, $nb_stars,  $review);

    // Executing the query
    if ($stmt->execute()) {
      // Redirecting to the camping page 
      header("Location: /evasion-camping/fiche_camping.php?id=" . $_POST['camping_id']);
      exit();
    } else {
      echo 'Erreur lors de l\'exécution de la requête: ' . $stmt->error;
    }

    // Close the query
    $stmt->close();
  } else {
    echo 'Erreur de préparation de la requête: ' . $mysqli->error;
  }

  // Close the database connection
  $mysqli->close();
} else {
  echo 'Tous les champs requis doivent être remplis.';
}
