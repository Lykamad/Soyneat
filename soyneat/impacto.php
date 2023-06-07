<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video interactivo</title>
    <link rel="stylesheet" href="estilo/estilo_impacto.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@100;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <!--  tipografia Advant Pro importada desde google fonts-->
</head>

<body>
    <?php
    include("includes/navigation.php");
    ?>
    <div id="video-container">
        <div id="options-container">
            <img id="over-video" src="imagenes/botonRojo.png" class="image-button">
            <img id="next-video" src="imagenes/botonVerde.png" class="image-button">
        </div>

        <video id="video-player">
            <source src="" type="video/mp4">
        </video>

        <img src="imagenes/start.png" id="start-button">

        <img src="imagenes/inicio.png" id="home-button" style="display: none;">

        <div id="continue-text" style="display: none;"><p>Haz click para continuar</p> </div>

        <div id="end-screen" style="display: none;">
            <h1>0 waste</h1>
        </div>
    </div>

    <script src="js/interactive.js"></script>
      <?php
    include("includes/footer.php");
    ?>

</body>

</html>