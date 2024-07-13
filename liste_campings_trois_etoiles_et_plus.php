<?php

include_once(__DIR__ . './_components/Header.php'); ?>

<div class="min-h-screen flex justify-between">
  <!-- SIDEBAR COMPONENT -->
  <?php include_once(__DIR__ . './_components/Sidebar.php'); ?>

  <div class="flex flex-col justify-between w-[80vw]">
    <?php include_once(__DIR__ . './_components/Navbar.php') ?>

    <main>

      <h1>Campings 3* et plus</h1>

      <div class="a-programmer">
        <!-- Afficher la liste de tous les campings ACTIFS et 3 étoiles ou plus en ordre alphabétique -->
        <!-- L'affichage de la liste des campings doit être le même que celui utilisé pour l'affichage des campings par expérience -->

        Remplacez ce texte par la liste des campings étoiles ou plus, tout en respectant les consignes inscrites en commentaires.
      </div>

    </main>
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>