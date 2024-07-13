<?php include_once(__DIR__ . './_components/Header.php'); ?>

<div class="min-h-screen flex justify-between">
  <!-- SIDEBAR COMPONENT -->
  <?php include_once(__DIR__ . './_components/Sidebar.php'); ?>

  <div class="flex flex-col justify-between w-[80vw]">
    <?php include_once(__DIR__ . './_components/Navbar.php') ?>

    <main class="flex-1 p-10">

      <h1>Projet final</h1>

      <!-- Campings sous forme de cartes -->
      <!-- Affiche 8 camping actifs, en ordre décroissant de popularité (le camping le plus populaire s’affiche en premier). -->
      <!-- Respectez la mise en forme existante:
        Les campings doivent s'afficher dans les cartes et doivent présenter 
        - une image (statique ou dynamique selon le # picsum)
        - la région
        - le nom du camping
        - le nombre d’étoiles
        Le lien Pour en savoir plus doit mener à la fiche détaillée du camping.
        -->

      <div class="flex">
        <div class="w-[250px] round-[5px]  m-[10px]">
          <img src="https://picsum.photos/id/380/250/120" alt="Nom du camping">
          <div class="container">
            <div class="region-and-stars">
              <div>
                <span class="material-symbols-outlined">location_on</span>
                <span class="a-programmer">Région</span>
              </div>
              <div>
                <span class="a-programmer">0</span>
                <span class="material-symbols-outlined">family_star</span>
              </div>
            </div>
            <h4 class="a-programmer">Nom du camping</h4>
            <a href="#" class="a-programmer">Pour en savoir plus</a>
          </div>
        </div>

        <div class="w-[250px] round-[5px]  m-[10px]">
          <img src="https://picsum.photos/id/71/250/120" alt="Nom du camping">
          <div class="container">
            <div class="region-and-stars">
              <div>
                <span class="material-symbols-outlined">location_on</span>
                <span class="a-programmer">Région</span>
              </div>
              <div>
                <span class="a-programmer">0</span>
                <span class="material-symbols-outlined">family_star</span>
              </div>
            </div>
            <h4 class="a-programmer">Nom du camping</h4>
            <a href="#" class="a-programmer">Pour en savoir plus</a>
          </div>
        </div>

        <div class="w-[250px] round-[5px]  m-[10px]">
          <img src="https://picsum.photos/id/124/250/120" alt="Nom du camping">
          <div class="container">
            <div class="region-and-stars">
              <div>
                <span class="material-symbols-outlined">location_on</span>
                <span class="a-programmer">Région</span>
              </div>
              <div>
                <span class="a-programmer">0</span>
                <span class="material-symbols-outlined">family_star</span>
              </div>
            </div>
            <h4 class="a-programmer">Nom du camping</h4>
            <a href="#" class="a-programmer">Pour en savoir plus</a>
          </div>
        </div>

        <div class="w-[250px] round-[5px]  m-[10px]">
          <img src="https://picsum.photos/id/127/250/120" alt="Nom du camping">
          <div class="container">
            <div class="region-and-stars">
              <div>
                <span class="material-symbols-outlined">location_on</span>
                <span class="a-programmer">Région</span>
              </div>
              <div>
                <span class="a-programmer">0</span>
                <span class="material-symbols-outlined">family_star</span>
              </div>
            </div>
            <h4 class="a-programmer">Nom du camping</h4>
            <a href="#" class="a-programmer">Pour en savoir plus</a>
          </div>
        </div>

        <div class="w-[250px] round-[5px]  m-[10px]">
          <img src="https://picsum.photos/id/128/250/120" alt="Nom du camping">
          <div class="container">
            <div class="region-and-stars">
              <div>
                <span class="material-symbols-outlined">location_on</span>
                <span class="a-programmer">Région</span>
              </div>
              <div>
                <span class="a-programmer">0</span>
                <span class="material-symbols-outlined">family_star</span>
              </div>
            </div>
            <h4 class="a-programmer">Nom du camping</h4>
            <a href="#" class="a-programmer">Pour en savoir plus</a>
          </div>
        </div>

        <div class="w-[250px] round-[5px]  m-[10px]">
          <img src="https://picsum.photos/id/177/250/120" alt="Nom du camping">
          <div class="container">
            <div class="region-and-stars">
              <div>
                <span class="material-symbols-outlined">location_on</span>
                <span class="a-programmer">Région</span>
              </div>
              <div>
                <span class="a-programmer">0</span>
                <span class="material-symbols-outlined">family_star</span>
              </div>
            </div>
            <h4 class="a-programmer">Nom du camping</h4>
            <a href="#" class="a-programmer">Pour en savoir plus</a>
          </div>
        </div>

        <div class="w-[250px] round-[5px]  m-[10px]">
          <img src="https://picsum.photos/id/203/250/120" alt="Nom du camping">
          <div class="container">
            <div class="region-and-stars">
              <div>
                <span class="material-symbols-outlined">location_on</span>
                <span class="a-programmer">Région</span>
              </div>
              <div>
                <span class="a-programmer">0</span>
                <span class="material-symbols-outlined">family_star</span>
              </div>
            </div>
            <h4 class="a-programmer">Nom du camping</h4>
            <a href="#" class="a-programmer">Pour en savoir plus</a>
          </div>
        </div>

        <div class="w-[250px] round-[5px]  m-[10px]">
          <img src="https://picsum.photos/id/217/250/120" alt="Nom du camping">
          <div class="container">
            <div class="region-and-stars">
              <div>
                <span class="material-symbols-outlined">location_on</span>
                <span class="a-programmer">Région</span>
              </div>
              <div>
                <span class="a-programmer">0</span>
                <span class="material-symbols-outlined">family_star</span>
              </div>
            </div>
            <h4 class="a-programmer">Nom du camping</h4>
            <a href="#" class="a-programmer">Pour en savoir plus</a>
          </div>
        </div>

      </div>
    </main>
    <?php include_once(__DIR__ . './_components/Footer.php'); ?>
  </div>

</div>