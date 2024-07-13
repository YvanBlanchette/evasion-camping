<?php include_once(__DIR__ . './_components/Header.php'); ?>

<div class="min-h-screen flex justify-between">
  <!-- SIDEBAR COMPONENT -->
  <?php include_once(__DIR__ . './_components/Sidebar.php'); ?>

  <div class="flex flex-col justify-between w-[80vw]">
    <?php include_once(__DIR__ . './_components/Navbar.php') ?>
    <main>

      <h1 class="a-programmer">Remplacez ce texte par le nom de l'expérience choisie par l'utilisateur</h1>
      <p class="a-programmer">Remplacez ce texte par la description de l'expérience choisie par l'utilisateur</p>

      <div class="a-programmer">
        <!-- Affichez la liste de tous les campings ACTIFS appartenant à l'expérience sélectionnée, en ordre alphabétique -->
        <!-- La mise en forme est à votre discrétion, mais ne doit pas être représentée sous forme de cartes -->
        <!-- (elle doit être différente de celle de la page d’accueil).-->
        <!-- Les informations à afficher sont :
              - l’image (statique ou dynamique selon le # picsum)
              - la région
              - le nom du camping 
              - un lien « Pour en savoir plus » menant à la fiche détaillée. 
      -->

        Remplacez ce texte par la liste des campings appartenant à l'expérience sélectionnée, tout en respectant les consignes inscrites en commentaires.
      </div>

    </main>

    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>