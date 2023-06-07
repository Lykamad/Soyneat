<?php
include("includes/a_config.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soyneat</title>
    <link rel="stylesheet" href="estilo/estilo_conocenos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@100;400;600;700&display=swap" rel="stylesheet">
    <!--  tipografia Advant Pro importada desde google fonts-->
</head>

<body>
    <?php
    include("includes/navigation.php");
    ?>

    <div class="parrafo">
        <h1>¿CÓMO LO HACEMOS?</h1>
        <p>Este es el proceso por el que pasa el producto antes de llegar a nuestros locales</p>
    </div>

    <div class="pasos">
        <div class="paso1">
           
            <h2>LVL 1</h2>
            <img class="esconder" style="position:absolute;" src="imagenes/vegetables_azul.png" alt="Vegetales" width="100" height="100">
            <img src="imagenes/vegetables.png" alt="Vegetales" width="100" height="100">
            <p>RECOGIDA HUERTA</p>
            <div class="info_paso" style="position:absolute;"><span class="info">Recogemos las legumbres de nuestras huertas</span></div>
        </div>
        <div class="flecha">
            <img src="imagenes/flecha2.png" alt="Vegetales" width="50" height="50">
        </div>
        <div class="paso2">
           
            <h2>LVL 2</h2>
            <img class="esconder" style="position:absolute;" src="imagenes/instalacion_azul.png" alt="Vegetales" width="100" height="100">
            <img src="imagenes/instalacion.png" alt="Vegetales" width="100" height="100">
            <p>INSERCCIÓN A INSTALACIONES</p>
            <div class="info_paso" style="position:absolute;"><span class="info">Las llevamos a nuestras instalaciones</span></div>
        </div>
        <div class="flecha">
            <img src="imagenes/flecha2.png" alt="Vegetales" width="50" height="50">
        </div>
        <div class="paso3">
            
            <h2>LVL 3</h2>
            <img class="esconder" style="position:absolute;" src="imagenes/impresora_azul.png" alt="Furgoneta" width="100" height="100">
            <img src="imagenes/impresora.png" alt="Furgoneta" width="100" height="100">
            <p>IMPRESIÓN 3D</p>
            <div class="info_paso" style="position:absolute;"><span class="info">Con legumbres imprimimos nuestras burguers</span></div>
        </div>
        <div class="flecha">
            <img src="imagenes/flecha2.png" alt="Vegetales" width="50" height="50">
        </div>
        <div class="paso4">
            
            <h2>LVL 4</h2>
            <img class="esconder" style="position:absolute;" src="imagenes/furgoneta_azul.png" alt="Furgoneta" width="100" height="100">
            <img src="imagenes/furgoneta.png" alt="Furgoneta" width="100" height="100">
            <p>TRANSPORTE A LOCAL</p>
            <div class="info_paso" style="position:absolute;"><span class="info">Las llevamos a nuestros locales</span></div>
        </div>
        <div class="flecha">
            <img src="imagenes/flecha2.png" alt="Vegetales" width="50" height="50">
        </div>
        <div class="paso5">
            
            <h2>LVL 5</h2>
            <img class="esconder" style="position:absolute;" src="imagenes/store_azul.png" alt="Furgoneta" width="100" height="100">
            <img src="imagenes/store.png" alt="Furgoneta" width="100" height="100">
            <p>LISTO PARA TU DISFRUTE</p>
            <div class="info_paso"style="position:absolute;"><span class="info">Ve a tu local mas cercano para disfrutar nuestros productos</span></div>
        </div>
    </div>

    <?php
    include("includes/footer.php");
    ?>
</body>

</html>