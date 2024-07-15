<!-- a-programmer -->

<!-- Cette page doit être utilisée pour afficher la fiche détaillée du camping choisi par l'utilisateur -->
<!-- Elle est volontairement vide, c'est à vous de la construire -->

<!-- La mise en forme est à votre discrétion. -->

<!-- Les informations à afficher sont 
        - l’image (statique ou dynamique selon le # picsum)
        - le nom du camping
        - la région
        - la description
        - l'adresse complète (adresse, ville et code postal)
        - le nombre d’étoiles
        - le nombre de terrains
        - la mention « animaux acceptés : » suivie de « oui » ou « non ». 
-->

<!-- Assurez-vous que la page affiche l'entête et le pied de page, comme les autres pages -->
<!-- et que tout est valide W3C -->

<?php
// Include Header
include_once(__DIR__ . '/_components/Header.php');

// Prepare the SQL query
if ($requete = $mysqli->prepare("SELECT * FROM campings WHERE id=?")) {
        // Bind parametres to the prepared query
        $requete->bind_param("i", $_GET['id']);
        // Execute the query
        $requete->execute();
        // Get the results from the query
        $result = $requete->get_result();
        // Get the associated array
        $camping = $result->fetch_assoc();
        // Close the query
        $requete->close();
}

?>

<div class="min-h-screen flex justify-between bg-gray-100">
        <!-- Include Sidebar -->
        <?php include_once(__DIR__ . '/_components/Sidebar.php'); ?>

        <div class="flex flex-col justify-between w-[80vw]">
                <!-- Include Navbar -->
                <?php include_once(__DIR__ . '/_components/Navbar.php'); ?>

                <main class="flex-1 flex justify-center mx-auto p-10 px-20 bg-gray-100 w-full gap-10">
                        <div class="w-fit">
                                <img src="https://picsum.photos/id/<?= $camping['id_picsum'] ?>/300/300" alt="<?= $camping['nom'] ?>" class="min-w-[300px]">
                        </div>

                        <div class="bg-red-500 w-fit">
                                <!-- Title with camping's name -->
                                <h1 class="text-3xl uppercase w-fit"><?= $camping['nom'] ?></h1>
                                <div class="mb-2 flex gap-4 w-fit">
                                        <div class="w-fit">
                                                <?php for ($i = 0; $i < $camping['nb_etoiles']; $i++) { ?>
                                                        <i class="fa-solid fa-star text-[#E28F20]"></i>
                                                <?php } ?>
                                        </div>
                                        <div class="text-smw-fit">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <span><?= $camping['region'] ?></span>
                                        </div>
                                </div>
                                <ul class="mb-3 w-fit">
                                        <li>
                                                <p class=" w-fit"><?= $camping['adresse'] ?>,</p>
                                                <p class="leading-none w-fit"><?= $camping['ville'] ?>, Québec</p>
                                                <p class="leading-none mb-4 w-fit"><?= $camping['code_postal'] ?></p>
                                        </li>
                                        <li>
                                                <p><span class="font-medium w-fit">Nombres de terrains:</span> <?= $camping['nb_terrains'] ?> terrains</p>
                                        </li>
                                        <li>
                                                <p><span class="font-medium w-fit">Accepte les animaux:</span> <?= $camping['accepte_animaux'] == '1' ?  "Oui" :  "Non" ?></p>
                                        </li>
                                        <li>
                                                <p><span class="font-medium w-fit">Type d'expérience:</span> <?php switch ($camping['experience_id']) {
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
                                <div class="w-fit">
                                        <p class="w-[70%]"><?= $camping['description'] ?></p>
                                </div>
                        </div>
                </main>

                <!-- Include Footer -->
                <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
        </div>
</div>