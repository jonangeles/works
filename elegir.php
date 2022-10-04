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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
     var cont=1;
     var cont2=1;
     var cont3=1;
     $(document).ready(function () {
      if (cont == 1) {
				$("#descripcion1").hide();
				cont++;
			} else if (cont == 2) {
				$("#descripcion1").show();
				cont--;
			}
			if (cont2 == 1) {
				$("#descripcion2").hide();
				cont2++;
			} else if (cont2 == 2) {
				$("#descripcion2").show();
				cont2--;
			}
      if (cont3 == 1) {
				$("#descripcion3").hide();
				cont3++;
			} else if (cont3 == 2) {
				$("#descripcion3").show();
				cont3--;
			}

      $("#img1").click(function () {
			if (cont == 1) {
				$("#descripcion1").hide(1000);
				cont++;
			} else if (cont == 2) {
        $("#descripcion2").hide(1000);
        $("#descripcion3").hide(1000);
				$("#descripcion1").show(1000);
				cont--;
			}

		});
    $("#img2").click(function () {
			if (cont2 == 1) {
        
				$("#descripcion2").hide(1000);
				cont2++;
			} else if (cont2 == 2) {
        $("#descripcion1").hide(1000);
        $("#descripcion3").hide(1000);
				$("#descripcion2").show(1000);
				cont2--;
			}

		});
    $("#img3").click(function () {
			if (cont3 == 1) {
				$("#descripcion3").hide(1000);
				cont3++;
			} else if (cont3 == 2) {
        $("#descripcion1").hide(1000);
        $("#descripcion2").hide(1000);
				$("#descripcion3").show(1000);
				cont3--;
			}

		});
     })
    </script>
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

    <title>Elegir Clase</title>
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
                    <div class="col p-2">
                      <div class="card" style="width: 18rem;">
                        <img src="images/guerrero.jpg" id="img1" class="card-img-top" alt="..." height="400">
                        <div class="card-body">
                            <h5 class="card-title">Guerrero</h5>
                            <div id="descripcion1">
                              <p class="card-text">Es un personaje que normalmente ataca cuerpo a cuerpo, sus atributos principales son la fuerza(o destreza a distancia) y la constitucion.</p>
                              <p  class='text-center'><a href="crear.php?type=guerrero&usuario=<?php echo($_SESSION["id"]) ?>" class="btn btn-primary">Crear</a></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col p-2">
                      <div class="card" style="width: 18rem;">
                        <img src="images/mago.png" id="img2" class="card-img-top" alt="..."height="400">
                        <div class="card-body">
                            <h5 class="card-title">Mago</h5>
                            <div id="descripcion2">
                              <p class="card-text">Es un personaje que hace grandes hechizos, su debilidad es que tiene poca vida, su atributo principal es la inteligencia.</p>
                              <p  class='text-center'><a href="crear.php?type=mago&usuario=<?php echo($_SESSION["id"]) ?>" class="btn btn-primary">Crear</a></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col p-2">
                      <div class="card" style="width: 18rem;">
                        <img src="images/clerigo.png" id="img3" class="card-img-top" alt="..."height="400">
                        <div class="card-body">
                            <h5 class="card-title">Clerigo</h5>
                            <div id="descripcion3">
                              <p class="card-text">Es un personaje que hace milagros tales como sanar herir a los enemigos etc, sus atributos principales son la sabiduria y la carisma.</p>
                              <p  class='text-center'><a href="crear.php?type=clerigo&usuario=<?php echo($_SESSION["id"]) ?>" class="btn btn-primary">Crear</a></p>
                            </div>
                        </div>
                        </div>
                    </div>
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
                            <p class="card-text">Tiempo activo en el servidor: <?php echo("Horas: ".floor(($time/3600))); echo(" Minutos: ".floor(($time/60)%60)); echo(" Segundos: ".$time%60);?></p>
                          </div>
                        </div>
                        <?php
                        }
                        ?></div>
            </div>
      </div>
    <script src="estilos/jquery-3.4.1.min.js"></script>
    <script src="estilos/popper.min.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>