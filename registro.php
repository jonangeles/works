<!doctype html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="images/icono.PNG"/>
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

    <title>registrarse</title>
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
                        <a class="nav-link" href="#">Registrarse</a>
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
                <form method='post' action='valido.php'>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">introduzca una direccion de correo v??lida</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nombre de usuario</label>
    <input type="text" class="form-control" name="usuario">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password">
  </div>


  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    <script src="estilos/jquery-3.4.1.slim.min.js"></script>
    <script src="estilos/popper.min.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>