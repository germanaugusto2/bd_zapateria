<?php
    require 'modelo/conexion.php';

    session_start();

    // Verificamos si la sesión tiene valores de usuario y correo
    if(isset($_SESSION['username']) && isset($_SESSION['correo'])) {
        $nombre_usuario = $_SESSION['username'];
        $correo_usuario = $_SESSION['correo'];
    } else {
        // Redirigimos al usuario a la página de inicio de sesión si no ha iniciado sesión
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Sangileña - Registrar Fabricante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #contenedor_principal {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-size: 14px;
            color: #333;
        }

        input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="contenedor_principal">
        <h1>Zapatería La Sangileña</h1>
        <p>Nombre: <?php echo $nombre_usuario; ?></p>
        <p>Correo: <?php echo $correo_usuario; ?></p>
        
        <h3>Registro de fabricante</h3>
        
        <div id="reg_fabricante">
            <form action="modelo/reg_fabricante.php" method="post">
                <label for="id_fab">Id Fabricante:</label>
                <input type="text" name="id_fab" id="id_fab" placeholder="Id Fabricante" required>
                <br>
                
                <label for="nombre_fab">Nombre Fabricante:</label>
                <input type="text" name="nombre_fab" id="nombre_fab" placeholder="Nombre Fabricante" required>
                <br>
                
                <button type="submit">Registrar</button>
            </form>
        </div>
    </div>
</body>
</html>
