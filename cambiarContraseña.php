<!doctype html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="images/icono.PNG"/>
  <?php
          require_once ("base.php");
    session_start();
  ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.12.1-web/css/all.min.css">
    <style>
    body{
  background-color:#D2E4EC;
}
/* Extra small devices (portrait phones, less than 576px) */

    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) {

    }

    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) { 

    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {

     }

    /* Extra large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {

     }

    </style>
    <?php
        if (isset($_REQUEST['cambiar'])) {
            if (isset($_REQUEST['usuario'])&& isset($_REQUEST['password'])) {
                $usuario = $_REQUEST['usuario'];
                $contraseña = $_REQUEST['password'];
                $email = $_SESSION['email'];
                $array = Base::cambiarDatos($usuario,$contraseña,$email);
            }
        }
    ?>
    <title>Cambiar Contraseña</title>
  </head>
  <body>
        <div class="container-fluid">
            <div class="row">
            <div class="col p-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-info">
                  <a class="navbar-brand" href="index.php">Inicio</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="#">Mis fichas</a>
                      </li>
                    </ul>

                    <div class=" my-2 my-lg-0">
                     <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="inicio_sesion.php">Iniciar sesion</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="registro.php">Registrarse</a>
                      </li>
                     </ul>
                    </div>
                  </div>
                </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 mt-4">
                <?php
                if (!isset($_REQUEST['cambiar'])) {
                ?>
                <form method='post' action='cambiarContraseña.php?cambiar=true'>
  <div class="form-group">
    <label for="exampleInputPassword1">Cambiar nombre de usuario</label>
    <input type="text" class="form-control" name="usuario">
    <?php

    ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Cambiar contraseña</label>
    <input type="password" class="form-control" name="password">

  </div>

  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
                }else{
                    session_destroy();
                    echo("usuario y contraseña cambiada pulse <a href=inicio_sesion.php>aquí</a> para volver al inicio de sesion");
                }
?>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    <script src="estilos/jquery-3.4.1.slim.min.js"></script>
    <script src="estilos/popper.min.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>