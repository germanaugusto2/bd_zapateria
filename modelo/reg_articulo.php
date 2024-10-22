<?php
require 'conexion.php'; // Asegúrate de que la ruta a la conexión sea correcta

session_start();

if (isset($_SESSION['correo'])) {
    // Verificar que los datos del formulario existan
    if (isset($_POST['nombre_art']) && isset($_POST['precio_art']) && isset($_POST['id_fabricante'])) {
        
        // Obtener los datos del formulario
        $nombre_art = $_POST['nombre_art'];
        $precio_art = $_POST['precio_art'];
        $id_fabricante = $_POST['id_fabricante'];

        // Verificación de datos antes de pasar a la consulta
        if (empty($nombre_art) || empty($precio_art) || empty($id_fabricante)) {
            die('Error: Todos los campos son obligatorios.');
        }

        // Verificar que el precio sea un número válido
        if (!is_numeric($precio_art)) {
            die('Error: El precio debe ser un número válido.');
        }

        // Usar una consulta preparada para evitar inyecciones SQL
        $query = $conexion->prepare("INSERT INTO Articulo(nombre_articulo, precio_articulo, id_fabricante) VALUES (?, ?, ?)");

        // Verifica si la preparación fue exitosa
        if ($query === false) {
            die('Error en la preparación de la consulta: ' . htmlspecialchars($conexion->error));
        }

        // Vincular los parámetros: 's' para string, 'd' para double, 'i' para integer
        if (!$query->bind_param('sdi', $nombre_art, $precio_art, $id_fabricante)) {
            die('Error en la vinculación de parámetros: ' . htmlspecialchars($query->error));
        }

        // Intentar ejecutar la consulta
        if (!$query->execute()) {
            // Captura y muestra el error si la ejecución falla
            die('Error al ejecutar la consulta: ' . htmlspecialchars($query->error));
        } else {
            echo '<script type="text/javascript">alert("Artículo registrado exitosamente"); window.location.href="../registrar_articulo.php";</script>';
        }

        // Cerrar la consulta y la conexión
        $query->close();
        $conexion->close();
    } else {
        die('Error: Falta enviar los datos del formulario.');
    }
} else {
    // Redirigir si no está autenticado
    header('location: ../pagina_principal.php');
}
?>