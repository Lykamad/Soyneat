<?php

class conectarBD
{
    // Variable conexion donde guardaremos la conexión a la BD.
    private mysqli $conexion;
    private $tInicio;

    // Constructor de la clase. Se iniciara al instanciar un objeto de la clase.
    public function __construct()
    {
        $this->tInicio = microtime(true);
        $user = 'root';
        $password = '';
        $bd = 'soyneat3_1';
        $host = 'localhost';
        $port = 3306;

        $this->conexion = mysqli_connect($host, $user, $password, $bd, $port);

        if (!$this->conexion) {
            die('Error al conectar con la base de datos: ' . mysqli_connect_error());
        }
    }

    public function getConexion()
    {
        return $this->conexion;
    }

    public function insertarUsuario($nombreUsuario, $password, $nombreReal, $email, $pago)
    {
        $instruccion = "SELECT * FROM `usuario` WHERE `login` = '$nombreUsuario'";
        $resultadoConsulta = mysqli_query($this->conexion, $instruccion) or die("fallo 0 en la consulta");
        $cantidadCoincidencias = mysqli_num_rows($resultadoConsulta);
        if ($cantidadCoincidencias > 0) {
            die("Ya existe el usuario $nombreUsuario");
        }

        $instruccion = "INSERT INTO `usuario`( `login`, `password`, `nombre`, `email`, `pago`) VALUES ('$nombreUsuario','$password','$nombreReal','$email','$pago')";
        $resultadoConsulta = mysqli_query($this->conexion, $instruccion) or die("fallo 1 en la consulta");
        echo 'Registro realizado con éxito';
    }

    public function consigueUsuario($nombreUsuario, $password)
    {
        $instruccion = "SELECT login, password FROM usuario WHERE login = '$nombreUsuario' && password = '$password'";
        $resultado = mysqli_query($this->conexion, $instruccion) or die("fallo 2 en la consulta");
        $cantidadCoincidencias = mysqli_num_rows($resultado);
        if ($cantidadCoincidencias == 0) {
            echo "<p>No se ha encontrado el usuario especificado. ¡Prueba de nuevo!</p>";
            echo "<button class='btn' style='position: relative; bottom: 0px;'>
            <a href='modificar.php'>Volver Atrás</a>
            </button>";
            return false;
        }
        $_SESSION["login"] = $nombreUsuario;
        return true;
    }

    public function registrarUsuario($nombreUsuario, $password, $nombreReal, $email, $pago)
    {
        $instruccion = "SELECT * FROM `usuario` WHERE `login` = '$nombreUsuario'";
        $resultadoConsulta = mysqli_query($this->conexion, $instruccion) or die("fallo 0 en la consulta");
        $cantidadCoincidencias = mysqli_num_rows($resultadoConsulta);
        if ($cantidadCoincidencias > 0) {

            echo "<p>Ya existe el usuario $nombreUsuario</p>";
            echo "<button class='btn'>
            <a href='index.php'>Volver a Inicio</a>
            </button>";
        } else {

            $conexionBD = new conectarBD;
            $conexionBD->insertarUsuario($nombreUsuario, $password, $nombreReal, $email, $pago);
            echo "<form action='singup.php'>
                <input type='submit' value='Ir a Inicio Sesión' />
            </form>";
        }
    }

    public function modificarUsuario($viejoUsuario, $nuevoNombreUsuario, $nuevoPassword)
    {
        $instruccion = "SELECT * FROM `usuario` WHERE `login` = '$viejoUsuario'";
        $resultadoConsulta = mysqli_query($this->conexion, $instruccion) or die("fallo 5 en la consulta");
        $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);
        if ($cantidadDeFilas > 0) {
            $instruccion = "UPDATE `usuario` SET `password` = '$nuevoPassword', `login` = '$nuevoNombreUsuario' WHERE `login` = '$viejoUsuario'";
            //echo $instruccion;
            $resultadoConsulta = mysqli_query($this->conexion, $instruccion) or die("fallo6 en la consulta");
            echo '<p>¡Cambio realizado con éxito!</p>';
            echo "<button class='btn'>
                    <a href='index.php'>Volver a Inicio</a>
                    </button>";
                    return true;
        } else {
            echo '<p>Debes rellenar todos los campos para que el cambio sea válido</p>';
            echo "<button class='btn'>
            <a href='modificar_usuario.php'>Volver Atrás</a>
            </button>";
            return false;
        }
    }

    public function eliminarUsuario($usuario) {
        $instruccion = "SELECT * FROM `usuario` WHERE `login` = '$usuario'";
        $resultadoConsulta = mysqli_query($this->conexion, $instruccion) or die("fallo 5 en la consulta");
        $cantidadDeFilas = mysqli_num_rows($resultadoConsulta);
        if ($cantidadDeFilas > 0) {
            $instruccion = "DELETE FROM `usuario` WHERE `login` = '$usuario'";
            //echo $instruccion;
            $resultadoConsulta = mysqli_query($this->conexion, $instruccion) or die("fallo 6 en la consulta");
            echo '<p>Se ha eliminado el usuario definitivamente</p>';
            echo "<button class='btn'>
                    <a href='index.php'>Volver a Inicio</a>
                    </button>";
                    return true;
        } 
        echo "<p>Hubo un error al eliminar el usuario.</p>";
        return false;
    }

    public function cerrarBD()
    {
        mysqli_close($this->conexion);
        $tFin = microtime(true);
        echo '<br> Tiempo de ejecución: ', $tFin - $this->tInicio, ' microsegundos.';
    }
}
