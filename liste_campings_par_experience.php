<?php
// Include Header
include_once(__DIR__ . '/_components/Header.php');

$experience_id = $_GET['experience_id'];
$campings = [];
$experience_name = '';
$experience_description = '';

// If experience_id is provided
if ($experience_id) {
  // Get the experience details
  $experience_details = $mysqli->query("SELECT name, description FROM experiences WHERE id = '$experience_id'");

  // If the experience is found
  if ($experience_details) {
    // Fetch the experience data
    $experience_data = $experience_details->fetch_assoc();
    // Set the experience name and description
    $experience_name = $experience_data['name'];
    $experience_description = $experience_data['description'];
  }

  // Prepare the SQL query to get campings by experience_id
  $request = $mysqli->prepare("
        SELECT 
            campings.id AS id,
            campings.name AS name, 
            campings.region AS region, 
            campings.nb_stars AS nb_stars, 
            campings.id_picsum AS id_picsum,
            campings.description AS description
        FROM 
            campings
        JOIN
            experiences ON campings.experience_id = experiences.id
        WHERE 
            campings.experience_id = ?
            AND campings.actif = 1 
        ORDER BY 
            name ASC
    ");

  if ($request) {
    // Bind the experience_id parameter to the query
    $request->bind_param('i', $experience_id);
    // Execute the query
    $request->execute();
    // Get the result of the query
    $result = $request->get_result();
    // Fetch all the rows from the result and store them in the campings array
    $campings = $result->fetch_all(MYSQLI_ASSOC);
    // Close the query
    $request->close();
  }
}
?>

<div class="min-h-screen flex justify-between bg-gray-100">
  <!-- Include Sidebar -->
  <?php include_once(__DIR__ . '/_components/Sidebar.php'); ?>

  <div class="flex flex-col justify-between w-[80vw]">
    <!-- Include Navbar -->
    <?php include_once(__DIR__ . '/_components/Navbar.php'); ?>

    <main class="flex-1 p-10 px-16 pl-20 bg-[c0c0c0] flex flex-col items-center">
      <!-- Title with experience name -->
      <h1 class="text-3xl uppercase text-center mb-4">Campings par expérience: <span class="text-[#E28F20] font-bold"><?= $experience_name ?></span></h1>

      <!-- Experience Description -->
      <p class="text-center mb-6 w-[90%] mx-auto"><?= $experience_description ?></p>

      <!-- Campings list by experience -->
      <div class="flex flex-col gap-6">
        <ul class="space-y-8">
          <?php foreach ($campings as $camping) { ?>
            <li>
              <div class="min-h-[200px] rounded-md bg-white shadow-xl flex">
                <!-- IMAGE -->
                <div class="w-1/4">
                  <img class="w-[200px]  h-full rounded-l-md object-cover" src="https://picsum.photos/id/<?= $camping['id_picsum'] ?>/200/200" alt="<?= $camping['name'] ?>">
                </div>
                <!-- DETAILS -->
                <div class="w-3/4 px-6 pt-2 pb-4 flex flex-col">
                  <h4 class="text-3xl"><?= $camping['name'] ?></h4>
                  <!-- REGION/RATING -->
                  <div class="mb-2 flex items-center gap-3">
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
                  <p><?= $camping['description'] ?></p>
                  <div class="text-end mt-2">
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