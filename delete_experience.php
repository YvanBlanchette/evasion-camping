<?php
// Include Header
include_once(__DIR__ . '/_components/Header.php');

// Checking if the experience ID is provided
if (!isset($_GET['id'])) {
  echo 'Identifiant manquant';
  exit();
}


// Preparing the SQL query
if ($request = $mysqli->prepare("SELECT * FROM experiences WHERE id=?")) {
  // Binding parameters to the prepared query
  $request->bind_param("i", $_GET['id']);
  // Query execution
  $request->execute();
  // Get the results from the query
  $result = $request->get_result();
  // Fetch the associated data
  $experience = $result->fetch_assoc();
  // Closing the query
  $request->close();
} else {
  echo "Erreur de préparation de la requête : " . $mysqli->error;
  exit();
}

if (!$experience) {
  echo '¸Expérience non trouvé';
  exit();
}
?>

<div class="min-h-screen w-[100vw] flex justify-between">
  <!-- Include Sidebar -->
    <?php include_once(__DIR__ . '/_components/Sidebar.php') ?>

  <div class="flex flex-col justify-between w-[100vw] lg:w-[80vw]">
    <!-- Include Navbar -->
    <?php include_once(__DIR__ . '/_components/Navbar.php') ?>

    <main class="flex-1 py-12 px-[5vw] bg-gray-100">
      <div class="mx-auto py-16 px-20 bg-gray-100 w-full flex-1 flex flex-col justify-center gap-10">
        <article class="bg-white rounded-md w-[70%] mx-auto p-4 px-16 my-3 shadow-xl py-10">
          <h1 class="text-2xl text-center uppercase font-semibold mb-4">Supprimer une <span class="text-[#E28F20] font-bold">expérience</span></h1>
          <h3 class="text-xl"><?= htmlspecialchars($experience['name']) ?></h3>
          <p class="flex items-baseline gap-2">
            <?= htmlspecialchars($experience['description']) ?>
          </p>
          <hr class="my-4">
          <p>Voulez-vous vraiment supprimer cette expérience ?</p>
          <div class="flex items-center gap-4 mt-4">
            <a href="/evasion-camping/dashboard.php" class="px-4 py-1 hover:bg-[#99AB93] text-white bg-[#738C69] transition-all duration-300 cursor-pointer rounded-md">Retour</a>

            <form action="/evasion-camping/_actions/act-delete_experience.php" method="POST">
              <input type="hidden" name="id" value="<?= $experience['id'] ?>">
              <input type="submit" value="Supprimer" class="px-4 py-1 bg-red-500 text-white hover:bg-red-600 transition-all duration-300 cursor-pointer rounded-md">
            </form>
          </div>
        </article>
      </div>
    </main>

    <!-- Include Footer -->
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>