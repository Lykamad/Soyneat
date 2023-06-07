/*     "use strict";

    // Galería de fotos automática y manual
    const pasarFoto = document.getElementById("avanzar");
    const retrocederFoto = document.getElementById("retroceder");
    const photo = document.getElementById("foto");

    let elemento = 0;
    let intervalID;

    const listaFotos = [
    'imagenes/web_1.png',
    'imagenes/web_2.png',
    'imagenes/web_3.png'
    ];

    function mostrarSiguienteFoto() {
        elemento++;
        if (elemento > listaFotos.length - 1) elemento = 0;
        photo.src = `${listaFotos[elemento]}`;
        switch(elemento){
            case 0:
                photo.useMap = "#movil";
            break;
            case 1:
                photo.useMap = "#co2";
            break;
            case 2:
                photo.useMap = "#burger";
            break;
            default:
                photo.useMap = "#movil";
        }
    }

    function mostrarFotoAnterior() {
        elemento--;
        if (elemento < 0) elemento = listaFotos.length - 1;
        photo.src = `${listaFotos[elemento]}`;
        switch(elemento){
            case 0:
                photo.useMap = "#movil";
            break;
            case 1:
                photo.useMap = "#co2";
            break;
            case 2:
                photo.useMap = "#burger";
            break;
            default:
                photo.useMap = "#movil";
        }
    }

    function iniciarPresentacion() {
        intervalID = setInterval(mostrarSiguienteFoto, 10000);
    }

    function detenerPresentacion() {
        clearInterval(intervalID);
    }

    pasarFoto.onclick = function() {
        detenerPresentacion();
        mostrarSiguienteFoto();
        iniciarPresentacion();
    };

    retrocederFoto.onclick = function() {
        detenerPresentacion();
        mostrarFotoAnterior();
        iniciarPresentacion();
    };

    iniciarPresentacion(); */

    //Galería de fotos manual
    const pasarFoto = document.getElementById("avanzar");
    const retrocederFoto = document.getElementById("retroceder");
    const photo = document.getElementById("foto");

    let elemento = 0;

    const listaFotos = [
        'imagenes/web_1.png',
        'imagenes/web_2.png',
        'imagenes/web_3.png'
    ];

    

    pasarFoto.onclick = function() {
        
        elemento++;

        if (elemento > listaFotos.length - 1) elemento = 0;

        photo.src = `${listaFotos[elemento]}`;

        console.log(elemento);

        switch(elemento){
            case 0:
                photo.useMap = "#movil";
            break;
            case 1:
                photo.useMap = "#co2";
            break;
            case 2:
                photo.useMap = "#burger";
            break;
            default:
                photo.useMap = "#movil";
        }

        console.log(photo.useMap);
    };

    retrocederFoto.onclick = function() {

        elemento--;

        if (elemento < 0) elemento = listaFotos.length - 1;

        photo.src = `${listaFotos[elemento]}`;

        console.log(elemento);

        switch(elemento){
            case 0:
                photo.useMap = "#movil";
            break;
            case 1:
                photo.useMap = "#co2";
            break;
            case 2:
                photo.useMap = "#burger";
            break;
            default:
                photo.useMap = "#movil";
        }

        console.log(photo.useMap);
    };

