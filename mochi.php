<?php include "includes/header.php"; ?>

<h1 class="text-4xl text-center text-pink-600 font-bold mb-6">Mochi – Das Topmodel</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
    <?php
    $verzeichnis = "images/";
    $prefix = "mochi";
    $anzahl = 5; // Passe ggf. an

    for ($i = 1; $i <= $anzahl; $i++) {
        $bild = $verzeichnis . "$prefix$i.jpg";
        if (file_exists($bild)) {
            echo '
        <div class="relative group overflow-hidden rounded-2xl shadow-xl transform hover:scale-105 transition duration-300">
         <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-2xl shadow-xl group transform hover:scale-105 transition duration-300">
  <img src="'.$bild.'" alt="'.$prefix.' '.$i.'" class="object-cover w-full h-full">
</div>

        </div>';
        }
    }
    ?>
</div>

<?php include "includes/footer.php"; ?>
