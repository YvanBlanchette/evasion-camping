<?php
// Include Header
include_once(__DIR__ . '/_components/Header.php');

// Checking if the camping ID is provided
if (!isset($_GET['id'])) {
  echo 'Identifiant du commentaire manquant';
  exit();
}

// Preparing the SQL query
if ($request = $mysqli->prepare("SELECT * FROM campings WHERE id=?")) {
  // Binding parameters to the prepared query
  $request->bind_param("i", $_GET['id']);
  // Query execution
  $request->execute();
  // Get the results from the query
  $result = $request->get_result();
  // Fetch the associated camping data
  $camping = $result->fetch_assoc();
  // Closing the query
  $request->close();
} else {
  // if there is an error
  echo "Erreur de préparation de la requête : " . $mysqli->error;
  exit();
}

// Checking if the camping exists
if (!$camping) {
  echo 'Camping introuvable';
  exit();
}

$regions = [];

// Get all the regions ordered by id
if ($result = $mysqli->query("SELECT * FROM regions ORDER BY id ASC")) {
  // Fetch the results from the query and store them in the regions array
  $regions = $result->fetch_all(MYSQLI_ASSOC);
}

?>

<div class="min-h-screen w-[100vw] flex justify-between">
  <!-- Include Sidebar -->
    <?php include_once(__DIR__ . '/_components/Sidebar.php') ?>

  <div class="flex flex-col justify-between w-[100vw] lg:w-[80vw]">
    <!-- Include Navbar -->
    <?php include_once(__DIR__ . '/_components/Navbar.php') ?>

    <main class="flex-1 py-12 px-[5vw] bg-gray-100">
      <div class="mx-auto pt-6 pb-10 pl-10 pr-8 bg-gray-100 w-full flex-1 flex flex-col justify-center gap-10">
        <article class="bg-[#CDD4CC]/50 rounded-md mx-auto p-4 px-10 my-3 shadow-xl py-10">
          <h1 class="text-4xl text-center uppercase font-semibold mb-4">Modifier un <span class="text-[#E28F20] font-bold">camping</span></h1>

          <form method="POST" action="/evasion-camping/_actions/act-update_camping.php" class="my-10">

            <div class="flex justify-between items-center gap-10 mb-4">
              <!-- Camping name -->
              <div class="flex flex-col gap-1 w-full">
                <label class="block" for="name">name du camping<span class="text-red-500"> *</span></label>
                <input type="text" id="name" name="name" placeholder="ex: Camping du ruisseau" class="px-4 py-1" value="<?= htmlspecialchars($camping['name']) ?>" required minlength="5" maxlength="50">
              </div>

              <!-- Region -->
              <div class="flex flex-col gap-1 w-[60%]">
                <label class="block" for="region">Région<span class="text-red-500"> *</span></label>
                <select name="region" id="region" class="w-full text-end px-2 py-1 bg-white" required>
                  <?php foreach ($regions as $region) { ?>
                    <option value="<?= htmlspecialchars($region['name']) ?>" <?= ($region['name'] === $camping['region']) ? 'selected' : '' ?> class="text-end px-2"><?= htmlspecialchars($region['name']) ?></option>
                  <?php } ?>
                </select>
              </div>

              <!-- Date -->
              <div class="flex flex-col gap-1 text-end">
                <label class="block" for="date_inscription">Date d'inscription<span class="text-red-500"> *</span></label>
                <input type="date" id="date_inscription" name="date_inscription" class="px-2 py-1" value="<?= htmlspecialchars($camping['date_inscription']) ?>" required>
              </div>

              <!-- Status -->
              <div class="flex flex-col gap-1 w-[25%]">
                <label class="block" for="actif">Status<span class="text-red-500"> *</span></label>
                <div class="flex items-center justify-start gap-6">
                  <label for="active" class="flex items-center cursor-pointer">
                    <input type="radio" name="actif" id="active" value="1" <?= ($camping['actif'] == 1) ? 'checked' : '' ?> class="mr-2">
                    Actif
                  </label>
                  <label for="inactive" class="flex items-center cursor-pointer">
                    <input type="radio" name="actif" id="inactive" value="0" <?= ($camping['actif'] == 0) ? 'checked' : '' ?> class="mr-2">
                    Inactif
                  </label>
                </div>
              </div>
            </div>

            <div class="flex justify-between items-center gap-10 mb-4">
              <!-- Address -->
              <div class="flex flex-col gap-1 w-full">
                <label class="block" for="address">address du camping<span class="text-red-500"> *</span></label>
                <input type="text" id="address" name="address" placeholder="ex: 123, chemin du ruisseau" class="px-4 py-1" value="<?= htmlspecialchars($camping['address']) ?>" required minlength="5" maxlength="100">
              </div>
              <!-- city -->
              <div class="flex flex-col gap-1 w-[25%]">
                <label class="block" for="city">city<span class="text-red-500"> *</span></label>
                <input type="text" id="city" name="city" placeholder="ex: Saint-Hilaire" class="px-4 py-1" value="<?= htmlspecialchars($camping['city']) ?>" required minlength="5" maxlength="50">
              </div>
              <!-- Code Postal -->
              <div class="flex flex-col gap-1 w-[12%]">
                <label class="block" for="postal_code">Code postal<span class="text-red-500"> *</span></label>
                <input type="text" id="postal_code" name="postal_code" placeholder="ex: J0J 0J0" class="px-4 py-1" value="<?= htmlspecialchars($camping['postal_code']) ?>" required minlength="5" maxlength="20">
              </div>
            </div>

            <div class="flex justify-between items-center gap-10 mb-4">
              <!-- Number of terrains -->
              <div class="flex flex-col gap-1 w-[40%]">
                <label class="block" for="nb_terrains">Nbre de terrains<span class="text-red-500"> *</span></label>
                <input type="number" id="nb_terrains" name="nb_terrains" placeholder="ex: 50" class="px-4 py-1" value="<?= htmlspecialchars($camping['nb_terrains']) ?>" required>
              </div>
              <!-- Popularite -->
              <div class="flex flex-col gap-1 w-[40%]">
                <label class="block" for="popularite">Popularité<span class="text-red-500"> *</span></label>
                <input type="number" id="popularite" name="popularite" placeholder="ex: 9999" class="px-4 py-1" value="<?= htmlspecialchars($camping['popularite']) ?>" required>
              </div>
              <!-- ID Picsum -->
              <div class="flex flex-col gap-1 w-[40%]">
                <label class="block" for="id_picsum">ID image<span class="text-red-500"> *</span></label>
                <input type="number" id="id_picsum" name="id_picsum" placeholder="ex: 280" class="px-4 py-1" value="<?= htmlspecialchars($camping['id_picsum']) ?>" required>
              </div>
              <!-- Number of stars -->
              <div class="flex flex-col gap-1 w-[70%]">
                <label class="block" for="nb_stars">Nbre d'étoiles<span class="text-red-500"> *</span></label>
                <select name="nb_stars" id="nb_stars" class="w-full text-end px-2 py-1" required>
                  <option value="1" <?= ($camping['nb_stars'] == 1) ? 'selected' : '' ?> class="text-end px-2">1</option>
                  <option value="2" <?= ($camping['nb_stars'] == 2) ? 'selected' : '' ?> class="text-end px-2">2</option>
                  <option value="3" <?= ($camping['nb_stars'] == 3) ? 'selected' : '' ?> class="text-end px-2">3</option>
                  <option value="4" <?= ($camping['nb_stars'] == 4) ? 'selected' : '' ?> class="text-end px-2">4</option>
                  <option value="5" <?= ($camping['nb_stars'] == 5) ? 'selected' : '' ?> class="text-end px-2">5</option>
                </select>
              </div>
              <!-- Experience -->
              <div class="flex flex-col gap-1 w-full">
                <label class="block" for="experience_id">Type d'expérience<span class="text-red-500"> *</span></label>
                <select name="experience_id" id="experience_id" class="w-full text-end px-2 py-1" required>
                  <?php foreach ($experiences as $experience) { ?>
                    <option value="<?= htmlspecialchars($experience['id']) ?>" <?= ($experience['id'] == $camping['experience_id']) ? 'selected' : '' ?> class="text-end px-2"><?= htmlspecialchars($experience['name']) ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <!-- Description -->
            <div class="flex flex-col gap-1 w-full">
              <label for="description">Description<span class="text-red-500"> *</span></label>
              <textarea name="description" id="description" rows="5" minlength="5" maxlength="500" class="px-2 py-1" required><?= htmlspecialchars($camping['description']) ?></textarea>
              <div class="flex justify-between items-start">
                <label for="accept_animals">
                  <input type="checkbox" id="accept_animals" name="accept_animals" <?= ($camping['accept_animals'] == 1) ? 'checked' : '' ?> class="mr-2">
                  Accepte les animaux<span class="text-red-500"> *</span>
                </label>
                <small><span class="text-red-500">*</span> Champs obligatoires</small>
              </div>
            </div>
            <div class="flex justify-end items-center text-end gap-4 mt-6">
              <a href="/evasion-camping/dashboard.php" class="px-4 py-1 hover:bg-[#99AB93] text-white bg-[#738C69] transition-all duration-300 cursor-pointer rounded-md">Retour</a>
              <div>

                <input type="hidden" value="<?= htmlspecialchars($camping['id']) ?>" name="id" hidden>
                <input type="submit" value="Modifier" class="px-4 py-1 hover:bg-[#e28f20]/70 text-white bg-[#e28f20] transition-all duration-300 cursor-pointer rounded-md">
              </div>
            </div>
          </form>

        </article>
      </div>
    </main>

    <!-- Include Footer -->
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>