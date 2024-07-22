<?php
// Include Header
include_once(__DIR__ . '/_components/Header.php');

// Checking if the experience ID is provided
if (!isset($_GET['id'])) {
  echo 'Identifiant du commentaire manquant';
  exit();
}

// Preparing the SQL query to fetch the experience data
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
  // if there is an error
  echo "Erreur de préparation de la requête : " . $mysqli->error;
  exit();
}

// Checking if the experience exists
if (!$experience) {
  echo 'Commentaire introuvable';
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
        <article class="bg-[#CDD4CC]/50 rounded-md w-[70%] mx-auto p-4 px-16 my-3 shadow-xl py-10">
          <h1 class="text-4xl text-center uppercase font-semibold mb-4">Modifier une <span><span class="text-[#E28F20] font-bold">experience</span></h1>

          <form method="POST" action="/evasion-camping/_actions/act-update_experience.php" class="my-10">
            <input type="hidden" name="id" value="<?= htmlspecialchars($experience['id']) ?>" hidden>
            <div class="flex justify-between items-center gap-10 mb-4">
              <!-- Name -->
              <div class="flex flex-col gap-1 w-full">
                <label class="block" for="name">Nom de l'experience<span class="text-red-500"> *</span></label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($experience['name']) ?>" placeholder="ex: JohnSmith001" class="px-2 py-1 bg-white" required minlength="5" maxlength="100">
              </div>
            </div>
            <!-- Experience -->
            <div class="flex flex-col gap-1 w-full">
              <label for="description">Description<span class="text-red-500"> *</span></label>
              <textarea name="description" id="description" rows="5" minlength="5" maxlength="500" class="px-2 py-1 bg-white" required><?= htmlspecialchars($experience['description']) ?></textarea>
              <small><span class="text-red-500">*</span> Champs obligatoires</small>
            </div>
            <div class="flex items-center gap-4 mt-4 justify-end">
              <a href="/evasion-camping/dashboard.php" class="px-4 py-1 hover:bg-[#99AB93] text-white bg-[#738C69] transition-all duration-300 cursor-pointer rounded-md">Retour</a>
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