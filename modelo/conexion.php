<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php

// Parametros de conexion a la BD
/*DEFINE('USER', 'root');
DEFINE('PW', '');
DEFINE('HOST', 'localhost');
DEFINE('BD', 'bd_zapateria');*/

// Parametros de conexion a la BD remota en infinitifree
DEFINE('USER', 'if0_37435071');
DEFINE('PW', ' ruNYn8wL39k ');
DEFINE('HOST', 'sql207.infinityfree.com');
DEFINE('BD', 'if0_37435071_zapateria');

// Conexion a la BD
$conexion = mysqli_connect('sql207.infinityfree.com', 'if0_37435071', 'ruNYn8wL39k', 'if0_37435071_zapateria');

// Establecer caracteres para el hosting
mysqli_set_charset($conexion, "utf8mb4");

// Vereficamos la conexion con la BD
if(!$conexion)
{
    die("La conexion a la BD fallo: " +  mysqli_error($conexion));
}
/*else
{
    die("Conexion exitosa a la BD");
}*/

?>