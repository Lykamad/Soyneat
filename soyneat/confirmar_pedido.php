<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="estilo/pedido_style.css">
  <style>
        .rectangulo {
            width: 600px;
            height: 550px; 
            border: 5px solid #00A29E; 
            margin: 0 auto;
            display: flex;
            flex-direction: column; 
            justify-content: flex-start; 
            align-items: center;
            box-sizing: border-box; 
            overflow: hidden; 
            border-radius: 10px; 
        }

        .texto {
            text-align: center;
            color: #00A29E;
            margin-top: 10px; 
        }
    </style>

</head>


<body>
  <?php
  include("includes/navigation.php");
  if ( $_SESSION["session_pedido"]!=NULL) {
  require_once('includes/conectarBD.php');
  $conexionBD = new conectarBD;
  $conexion = $conexionBD->getConexion();


  $session_pedido=$_SESSION["session_pedido"];
  $session_price=$_SESSION["session_price"];
  require_once("includes/conectarBD.php");
  $instruccion = "UPDATE `pedido` SET `precio`='$session_price',`realizado`='1' WHERE `idPedido`=$session_pedido";
  mysqli_query($conexion, $instruccion);

  


  $_SESSION["session_pedido"]=NULL;};


  ?>
   <div class="rectangulo">
      <img src="imagenes/burger_animation.gif" >
      <div class="texto">
            <h2>¡Gracias por confirmar tu pedido! <?php if (isset($session_price)) echo '( '.$session_price.'€ )';?> </h2>
            <p>Estamos preparando tu comida con mucho cariño 😊</p>
        </div>
    </div>
  <?php
  include("includes/footer.php");
  if (isset($_SESSION["session_price"])) $_SESSION["session_price"]=0;
  ?>
</body>



</html>