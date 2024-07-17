<?php
// Include Header
include_once(__DIR__ . '/_components/Header.php');

// Checking if the review ID is provided
if (!isset($_GET['id'])) {
  echo 'Identifiant du commentaire manquant';
  exit();
}

// Preparing the SQL query to fetch the review data
if ($request = $mysqli->prepare("SELECT * FROM reviews WHERE review_id=?")) {
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
  // if there is an error
  echo "Erreur de préparation de la requête : " . $mysqli->error;
  exit();
}

// Checking if the review exists
if (!$review) {
  echo 'Commentaire introuvable';
  exit();
}

// Preparing the SQL query to fetch campings list
$res = $mysqli->query("SELECT * FROM campings ORDER BY name ASC;");
$campings = $res->fetch_all(MYSQLI_ASSOC);

// Checking if the query was successful
if (!$res) {
  echo "Erreur lors de la récupération des campings : " . $mysqli->error;
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
        <article class="bg-[#CDD4CC]/50 rounded-md w-[70%] mx-auto p-4 px-16 my-3 shadow-xl py-10">
          <h1 class="text-4xl text-center uppercase font-semibold mb-4">Modifier un <span><span class="text-[#E28F20] font-bold">commentaire</span></h1>

          <form method="POST" action="/evasion-camping/_actions/act-update_review.php" class="my-10">
            <input type="hidden" name="review_id" value="<?= htmlspecialchars($review['review_id']) ?>" hidden>
            <div class="flex justify-between items-center gap-10 mb-4">
              <!-- Date -->
              <div class="flex flex-col gap-1 text-end">
                <label class="block" for="date">Date de visite<span class="text-red-500"> *</span></label>
                <input type="date" id="date" name="date" value="<?= htmlspecialchars($review['date']) ?>" class="px-2 py-1 bg-white" required>
              </div>
              <!-- Number of stars -->
              <div class="flex flex-col gap-1 w-[60%] text-end">
                <label class="block" for="nb_stars">Nombre d'étoiles<span class="text-red-500"> *</span></label>
                <select name="nb_stars" id="nb_stars" class="w-full text-end px-2 py-1 bg-white" required>
                  <?php
                  // Loop through the possible number of stars
                  for ($i = 1; $i <= 5; $i++) {
                    // If current i matches the review's nb_stars, select it
                    $selected = ($i == $review['nb_stars']) ? 'selected' : '';
                    echo "<option value='$i' $selected>$i</option>";
                  }
                  ?>
                </select>
              </div>
              <!-- Camping visited -->
              <div class="flex flex-col gap-1 w-full text-end">
                <label class="block" for="camping_id">Camping visité<span class="text-red-500"> *</span></label>
                <select disabled name="camping_id" id="camping_id" class="w-full text-end px-2 py-1 bg-white" required>
                  <?php
                  // Loop through the campings and populate the options
                  foreach ($campings as $camping) {
                    // Check if current camping matches the review's camping_id, select it
                    $selected = ($camping['id'] == $review['camping_id']) ? 'selected' : '';
                    echo "<option value='{$camping['id']}' $selected>" . htmlspecialchars($camping['name']) . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="flex justify-between items-center gap-10 mb-4">
              <!-- Username -->
              <div class="flex flex-col gap-1 w-full">
                <label class="block" for="username">Nom d'utilisateur<span class="text-red-500"> *</span></label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($review['username']) ?>" placeholder="ex: JohnSmith001" class="px-2 py-1 bg-white" required minlength="5" maxlength="100">
              </div>
              <!-- Email -->
              <div class="flex flex-col gap-1 w-full">
                <label class="block" for="email">Adresse courriel<span class="text-red-500"> *</span></label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($review['email']) ?>" placeholder="ex: JohnSmith@example.com" class="px-2 py-1 bg-white" required minlength="5" maxlength="100">
              </div>
            </div>
            <!-- Review -->
            <div class="flex flex-col gap-1 w-full">
              <label for="review">Donnez-nous votre avis<span class="text-red-500"> *</span></label>
              <textarea name="review" id="review" rows="5" minlength="5" maxlength="500" class="px-2 py-1 bg-white" required><?= htmlspecialchars($review['review']) ?></textarea>
              <small><span class="text-red-500">*</span> Champs obligatoires</small>
            </div>
            <div class="flex items-center gap-4 mt-4 justify-end">
              <a href="fiche_camping.php?id=<?= htmlspecialchars($review['camping_id']) ?>" class="px-4 py-1 hover:bg-[#99AB93] text-white bg-[#738C69] transition-all duration-300 cursor-pointer rounded-md">Retour</a>
              <input type="submit" value="Modifier" class="px-4 py-1 hover:bg-[#E28F20]/80 text-white bg-[#E28F20] transition-all duration-300 cursor-pointer rounded-md">
            </div>
          </form>

        </article>
      </div>
    </main>

    <!-- Include Footer -->
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>