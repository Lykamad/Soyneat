<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="estilo/unete.css">
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
  ?>
   <div class="rectangulo">
      <img src="imagenes/burger_animation.gif" >
      <div class="texto">
            <h2>¡Gracias por confirmar tu pedido!</h2>
            <p>Estamos preparando tu comida con mucho cariño 😊</p>
        </div>
    </div>
  <?php
  include("includes/footer.php");
  ?>
</body>



</html>