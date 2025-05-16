<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>🐾 Carlo & Mochi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {},
            },
            plugins: [tailwindcssAspectRatio],
        }
    </script>
    <script src="https://cdn.tailwindcss.com?plugins=aspect-ratio"></script>






</head>
<body class="bg-gradient-to-br from-yellow-100 to-pink-100 min-h-screen p-4">
<nav class="flex justify-center space-x-6 text-lg font-semibold text-pink-700 mb-10">
    <a href="index.php" class="hover:underline">Start</a>
    <a href="carlo.php" class="hover:underline">Carlo</a>
    <a href="mochi.php" class="hover:underline">Mochi</a>
</nav>

<audio id="bgmusic" loop>
    <source src="music/cat_theme.mp3" type="audio/mpeg">
    Dein Browser unterstützt kein Audio.
</audio>

<!-- Musik-Button + Lautstärke-Regler -->
<div id="musicControls" class="fixed bottom-6 right-6 flex flex-col items-center gap-2 z-50">
    <!-- Lautstärkeregler -->
    <input id="volumeSlider" type="range" min="0" max="1" step="0.01" value="0.5"
           class="w-24 h-1 bg-gray-300 rounded-lg appearance-none cursor-pointer hidden transition duration-300">

    <!-- Toggle-Button -->
    <button id="musicToggle"
            class="bg-pink-500 dark:bg-pink-600 text-white p-4 rounded-full shadow-xl hover:scale-110 transition text-3xl paw-animation"
            aria-label="Musik umschalten">
        🔇
    </button>
</div>

<style>
    /* Animation: Pfote wackelt */
    .paw-animation.playing {
        animation: paw-bounce 1s infinite;
    }

    @keyframes paw-bounce {
        0%, 100% { transform: scale(1) rotate(0deg); }
        50% { transform: scale(1.1) rotate(-10deg); }
    }

    /* Range Input Styling (nur basic) */
    input[type=range]::-webkit-slider-thumb {
        background: #ec4899;
        border-radius: 50%;
        cursor: pointer;
    }
</style>

<script>
    const audio = document.getElementById("bgmusic");
    const btn = document.getElementById("musicToggle");
    const slider = document.getElementById("volumeSlider");
    let playing = false;

    // Initial Volume
    audio.volume = parseFloat(slider.value);

    function updateUI() {
        btn.textContent = playing ? "🔊" : "🔇";
        btn.classList.toggle("playing", playing);
        slider.classList.toggle("hidden", !playing);
    }

    btn.addEventListener("click", () => {
        if (!playing) {
            audio.muted = false;
            audio.play().then(() => {
                playing = true;
                updateUI();
            }).catch(err => {
                console.warn("Autoplay blockiert", err);
            });
        } else {
            audio.pause();
            playing = false;
            updateUI();
        }
    });

    // Slider ändert Lautstärke
    slider.addEventListener("input", () => {
        audio.volume = parseFloat(slider.value);
    });

    // Startet Musik beim ersten Klick auf die Seite
    window.addEventListener("click", () => {
        if (!playing) {
            audio.muted = false;
            audio.play().then(() => {
                playing = true;
                updateUI();
            }).catch(() => {});
        }
    }, { once: true });

    updateUI();
</script>
