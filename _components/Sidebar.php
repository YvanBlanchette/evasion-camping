<?php
include_once(__DIR__ . '../../include/helpers.php');

$pathname = getSlug();

$LINKS = [
  ['name' => 'Accueil', 'href' => 'index.php', 'icon' => 'fa-solid fa-house mr-2'],
  ['name' => 'Nos Campings', 'href' => 'liste_campings.php', 'icon' => 'fa-solid fa-campground mr-2'],
  ['name' => 'À Propos', 'href' => 'about.php', 'icon' => 'fa-solid fa-circle-info mr-2'],
  ['name' => 'Nous Joindre', 'href' => 'contact.php', 'icon' => 'fa-solid fa-phone mr-2'],
];

$SOCIALS = [
  ['name' => 'Facebook', 'href' => 'https://facebook.com', 'icon' => 'fa-brands fa-facebook mr-2'],
  ['name' => 'Instagram', 'href' => 'https://instagram.com', 'icon' => 'fa-brands fa-instagram mr-2'],
  ['name' => 'Twitter', 'href' => 'https://twitter.com', 'icon' => 'fa-brands fa-x-twitter mr-2'],
  ['name' => 'Youtube', 'href' => 'https://youtube.com', 'icon' => 'fa-brands fa-youtube mr-2'],
];

$ADMIN_LINKS = [
  'tableau_de_bord.php', 'EditCamping.php', 'AddCamping.php', 'DeleteCamping.php', 'EditExperience.php', 'AddExperience.php'
];

function renderMenuItem($link, $pathname)
{
  $isActive = $pathname == $link['href'] ||
    ($pathname == 'liste_campings_trois_etoiles_et_plus.php' && $link['href'] == 'liste_campings.php') ||
    ($pathname == 'liste_campings_par_experience.php' && $link['href'] == 'liste_campings.php');

  $activeClass = $isActive ? "bg-[#002D0F]/60 text-[#E28F20] pointer-events-none" : "hover:bg-[#002D0F]/50 transition-all duration-300 hover:text-[#E28F20]";

  return "
    <li class='py-4 $activeClass'>
        <a href='{$link['href']}' class='text-xl px-8 transition-all duration-300 flex items-center gap-2 uppercase'>
            <i class='{$link['icon']} text-lg'></i>
            {$link['name']}
        </a>
    </li>
  ";
}

?>

<aside>
  <div class="fixed flex flex-col justify-between h-full w-[20vw] bg-lightGreen">
    <a href="index.php" class="px-12 pt-4 pb-4">
      <img src="./images/evasion-camping_logo.svg" alt="Évasion Camping Logo">
    </a>

    <nav class="flex-1 flex flex-col">
      <ul class="flex flex-col flex-1 w-full">
        <?php
        foreach ($LINKS as $link) {
          echo renderMenuItem($link, $pathname);
        }

        // Admin links
        if ($ADMIN) {
          $adminLink = [
            'name' => 'Tableau de bord',
            'href' => 'tableau_de_bord.php',
            'icon' => 'fa-solid fa-user-gear'
          ];
          echo renderMenuItem($adminLink, $pathname);
        }
        ?>
      </ul>
    </nav>

    <nav class="text-center">
      <!-- Toggle for the user's role -->
      <form method="POST">
        <input type="hidden" name="toggle_role" value="1">
        <button type="submit" class="text-3xl hover:text-[#E28F20] transition-all duration-300 flex flex-col justify-center items-center mx-auto">
          <?php if ($ADMIN) : ?>
            <i title="Administrateur" class="fa-solid fa-user-tie"></i>
          <?php else : ?>
            <i title="Utilisateur" class="fa-solid fa-user"></i>
          <?php endif; ?>
          <small class="leading-none text-xs mt-1"><?= $ADMIN ? 'Administrateur' : 'Utilisateur' ?></small>
        </button>
      </form>

      <!-- Social links -->
      <ul class="flex items-center gap-2 justify-center py-4 mb-4">
        <?php foreach ($SOCIALS as $social) { ?>
          <li title="<?= $social['name'] ?>">
            <a href="<?= $social['href'] ?>" target="_blank" class="text-2xl hover:text-[#E28F20] transition-all duration-300 flex items-center">
              <i class="<?= $social['icon'] ?>"></i>
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  </div>
</aside>