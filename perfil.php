<!doctype html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="images/icono.PNG"/>
  <?php
    require_once ('base.php');
  session_start();
    if (isset($_REQUEST['delete'])) {
      if ($_REQUEST['delete']==true) {
        $final = time();
        $principio = $_SESSION['inicio'];
        $tiempoRestante=$final-$principio;
        $array_de_productos = Base::añadirTiempo($tiempoRestante,$_SESSION['id']);
        session_destroy();
        header('location: index.php');
      }
    }
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

    <title>Mi Perfil</title>
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
                        <a class="nav-link" href="personajes.php">Mis fichas</a>
                      </li>
                      <?php
                        if (isset($_SESSION['id'])) {
                          # code...
                        
                      ?>
                      <li class="nav-item active">
                        <a class="nav-link" href="daditos.php">Sala de dados</a>
                      </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="#">Mi perfil</a>
                      </li>
                      <?php
                      if ($_SESSION['grupo']=="administrador") {
                      ?>
                         <li class="nav-item active">
                        <a class="nav-link" href="borrar.php">Personajes Borrados</a>
                      </li>
                      <?php
                        }
                      ?>
                      <?php
                        }
                      ?>
                    </ul>
                    <?php
                      if (!isset($_SESSION['id'])) {
                        

                    ?>
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
                    <?php
                      }else{
                    ?>
                         <div class=" my-2 my-lg-0">
                     <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php?delete=true">Cerrar sesion</a>
                      </li>
                     </ul>
                    </div>
                    <?php
                      }
                    ?>
                  </div>
                </nav>
                </div>
            </div>
            <div class="row">
              <div class="col-10 p-2">
              <?php
                if (isset($_REQUEST['correo'])&&isset($_REQUEST['usuario'])&&isset($_REQUEST['contraseña'])&&$_REQUEST['correo']!=''&&$_REQUEST['usuario']!=''&&$_REQUEST['contraseña']!='') {
                    $correo=$_REQUEST['correo'];
                    $usuario=$_REQUEST['usuario'];
                    $contraseña=$_REQUEST['contraseña'];
                    $array_de_Clientes = Base::modificar_usuario($_SESSION['id'],$usuario,$correo,$contraseña);
                    echo("<p class='ml-5 pl-5'>Se ha modificado con éxito</p>");
                }

                $contador = Base::usuario($_SESSION['id']);
                foreach ($contador as $o) {
                    echo('<form action="perfil.php" method="post">
                    <div class="form-group row ml-5 pl-5">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="" name="correo" value='.$o->getCorreo().'>
                      </div>
                    </div>
                    <div class="form-group row ml-5 pl-5">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">usuario</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="" name="usuario" value='.$o->getUsuario().'>
                      </div>
                    </div>
                    <div class="form-group row ml-5 pl-5">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
                      <div class="col-sm-5">
                        <input type="password" class="form-control" id="" name="contraseña" value='.$o->getContraseña().'>
                      </div>
                    </div>
                    <fieldset class="form-group">
                    </fieldset>
                    <div class="form-group row ml-5 pl-5">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Modificar</button>
                      </div>
                    </div>
                  </form>');
                }
              ?>
              </div>
              <div class="col-2 p-2">
              <?php
                        if (isset($_SESSION['id'])) {
                          
                          $array_de_productos = Base::usuario($_SESSION['id']);
                          foreach ($array_de_productos as $o) {
                            $nombre=$o->getUsuario();
                            $time = $o->getTiempo();
                        }
                        $contador = Base::contador($_SESSION['id']);
                      ?>
                        <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo($nombre) ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Personajes creados: <?php echo($contador[0]) ?></h6>
                            <p class="card-text">Tiempo activo en el servidor: <?php echo("Horas: ".floor(($time/3600))); echo(" Minutos: ".floor(($time/60)%60)); echo(" Segundos: ".$time%60);?></p>
                          </div>
                        </div>
                        <?php
                        }
                        ?></div>
            </div>
             <div class="dropdown-divider"></div>
        </div>
    <script src="estilos/jquery-3.4.1.slim.min.js"></script>
    <script src="estilos/popper.min.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>