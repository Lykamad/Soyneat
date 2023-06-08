<?php
require_once("includes/conectarBD.php");
?>

<!DOCTYPE html>
<html>


<link rel="stylesheet" type="text/css" href="estilo/pedido_style_2.css">

</div>


<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@100;400;600;700&display=swap" rel="stylesheet">

    <?php
    session_start();
    require_once('includes/conectarBD.php');

    $conexionBD = new conectarBD;
    $conexion = $conexionBD->getConexion();

    // echo 'Hola'.$_SESSION["session_pedido"];
    
    // if ($_POST['cartaSubmit']==true) var_dump($_POST['cartaSubmit']);
    // echo 'HolAaaaaaaaaaaaa';

    //Este código comprueba si hay algun pedido en la sesion, y si no, lo crea y almacena en la misma.

     if (!isset($_SESSION["session_pedido"]) || $_SESSION["session_pedido"] == FALSE) {
        //  echo 'No hay un pedido en proceso, a crearlo.';

        require_once("includes/conectarBD.php");
        $instruccion = "INSERT INTO `pedido` (`idUsuario`) VALUES ('3')";
        mysqli_query($conexion, $instruccion);

        require_once("includes/conectarBD.php");
        $instruccion = "SELECT MAX(idPedido) FROM pedido";
        $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");
        $arrayResultadoConsulta = mysqli_fetch_array($resultadoConsulta);
        $_SESSION["session_pedido"] = $arrayResultadoConsulta["MAX(idPedido)"];
        $_SESSION["session_price"] = 0;
        // echo 'Se ha creado un pedido con este id:' . $_SESSION["session_pedido"];
     }
     
     


    if (isset($_POST['cartaDelete'])) {
        $deleteSubmit = $_POST['cartaDelete'];
        $session_pedido = $_SESSION["session_pedido"];
        require_once("includes/conectarBD.php");
        $instruccion = "DELETE FROM `itempedido` WHERE `idPedido`=$session_pedido AND `idCarta`=$deleteSubmit LIMIT 1";
        mysqli_query($conexion, $instruccion);
    }

    if (isset($_POST['personalizadaDelete'])) {
        $deleteSubmit = $_POST['personalizadaDelete'];
        $session_pedido = $_SESSION["session_pedido"];
        require_once("includes/conectarBD.php");
        $instruccion = "DELETE FROM `itempedido` WHERE `idPedido`=$session_pedido AND `iditempedido`=$deleteSubmit";
        mysqli_query($conexion, $instruccion);
    }


    if (isset($_POST['cartaSubmit'])) {
        $cartaSubmit = $_POST['cartaSubmit'];
        $session_pedido = $_SESSION["session_pedido"];
        require_once("includes/conectarBD.php");
        $instruccion = "INSERT INTO `itempedido`( `idPedido`, `idCarta`) VALUES ('$session_pedido','$cartaSubmit')";
        mysqli_query($conexion, $instruccion);

        $_SESSION["session_price"] += $_POST['cartaSubmitPrice'];

        if (isset($_POST['bebidaSubmit']) && $_POST['bebidaSubmit'] != 0) {

            $bebidaSubmit = $_POST['bebidaSubmit'];
            $session_pedido = $_SESSION["session_pedido"];
            require_once("includes/conectarBD.php");
            $instruccion = "INSERT INTO `itempedido`( `idPedido`, `idCarta`) VALUES ('$session_pedido','$bebidaSubmit')";
            mysqli_query($conexion, $instruccion);
        };
    }


    if (isset($_POST) && !isset($_POST['cartaSubmit'])) {


        if (isset($_POST['pan']) && isset($_POST['carne'])) {
            $personalizadaAEnviar = array();
            array_push($personalizadaAEnviar, $_POST['pan']);
            array_push($personalizadaAEnviar, $_POST['carne']);
            if (isset($_POST['ingredientes']))
                foreach ($_POST['ingredientes'] as $ingredienteAEnviar) {
                    array_push($personalizadaAEnviar, $ingredienteAEnviar);
                };
            if (isset($_POST['vegetales']))
                foreach ($_POST['vegetales'] as $ingredienteAEnviar) {
                    array_push($personalizadaAEnviar, $ingredienteAEnviar);
                };
            if (isset($_POST['salsas']))
                foreach ($_POST['salsas'] as $ingredienteAEnviar) {
                    array_push($personalizadaAEnviar, $ingredienteAEnviar);
                };

            $session_pedido = $_SESSION["session_pedido"];

            require_once("includes/conectarBD.php");
            $instruccion = "INSERT INTO `itempedido`( `idPedido`, `idCarta`) VALUES ('$session_pedido',NULL)";
            mysqli_query($conexion, $instruccion);

            $_SESSION["session_price"] += 8;

            require_once("includes/conectarBD.php");
            $instruccion = "SELECT MAX(idItemPedido) FROM itempedido";
            $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");
            $arrayResultadoConsulta = mysqli_fetch_array($resultadoConsulta);
            $currentPersonalizadaEnviando = $arrayResultadoConsulta["MAX(idItemPedido)"];


            foreach ($personalizadaAEnviar as $itemEnviando) {
                require_once("includes/conectarBD.php");
                $instruccion = "INSERT INTO `itempersonalizada`(`idItemPedido`, `idIngrediente`) VALUES ('$currentPersonalizadaEnviando','$itemEnviando')";
                mysqli_query($conexion, $instruccion);
            }
        } else {
            //Notificar que para pedir una personalizada tiene que tener mínimo pan y carne :)
        };



        // var_dump($personalizadaAEnviar);


    }


    $instruccion = "SELECT * FROM `carta` WHERE `type` = 4";

    $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo 0 en la consulta");

    $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);

    // Aquí se crea un array que se va a usar una vez por menú posteriormente, para no tener que hacer "n" conexiones a BD.
    $bebidas = array();
    for ($j = 0; $j <= $cantidadDeFilas; $j += 1) {
        if ($currentBebida = mysqli_fetch_array($resultadoConsulta)) {
            array_push($bebidas, array('id' => $currentBebida["idCarta"], 'nombre' => $currentBebida["producto"]));
        }
    }

    $instruccion = "SELECT * FROM `ingrediente`";

    $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");

    $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);


    // Me encantaría poder llamarlos 1_panes y hace run if (1)xx == (1)_panes me lo metes en ese objeto.
    // En lugar de 5 iguales que meten en objetos que tengo que especificar yo

    $panes = array();
    $carnes = array();
    $ingredientes = array();
    $vegetales = array();
    $salsas = array();
    for ($j = 0; $j <= $cantidadDeFilas; $j += 1) {


        if ($currentIngrediente = mysqli_fetch_array($resultadoConsulta)) {


            switch (substr($currentIngrediente["codigo"], 0, 1)) {
                case "1":
                    array_push($panes, array('id' => $currentIngrediente["idIngrediente"], 'nombre' => $currentIngrediente["Descripcion"]));
                    break;
                case "2":
                    array_push($carnes, array('id' => $currentIngrediente["idIngrediente"], 'nombre' => $currentIngrediente["Descripcion"]));
                    break;
                case "3":
                    array_push($ingredientes, array('id' => $currentIngrediente["idIngrediente"], 'nombre' => $currentIngrediente["Descripcion"]));
                    break;
                case "4":
                    array_push($vegetales, array('id' => $currentIngrediente["idIngrediente"], 'nombre' => $currentIngrediente["Descripcion"]));
                    break;
                case "5":
                    array_push($salsas, array('id' => $currentIngrediente["idIngrediente"], 'nombre' => $currentIngrediente["Descripcion"]));
                    break;
            };
        };
    };



    ?>


    <html lang="es">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/pedido_style.css">

