<?php
include_once(__DIR__ . '/_components/Header.php');
?>

<div class="min-h-screen flex justify-between bg-gray-100">
  <!-- Include Sidebar -->
  <?php include_once(__DIR__ . '/_components/Sidebar.php'); ?>

  <div class="flex flex-col justify-between w-[80vw]">
    <!-- Include Navbar -->
    <?php include_once(__DIR__ . '/_components/Navbar.php'); ?>

    <main class="mx-auto py-16 px-20 bg-white w-full flex-1">
      <h2 class="text-5xl text-center font-semibold mb-4 uppercase">Nous<span class="text-[#E28F20] font-bold"> Joindre</span></h2>

      <p class="text-lg mb-4 w-[85%] mx-auto text-center">Vous souhaitez en savoir plus sur nos services ou planifier votre prochaine escapade avec Évasion Camping ? N'hésitez pas à nous contacter !</p>

      <div class="flex justify-evenly my-6">

        <div class="">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6519.833538821533!2d-71.44042260793917!3d46.60201621559993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb888f10a26361b%3A0x3e8ef83e9767b1a8!2s123%20Rue%20des%20Campeurs%2C%20Saint-Apollinaire%2C%20QC%20G0S%202E0!5e0!3m2!1sen!2sca!4v1721226837659!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="">

          <ul class="mb-4 space-y-2">
            <li class="text-lg"><span class="font-semibold block">Évasion Camping</span>
              123 Rue des Campeurs,<br>
              Québec, QC G1X 2Y5</li>
            <li class="text-lg"><a href="tel:123-456-7890" class="text-lg hover:text-[#E28F20] transition-all duration-300 flex items-center gap-2"><i class="fa-solid fa-phone text-sm"></i>(123) 456-7890</a></li>
            <li class="text-lg"><a href="mailto:info@evasioncamping.com" class="text-lg hover:text-[#E28F20] transition-all duration-300 flex items-center gap-2"><i class="fa-solid fa-envelope text-sm"></i>info@evasioncamping.com</a></li>
          </ul>

          <p class="text-lg">Heures d'ouvertures :</p>
          <ul class="mb-4">
            <li class="text-lg list-disc list-inside"><span class="font-semibold">Lundi à Vendredi :</span> 9h00 - 17h00</li>
            <li class="text-lg list-disc list-inside"><span class="font-semibold">Samedi et Dimanche :</span> 9h00 - 12h00</li>
          </ul>
        </div>
      </div>
      <div>
        <h3 class="text-2xl font-semibold uppercase mb-2">Suivez-nous</h3>
        <p class="text-lg mb-2">Restez connecté avec Évasion Camping sur les réseaux sociaux pour les dernières mises à jour, offres spéciales et inspirations pour votre prochaine aventure en plein air.</p>

        <nav><!-- Social links -->
          <ul class="flex items-center gap-2 py-4 mb-4">
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
    </main>

    <!-- Include Footer -->
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>