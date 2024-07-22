<?php
include_once(__DIR__ . '/_components/Header.php');

$camping = [];
$reviews = [];

// Function to get the camping details
function getCampingDetails($mysqli, $campingId)
{
        $camping = [];

        // Query to get the camping details
        if ($request = $mysqli->prepare("SELECT * FROM campings WHERE id=?")) {
                // Bind the parameters to the prepared query
                $request->bind_param("i", $campingId);
                // Execute the query
                $request->execute();
                // Get the result of the query
                $result = $request->get_result();
                // Fetch the results and store them in the $camping array
                $camping = $result->fetch_assoc();
                // Close the query
                $request->close();
        }

        return $camping;
}

// Function to get the reviews for a camping
function getReviewsForCamping($mysqli, $campingId)
{
        $reviews = [];

        // Query to get the reviews for the camping
        if ($request = $mysqli->prepare("SELECT * FROM reviews WHERE camping_id = ?")) {
                // Bind the parameters to the prepared query
                $request->bind_param("i", $campingId);
                // Execute the query
                $request->execute();
                // Get the result of the query
                $result = $request->get_result();
                // Fetch the results and store them in the reviews array
                $reviews = $result->fetch_all(MYSQLI_ASSOC);
                // Close the query
                $request->close();
        }

        return $reviews;
}

