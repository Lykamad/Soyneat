<?php
require_once("includes/conectarBD.php");
?>

<!DOCTYPE html>
<html>

<head>
 
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
      if (!isset($_SESSION['login'])) {
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
        <div class="panel">
        <img src="imagenes/login_panel.png" width="500" height="400">
      </div>
      <?php
      } else {
      ?>
        <div class="cierre">
        <h2>Actualmente estas conectado con el usuario: <?php echo $_SESSION['login'] ?></h2>
        
        <form action="login.php" method="post">
          <input type="submit" value="Cerrar Sesión" name="cierraSesion">
        </form>
        <form action="modificar.php" method="post">
          <input type="submit" value="Modificar Usuario" name="modificaSesion">
        </form>
        <form action="eliminar.php" method="post">
          <input type="submit" value="Eliminar Usuario" name="modificaSesion">
        </form>
        <form action="index.php" method="post">
          <input type="submit" value="Volver a Inicio" name="volverInicio">
        </form>
        </div>
      <?php
      }
    } else {
      if (!$conexionBD->consigueUsuario($_POST['nombreUsuario'], ($_POST['claveUsuario']))) {
      ?>
        <form action="login.php" method="post">
          <!-- Campos para que el usuario inicie sesion -->
          <label for="usuario">Usuario</label>
          <input type="text" id="pastillas" name="nombreUsuario"><br><br>
          <label for="claveUsuario">Contraseña</label>
          <input type="password" id="pastillas" name="claveUsuario"><br><br>
          <!-- Boton submit para enviar la variable POST iniciar sesion -->
          <input class="submit_btn" type="submit" id="enviar" name="iniciarSesion" value="Iniciar Sesión">
          <div class="panel">
        <img src="imagenes/login_panel.png" width="500" height="400">
      </div>
      <?php
      } else {
        echo "<h1>Se ha iniciado sesión con el usuario: <br>" . $_SESSION['login'] . "</h>";
      }
    }
      ?>
      
  </div>
</body>
<?php
include("includes/footer.php");
?>

</html>