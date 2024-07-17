<?php
// Include Header
include_once(__DIR__ . '/_components/Header.php');

// Preparing the SQL query
if ($request = $mysqli->prepare("SELECT * FROM campings WHERE id=?")) {
        // Binding the parametres to the prepared query
        $request->bind_param("i", $_GET['id']);
        // Executing the query
        $request->execute();
        // Getting the results from the query
        $result = $request->get_result();
        // Fetching the associated data
        $camping = $result->fetch_assoc();
        // Closing the query
        $request->close();
}

// Preparing the SQL query
if ($request2 = $mysqli->prepare("SELECT * FROM reviews WHERE camping_id = ?")) {
        // Binding the parametres to the prepared query
        $request2->bind_param("i", $_GET['id']);
        // Executing the query
        $request2->execute();
        // Getting the results from the query
        $result2 = $request2->get_result();
        // Fetching the associated data
        $reviews = $result2->fetch_all(MYSQLI_ASSOC);
        // Closing the query
        $request2->close();
}

?>

<div class="min-h-screen flex justify-between bg-gray-100">
        <!-- Include Sidebar -->
        <?php include_once(__DIR__ . '/_components/Sidebar.php'); ?>

        <div class="flex flex-col justify-between w-[80vw]">
                <!-- Include Navbar -->
                <?php include_once(__DIR__ . '/_components/Navbar.php'); ?>

                <main class="">
                        <div class="mx-auto py-16 px-20 bg-gray-100 w-full flex-1 flex justify-center  gap-10">

                                <div>
                                        <img src="https://picsum.photos/id/<?= $camping['id_picsum'] ?>/300/300" alt="<?= $camping['nom'] ?>" class="min-w-[300px]">
                                </div>

                                <div>
                                        <!-- Title with camping's name -->
                                        <h1 class="text-3xl uppercase "><?= $camping['nom'] ?></h1>
                                        <div class="mb-2 flex gap-4 ">
                                                <div>
                                                        <?php for ($i = 0; $i < $camping['nb_etoiles']; $i++) { ?>
                                                                <i class="fa-solid fa-star text-[#E28F20]"></i>
                                                        <?php } ?>
                                                </div>
                                                <div class="text-sm">
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        <span><?= $camping['region'] ?></span>
                                                </div>
                                        </div>
                                        <ul class="mb-3 ">
                                                <li>
                                                        <p class=" "><?= $camping['adresse'] ?>,</p>
                                                        <p class="leading-none "><?= $camping['ville'] ?>, Québec</p>
                                                        <p class="leading-none mb-4 "><?= $camping['code_postal'] ?></p>
                                                </li>
                                                <li>
                                                        <p><span class="font-medium ">Nombres de terrains:</span> <?= $camping['nb_terrains'] ?> terrains</p>
                                                </li>
                                                <li>
                                                        <p><span class="font-medium ">Accepte les animaux:</span> <?= $camping['accepte_animaux'] == '1' ?  "Oui" :  "Non" ?></p>
                                                </li>
                                                <li>
                                                        <p><span class="font-medium ">Type d'expérience:</span> <?php switch ($camping['experience_id']) {
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
                                                                                                                } ?></p>
                                                </li>
                                        </ul>
                                        <div>
                                                <p><?= $camping['description'] ?></p>
                                        </div>
                                </div>

                        </div>

                        <!-- Reviews -->
                        <div class="mx-auto p-10 px-20 w-full bg-[#738C69]/20">
                                <h2 class="text-3xl uppercase text-center mb-4">Commentaires de nos visiteurs</h2>

                                <?php foreach ($reviews as $review) { ?>
                                        <!-- Review cards -->
                                        <article class="relative bg-gray-100 rounded-md w-[85%] mx-auto p-4 ps-16 pe-8 my-3 shadow-xl">
                                                <div class="flex justify-between">
                                                        <!-- Review Username -->
                                                        <h3 class="text-xl"><?= $review['username'] ?></h3>
                                                        <!-- If user is ADMIN, display edit and delete buttons -->
                                                        <?php if ($ADMIN) { ?>
                                                                <div class="text-lg px-2 py-1 flex gap-3">
                                                                        <a href="EditReview.php?id=<?= $review['review_id'] ?>" class="text-[#738C69] hover:text-[#738C69]/70 transition-all duration-300" title="Modifier">
                                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>
                                                                        <a href="DeleteConfirmation.php?id=<?= $review['review_id'] ?>" class="text-[#738C69] hover:text-[#738C69]/70 transition-all duration-300" title="Supprimer">
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
                                                                <?= $review['date'] ?>
                                                        </span>
                                                </p>
                                                <!-- Review -->
                                                <p><?= $review['review'] ?></p>
                                        </article>
                                <?php } ?>
                                <article class="bg-gray-100 rounded-md w-[85%] mx-auto p-4 px-16 my-3 mt-8 shadow-xl">
                                        <h3 class="text-2xl uppercase text-center  my-4">Comment avez-vous apprécié votre visite?</h3>
                                        <?php include_once(__DIR__ . '/_components/ReviewForm.php') ?>
                                </article>
                        </div>
                </main>

                <!-- Include Footer -->
                <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
        </div>
</div>