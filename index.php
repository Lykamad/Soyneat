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
    <link rel="stylesheet" href="estilo/estilo_index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@100;400;600;700&display=swap" rel="stylesheet">
    <!--  tipografia Advant Pro importada desde google fonts-->
</head>

<body>
    <?php
    include("includes/navigation.php");
    ?>

    <div class="content">

        <div class="parrafo">
            <p>Did you say...</p>
            <h1>BURGER</h1>
        </div>
    </div>
    <div class="naranja">
        <div class="burguer">
            <img src="imagenes/burger-con-silueta2.png" alt="Hamburguesa" width="600" height="500">
        </div>
        <div class="parrafo2">
            <p> En Soyneat hemos creado unas hamburguesas irresistibles,<br> naturales y sin ningún derivado animal.<br><br>

                Cuando comas nuestra comida, le proporcionarás a tu cuerpo<br> los ingredientes más 'neat', nutritivos y sabrosos </p>
        </div>
        <?php
        include("includes/footer.php");
        ?>
    </div>
</body>

</html>