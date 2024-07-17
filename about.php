<?php
include_once(__DIR__ . '/_components/Header.php');
?>

<div class="min-h-screen flex justify-between bg-gray-100">
  <!-- Include Sidebar -->
  <?php include_once(__DIR__ . '/_components/Sidebar.php'); ?>

  <div class="flex flex-col justify-between w-[80vw]">
    <!-- Include Navbar -->
    <?php include_once(__DIR__ . '/_components/Navbar.php'); ?>

    <main class="mx-auto py-16 px-20 bg-gray-100 w-full flex-1 flex justify-center  gap-10">
      <div class="">
        <h2 class="text-4xl font-semibold mb-4 uppercase">À propos d'<span class="text-[#E28F20] font-extrabold">Évasion Camping</span></h2>

        <p class="text-lg mb-4">Bienvenue sur Évasion Camping, votre guide ultime pour découvrir le camping sauvage à travers le Québec. Nous sommes passionnés par la nature et nous nous engageons à vous offrir une expérience authentique et enrichissante au cœur des grands espaces.</p>

        <h3 class="text-2xl font-semibold uppercase mb-2">Notre Mission</h3>
        <p class="text-lg mb-4">À Évasion Camping, notre mission est de promouvoir le camping sauvage tout en préservant et respectant l'environnement naturel du Québec. Nous croyons en l'importance de reconnecter avec la nature, en offrant des séjours qui permettent de découvrir la beauté des paysages québécois tout en conservant leur intégrité écologique.</p>

        <p class="text-lg mb-2">Ce que nous offrons :</p>
        <ul class="mb-4">
          <li class="text-lg list-disc"><span class="font-bold">Exploration Authentique: </span>Nous vous invitons à explorer des terrains de camping soigneusement sélectionnés pour leur beauté naturelle et leur accès privilégié à des sites remarquables.</li>
          <li class="text-lg list-disc"><span class="font-bold">Diversité de l'Expérience: </span>Que vous soyez un amateur de randonnée, un passionné de pêche, ou simplement à la recherche d'un lieu paisible pour vous ressourcer, Évasion Camping vous offre une variété d'expériences adaptées à vos besoins et à vos envies.</li>
          <li class="text-lg list-disc"><span class="font-bold">Engagement Environnemental: </span>Nous sommes engagés dans la conservation de l'environnement. Chaque séjour chez Évasion Camping contribue à soutenir des pratiques durables et respectueuses de la nature.</li>
        </ul>

        <h3 class="text-2xl font-semibold uppercase mb-2">Joignez-vous à Nous</h3>
        <p class="text-lg mb-2">Découvrez avec nous la beauté et la tranquillité du camping sauvage au Québec. Que vous soyez un aventurier aguerri ou un novice en quête de nouvelles découvertes, Évasion Camping vous invite à vivre des moments inoubliables dans les paysages préservés du Québec.</p>

        <p class="text-lg mb-2">Pour plus d'informations sur nos services et pour planifier votre prochaine escapade, n'hésitez pas à nous contacter. Rejoignez la communauté d'Évasion Camping et préparez-vous à vivre une aventure unique au cœur de la nature québécoise.</p>

        <p class="text-lg">Contactez-nous dès aujourd'hui pour commencer votre voyage avec Évasion Camping.</p>
      </div>
    </main>

    <!-- Include Footer -->
    <?php include_once(__DIR__ . '/_components/Footer.php'); ?>
  </div>
</div>