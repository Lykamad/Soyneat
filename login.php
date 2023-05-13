<?php
include("includes/a_config.php");
?>

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
  <h2>Inicia sesión</h2>
  <div class="content">
    <form>
      <label for="usuario">Usuario</label>
      <input type="text" id="pastillas" name="usuario"><br><br>
      <label for="contrasena">Contraseña</label>
      <input type="password" id="pastillas" name="contrasena"><br><br>
      <input type="submit" id="enviar" value="Confirmar">

      <p>¿No tienes una cuenta todavía? <a href="singup.php"><br><br>Regístrate</a></p>
    </form>

    <div class="panel">
      <img src="imagenes/login_panel.png" width="500" height="400">
    </div>
  </div>
  <?php
  include("includes/footer.php");
  ?>
</body>



</html>