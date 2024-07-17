<?php
$title = getTitle();

// Function to format the page title
function formatTitle($title)
{
  $titles = [
    "Index" => "Accueil",
    "evasion-camping" => "Accueil",
    "liste_campings_trois_etoiles_et_plus" => "NOS CAMPINGS",
    "liste_campings_par_experience" => "NOS CAMPINGS",
    "fiche_camping" => "NOS CAMPINGS",
    "liste_campings" => "NOS CAMPINGS",
    "edit_review" => "Modifier un commentaire",
    "delete_review" => "Supprimer un commentaire",
    "dashboard" => "Tableau de bord",
    "about" => "À propos",
    "contact" => "Nous joindre",
    "edit_camping" => "Modifier un camping",
    "create_experience" => "Ajouter une expérience",
  ];

  return $titles[$title] ?? $title;
}

// Function to get the current date
function getCurrentDate()
{
  date_default_timezone_set('Canada/Eastern');
  return date('d-m-Y');
}

// Function to get the current time
function getCurrentTime()
{
  date_default_timezone_set('Canada/Eastern');
  return date('H:i');
}

// Create the experiences array
$experiences = [];

// Get all the experiences
$res = $mysqli->query("SELECT * FROM experiences ORDER BY id ASC;");
// Loop through the results and add them to the $experiences array
while ($row = $res->fetch_assoc()) {
  $experiences[] = $row;
}

// User's role toggle
if (isset($_POST['toggle_role'])) {
  $ADMIN = !$ADMIN;
}
?>


<header class="w-full h-[60px] bg-[#738C69]/40 flex justify-between px-[5vw] items-center">
  <!-- Page title -->
  <h2 class="text-2xl uppercase">
    <?= formatTitle($title); ?>
  </h2>

  <!-- Navigation menu for the campings pages only -->
  <?php if ($title == 'NOS CAMPINGS') : ?>
    <nav class="flex-1 flex items-center justify-evenly px-10 h-full ">
      <ul class="flex-1 flex justify-end items-center h-full mr-8">
        <li class="hover:text-[#002D0F]/60 px-4 py-2 transition-all duration-300 h-full flex justify-center items-center font-medium">
          <a href="liste_campings.php" class="0">Tous les campings</a>
        </li>
        <li class="hover:text-[#002D0F]/60 px-6 py-2 transition-all duration-300 h-full flex justify-center items-center font-medium">
          <a href="liste_campings_trois_etoiles_et_plus.php" class="0">3<span class="text-[#E28F20] text-xl">★</span> et plus</a>
        </li>
      </ul>

      <!-- Filter by experiences -->
      <form action="liste_campings_par_experience.php" method="GET" class="flex-1/2 flex flex-col items-end">
        <label for="experiences" class="block text-sm tracking-wide">Filtrer par expériences :</label>
        <select name="experience_id" id="experiences" onchange="this.form.submit()" class="text-sm cursor-pointer">
          <option disabled selected>Sélectionnez une expérience</option>
          <?php foreach ($experiences as $exp) : ?>
            <option value="<?= $exp['id'] ?>"><?= $exp['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </form>
    </nav>
  <?php endif; ?>

  <!-- Display date and time -->
  <div id="current-date-time" class="text-end">
    <span id="current-date" class="font-semibold block">
      <?= getCurrentDate(); ?>
    </span>
    <span id="current-time">
      <?= getCurrentTime(); ?>
    </span>
  </div>
</header>

<script>
  function updateTime() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    document.getElementById('current-time').textContent = hours + ':' + minutes;
  }

  setInterval(updateTime, 60000);
  updateTime();
</script>