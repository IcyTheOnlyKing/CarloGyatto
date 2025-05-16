<?php include "includes/header.php"; ?>

<h1 class="text-4xl text-center text-pink-600 font-bold mb-6">Carlos Kolossos</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
    <?php
    $verzeichnis = "images/";
    $prefix = "carlo";
    $anzahl = 19; // Passe ggf. an

    for ($i = 1; $i <= $anzahl; $i++) {
        $bild = $verzeichnis . "$prefix$i.jpg";
        if (file_exists($bild)) {
            echo '
        <div class="relative group overflow-hidden rounded-2xl shadow-xl transform hover:scale-105 transition duration-300">
        
          <img src="'.$bild.'" alt="'.$prefix.' '.$i.'" class="w-full h-auto object-cover">
          <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white text-sm p-2 opacity-0 group-hover:opacity-100 transition duration-300">
            ' . ucfirst($prefix) . ' in Szene #' . $i . '
          </div>
        </div>';
        }
    }
    ?>
</div>

<?php include "includes/footer.php"; ?>
