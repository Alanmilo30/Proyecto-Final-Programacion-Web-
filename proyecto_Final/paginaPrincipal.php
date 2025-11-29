<?php
session_start();
$usuario = $_SESSION['username'];

if (!isset($usuario)) {
    header("location: ./index.php");
} else {
?>

<?php
include('./logica/conexion.php');
$consulta = "SELECT * FROM listas";
$result = $conn->query($consulta);
?> 

<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Página ICO</title>

  <!-- CSS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="https://www.aragon.unam.mx/fes-aragon/#!/inicio" class="brand-logo">FES ARAGÓN</a>

      <!-- MENÚ DESKTOP -->
      <ul class="right hide-on-med-and-down">
        <li><a href="https://www.unam.mx/">UNAM</a></li>
        <li><a href="./logica/logout.php" class="btn red" style="margin-left:10px;">Salir</a></li>
      </ul>

      <!-- MENÚ MÓVIL -->
      <ul id="nav-mobile" class="sidenav">
        <li><a href="https://www.unam.mx/">UNAM</a></li>
        <li><a href="./logica/logout.php" class="red-text">Salir</a></li>
      </ul>

      <a href="#" data-target="nav-mobile" class="sidenav-trigger">
        <i class="material-icons">menu</i>
      </a>
    </div>
  </nav>

  <!-- Tabla de usuarios -->
  <div class="section no-pad-bot" id="index-banner" style="min-height: 70vh; display: flex; flex-direction: column; justify-content: center;">

    <div class="container">
        <div class="row">
            <div class="col s12">

                <h3 class="center" style="color: #333; font-weight: 300;">Lista de alumnos</h3>

                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            // Detectar si estamos editando
                            $editId = isset($_GET['edit']) ? $_GET['edit'] : null;

                            // Detectar si estamos confirmando borrado
                            $deleteId = isset($_GET['delete']) ? $_GET['delete'] : null;

                            while ($row = $result->fetch_assoc()) { 
                        ?>
                            <tr>
                                <?php 
                                /////////////////////////////////////////////////////////////////////////////////////////////
                                if ($editId == $row['id']) { 
                                ?>
                                    <form action="./logica/update.php" method="POST">
                                        <td>
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <?php echo $row['id']; ?>
                                        </td>

                                        <td>
                                            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
                                        </td>

                                        <td>
                                            <input type="text" name="email" value="<?php echo $row['email']; ?>">
                                        </td>

                                        <td>
                                            <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>">
                                        </td>

                                        <td>
                                            <button type="submit" class="btn-small green">Guardar</button>
                                            <a href="paginaPrincipal.php" class="btn-small grey">Cancelar</a>
                                        </td>
                                    </form>

                                <?php 
                                //////////////////////////////////////////////////////////////
                                } elseif ($deleteId == $row['id']) { 
                                ?>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['telefono']; ?></td>

                                    <td>
                                        <span style="color: red; font-weight: bold;">¿Borrar? </span>
                                        <a href="./logica/delete.php?id=<?php echo $row['id']; ?>" 
                                           class="btn-small red">SÍ</a>

                                        <a href="paginaPrincipal.php" class="btn-small grey">NO</a>
                                    </td>

                                <?php 
                                ///////////////////////////////
                                } else { 
                                ?>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['telefono']; ?></td>

                                    <td>
                                        <a href="paginaPrincipal.php?edit=<?php echo $row['id']; ?>" 
                                           class="btn-small blue">Editar</a>

                                        <a href="paginaPrincipal.php?delete=<?php echo $row['id']; ?>" 
                                           class="btn-small red">Eliminar</a>
                                    </td>
                                <?php 
                                } 
                                ?>
                            </tr>
                        <?php 
                            } 
                        ?>
                    </tbody>
                </table>
                
                <div class="button-container">
                    <a href="./logica/create.php" class="btn-floating btn-large waves-effect waves-light red">
                        <i class="material-icons">+</i> </a>
                    </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer actualizado -->
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
            <strong>Créditos</strong> | <a href="https://www.aragon.unam.mx/fes-aragon/#!/contacto" class="white-text">Cómo llegar a la FES Arafón</a>
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

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
</body>
</html>

<?php
}
?>
