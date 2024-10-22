<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Artículos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            max-width: 800px;
            width: 100%;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        th {
            background-color: #6c7ae0;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        h2 {
            color: #333;
        }

        #home {
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #6c7ae0;
            font-weight: bold;
            border: 2px solid #6c7ae0;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        a:hover {
            background-color: #6c7ae0;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Artículos</h2>
        <?php
        require 'conexion.php';

        session_start();

        if (isset($_SESSION['correo'])) {
            // Consulta para obtener los artículos
            $query = "SELECT id_articulo, nombre_articulo, precio_articulo, id_fabricante FROM Articulo";
            $resultado = mysqli_query($conexion, $query) or trigger_error("Error en la consulta: " . mysqli_error($conexion));

            // Encabezado de la tabla de resultados
            echo "<table>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Nombre</th>";
            echo "<th>Precio</th>";
            echo "<th>Fabricante</th>";
            echo "</tr>";

            // Mostrar los resultados de la consulta en la tabla HTML
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['id_articulo'] . "</td>";
                echo "<td>" . $fila['nombre_articulo'] . "</td>";
                echo "<td>$" . number_format($fila['precio_articulo'], 2) . "</td>";
                echo "<td>" . $fila['id_fabricante'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "<br>";

            echo "<div id='home'><a href='../pagina_principal.php'>Home</a></div>";
        } else {
            echo "<p>No estás autenticado. <a href='../login.php'>Inicia sesión</a>.</p>";
        }
        ?>
    </div>
</body>
</html>
