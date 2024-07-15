<?php
$title = getTitle();
?>

<header class="w-full h-[60px] bg-[#738C69]/40 flex justify-between px-[5vw] items-center">
  <h2 class="text-2xl uppercasE">
    <?php echo $title == "Index" || $title == "evasion-camping" ? "Accueil" : $title; ?></h2>

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

      <?php
      $res = $mysqli->query("SELECT * FROM experiences ORDER BY id ASC;");
      ?>
      <form action="liste_campings_par_experience.php" method="GET" class="flex-1/2 flex flex-col items-end">
        <label for="experiences" class="block text-sm tracking-wide">Filtrer par expériences :</label>
        <select name="experience_id" id="experiences" onchange="this.form.submit()" class="text-sm cursor-pointer">
          <option disabled selected>Sélectionnez une expérience</option>
          <?php while ($EXP = $res->fetch_assoc()) { ?>
            <option value="<?= $EXP['id'] ?>"><?= $EXP['nom'] ?></option>
          <?php } ?>
        </select>
      </form>

    </nav>
  <?php endif; ?>

  <div id="current-date-time" class="text-center">
    <span id="current-date" class="font-semibold block">
      <?php
      // Defining my timezone
      date_default_timezone_set('Canada/Eastern');

      // Displaying the current date
      echo date('d-m-Y');
      ?>
    </span>
    <span id="current-time">
      <?php
      // Displaying the current time
      echo date('H:i');
      ?>
    </span>
  </div>
</header>

<script>
  function updateTime() {
    // Get the current time
    const now = new Date();
    // Format the hours and minutes
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    // Display the formatted time
    document.getElementById('current-time').textContent = hours + ':' + minutes;
  }

  // Updating the time every minute
  setInterval(updateTime, 60000);
  // Calling the function
  updateTime();
</script>