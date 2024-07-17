<?php
include_once(__DIR__ . '/_components/Header.php');

// Fetch the 8 most popular campings
$campings = [];
// Fetch all the active campings, sorted by popularity and limit the result to 8 
if ($result = $mysqli->query("SELECT * FROM campings WHERE actif = 1 ORDER BY popularite DESC LIMIT 8")) {
  // Store the result in the campings array
  $campings = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<div class="min-h-screen flex justify-between">
  <!-- Include Sidebar -->
  <?php include_once(__DIR__ . '/_components/Sidebar.php') ?>

  <div class="flex flex-col justify-between w-[80vw]">
    <!-- Include Navbar -->
    <?php include_once(__DIR__ . '/_components/Navbar.php') ?>

    <main class="flex-1 p-10 pl-16">
      <!-- Title -->
      <h1 class="text-4xl font-light uppercase text-center mb-6">Nos campings <span class="text-[#E28F20] font-bold">les plus populaires</span></h1>

      <!-- Campings list -->
      <div class="flex flex-wrap justify-between">
        <?php foreach ($campings as $camping) { ?>
          <!-- Camping card -->
          <div class="w-[250px] text-gray-900 rounded-[5px] m-[10px] bg-white shadow-xl">
            <img src="https://picsum.photos/id/<?= $camping['id_picsum'] ?>/250/122" alt="<?= $camping['name'] ?>">
            <div class="px-4 pt-2 pb-4 flex flex-col items-center">
              <h4 class="a-programmer"><?= $camping['name'] ?></h4>
              <div class="mb-2">
                <div class="text-center text-sm">
                  <i class="fa-solid fa-location-dot"></i>
                  <span><?= $camping['region'] ?></span>
                </div>
                <div class="text-center">
                  <?php for ($i = 0; $i < $camping['nb_stars']; $i++) { ?>
                    <i class="fa-solid fa-star text-sm text-[#E28F20]"></i>
                  <?php } ?>
                </div>
              </div>
              <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="bg-[#C7D1C3] hover:bg-[#738C69] px-3 py-1 rounded-sm uppercase font-medium text-sm transition-all duration-300">En savoir plus</a>
            </div>
          </div>
        <?php } ?>
      </div>
    </main>

    <!-- Include Footer -->
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>