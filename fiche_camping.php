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
if ($requete = $mysqli->prepare("SELECT * FROM produits WHERE id=?")) {  // Création d'une requête préparée 

        $requete->bind_param("i", $_GET['id']); // Envoi des paramètres à la requête
        $requete->execute(); // Exécution de la requête

        $result = $requete->get_result(); // Récupération de résultats de la requête
        $produit = $result->fetch_assoc(); // Récupération de l'enregistrement

        $requete->close(); // Fermeture du traitement 
}

$mysqli->close(); // Fermeture de la connexion 

$title = getTitle();

?>