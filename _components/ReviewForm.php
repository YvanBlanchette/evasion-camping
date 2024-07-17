<?php
$res = $mysqli->query("SELECT * FROM campings ORDER BY nom ASC;");
?>

<form method="POST" action="/evasion-camping/_actions/create_review.php" class="my-10">
  <div class="flex justify-between items-center gap-10 mb-4">
    <!-- Date -->
    <div class="flex flex-col gap-1 text-end">
      <label class="block" for="date">Date de visite<span class="text-red-500"> *</span></label>
      <input type="date" id="date" name="date" class="px-2 py-1" required>
    </div>
    <!-- Number of stars -->
    <div class="flex flex-col gap-1 w-[40%] text-end">
      <label class="block" for="nb_stars">Nombre d'étoiles<span class="text-red-500"> *</span></label>
      <select name="nb_stars" id="nb_stars" class="w-full text-end px-2 py-1" required>
        <option value="1" class="text-end px-2">1</option>
        <option value="2" class="text-end px-2">2</option>
        <option value="3" class="text-end px-2">3</option>
        <option value="4" class="text-end px-2">4</option>
        <option selected value="5" class="text-end px-2">5</option>
      </select>
    </div>
    <!-- Camping visited -->
    <div class="flex flex-col gap-1 w-full text-end">
      <label class="block" for="camping_id">Camping visité<span class="text-red-500"> *</span></label>
      <select name="camping_id" id="camping_id" class="w-full text-end px-2 py-1" required>
        <?php while ($camping = $res->fetch_assoc()) { ?>
          <option value="<?= htmlspecialchars($camping['id']) ?>" class="text-end px-2"><?= htmlspecialchars($camping['nom']) ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="flex justify-between items-center gap-10 mb-4">
    <!-- Username -->
    <div class="flex flex-col gap-1 w-full">
      <label class="block" for="username">Nom d'utilisateur<span class="text-red-500"> *</span></label>
      <input type="text" id="username" name="username" placeholder="ex: JohnSmith001" class="px-2 py-1" required minlength="5" maxlength="100">
    </div>
    <!-- Email -->
    <div class="flex flex-col gap-1 w-full">
      <label class="block" for="email">Adresse courriel<span class="text-red-500"> *</span></label>
      <input type="email" id="email" name="email" placeholder="ex: JohnSmith@example.com" class="px-2 py-1" required minlength="5" maxlength="100">
    </div>
  </div>
  <!-- Review -->
  <div class="flex flex-col gap-1 w-full">
    <label for="review">Donnez-nous votre avis<span class="text-red-500"> *</span></label>
    <textarea name="review" id="review" rows="5" minlength="5" maxlength="500" class="px-2 py-1" required></textarea>
    <small><span class="text-red-500">*</span> Champs obligatoires</small>
  </div>
  <div class="text-end">
    <input type="submit" value="Envoyer" class="px-4 py-1 hover:bg-[#99AB93] text-white bg-[#738C69] transition-all duration-300 cursor-pointer rounded-md">
  </div>
</form>