</head>


<style>
    .topnav {
        margin-bottom: 0px;
    }
</style>


<body>
    <?php
    include("includes/navigation_blocked.php");
    ?>
    <div id="pedidodiventero">
        <div id="cesta">
            <a href="#jump_menus" class="cestamenu"> <span class="cesta_title">Menús</span> <span>></span> </a>
            <a href="#jump_atugusto" class="cestamenu"> <span>Hamburguesa a tu gusto</span> <span>></span> </a>
            <a href="#jump_nuestrashamburguesas" class="cestamenu"> <span>Nuestras hamburguesas</span> <span>></span>
            </a>
            <a href="#jump_paraacompañar" class="cestamenu"> <span>Para compañar</span> <span>></span> </a>
            <a href="#jump_salsas" class="cestamenu"> <span>Salsas</span> <span>></span> </a>
            <a href="#jump_bebidas" class="cestamenu"> <span>Bebidas</span> <span>></span> </a>
            <a href="#jump_postres" class="cestamenu"> <span>Postres</span> <span>></span> </a>
        </div>

        <div id="cartita">
            <div class="itemsmenu_div">
                <div class="itemsmenu_titulo1">Hacer pedido</div>
                <div id="jump_menus" class="itemsmenu_titulo2">Menús</div>



                <?php

                $instruccion = "SELECT * FROM `carta` WHERE `type`=6";

                $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");

                $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);

                for ($j = 0; $j <= $cantidadDeFilas; $j += 2) {


                    // INICIO de fila de 3 columnas
                    echo '<div class="itemsmenu_pair">';
                    for ($k = 1; $k <= 2; $k += 1) {
                        if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
                            echo '<form action="pedido.php" method="POST" name="form">
             <div class="itemsmenu_item" style="position:relative">

                 <img src="imagenes/' . $currentItem["pathImagen"] . '" alt="" style="width: 150px;">

                 <input type="hidden" name="cartaSubmit" value="' . $currentItem["idCarta"] . '">
                 <input type="hidden" name="cartaSubmitPrice" value="' . $currentItem["precio"] . '">
                 <input style="width: 36px; height: auto; position: absolute; left: 114px;" type="image"
                     src="imagenes/add.png" alt="Añadir" />

                 <div class="itemsmenu_titleandprice">
                     <div class="itemsmenu_title4">' . $currentItem["descripcion"] . ' <br>' . $currentItem["precio"] . '€</div>
                     <div></div>
                     <select name="bebidaSubmit" id="bebidaSubmit" style="width: 130px; margin-top: 5px;">';

                            //Imprimir opciones de bebidas
                            echo '<option value="0">Escoge tu bebida</option>';
                            foreach ($bebidas as $bebida) {
                                echo '<option value="' . $bebida['id'] . '">' . $bebida['nombre'] . '</option>';
                            };
                            //Se cierra el item de la pareja
                            echo '</select></div></div></form>';
                        };
                    }
                    echo '</div>';
                };
                ?>




                <div id="itemsalgusto_div">
                    <div id="jump_atugusto" class="itemsmenu_titulo2">Hamburguesa a tu gusto</div>
                    <div>
                        <form action="pedido.php" method="POST" name="personalizada" enctype="multipart/form-data">
                            <div class="itemsmenu_titulo3">Elige tu pan de hamburguesa</div>
                            <!-- Este form hay que ponerlo alrededor de toooooodo y es solo uno para todo el pedido -->


                            <div class="inputitems">

                                <?php foreach ($panes as $ingredientecasilla) {
                                    echo '<div class="itemsito"><input type="radio" name="pan" value="' . $ingredientecasilla['id'] . '"> <span>' . $ingredientecasilla['nombre'] . '</span></div>';
                                };
                                ?>
                            </div>

                            <div class="itemsmenu_titulo3">Elige tu "carne"</div>

                            <div class="inputitems">

                                <?php foreach ($carnes as $ingredientecasilla) {
                                    echo '<div class="itemsito"><input type="radio" name="carne" value="' . $ingredientecasilla['id'] . '"> <span>' . $ingredientecasilla['nombre'] . '</span></div>';
                                };
                                ?>

                            </div>

                            <div class="itemsmenu_titulo3">Elige hasta tres ingredientes</div>

                            <div class="inputitems">
                                <?php foreach ($ingredientes as $ingredientecasilla) {
                                    echo '<div class="itemsito"><input type="checkbox" name="ingredientes[]" value="' . $ingredientecasilla['id'] . '"> <span>' . $ingredientecasilla['nombre'] . '</span></div>';
                                };
                                ?>
                            </div>

                            <div class="itemsmenu_titulo3">Elige hasta 3 vegetales</div>

                            <div class="inputitems">
                                <?php foreach ($vegetales as $ingredientecasilla) {
                                    echo '<div class="itemsito"><input type="checkbox" name="vegetales[]" value="' . $ingredientecasilla['id'] . '"> <span>' . $ingredientecasilla['nombre'] . '</span></div>';
                                };
                                ?>
                            </div>


                            <div class="itemsmenu_titulo3">Elige salsas no sé</div>

                            <div class="inputitems">
                                <?php foreach ($salsas as $ingredientecasilla) {
                                    echo '<div class="itemsito"><input type="checkbox" name="salsas[]" value="' . $ingredientecasilla['id'] . '"> <span>' . $ingredientecasilla['nombre'] . '</span></div>';
                                };
                                ?>
                            </div>

                            <div class="inputitems">
                                <input style="width: 200px; height: auto;" type="image" src="imagenes/addtocest.png" alt="Añadir a cesta" />

                            </div>

                        </form>
                    </div>

                    <div>

                    </div>

                </div>


                <div id="jump_nuestrashamburguesas" class="itemsmenu_titulo2">Nuestras hamburguesas</div>

                <?php

                $instruccion = "SELECT * FROM `carta` WHERE `type`=1";

                $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo 0 en la consulta");

                $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);

                for ($j = 0; $j <= $cantidadDeFilas; $j += 2) {



                    echo '<div class="itemsmenu_pair">';
                    for ($k = 1; $k <= 2; $k += 1) {
                        if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
                            echo '<form action="pedido.php" method="POST" name="form">
                                        <div class="itemsmenu_item" style="position:relative">' .
                                // Atenta al name y value de esto
                                '<input type="hidden" name="cartaSubmit" value="' . $currentItem["idCarta"] . '">
                                <input type="hidden" name="cartaSubmitPrice" value="' . $currentItem["precio"] . '">
                                            <img src="imagenes/' . $currentItem["pathImagen"] . '" alt="" style=" width: 150px;">

                                            <!-- <input type="hidden" name="idPost" value="4"> -->
                                            <input style="width: 36px; height: auto; position: absolute; left: 114px;" type="image"
                                                src="imagenes/add.png" alt="Añadir" />

                                            <div class="itemsmenu_titleandprice">
                                                <div class="itemsmenu_title4">' . $currentItem["producto"] . ' <br>' . $currentItem["precio"] . '€</div>
                                                <div class="itemsmenu_descripcion">' . $currentItem["descripcion_sub"] . '</div>

                                            </div>

                                        </div>
                                    </form>';
                        };
                    }
                    echo '</div>';
                };
                ?>

                <div id="jump_paraacompañar" class="itemsmenu_titulo2">Para acompañar</div>

                <?php

                $instruccion = "SELECT * FROM `carta` WHERE `type`=2";

                $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");

                $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);

                for ($j = 0; $j <= $cantidadDeFilas; $j += 2) {



                    echo '<div class="itemsmenu_pair">';
                    for ($k = 1; $k <= 2; $k += 1) {
                        if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
                            echo '<form action="pedido.php" method="POST" name="form">
                                        <div class="itemsmenu_item" style="position:relative">' .
                                // Atenta al name y value de esto
                                '<input type="hidden" name="cartaSubmit" value="' . $currentItem["idCarta"] . '">
                                <input type="hidden" name="cartaSubmitPrice" value="' . $currentItem["precio"] . '">
                                        <img src="imagenes/' . $currentItem["pathImagen"] . '" alt="" style="width: 150px;">

                                        <!-- <input type="hidden" name="idPost" value="4"> -->
                                        <input style="width: 36px; height: auto; position: absolute; left: 114px;" type="image"
                                        src="imagenes/add.png" alt="Añadir" />

                                        <div class="itemsmenu_titleandprice">
                                        <div class="itemsmenu_title4">' . $currentItem["producto"] . ' <br>' . $currentItem["precio"] . '€</div>
                                        <div class="itemsmenu_descripcion">' . $currentItem["descripcion_sub"] . '</div>

                                        </div>

                                        </div>
                                    </form>';
                        };
                    }
                    echo '</div>';
                };
                ?>


                <div id="jump_salsas" class="itemsmenu_titulo2">Salsas</div>

                <?php

                $instruccion = "SELECT * FROM `carta` WHERE `type`=3";

                $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");

                $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);

                for ($j = 0; $j <= $cantidadDeFilas; $j += 2) {



                    echo '<div class="itemsmenu_pair">';
                    for ($k = 1; $k <= 2; $k += 1) {
                        if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
                            echo '<form action="pedido.php" method="POST" name="form">
<div class="itemsmenu_item" style="position:relative">' .
                                // Atenta al name y value de esto
                                '<input type="hidden" name="cartaSubmit" value="' . $currentItem["idCarta"] . '">
                                <input type="hidden" name="cartaSubmitPrice" value="' . $currentItem["precio"] . '">
<img src="imagenes/' . $currentItem["pathImagen"] . '" alt="" style="width: 150px;">

<!-- <input type="hidden" name="idPost" value="4"> -->
<input style="width: 36px; height: auto; position: absolute; left: 114px;" type="image"
src="imagenes/add.png" alt="Añadir" />

<div class="itemsmenu_titleandprice">
<div class="itemsmenu_title4">' . $currentItem["producto"] . ' <br>' . $currentItem["precio"] . '€</div>
<div class="itemsmenu_descripcion">' . $currentItem["descripcion_sub"] . '</div>

</div>

</div>
</form>';
                        };
                    }
                    echo '</div>';
                };
                ?>

                <div id="jump_bebidas" class="itemsmenu_titulo2">Bebidas</div>

                <?php

                $instruccion = "SELECT * FROM `carta` WHERE `type`=4";

                $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");

                $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);

                for ($j = 0; $j <= $cantidadDeFilas; $j += 2) {



                    echo '<div class="itemsmenu_pair">';
                    for ($k = 1; $k <= 2; $k += 1) {
                        if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
                            echo '<form action="pedido.php" method="POST" name="form">
<div class="itemsmenu_item" style="position:relative">' .
                                // Atenta al name y value de esto
                                '<input type="hidden" name="cartaSubmit" value="' . $currentItem["idCarta"] . '">
                                <input type="hidden" name="cartaSubmitPrice" value="' . $currentItem["precio"] . '">
<img src="imagenes/' . $currentItem["pathImagen"] . '" alt="" style="width: 150px;">

<!-- <input type="hidden" name="idPost" value="4"> -->
<input style="width: 36px; height: auto; position: absolute; left: 114px;" type="image"
src="imagenes/add.png" alt="Añadir" />

<div class="itemsmenu_titleandprice">
<div class="itemsmenu_title4">' . $currentItem["producto"] . ' <br>' . $currentItem["precio"] . '€</div>
<div class="itemsmenu_descripcion">' . $currentItem["descripcion_sub"] . '</div>

</div>

</div>
</form>';
                        };
                    }
                    echo '</div>';
                };
                ?>

                <div id="jump_postres" class="itemsmenu_titulo2">Postres</div>

                <?php

                $instruccion = "SELECT * FROM `carta` WHERE `type`=5";

                $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");

                $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);

                for ($j = 0; $j <= $cantidadDeFilas; $j += 2) {



                    echo '<div class="itemsmenu_pair">';
                    for ($k = 1; $k <= 2; $k += 1) {
                        if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
                            echo '<form action="pedido.php" method="POST" name="form">
<div class="itemsmenu_item" style="position:relative">' .
                                // Atenta al name y value de esto
                                '<input type="hidden" name="cartaSubmit" value="' . $currentItem["idCarta"] . '">
                                <input type="hidden" name="cartaSubmitPrice" value="' . $currentItem["precio"] . '">
<img src="imagenes/' . $currentItem["pathImagen"] . '" alt="" style="width: 150px;">

<!-- <input type="hidden" name="idPost" value="4"> -->
<input style="width: 36px; height: auto; position: absolute; left: 114px;" type="image"
src="imagenes/add.png" alt="Añadir" />

<div class="itemsmenu_titleandprice">
<div class="itemsmenu_title4">' . $currentItem["producto"] . ' <br>' . $currentItem["precio"] . '€</div>
<div class="itemsmenu_descripcion">' . $currentItem["descripcion_sub"] . '</div>

</div>

</div>
</form>';
                        };
                    }
                    echo '</div>';
                };
                ?>
            </div>
        </div>





        <div id="tupedido">
            <div class="cestota">
                <div class="cesta_superior">
                    <img src="imagenes/cart.png" alt="">
                    <div>Tu pedido</div>
                </div>

                <div class="cesta_medio">
                    <?php
                    if (isset($_SESSION["session_pedido"])) {

                        $session_pedido = $_SESSION["session_pedido"];
                        require_once("includes/conectarBD.php");
                        $instruccion = "SELECT carta.producto, carta.precio, carta.type, itempedido.idCarta FROM `itempedido` INNER JOIN `carta` ON itempedido.idCarta=carta.idCarta WHERE idPedido = $session_pedido";
                        $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");
                        $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);

                        for ($j = 0; $j <= $cantidadDeFilas; $j += 1) {
                            if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
                                echo '<form action="pedido.php" method="POST">
                                        <div class="cesta_medio_item">
                                        <input type="hidden" name="cartaDelete" value="' . $currentItem["idCarta"] . '">
                                        <input style="width: 16px; height: 16px;" type="image" src="imagenes/cross.png" alt="Añadir" />
                                        <div>' . $currentItem["producto"] .' '. $currentItem["precio"] .'€ </div>
                                        </div>
                                        </form>';
                            }
                        }

                        $session_pedido = $_SESSION["session_pedido"];
                        require_once("includes/conectarBD.php");
                        $instruccion = "SELECT iditempedido FROM `itempedido` WHERE idPedido = $session_pedido AND idCarta IS NULL";
                        $resultadoConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");
                        $cantidadPersonalizadas = mysqli_num_rows($resultadoConsulta);
                        //  echo 'Cantidad de personalizadas: '.$cantidadPersonalizadas.'//'; 



                        for ($j = 1; $j <= $cantidadPersonalizadas; $j += 1) {
                            $currentPersonalizada = mysqli_fetch_array($resultadoConsulta);
                            $currentPersonalizadaId = $currentPersonalizada["iditempedido"];
                            //  echo '<br>PesonalizadaID:'.$currentPersonalizadaId.'//';
                            echo '<form action="pedido.php" method="POST">
                            <div class="cesta_medio_item">
                            <input type="hidden" name="personalizadaDelete" value="' . $currentPersonalizadaId . '">
                            <input style="width: 16px; height: 16px;" type="image" src="imagenes/cross.png" alt="Añadir" />
                            <div class="cesta_columna">
                            <div>SOYPERSONALIZADA 8€</div>
                            <div style="font-size: 12px; margin-top: 5px;">';

                            require_once("includes/conectarBD.php");
                            $instruccion = "SELECT ingrediente.descripcion FROM `itempersonalizada` INNER JOIN `ingrediente` ON itempersonalizada.idIngrediente=ingrediente.idIngrediente WHERE `idItemPedido` = $currentPersonalizadaId";
                            $ingredientesConsulta = mysqli_query($conexion, $instruccion) or die("fallo0 en la consulta");
                            $cantidadIngredientes = mysqli_num_rows($ingredientesConsulta);

                            if ($currentIngrediente = mysqli_fetch_array($ingredientesConsulta)) {
                                echo $currentIngrediente["descripcion"];
                            };

                            for ($i = 2; $i <= $cantidadIngredientes; $i += 1) {
                                $currentIngrediente = mysqli_fetch_array($ingredientesConsulta);
                                echo ', ' . $currentIngrediente["descripcion"];
                            }

                            echo '</div></div></div></form>';
                        };

                        echo '</div>';
                    }; ?>



                </div>
                <form action="confirmar_pedido.php">
                <div class="imagencesta">
                    <input style="width: 60%; height: auto; " type="image" src="imagenes/confirmar.png" alt="Añadir" />

                </div>

            </form>
            </div>

            

        </div>

        <!-- <div class="cesta_inferior">
                Confirmar
            </div> -->

    </div>
    </div>

    </div>


</body>



</html>