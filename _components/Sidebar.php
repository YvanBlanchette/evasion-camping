<?php

include_once(__DIR__ . '../..//include/helpers.php');

// Get the slug to determine the active link
$pathname = getSlug();

$LINKS = [
  [
    'name' => 'Accueil',
    'href' => 'index.php',
    'icon' => 'fa-solid fa-house mr-2',
  ],
  [
    'name' => 'Nos Campings',
    'href' => 'campings.php',
    'icon' => 'fa-solid fa-campground mr-2',
  ],
  [
    'name' => 'À Propos',
    'href' => 'about.php',
    'icon' => 'fa-solid fa-circle-info mr-2',
  ],
  [
    'name' => 'Nous Joindre',
    'href' => 'contact.php',
    'icon' => 'fa-solid fa-phone mr-2',
  ],
];
$SOCIALS = [
  [
    'name' => 'Facebook',
    'href' => 'https://facebook.com',
    'icon' => 'fa-brands fa-facebook mr-2',
  ],
  [
    'name' => 'Instagram',
    'href' => 'https://instagram.com',
    'icon' => 'fa-brands fa-instagram mr-2',
  ],
  [
    'name' => 'Twitter',
    'href' => 'https://twitter.com',
    'icon' => 'fa-brands fa-x-twitter mr-2',
  ],
  [
    'name' => 'Youtube',
    'href' => 'https://youtube.com',
    'icon' => 'fa-brands fa-youtube mr-2',
  ],
];
?>

<aside class="bg-lightGreen min-h-screen h-full w-[20vw] flex flex-col justify-between">
  <div class="px-16 pt-4 pb-4">
    <img src="./images/evasion-camping_logo.svg" alt="Évasion Camping Logo">
  </div>

  <nav class=" flex-1 flex flex-col">
    <ul class="flex flex-col  flex-1 w-full">
      <?php foreach ($LINKS as $link) { ?>
        <li class="py-4 <?php echo $pathname == $link['href'] ? "bg-[#002D0F]/60" : "hover:bg-[#002D0F]/60 transition-all duration-300" ?>">
          <a href="<?= $link['href'] ?>" class="text-xl px-8   transition-all duration-300 flex items-center uppercase">
            <i class="<?= $link['icon'] ?> text-lg"></i>
            <?= $link['name'] ?>
          </a>
        </li>
      <?php } ?>
    </ul>
  </nav>

  <nav>
    <ul class="flex items-center gap-2 justify-center py-4">
      <?php foreach ($SOCIALS as $social) { ?>
        <li title="<?= $social['name'] ?>">
          <a href="<?= $social['href'] ?>" target="_blank" class="text-2xl hover:text-[#002D0F] transition-all duration-300 flex items-center">
            <i class="<?= $social['icon'] ?>"></i>
          </a>
        </li>
      <?php } ?>
    </ul>
  </nav>
</aside>