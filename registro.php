<?php
// Recuperar los datos del formulario
$nombre = htmlspecialchars(trim($_POST['nombre']));
$correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
$date = $_POST['date'];
$genero = htmlspecialchars(trim($_POST['genero']));

// Validar los datos
$errores = [];

if (empty($nombre)) {
    $errores[] = "El nombre es obligatorio.";
}

if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo es inválido.";
}

if (empty($date)) {
    $errores[] = "La fecha de nacimiento es obligatoria.";
}

if (empty($genero)) {
    $errores[] = "Debe seleccionar un género.";
}

// Mostrar errores o confirmar el registro
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Registro</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .error {
            color: #e74c3c;
            font-weight: bold;
        }
        .success {
            color: #2ecc71;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: #3498db;
        }
        a:hover {
            color: #2980b9;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border-radius: 4px;
        }
        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (!empty($errores)) {
            echo "<h1 class='error'>Errores en el registro</h1>";
            foreach ($errores as $error) {
                echo "<p class='error'>$error</p>";
            }
        } else {
            echo "<h1 class='success'>¡Registro exitoso en GG's Sports!</h1>";
            echo "<p><strong>Nombre:</strong> $nombre</p>";
            echo "<p><strong>Correo electrónico:</strong> $correo</p>";
            echo "<p><strong>Fecha de nacimiento:</strong> $date</p>";
            echo "<p><strong>Género:</strong> $genero</p>";
            echo "<h2 class='success'>¡Te deseamos las mejores experiencias dentro de esta página!</h2>";
        }
        ?>
        <a href="index.html" class="back-button">Volver a la página principal</a>
    </div>
</body>
</html>
