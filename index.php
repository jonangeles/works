<!doctype html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="images/icono.PNG"/>
  <?php

  session_start();
  require_once ('base.php');
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
#footer{
  background-color:#413E3E;
  color:white;
}
#footer p{
  display:block;
  text-align:center;
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

    <title>Rol_Interactivo</title>
  </head>
  <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-info">
                  <a class="navbar-brand" href="#">Inicio</a>
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
                 <div class="col-10">
                 <img class="pt-2" src="images/d&d.jpg" width='100%'></img>
                 <p class="p-2">El objetivo del juego de rol Dungeons & Dragons (D&D) es contar historias en mundos de espada y brujería. 
                 Al igual que los juegos de niños en los que estos fingen ser personajes ficticios, como el de indios y vaqueros, el motor de D&D es la imaginación: 
                 visualizar el castillo en ruinas que se encuentra en el ensombrecido bosque e imaginar cómo un aventurero de fantasía podría reaccionar a los desafíos que la escena le plantea. 
                 En este mundo de ficción las posibilidades son infinitas.</p>
                 <p class="p-2">A diferencia de los juegos de imaginación de los niños, D&D dota de estructura a las historias y proporciona un método para determinar las consecuencias de las acciones de los aventureros. 
                 Los jugadores tiran dados para averiguar si sus personajes aciertan o fallan en sus ataques, si consiguen escalar un precipicio, esquivar el impacto de un relámpago mágico o llevar a cabo cualquier otra tarea que implique peligro. 
                 Todo es posible, pero los dados hacen que ciertos resultados sean más probables que otros.</p>
                 <p class="p-2">Cuando juegas a D&D asumes el rol de un aventurero: un hábil guerrero, un clérigo devoto o un mago lanzador de conjuros. 
                 Solo necesitas amigos y un poco de imaginación para sumergirte en épicas misiones y osadas aventuras, enfrentándote a numerosos desafíos y monstruos sedientos de sangre.</p>
                 <p class="p-2">Un jugador asume el rol del Dungeon Master (DM): el narrador principal y árbitro del juego. 
                 El DM es el responsable de la aventura, mientras que los personajes se enfrentan a las dificultades y deciden qué caminos explorar. 
                 El DM podría describir la entrada al castillo y los jugadores decidir qué quieren que hagan sus aventureros. ¿Cruzarán con decisión su ruinosa entrada?, 
                 ¿intentarán acercarse furtivamente por si alguien espía a través de las aspilleras?, ¿rodearán el castillo en busca de otra entrada?, ¿lanzarán un conjuro que les haga invisibles?</p>
                 <p class="p-2">El DM determinará el resultado de las acciones de los aventureros y describirá lo que estos experimentan. 
                 D&D es un juego infinitamente flexible, ya que el DM puede improvisar para responder a cualquier cosa que los aventureros intenten hacer, de manera que cada aventura sea emocionante e impredecible.</p>
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
                        ?>
                </div>
            </div>
           
            <div class="row" id="footer">
            <div class="dropdown-divider"></div>
              <div class="col"></div>
            <div class="col p-2" >
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col">
                      <p>Jonathan Montaño Sanchez </p>
                    <p>Desarrollo de Aplicacion Web 2º año (DAW2)</p>
                   
                      </div>
                      <div class="col">
                      <p>I.E.S Suarez de Figueroa</p>
                      <p>Protecto final de curso (Rol_Interactivo)</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    <script src="estilos/jquery-3.4.1.slim.min.js"></script>
    <script src="estilos/popper.min.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>
