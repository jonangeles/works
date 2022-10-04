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
    if (isset($_REQUEST["borrarPj"])) {
        $borrar=$_REQUEST["id"];
        $array_de_productos = Base::eliminarPj($borrar);
    }
    if (isset($_REQUEST["save"])==true) {
        $modificar=$_REQUEST["id"];
        $array_de_productos = Base::salvarPj($modificar);
    }
?>
<script>
function buscar() {
    var array=[];
    $("#principal").empty();
   var termino = $("#buscarNombre").val();
   $.ajax({
   url: "ajax/comprobarBorrados.php?termino="+termino,
   dataType: 'json',
   success: function(respuesta) {
    for (const a in respuesta) {	

array.push(respuesta[a]);

}
console.log(array);
for (let i = 0; i < array.length; i++) {
    if (array[i]['clase']=="guerrero") {
        $("#principal").append("<div class='col-3'> <div class='card'"+
        "style='width: 18rem;'><img src='images/guerrero.jpg' class='card-img-top' alt='...'height='400'>"+
        "<div class='card-body'><h5 class='card-title'>"+array[i]['nombre']+"</h5>"+
        "<p class='card-text'>"+array[i]['clase']+" del nivel "+array[i]['nivel']+"</p>"+
        "<p  class='text-center'><a href='borrar.php?save=true&id="+array[i]['id']+"' class='btn btn-primary m-2'>restaurar</a><a href='borrar.php?borrarPj=true&id="+array[i]['id']+"' class='btn btn-danger m-2'>borrar</a></p></div></div></div>");
    }else if(array[i]['clase']=="clerigo"){
        $("#principal").append("<div class='col-3'> <div class='card'"+
        "style='width: 18rem;'><img src='images/clerigo.png' class='card-img-top' alt='...'height='400'>"+
        "<div class='card-body'><h5 class='card-title'>"+array[i]['nombre']+"</h5>"+
        "<p class='card-text'>"+array[i]['clase']+" del nivel "+array[i]['nivel']+"</p>"+
        "<p  class='text-center'><a href='borrar.php?save=true&id="+array[i]['id']+"' class='btn btn-primary m-2'>restaurar</a><a href='borrar.php?borrarPj=true&id="+array[i]['id']+"' class='btn btn-danger m-2'>borrar</a></p></div></div></div>");
    }else if(array[i]['clase']=="mago"){
        $("#principal").append("<div class='col-3'> <div class='card'"+
        "style='width: 18rem;'><img src='images/mago.png' class='card-img-top' alt='...'height='400'>"+
        "<div class='card-body'><h5 class='card-title'>"+array[i]['nombre']+"</h5>"+
        "<p class='card-text'>"+array[i]['clase']+" del nivel "+array[i]['nivel']+"</p>"+
        "<p  class='text-center'><a href='borrar.php?save=true&id="+array[i]['id']+"' class='btn btn-primary m-2'>restaurar</a><a href='borrar.php?borrarPj=true&id="+array[i]['id']+"' class='btn btn-danger m-2'>borrar</a></p></div></div></div>");
    }
    
}

  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
}
    window.onload=function(){
        document.getElementById("buscar").onclick=buscar;
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

    <title>Borrar Personajes</title>
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
                     <p class="text-center p-2">
                        <input type="text" size="30" id="buscarNombre" value=''>
                        <button class="btn btn-primary" id="buscar">Buscar</button>
                     </p>
                     <div class="container-fluid">
                     <div class="row" id="principal">

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
    <script src="estilos/jquery-3.4.1.min.js"></script>
    <script src="estilos/popper.min.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>
