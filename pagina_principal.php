<?php
    require 'modelo/conexion.php';

    session_start();

    if(isset($_SESSION['username']) && isset($_SESSION['correo'])) {
        $nombre_usuario = $_SESSION['username'];
        $correo_usuario = $_SESSION['correo'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Sangileña</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #contenedor_principal {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #34495e;
            font-size: 16px;
            margin: 10px 0;
        }

        h3 {
            color: #2980b9;
            font-size: 18px;
            margin-bottom: 10px;
        }

        /* Menús desplegables */
        .dropdown {
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3498db;
        }

        .dropbtn {
            background-color: #2980b9;
            color: white;
            padding: 10px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        .dropbtn:hover {
            background-color: #3498db;
        }

        /* Estilo para la sección de cierre de sesión */
        h3:last-child {
            color: #e74c3c;
        }

        a.logout {
            display: block;
            text-decoration: none;
            color: white;
            background-color: #e74c3c;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        a.logout:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div id="contenedor_principal">
        <h1>Zapatería La Sangileña</h1>
        <p>Nombre: <?php echo ' ' . $nombre_usuario; ?></p>
        <p>Correo: <?php echo ' ' . $correo_usuario; ?></p>
        
        <div class="dropdown">
            <button class="dropbtn">Registros</button>
            <div class="dropdown-content">
                <a href="registrar_fabricante.php">Fabricante</a>
                <a href="registrar_articulo.php">Artículo</a>
            </div>
        </div>

        <h3>Consultas</h3>
        <div class="dropdown">
            <button class="dropbtn">Consultas</button>
            <div class="dropdown-content">
                <a href="modelo/consulta_fabricante.php">Consultar Fabricantes</a>
                <a href="modelo/consulta_articulo.php">Consultar Artículos</a>
            </div>
        </div>

        <h3>Actualizaciones</h3>
        <div class="dropdown">
            <button class="dropbtn">Actualizaciones</button>
            <div class="dropdown-content">
                <a href="#">Actualizar Fabricante</a>
                <a href="#">Actualizar Artículo</a>
            </div>
        </div>

        <h3>Eliminaciones</h3>
        <div class="dropdown">
            <button class="dropbtn">Eliminaciones</button>
            <div class="dropdown-content">
                <a href="#">Eliminar Fabricante</a>
                <a href="#">Eliminar Artículo</a>
            </div>
        </div>

        <h3>Salir</h3>
        <a href="modelo/cerrar_sesion.php" class="logout">Salir</a>
    </div>
</body>
</html>
