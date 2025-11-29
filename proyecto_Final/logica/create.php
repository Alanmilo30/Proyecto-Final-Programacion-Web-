<?php
include(__DIR__ . '/conexion.php'); // Ruta segura para db.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO listas (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../paginaPrincipal.php'); // Redirige a la lista de usuarios
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Registro</title>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    
    <link href="../css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
    
    <header class="top-bar valign-wrapper">
        <div class="container">
            <h5 class="white-text m-0" style="margin: 0 font-weight: 300">Sistema de Alumnos</h5>
        </div>
    </header>

    <main>
        <div class="container container-form">
            <h3>Registro</h3>
            
            <form method="POST" action="create.php">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>

                <button type="submit">Registrate</button>
            </form>
            
            <a href="../paginaPrincipal.php" class="back-link">Volver a la lista</a>
        </div>
    </main>

    <footer class="page-footer grey darken-2">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <p class="white-text" style="text-align: justify;">
                        Hecho en México, Universidad Nacional Autónoma de México (UNAM), todos los derechos reservados 2025. 
                        Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, 
                        se cite la fuente completa y su dirección electrónica. De otra forma, requiere permiso previo 
                        por escrito de la institución.
                    </p>

                    <p class="white-text">
                        <strong>Créditos</strong> | <a href="https://www.aragon.unam.mx/fes-aragon/#!/contacto" class="white-text">Cómo llegar a la FES Aragón</a>
                    </p>

                    <p class="white-text">
                        <strong>Aviso de privacidad</strong><br>
                        [ <a href="#!" class="white-text">Integral</a> |
                        <a href="#!" class="white-text">Simplificado</a> |
                        <a href="#!" class="white-text">CCTV-Integral</a> |
                        <a href="#!" class="white-text">CCTV-Simplificado</a> ]
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>