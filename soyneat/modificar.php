<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="estilo/unete.css">

</head>

<body>
  <?php
  include("includes/navigation.php");
  ?>
  <h2>Para modificar tu usuario vuelve a introducir tus datos</h2>
  <div class="content">
       
    <form action="modificar_usuario.php" method="POST" name="form" enctype="multipart/form-data">
      <label for="usuario">Nombre usuario</label>
      <input type="text" id="pastillas" name="usuario"><br><br>
      <label for="nombre">Nombre real</label>
      <input type="text" id="pastillas" name="nombre"><br><br>
      <label for="contrasena">Contraseña</label>
      <input type="password" id="pastillas" name="contrasena"><br><br>
      <input type="submit" id="enviar" value="Confirmar">

      <a href="index.php"><br><br>Volver a Inicio</a>
    </form>
    


  </div>
  <?php
  include("includes/footer.php");
  ?>
</body>



</html>