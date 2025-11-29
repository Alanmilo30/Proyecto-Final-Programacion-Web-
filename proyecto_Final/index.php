<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: white;
            width: 350px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-container h1 {
            color: #1e3c72;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin-top: 15px;
            font-weight: bold;
            color: #1e3c72;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 2px solid #1e3c72;
            border-radius: 8px;
            outline: none;
        }

        input:focus {
            border-color: #2a5298;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background-color: #1e3c72;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease;
            font-size: 16px;
        }

        button:hover {
            background-color: #2a5298;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>Login</h1>

        <form action="./logica/ValidarLogin.php" method="POST">
            <label for="NombreUser">Nombre de Usuario</label>
            <input type="text" name="nombre_usuario" required>

            <label for="Password">Contraseña</label>
            <input type="password" name="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>

</body>
</html>
