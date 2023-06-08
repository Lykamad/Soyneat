

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
  <h2>¡Regístrate!</h2>
  <div class="content">
       
    <form action="singup-usuario.php" method="POST" name="form" enctype="multipart/form-data">
      <label for="email">Correo electrónico</label>
      <input type="text" id="pastillas" name="email"><br><br>
      <label for="usuario">Nombre usuario</label>
      <input type="text" id="pastillas" name="usuario"><br><br>
      <label for="usuario">Nombre real</label>
      <input type="text" id="pastillas" name="nombre"><br><br>
      <label for="contrasena">Contraseña</label>
      <input type="password" id="pastillas" name="contrasena"><br><br>
      <label for="pago">Método de pago (Paypal, tarjeta bancaria...)</label>
      <input type="text" id="pastillas" name="pago"><br><br>
      <input type="submit" id="enviar" value="Confirmar">

      <p>¿Ya tienes una cuenta?</p>
      <a href="login.php"><br><br>Inicia sesión</a>
    </form>
    

    <div class="panel">
      <img src="imagenes/singup_panel.png" width="500" height="400">
    </div>
  </div>
  <?php
  include("includes/footer.php");
  ?>
</body>



</html>