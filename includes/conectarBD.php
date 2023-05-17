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
        $user = 'agutcle_agutc_wp_8amnj';
        $password = '9Febrero.';
        $bd = 'agutcle_wp_cmjsx';
        $host = 'agutcle.upv.edu.es';
        $port = 3306;

        $this->conexion = mysqli_connect($host, $user, $password, $bd, $port);

        if (!$this->conexion) {
            die('Error al conectar con la base de datos: ' . mysqli_connect_error());
        }
    }

    public function insertarUsuario($nombreUsuario, $password, $surname)
    {
        $instruccion = "SELECT * FROM `usuarios` WHERE `usuario` = '$nombreUsuario'";
        $resultadoConsulta = mysqli_query($this->conexion, $instruccion) or die("fallo 0 en la consulta");
        $cantidadCoincidencias = mysqli_num_rows($resultadoConsulta);
        if ($cantidadCoincidencias > 0) {
            die("Ya existe el usuario $nombreUsuario");
        }

        $instruccion = "INSERT INTO `usuarios`( `usuario`, `password`, `surname`) VALUES ('$nombreUsuario','$password','$surname')";
        $resultadoConsulta = mysqli_query($this->conexion, $instruccion) or die("fallo 1 en la consulta");
        echo 'Registro realizado con éxito';
    }

    public function consigueUsuario($nombreUsuario, $password)
    {
        $instruccion = "SELECT usuario, password FROM usuarios WHERE usuario = '$nombreUsuario' && password = '$password'";
        $resultado = mysqli_query($this->conexion, $instruccion) or die("fallo 2 en la consulta");
        $cantidadCoincidencias = mysqli_num_rows($resultado);
        if ($cantidadCoincidencias == 0) {
            echo "<h3>No se ha encontrado el usuario especificado. Prueba de nuevo!</h3>";
            return false;
        }
        $_SESSION["usuario"] = $nombreUsuario;
        return true;
    }

    public function registrarUsuario($nombreUsuario, $apellidosUsuario, $clave)
    {
        $instruccion = "SELECT * FROM `usuarios` WHERE `usuario` = '$nombreUsuario'";
        $resultadoConsulta = mysqli_query($this->conexion, $instruccion) or die("fallo 0 en la consulta");
        $cantidadCoincidencias = mysqli_num_rows($resultadoConsulta);
        if ($cantidadCoincidencias > 0) {
            die("Ya existe el usuario $nombreUsuario");
        }

        $conexionBD = new conectarBD;
        $conexionBD->insertarUsuario($nombreUsuario, $clave, $apellidosUsuario);
        echo "<form action='../singup.php'>
                <input type='submit' value='Ir a Inicio Sesión' />
            </form>";
    }

    public function cerrarBD()
    {
        mysqli_close($this->conexion);
        $tFin = microtime(true);
        echo '<br> Tiempo de ejecución: ', $tFin - $this->tInicio, ' microsegundos.';
    }
}
