<?php
// Include Header
include_once(__DIR__ . '/_components/Header.php');

$campings = [];

// Get all the campings ordered by id
if ($result = $mysqli->query("SELECT * FROM campings ORDER BY id ASC")) {
  // Fetch the results from the query and store them in the campings array
  $campings = $result->fetch_all(MYSQLI_ASSOC);
}


$experiences = [];

// Get all the experiences ordered by id
if ($result = $mysqli->query("SELECT * FROM experiences ORDER BY id ASC")) {
  // Fetch the results from the query and store them in the experiences array
  $experiences = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<div class="min-h-screen w-[100vw] flex justify-between">
  <!-- Include Sidebar -->
    <?php include_once(__DIR__ . '/_components/Sidebar.php') ?>

  <div class="flex flex-col justify-between w-[100vw] lg:w-[80vw]">
    <!-- Include Navbar -->
    <?php include_once(__DIR__ . '/_components/Navbar.php') ?>

    <main class="flex-1 py-12 px-[5vw] bg-white">
      <!-- Title -->
      <h1 class="text-3xl sm:text-4xl uppercase text-center mb-6">Tableau<span class="text-[#E28F20] font-bold"> de bord</span></h1>

      <!-- Camping list as table with action buttons -->
      <div class="w-full mx-auto bg-white">
        <h2 class="text-xl sm:text-2xl text-center uppercase mb-1">Liste des campings</h2>
        <a href="create_camping.php" class="text-sm sm:text-base text-center font-medium uppercase mb-3 flex items-center justify-center gap-2 text-[#E28F20] hover:text-[#E28F20]/70 transition-all duration-300 w-fit mx-auto"><i class="fa-solid fa-plus"></i> Ajouter un camping</a>
        <table class="w-full text-center shadow-xl text-xs sm:text-sm">
          <thead class="">
            <tr class="bg-[#738C69]/40">
              <th class="font-medium pl-6 py-1">ID</th>
              <th class="font-medium">Nom</th>
              <th class="font-medium hidden lg:table-cell">Adresse</th>
              <th class="font-medium hidden lg:table-cell">Terrains</th>
              <th class="font-medium hidden lg:table-cell">Étoiles</th>
              <th class="font-medium hidden lg:table-cell">Animaux</th>
              <th class="font-medium">Statut</th>
              <th class="pr-4"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($campings as $index => $camping) { ?>
              <tr class="<?= $index % 2 == 1 ? 'bg-[#738C69]/20' : '' ?> hover:bg-[#E28F20]/20 transition-all duration-300">
                <td class="pl-6 py-3">
                  <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="block w-full h-full"><?= $camping['id'] ?></a>
                </td>
                <td class=" py-3">
                  <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="block w-full h-full"><?= $camping['name'] ?></a>
                </td>
                <td class="hidden lg:table-cell py-3">
                  <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="block w-full h-full"><?= "{$camping['address']}, {$camping['city']}, {$camping['postal_code']}, Qc" ?></a>
                </td>
                <td class="hidden lg:table-cell py-3">
                  <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="block w-full h-full"><?= $camping['nb_terrains'] ?></a>
                </td>
                <td class="hidden lg:table-cell py-3">
                  <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="block w-full h-full"><?= $camping['nb_stars'] ?></a>
                </td>
                <td class="hidden lg:table-cell py-3">
                  <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="block w-full h-full"><?= $camping['accept_animals'] == '1' ? "Oui" : "Non" ?></a>
                </td>
                <td class=" py-3">
                  <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="block w-full h-full"><?= $camping['actif'] == '1' ? "Actif" : "Inactif" ?></a>
                </td>
                <td class="flex justify-center gap-3 pl-4 pr-4 py-3">
                  <a href="edit_camping.php?id=<?= $camping['id'] ?>" title="Modifier" class="text-lg text-[#738C69] hover:text-[#738C69]/70 transition-all duration-300"><i class="fa-solid fa-pen-to-square"></i></a>

                  <a href="delete_camping.php?id=<?= $camping['id'] ?>" title="Supprimer" class="text-lg text-[#738C69] hover:text-[#738C69]/70 transition-all duration-300"><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <hr class="mt-14 mb-10">

      <!-- Experience list as table with action buttons -->
      <div class="w-full mx-auto bg-white mb-10">
        <h2 class="text-2xl text-center uppercase mb-1">Liste des expériences</h2>
        <a href="create_experience.php" class="text-center font-medium uppercase mb-3 flex items-center justify-center gap-2 text-[#E28F20] hover:text-[#E28F20]/70 transition-all duration-300 w-fit mx-auto"><i class="fa-solid fa-plus"></i> Ajouter une expérience</a>
        <table class="w-full text-center shadow-xl text-xs sm:text-sm">
          <thead>
            <tr class="bg-[#738C69]/40">
              <th class="font-medium pl-6 py-3">ID</th>
              <th class="font-medium py-3">Nom</th>
              <th class="font-medium hidden lg:table-cell py-3">Description</th>
              <th class="pr-6"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($experiences as $index => $experience) { ?>
              <tr class="<?= $index % 2 == 1 ? 'bg-[#738C69]/20' : '' ?>">
                <td class="pl-6 py-3"><?= $experience['id'] ?></td>
                <td class="py-3"><?= $experience['name'] ?></td>
                <td class="hidden lg:table-cell py-3"><?= $experience['description'] ?></td>
                <td class="px-4 py-0 pr-6 flex gap-3 items-center justify-end py-3">
                  <a href="edit_experience.php?id=<?= $experience['id'] ?>" title="Modifier" class="text-lg text-[#738C69] hover:text-[#738C69]/70 transition-all duration-300"><i class="fa-solid fa-pen-to-square"></i></a>

                  <a href="delete_experience.php?id=<?= $experience['id'] ?>" title="Supprimer" class="text-lg text-[#738C69] hover:text-[#738C69]/70 transition-all duration-300"><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </main>

    <!-- Include Footer -->
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>
