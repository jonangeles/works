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
    if(!isset($_SESSION['id'])){
        header('location: inicio_sesion.php');
    };
    if (isset($_REQUEST["borrar"])) {
      $borrar = $_REQUEST["borrar"];
      $array = Base::borrarPj($borrar);
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

    <title>Mis Personajes</title>
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
                      <?php
                        if (isset($_SESSION['id'])) {
                          # code...
                        
                      ?>
                      <li class="nav-item active">
                        <a class="nav-link" href="daditos.php">Sala de dados</a>
                      </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="perfil.php">Mi perfil</a>
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
              <div class="col-10">
              <div class="container-fluid">
              <div class="row">
                      <?php
                       $array = Base::selectPj($_SESSION['id']);
                       foreach ($array as $o) {
                        if ($o->getClase()=="guerrero") {
                          echo('<div class="col">
                           <div class="card" style="width: 18rem;">
                          <img src="images/guerrero.jpg" class="card-img-top" alt="..." height="400">');
                        }else if($o->getClase()=="clerigo"){
                          echo(' <div class="col">
                          <div class="card" style="width: 18rem;">
                          <img src="images/clerigo.png" class="card-img-top" alt="..." height="400">');
                        }else{
                          echo(' <div class="col">
                          <div class="card" style="width: 18rem;">
                          <img src="images/mago.png" class="card-img-top" alt="..." height="400">');
                        }
                        echo('<div class="card-body">
                        <h5 class="card-title">'.$o->getNombre().'</h5>
                        <p class="card-text">'.$o->getClase().' del nivel '.$o->getNivel().'</p>
                        <p  class="text-center"><a href="modificar.php?id='.$o->getId().'" class="btn btn-primary m-2">ver</a><a href="personajes.php?borrar='.$o->getId().'" class="btn btn-danger m-2">borrar</a></p>
                    </div>
                    </div>
                    </div>');

                    }
                         $contador = Base::contador($_SESSION['id']);
                         if($contador[0]<3){
                             ?>
                             <div class="col">
                                <div class="card" style="width: 18rem;">
                                <img src="images/newpj.jpg" class="card-img-top" alt="..." height="370">
                                <div class="card-body">
                                    <h5 class="card-title">Nuevo Personaje</h5>
                                    <p class="card-text">Create un nuevo personaje puedes elegir enter Guerrero, Clerigo y Mago.</p>
                                    <p  class='text-center'><a href="elegir.php" class="btn btn-primary">Crear</a></p>
                                </div>
                                </div>
                                </div>
                             <?php
                         };
                      ?>
                  </div> 
                  </div>
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
                            <p class="card-text">Tiempo activo en el servidor: <?php echo("Horas: ".floor(($time/3600))); echo(" Minutos: ".floor(($time/60)%60)); echo(" Segundos: ".$time%60);?></p></p>
                          </div>
                        </div>
                        <?php
                        }
                        ?></div>   
              </div>
              
            </div>
        </div>
    <script src="estilos/jquery-3.4.1.slim.min.js"></script>
    <script src="estilos/popper.min.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>