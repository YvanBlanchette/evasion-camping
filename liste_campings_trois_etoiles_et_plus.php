<?php
// Include the header
include_once(__DIR__ . '/_components/Header.php');

$campings = [];

// Get all the active campings that have a rating of at least 3 stars
if ($result = $mysqli->query("
    SELECT * FROM campings 
    WHERE actif = 1 
    AND nb_stars >= 3 
    ORDER BY name ASC
")) {
  // fetch the results from the query and store them in the campings array
  $campings = $result->fetch_all(MYSQLI_ASSOC);
}
?>


<div class="min-h-screen w-[100vw] flex justify-between">
  <!-- Include Sidebar -->
    <?php include_once(__DIR__ . '/_components/Sidebar.php') ?>

  <div class="flex flex-col justify-between w-[100vw] lg:w-[80vw]">
    <!-- Include Navbar -->
    <?php include_once(__DIR__ . '/_components/Navbar.php') ?>

    <main class="flex-1 py-12 px-[5vw] bg-gray-100">
      <!-- Title -->
      <h1 class="text-2xl md:text-4xl uppercase text-center mb-6">CAMPINGS 3<span class="text-[#E28F20] text-2xl md:text-4xl">★</span> et plus</h1>

      <!-- Camping list -->
      <div class="flex flex-wrap justify-between">
        <ul class="space-y-8">

          <?php foreach ($campings as $camping) { ?>
            <li>
              <div class="min-h-[200px] rounded-md bg-white shadow-xl flex flex-col md:flex-row">
                <!-- IMAGE -->
                <div class="w-[100%] md:w-1/5">
                  <img class="w-[100%] md:w-[200px]  h-full rounded-l-md object-cover" src="https://picsum.photos/id/<?= $camping['id_picsum'] ?>/200/200" alt="<?= $camping['name'] ?>">
                </div>
                <!-- NAME -->
                <div class="md:w-4/5 px-6 pt-2 pb-4 flex flex-col">
                  <h4 class="text-xl text-center md:text-start md:text-3xl"><?= $camping['name'] ?></h4>
                  <!-- REGION/RATING -->
                  <div class="mb-2 flex items-center gap-3 justify-center md:justify-start">
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
                  <!-- DESCRIPTION -->
                  <p class="hidden md:block"><?= $camping['description'] ?></p>
                  <div class="text-center md:text-end mt-2">
                    <!-- BUTTON -->
                    <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="bg-[#C7D1C3] hover:bg-[#738C69] px-3 py-1 rounded-sm uppercase font-medium text-sm transition-all duration-300">En savoir plus</a>
                  </div>
                </div>
              </div>
            </li>
          <?php } ?>

        </ul>
      </div>
    </main>
    <!-- Include Footer -->
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>