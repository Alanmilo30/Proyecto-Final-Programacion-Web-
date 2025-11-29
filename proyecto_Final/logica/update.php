<?php
include(__DIR__ . '/conexion.php');

// Obtener ID por POST (ya no por GET)
$id = $_POST['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Actualizar los datos
    $sql = "UPDATE listas 
            SET nombre='$nombre', email='$email', telefono='$telefono' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../paginaPrincipal.php');
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
    <title>Editar Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }
        .top-bar {
            width: 100%;
            height: 50px;
            background-color: #87CEEB;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .container {
            max-width: 500px;
            margin: 100px auto 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h3 {
            text-align: center;
            color: #ff9800;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        form input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        form button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #ff9800;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #e68900;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #2196f3;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="top-bar"></div>

    <div class="container">
        <h3>Editar Registro</h3>

        <form method="POST" action="update.php?id=<?php echo $id; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>" required>

            <button type="submit">Actualizar Registro</button>
        </form>

        <a href="../paginaPrincipal.php" class="back-link">Volver a la lista</a>
    </div>

</body>
</html>
