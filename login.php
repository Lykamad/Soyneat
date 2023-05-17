<?php
require_once("includes/conectarBD.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="estilo/unete.css">

</head>

<body>
  <?php
  include("includes/a_config.php");
  include("includes/navigation.php");
  ?>
  <h2>Inicia sesión</h2>
  <div class="content">
    <?php
    // instancia de un objeto de la clase conectarBD
    $conexionBD = new conectarBD;

    // Si no se ha establecido la variable POST iniciar sesion...
    if (!isset($_POST['iniciarSesion'])) {
      if (!isset($_SESSION['usuario'])) {
        // Muestra el formulario de inicio de sesion
    ?>
        <form action="login.php" method="post">
          <!-- Campos para que el usuario inicie sesion -->
          <label for="usuario">Usuario</label>
          <input type="text" id="pastillas" name="nombreUsuario"><br><br>
          <label for="claveUsuario">Contraseña</label>
          <input type="password" id="pastillas" name="claveUsuario"><br><br>
          <!-- Boton submit para enviar la variable POST iniciar sesion -->
          <input class="submit_btn" type="submit" id="enviar" name="iniciarSesion" value="Iniciar Sesión">

          <p>¿No tienes una cuenta todavía? <a href="singup.php"><br><br>Regístrate</a></p>
        </form>
      <?php
      } else {
      ?>
        <h3>Actualmente estas conectado con el usuario: <?php echo $_SESSION['usuario'] ?></h3>
        <form action="inicioSesion.php" method="post">
          <input type="submit" value="Cerrar Sesión" name="cierraSesion">
        </form>
      <?php
      }
    } else {
      if (!$conexionBD->consigueUsuario($_POST['nombreUsuario'], md5($_POST['claveUsuario']))) {
      ?>
        <form action="login.php" method="post">
          <!-- Campos para que el usuario inicie sesion -->
          <label for="usuario">Usuario</label>
          <input type="text" id="pastillas" name="nombreUsuario"><br><br>
          <label for="claveUsuario">Contraseña</label>
          <input type="password" id="pastillas" name="claveUsuario"><br><br>
          <!-- Boton submit para enviar la variable POST iniciar sesion -->
          <input class="submit_btn" type="submit" id="enviar" name="iniciarSesion" value="Iniciar Sesión">
      <?php
      } else {
        echo "<p>Se ha iniciado sesión con el usuario: <br>" . $_SESSION['usuario'] . "</p>";
      }
    }
      ?>
      <div class="panel">
        <img src="imagenes/login_panel.png" width="500" height="400">
      </div>
  </div>
</body>
<?php
include("includes/footer.php");
?>

</html>