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
        echo($tiempoRestante);
        header('location: index.php');
      }
    }
?>

<script>
function lanzarDados(params) {
  if($("#autolimpiar").prop('checked')){
    $("#dados").empty();
  }
  var d4= parseInt($("#d4").val());
  var d6= parseInt($("#d6").val());
  var d8= parseInt($("#d8").val());
  var d10= parseInt($("#d10").val());
  var d12= parseInt($("#d12").val());
  var d20= parseInt($("#d20").val());
  var d100= parseInt($("#d100").val());
  var fudge= parseInt($("#fudge").val());
  var total =d4+d6+d8+d10+d12+d20+d100+fudge;
  var array = ["","+","-"];
  for (let i = 1; i <= d4; i++) {
    var random=Math.floor(Math.random()*4+1);
    $("#dados").append("<div class='p-4'> <img src='images/d4-resultado.png' width='40' height='45'></img><p class='text-center'><label>"+random+"</label></p></div>");
  }
  for (let i = 1; i <= d6; i++) {
    var random=Math.floor(Math.random()*6+1);
    $("#dados").append("<div class='p-4'> <img src='images/d6-resultado.png' width='40' height='45'></img><p class='text-center'><label>"+random+"</label></p></div>");
  }
  for (let i = 1; i <= d8; i++) {
    var random=Math.floor(Math.random()*8+1);
    $("#dados").append("<div class='p-4'> <img src='images/d8-resultado.png' width='40' height='45'></img><p class='text-center'><label>"+random+"</label></p></div>");
  }
  for (let i = 1; i <= d10; i++) {
    var random=Math.floor(Math.random()*10+1);
    $("#dados").append("<div class='p-4'> <img src='images/d10-resultado.png' width='40' height='45'></img><p class='text-center'><label>"+random+"</label></p></div>");
  }
  for (let i = 1; i <= d12; i++) {
    var random=Math.floor(Math.random()*12+1);
    $("#dados").append("<div class='p-4'> <img src='images/d12-resultado.png' width='40' height='45'></img><p class='text-center'><label>"+random+"</label></p></div>");
  }
  for (let i = 1; i <= d20; i++) {
    var random=Math.floor(Math.random()*20+1);
    $("#dados").append("<div class='p-4'> <img src='images/d20-resultado.png' width='40' height='45'></img><p class='text-center'><label>"+random+"</label></p></div>");
  }
  for (let i = 1; i <= d100; i++) {
    var random=Math.floor(Math.random()*100+1);
    $("#dados").append("<div class='p-4'> <img src='images/d100-resultado.png' width='40' height='45'></img><p class='text-center'><label>"+random+"</label></p></div>");
  }
  for (let i = 1; i <= fudge; i++) {
    var random=Math.floor(Math.random()*2+1);
    var letra = array[random];
    $("#dados").append("<div class='p-4'> <img src='images/fudge-resultado.png' width='40' height='45'></img><p class='text-center'><label>"+letra+"</label></p></div>");
  }
if (total>0) {
  var audio = document.getElementById("audio");

audio.play();
}
}
function limpiar() {
  $("#dados").empty();
  $("#d4").val(0);
  $("#d6").val(0);
  $("#d8").val(0);
  $("#d10").val(0);
  $("#d12").val(0);
  $("#d20").val(0);
  $("#d100").val(0);
  $("#fudge").val(0);
  
}

  window.onload=function(){
    document.getElementById("lanzar").onclick = lanzarDados;
    document.getElementById("limpiar").onclick = limpiar;
  }
</script>
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
#dados div{
  float:left;
  font-size:30px;
}
#audio{
display: none
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

    <title>Dados</title>
  </head>
  <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
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
                        <a class="nav-link" href="#">Sala de dados</a>
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
                      <div class="container">
                        <div class="row">
                          <div class="col-9" >
                          <audio id="audio" controls>
                            <source type="audio/wav" src="sounds/dado.wav">
                            </audio>
                          <div id="dados">
                            </div>  
                          </div>
                          <div class="col-3 p-2">  
                    
                            <div class="card " style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"><img src="images/d4.png" width='50px'></img><input type="number" id="d4" min="0" max="20" style="width:50px; height:30px; text-align:center;" value='0'></input>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/d6.png" width='50px'></img><input type="number" id="d6" min="0" max="20" style="width:50px; height:30px; text-align:center;"value='0'></input></p>
                            <p class="card-text"><img src="images/d8.png" width='50px'></img><input type="number" id="d8" min="0" max="20" style="width:50px; height:30px; text-align:center;"value='0'></input>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/d10.png" width='50px'></img><input type="number" id="d10" min="0" max="20" style="width:50px; height:30px; text-align:center;"value='0'></input></p>
                            <p class="card-text"><img src="images/d12.png" width='50px'></img><input type="number" id="d12" min="0" max="20" style="width:50px; height:30px; text-align:center;"value='0'></input>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/d20.png" width='50px'></img><input type="number" id="d20" min="0" max="20" style="width:50px; height:30px; text-align:center;"value='0'></input></p>
                            <p class="card-text"><img src="images/d100.png" width='50px'></img><input type="number" id="d100" min="0" max="20" style="width:50px; height:30px; text-align:center;"value='0'></input>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/fudge.png" width='50px'></img><input type="number" id="fudge" min="0" max="20" style="width:50px; height:30px; text-align:center;"value='0'></input></p>
                            <p><input id="autolimpiar" type="checkbox" style="margin-left:20px;" class="">
                            <label for="checkbox_autoreset" class="ng-binding"  value="true">Autolimpiar</label></p>
                            <a class="btn btn-primary" id="limpiar">Limpiar</a><a class="btn btn-primary ml-5" id="lanzar">Lanzar!</a>
                          </div>
                        </div></div>
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
                        ?>
                </div>
            </div>
           
        </div>
    <script src="estilos/jquery-3.4.1.slim.min.js"></script>
    <script src="estilos/popper.min.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>
