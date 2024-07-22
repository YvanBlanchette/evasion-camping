<?php
// Include Header
include_once(__DIR__ . '/_components/Header.php');

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

    <main class="flex-1 py-12 px-[5vw] bg-gray-100">
      <div class="mx-auto pt-6 pb-10 pl-10 pr-8 bg-gray-100 w-full flex-1 flex flex-col justify-center gap-10">
        <article class="bg-[#CDD4CC]/50 rounded-md mx-auto p-4 px-10 my-3 shadow-xl py-10">
          <h1 class="text-4xl text-center uppercase font-semibold mb-4">Ajouter une <span class="text-[#E28F20] font-bold">experience</span></h1>

          <form method="POST" action="/evasion-camping/_actions/act-create_experience.php" class="my-10">
            <div class="flex justify-between items-center gap-10 mb-4">
              <!-- experience name -->
              <div class="flex flex-col gap-1 w-full">
                <label class="block" for="name">Nom de l'experience<span class="text-red-500"> *</span></label>
                <input type="text" id="name" name="name" placeholder="ex: Familiale" class="px-4 py-1" required minlength="5" maxlength="50">
              </div>
            </div>

            <!-- Description -->
            <div class="flex flex-col gap-1 w-full">
              <label for="description">Description<span class="text-red-500"> *</span></label>
              <textarea name="description" id="description" rows="5" minlength="5" maxlength="500" class="px-2 py-1" required></textarea>
              <div class="flex items-start">
                <small><span class="text-red-500">*</span> Champs obligatoires</small>
              </div>
            </div>
            <div class="flex justify-end gap-4 items-center text-end mt-6">
              <a href="/evasion-camping/dashboard.php" class="px-4 py-1 hover:bg-[#99AB93] text-white bg-[#738C69] transition-all duration-300 cursor-pointer rounded-md">Retour</a>
              <input type="submit" value="Ajouter" class="px-4 py-1 hover:bg-[#e28f20]/70 text-white bg-[#e28f20] transition-all duration-300 cursor-pointer rounded-md">
            </div>
          </form>

        </article>
      </div>
    </main>

    <!-- Include Footer -->
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>