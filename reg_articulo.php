<?php
    require 'conexion.php';

    session_start();

    // Activar la visualización de errores
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    // Verificar si el usuario está autenticado
    if (isset($_SESSION['correo'])) {
        // Verificar si se enviaron todos los campos del formulario
        if (isset($_POST['nombre_art'], $_POST['precio_art'], $_POST['id_fabricante'])) {
            $nombre_art = $_POST['nombre_art'];
            $precio_art = $_POST['precio_art'];
            $id_fabricante = $_POST['id_fabricante'];

            // Usar una consulta preparada para evitar inyecciones SQL
            $query = $conexion->prepare("INSERT INTO Articulo (nombre_articulo, precio_articulo, id_fabricante) VALUES (?, ?, ?)");
            if ($query) {
                $query->bind_param('sdi', $nombre_art, $precio_art, $id_fabricante);

                // Ejecutar la consulta
                if ($query->execute()) {
                    echo '<script type="text/javascript">alert("Artículo registrado exitosamente"); window.location.href="../registrar_articulo.php";</script>';
                } else {
                    echo '<script type="text/javascript">alert("Error al registrar el artículo: ' . $query->error . '"); window.location.href="../registrar_articulo.php";</script>';
                }

                // Cerrar la consulta
                $query->close();
            } else {
                echo "Error en la preparación de la consulta: " . $conexion->error;
            }

            // Cerrar la conexión
            $conexion->close();
        } else {
            echo '<script type="text/javascript">alert("Faltan datos en el formulario"); window.location.href="../registrar_articulo.php";</script>';
        }
    } else {
        header('location: ../pagina_principal.php');
    }
?>
