<?php
// Include Header
include_once(__DIR__ . '/_components/Header.php');

// Checking if the review ID is provided
if (!isset($_GET['id'])) {
  echo 'Identifiant manquant';
  exit();
}


// Preparing the SQL query
if ($request = $mysqli->prepare("SELECT * FROM reviews WHERE id=?")) {
  // Binding parameters to the prepared query
  $request->bind_param("i", $_GET['id']);
  // Query execution
  $request->execute();
  // Get the results from the query
  $result = $request->get_result();
  // Fetch the associated data
  $review = $result->fetch_assoc();
  // Closing the query
  $request->close();
} else {
  echo "Erreur de préparation de la requête : " . $mysqli->error;
  exit();
}

if (!$review) {
  echo 'Avis non trouvé';
  exit();
}
?>

<div class="min-h-screen flex justify-between bg-gray-100">
  <!-- Include Sidebar -->
  <?php include_once(__DIR__ . '/_components/Sidebar.php'); ?>

  <div class="flex flex-col justify-between w-[80vw]">
    <!-- Include Navbar -->
    <?php include_once(__DIR__ . '/_components/Navbar.php'); ?>

    <main class="">
      <div class="mx-auto py-16 px-20 bg-gray-100 w-full flex-1 flex flex-col justify-center gap-10">
        <article class="bg-white rounded-md w-[70%] mx-auto p-4 px-16 my-3 shadow-xl py-10">
          <h1 class="text-2xl text-center uppercase font-semibold mb-4">Supprimer un commentaire</h1>
          <h3 class="text-xl"><?= htmlspecialchars($review['username']) ?></h3>
          <p class="flex items-baseline gap-2">
            <span>
              <?php for ($i = 0; $i < $review['nb_stars']; $i++) { ?>
                <i class="fa-solid fa-star text-sm text-[#E28F20]"></i>
              <?php } ?>
            </span>
            <span class="text-xs text-gray-500">
              <?= htmlspecialchars($review['date']) ?>
            </span>
          </p>
          <p><?= htmlspecialchars($review['review']) ?></p>
          <hr class="my-4">
          <p>Voulez-vous vraiment supprimer ce commentaire ?</p>
          <div class="flex items-center gap-4 mt-4">
            <a href="fiche_camping.php?id=<?= htmlspecialchars($review['camping_id']) ?>" class="px-4 py-1 hover:bg-[#99AB93] text-white bg-[#738C69] transition-all duration-300 cursor-pointer rounded-md">Retour</a>

            <form action="/evasion-camping/_actions/act-delete_review.php" method="POST">
              <input type="hidden" name="id" value="<?= $review['id'] ?>">
              <input type="hidden" name="camping_id" value="<?= $review['camping_id'] ?>">
              <input type="submit" value="Confirmer" class="px-4 py-1 bg-red-500 text-white hover:bg-red-600 transition-all duration-300 cursor-pointer rounded-md">
            </form>
          </div>
        </article>
      </div>
    </main>

    <!-- Include Footer -->
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>