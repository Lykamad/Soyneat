"use strict"

// Array de videos
var videoList = ['videos/1_huerto.mp4', 'videos/2_soja.mp4', 'videos/3_soja_cae.mp4', 'videos/4_burger_print.mp4', 'videos/5_burger_eat.mp4', 'videos/6_fondo.mp4'];
// Índice del video actual
var currentIndex = 0;
//Array de textos
var textList = ['Haz click para comenzar', 'Haz click para caer', 'Haz click para imprimir', 'Haz click para disfrutar'];

// Último video
function isLastVideo() {
    return currentIndex === videoList.length - 1;
}

document.getElementById('start-button').addEventListener('click', function () {
    // Ocultar start y mostrar opciones
    document.getElementById('start-button').style.display = 'none';
    document.getElementById('options-container').style.display = "flex";
});

document.getElementById('over-video').addEventListener('click', function () {
    // Ocultar las opciones
    document.getElementById('options-container').style.display = "none";
    // Mostrar el botón de inicio
    var homeButton = document.getElementById('home-button');
    homeButton.style.display = "block";

    var startButton = document.getElementById('start-button');
    startButton.style.display = 'none';

    var videoPlayer = document.getElementById('video-player');
    videoPlayer.style.display = "block";
    videoPlayer.src = 'videos/0_gameover.mp4'
    videoPlayer.setAttribute("loop", "");
    videoPlayer.play();
});

document.getElementById('next-video').addEventListener('click', function () {
    // Ocultar las opciones
    document.getElementById('options-container').style.display = "none";

    // Cambiar el video actual al siguiente video
    var videoPlayer = document.getElementById('video-player');
    videoPlayer.style.display = "block";
    videoPlayer.src = videoList[currentIndex];
    videoPlayer.play();

    // Mostrar el botón de inicio
    var homeButton = document.getElementById('home-button');
    homeButton.style.display = "block";

    // Mostrar texto de continuar
    videoPlayer.addEventListener('ended', function () {
        var continueText = document.getElementById('continue-text');
        continueText.style.display = "block";
        continueText.textContent = textList[currentIndex];

        if (isLastVideo()) {
            // Ocultar el video-player y las opciones
            videoPlayer.style.display = "none";
            document.getElementById('options-container').style.display = "none";

            // Mostrar la pantalla en negro
            videoPlayer.style.display = "none";
            continueText.style.display = "none";

            var endScreen = document.getElementById('end-screen');
            endScreen.style.display = "block";

            // Eliminar el evento de clic del video-container
            document.getElementById('video-container').removeEventListener('click', clickVideoContainer);

            // Restaurar el cursor a su valor original
            document.getElementById('video-container').style.cursor = "auto";
        } else {
            // Cambiar el cursor a "pointer"
            document.getElementById('video-container').style.cursor = "pointer";

            // Añadir evento de clic al video-container
            document.getElementById('video-container').addEventListener('click', clickVideoContainer);
        }
    });
});

function clickVideoContainer(event) {
    var continueText = document.getElementById('continue-text');

    // Comprobar si el texto de continuar está visible
    if (continueText.style.display === "block") {
        // Acciones al hacer clic en el video-container
        currentIndex++; // Avanzar al siguiente video en el array

        // Si se ha llegado al final del array, volver al inicio
        if (currentIndex >= videoList.length) {
            currentIndex = 0;
        }

        var videoPlayer = document.getElementById('video-player');
        videoPlayer.src = videoList[currentIndex];
        videoPlayer.play();

        continueText.style.display = "none";
        document.getElementById('video-container').removeEventListener('click', clickVideoContainer);

        // Restaurar el cursor a su valor original
        document.getElementById('video-container').style.cursor = "auto";
    }
}

document.getElementById('home-button').addEventListener('click', function () {
    // Mostrar start
    document.getElementById('start-button').style.display = 'block';

    // Ocultar botón de inicio
    var homeButton = document.getElementById('home-button');
    homeButton.style.display = "none";

    // Ocultar video
    var videoPlayer = document.getElementById('video-player');
    videoPlayer.style.display = "none";
    if (videoPlayer.getAttribute("loop") != null) {
        videoPlayer.removeAttribute("loop");
    }
    videoPlayer.pause();

    // Ocultar texto de continuar
    var continueText = document.getElementById('continue-text');
    continueText.style.display = "none";

    // Reiniciar el índice del video actual
    currentIndex = 0;

    // Ocultar end screen
    var endScreen = document.getElementById('end-screen');
    endScreen.style.display = "none";

    // Remover el evento de clic del video-container
    document.getElementById('video-container').removeEventListener('click', clickVideoContainer);

    // Restaurar el cursor a su valor original
    document.getElementById('video-container').style.cursor = "auto";
});

