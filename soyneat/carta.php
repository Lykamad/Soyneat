<?php 
include("includes/a_config.php");
?>

<!DOCTYPE html>
<html>
<head>
	 <?php include("includes/head-tag-contents.php");?> 
<html lang="es">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="estilo/carta_style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@100;400;600;700&display=swap" rel="stylesheet">
</head>

<div style="width:100%;">
<?php
    include("includes/navigation.php");
    ?>
</div>

<body>
<?php
    require_once('includes/conectarBD.php');

    $conexionBD = new conectarBD;
    $conexion = $conexionBD->getConexion();




    
$instruccion = "SELECT * FROM `carta` WHERE `type`=1";

$resultadoConsulta = mysqli_query ($conexion,$instruccion) or die ("fallo0 en la consulta");

$cantidadDeFilas = mysqli_num_rows($resultadoConsulta);
// var_dump($arrayResultadoConsulta);


// for ($j=0; $j<=$cantidadDeFilas; $j+=3) {
 

//     // INICIO de fila de 3 columnas
//     echo '<div id="carta_filacontainer">';
//         for ($k=1; $k<=3; $k+=1) {
//             if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
//             echo '<div class="carta_item2">

//             <img class="esconder" style="position: absolute;" class="" src="img/cartasample3.png" alt="">
//             <img class="" src="img/cartasample2.png" alt="">


//             <div class="carta_details">
//                 <span class="carta_details_title"> '.$currentItem["producto"].'</span>
//                 <br><br>
//                 <span class="carta_details_info">  '.$currentItem["descripcion"].'              </span>
//             </div>


//         </div>';
           
//             };
            
//         }
//         echo '</div>';
//     // FINAL de fila de 3 columnas
    

// };




?>
    <div class="offer">¿Quieres hacer un pedido? <a href="login.php">Inicia sesión</a> o <a href="singup.php">regístrate.</a>
    </div>

    <div class="carta_title">
        Carta
    </div>

    <div class="carta_titulogrupal">
        Nuestras hamburguesas
    </div>



    <?php for ($j=0; $j<=$cantidadDeFilas; $j+=3) {
 

 // INICIO de fila de 3 columnas
 echo '<div id="carta_filacontainer">';
     for ($k=1; $k<=3; $k+=1) {
         if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
         echo '<div class="carta_item2">

         <img class="esconder" style="position: absolute;" class="" src="imagenes/'.substr($currentItem["pathImagen"],0,-4).'_hover.png" alt="">
         <img class="" src="imagenes/'.$currentItem["pathImagen"].'" alt="">


         <div class="carta_details">
             <span class="carta_details_title"> '.$currentItem["producto"].'</span>
             <br><br>
             <span class="carta_details_info">  '.$currentItem["descripcion"].'              </span>
         </div>


     </div>';
         // echo $k."   ";
         // echo $Post['ruta'];
         };
         
     }
     echo '</div>';
 // FINAL de fila de 3 columnas
 

};
   ?>


    <div class="carta_titulogrupal">
        Entrantes
    </div>
   <?php
   
   $instruccion = "SELECT * FROM `carta` WHERE `type`=2";

$resultadoConsulta = mysqli_query ($conexion,$instruccion) or die ("fallo0 en la consulta");

$cantidadDeFilas = mysqli_num_rows($resultadoConsulta);
   
   for ($j=0; $j<=$cantidadDeFilas; $j+=3) {
 

 // INICIO de fila de 3 columnas
 echo '<div id="carta_filacontainer">';
     for ($k=1; $k<=3; $k+=1) {
         if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
         echo '<div class="carta_item2">

         <img class="esconder" style="position: absolute;" class="" src="imagenes/'.substr($currentItem["pathImagen"],0,-4).'_hover.png" alt="">
         <img class="" src="imagenes/'.$currentItem["pathImagen"].'" alt="">


         <div class="carta_details">
             <span class="carta_details_title"> '.$currentItem["producto"].'</span>
             <br><br>
             <span class="carta_details_info">  '.$currentItem["descripcion"].'              </span>
         </div>


     </div>';
         // echo $k."   ";
         // echo $Post['ruta'];
         };
         
     }
     echo '</div>';
 // FINAL de fila de 3 columnas
 

};
   ?>