// Get the camping details and reviews
$campingId = $_GET['id'] ?? 0;
// If the camping ID is provided
if ($campingId > 0) {
        // Get the camping details
        $camping = getCampingDetails($mysqli, $campingId);
        // Get the reviews for the camping
        $reviews = getReviewsForCamping($mysqli, $campingId);
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
      <h1 class="text-base sm:text-lg md:text-2xl lg:text-4xl font-light uppercase text-center mb-6">Fiche du <span class="text-[#E28F20] font-bold">camping</span></h1>
                        <div class="flex justify-center">
                                <!-- Image -->
                                <div class="hidden md:flex w-[45%] justify-center">
                                        <img src="https://picsum.photos/id/<?= $camping['id_picsum'] ?? '' ?>/400/400" alt="<?= $camping['name'] ?? 'Évasion Camping' ?>" class="w-[350px]">
                                </div>

                                <div class="w-[55%]">
                                        <!-- Title with the camping's name -->
                                        <h1 class="text-xl md:text-3xl text-center md:text-start uppercase"><?= $camping['name'] ?? 'Évasion Camping' ?></h1>

                                        <div class="mb-2 flex gap-4 justify-center md:justify-start">
                                                <!-- Number of Stars -->
                                                <div>
                                                        <?php
                                                        if (isset($camping['nb_stars'])) {
                                                                for ($i = 0; $i < $camping['nb_stars']; $i++) {
                                                                        echo '<i class="fa-solid fa-star text-[#E28F20]"></i>';
                                                                }
                                                        }
                                                        ?>
                                                </div>

                                                <!-- Region -->
                                                <div class="text-sm">
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        <span><?= $camping['region'] ?? '' ?></span>
                                                </div>
                                        </div>
                                        <div class="md:hidden">
                                          <img src="https://picsum.photos/id/<?= $camping['id_picsum'] ?? '' ?>/300/300" alt="<?= $camping['name'] ?? 'Évasion Camping' ?>" class="min-w-[300px]">
                                       </div>
                                        <ul class="my-3">
                                                <!-- Address -->
                                                <li>
                                                        <p><?= $camping['address'] ?? '1234, rue du bananier' ?>,</p>
                                                        <p class="leading-none"><?= $camping['city'] ?? 'BananaVille' ?>, Québec</p>
                                                        <p class="mb-4"><?= $camping['postal_code'] ?? 'B4N 4N4' ?></p>
                                                </li>
                                                <!-- Number of terrains -->
                                                <li>
                                                        <p><span class="font-medium">Nombre de terrains:</span> <?= $camping['nb_terrains'] ?? '0' ?> terrains</p>
                                                </li>
                                                <!-- Accepts animals -->
                                                <li>
                                                        <p><span class="font-medium">Accepte les animaux:</span> <?= $camping['accept_animals'] == '1' ?  "Oui" :  "Non" ?></p>
                                                </li>
                                                <!-- Experience -->
                                                <li>
                                                        <p><span class="font-medium">Type d'expérience:</span>
                                                                <?php
                                                                //  If the experience ID is provided
                                                                if (isset($camping['experience_id'])) {
                                                                        //  Display the corresponding experience name
                                                                        switch ($camping['experience_id']) {
                                                                                case "1":
                                                                                        echo "Tranquilité";
                                                                                        break;
                                                                                case "2":
                                                                                        echo "Activités sportives";
                                                                                        break;
                                                                                case "3":
                                                                                        echo "Hivernal";
                                                                                        break;
                                                                                case "4":
                                                                                        echo "Camping en tente";
                                                                                        break;
                                                                                case "5":
                                                                                        echo "Prêts à camper";
                                                                                        break;
                                                                        }
                                                                }
                                                                ?>
                                                        </p>
                                                </li>
                                        </ul>

                                        <!-- Description -->
                                        <div>
                                                <p><?= $camping['description'] ?? 'Description du camping' ?></p>
                                        </div>
                                </div>

                        </div>
                        </main>
                        <main class="flex-1 py-12 px-[5vw] bg-[#738C69]/20">
                        <!-- Reviews -->
                        <div class="mx-auto p-10 w-full">
                                <h2 class="text-lg md:text-3xl uppercase text-center mb-4">Commentaires de nos visiteurs</h2>

                                <?php foreach ($reviews as $review) { ?>
                                        <!-- Review cards -->
                                        <article class="relative bg-gray-100 rounded-md  mx-auto p-8 md:ps-16 md:pe-8 my-3 shadow-xl">
                                                <div class="flex justify-between">
                                                        <!-- Review Username -->
                                                        <h3 class="text-xl"><?= $review['username'] ?? '' ?></h3>
                                                        <!-- If user is ADMIN, display edit and delete buttons -->
                                                        <?php if ($ADMIN) { ?>
                                                                <div class="text-lg px-2 py-1 flex gap-3">
                                                                        <a href="edit_review.php?id=<?= $review['review_id'] ?>" class="text-[#738C69] hover:text-[#738C69]/70 transition-all duration-300" title="Modifier">
                                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>
                                                                        <a href="delete_review.php?id=<?= $review['review_id'] ?>" class="text-[#738C69] hover:text-[#738C69]/70 transition-all duration-300" title="Supprimer">
                                                                                <i class="fa-solid fa-trash"></i>
                                                                        </a>
                                                                </div>
                                                        <?php } ?>
                                                </div>
                                                <p class="flex items-baseline gap-2"><span>
                                                                <!-- Review Stars -->
                                                                <?php for ($i = 0; $i < $review['nb_stars']; $i++) { ?>
                                                                        <i class="fa-solid fa-star text-sm text-[#E28F20]"></i>
                                                                <?php } ?>
                                                        </span>
                                                        <!-- Visit Date -->
                                                        <span class="text-xs text-gray-500">
                                                                <?= $review['date'] ?? '' ?>
                                                        </span>
                                                </p>
                                                <!-- Review -->
                                                <p class="text-sm md:text-base"><?= $review['review'] ?? '' ?></p>
                                        </article>
                                <?php } ?>

                                <!-- Leave a Review Form -->
                                <article class="bg-gray-100 rounded-md mx-auto p-4 px-6 md:px-16 my-3 mt-8 shadow-xl">
                                        <h3 class="text-base md:text-2xl uppercase text-center  my-4">Comment avez-vous apprécié votre visite?</h3>
                                        <?php include_once(__DIR__ . '/_components/ReviewForm.php') ?>
                                </article>
                        </div>
                </main>

                <!-- Include Footer -->
                <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
        </div>
</div>