<div class="carta_titulogrupal">
        Salsas
    </div>

    <?php
   
   $instruccion = "SELECT * FROM `carta` WHERE `type`=3";

$resultadoConsulta = mysqli_query ($conexion,$instruccion) or die ("fallo0 en la consulta");

$cantidadDeFilas = mysqli_num_rows($resultadoConsulta);
   
   for ($j=0; $j<=$cantidadDeFilas; $j+=3) {
 

 // INICIO de fila de 3 columnas
 echo '<div id="carta_filacontainer">';
     for ($k=1; $k<=3; $k+=1) {
         if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
         echo '<div class="carta_item2">

         <img class="esconder" style="position: absolute;" class="" src="imagenes/'.substr($currentItem["pathImagen"],0,-4).'_hover.png" alt="">
         <img class="" src="imagenes/'.$currentItem["pathImagen"].'" alt="">


         <div class="carta_details">
             <span class="carta_details_title"> '.$currentItem["producto"].'</span>
             <br><br>
             <span class="carta_details_info">  '.$currentItem["descripcion"].'              </span>
         </div>


     </div>';
         // echo $k."   ";
         // echo $Post['ruta'];
         };
         
     }
     echo '</div>';
 // FINAL de fila de 3 columnas
 

};
   ?>

<div class="carta_titulogrupal">
        Bebidas
    </div>

    <?php
   
   $instruccion = "SELECT * FROM `carta` WHERE `type`=4";

$resultadoConsulta = mysqli_query ($conexion,$instruccion) or die ("fallo0 en la consulta");

$cantidadDeFilas = mysqli_num_rows($resultadoConsulta);
   
   for ($j=0; $j<=$cantidadDeFilas; $j+=3) {
 

 // INICIO de fila de 3 columnas
 echo '<div id="carta_filacontainer">';
     for ($k=1; $k<=3; $k+=1) {
         if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
         echo '<div class="carta_item2">

         <img class="esconder" style="position: absolute;" class="" src="imagenes/'.substr($currentItem["pathImagen"],0,-4).'_hover.png" alt="">
         <img class="" src="imagenes/'.$currentItem["pathImagen"].'" alt="">


         <div class="carta_details">
             <span class="carta_details_title"> '.$currentItem["producto"].'</span>
             <br><br>
             <span class="carta_details_info">  '.$currentItem["descripcion"].'              </span>
         </div>


     </div>';
         // echo $k."   ";
         // echo $Post['ruta'];
         };
         
     }
     echo '</div>';
 // FINAL de fila de 3 columnas
 

};
   ?>

<div class="carta_titulogrupal">
        Postres
    </div>

    <?php
   
   $instruccion = "SELECT * FROM `carta` WHERE `type`=5";

$resultadoConsulta = mysqli_query ($conexion,$instruccion) or die ("fallo0 en la consulta");

$cantidadDeFilas = mysqli_num_rows($resultadoConsulta);
   
   for ($j=0; $j<=$cantidadDeFilas; $j+=3) {
 

 // INICIO de fila de 3 columnas
 echo '<div id="carta_filacontainer">';
     for ($k=1; $k<=3; $k+=1) {
         if ($currentItem = mysqli_fetch_array($resultadoConsulta)) {
         echo '<div class="carta_item2">

         <img class="esconder" style="position: absolute;" class="" src="imagenes/'.substr($currentItem["pathImagen"],0,-4).'_hover.png" alt="">
         <img class="" src="imagenes/'.$currentItem["pathImagen"].'" alt="">


         <div class="carta_details">
             <span class="carta_details_title" > '.$currentItem["producto"].'</span>
             <br><br>
             <span class="carta_details_info">  '.$currentItem["descripcion"].'              </span>
         </div>


     </div>';
         // echo $k."   ";
         // echo $Post['ruta'];
         };
         
     }
     echo '</div>';
 // FINAL de fila de 3 columnas
 

};
   ?>
 
</body>



</html>