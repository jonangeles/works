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
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  var ruta= window.location.toString();
  var split1= ruta.split("type=");
  var split1_1 = split1[1].split("&");
  var tipo = split1_1[0]
  var split2= ruta.split("usuario=");
  var usuario = split2[1];
  var clases = [];
  var experiencia = [];
  var arrayExperiencia = [];
  var arraydotes = [];
  var arrayArmas = [];
  var arrayHabilidades = [];
  var arrayIdiomas = [];
  var arrayConjuros = [];
  var arrayPertenencias= [];
  var arrayProtecciones = [];
  var pg_base;
  var level;
  var iniciativa;
  var ca;
  var nivelConjuro;
  var nombrePj;
  var idPj;
  var id_ficha= [];
  var dotes;




  function makeRequest(nivel,clase) {
    clases=[];
        $.ajax({
   url: "ajax/clases.php?clase="+clase+"&nivel="+nivel,
   dataType: 'json',
   success: function(respuesta) {
    for (const a in respuesta) {	
clases.push(respuesta[a]);

  }
  console.log(clases);
  level=clases[0];
  pg_base= clases[1];
if (clase=="guerrero") {
  $("#at_base").val(clases[2]);
  $("#fortaleza_clase").val(clases[3]);
  $("#reflejos_clase").val(clases[4]);
  $("#voluntad_clase").val(clases[5]);
  dotes=clases[6];
  $("#habilidadTotal").val(clases[7]);
  $("#velocidad").val("40");
  
}else{
nivelConjuro=clases[2];
console.log("nivel de conjuro"+nivelConjuro);
  $("#at_base").val(clases[4]);
  $("#fortaleza_clase").val(clases[5]);
  $("#reflejos_clase").val(clases[6]);
  $("#voluntad_clase").val(clases[7]);
  dotes=clases[8];
  $("#habilidadTotal").val(clases[9]);
  $("#velocidad").val("30");
  conjuros(tipo,nivelConjuro);

}
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});

$.ajax({
   url: "ajax/exp.php?nivel="+nivel,
   dataType: 'json',
   success: function(respuesta) {
    for (const a in respuesta) {	
      experiencia.push(respuesta[a]);

  }
  dotes = parseInt(dotes)+parseInt(experiencia[2]);
  $("#experiencia").val(experiencia[1]);
  
  setTimeout('$("#totalDotes").val(dotes)',500);
  
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
    }

      function caracteristicas(){
        var carac = $(this).val();
        var nom=$(this).attr('id');
        var mod;
        if (carac!="") {
         var mod=Math.floor((carac-10)/2);
         $("#"+nom+"_mod").val(mod);
        }else{
          $("#"+nom+"_mod").val("0");
        }
        for (let i = 0; i < arrayHabilidades.length; i++) {
            if(arrayHabilidades[i]['modificador']=="int"&&nom=="inteligencia"){
             $("#"+arrayHabilidades[i]['id']+"_mod").val(mod);
             $("#"+arrayHabilidades[i]['id']).val(mod);
           }else if(arrayHabilidades[i]['modificador']=="sab"&&nom=="sabiduria"){
             $("#"+arrayHabilidades[i]['id']+"_mod").val(mod);
             $("#"+arrayHabilidades[i]['id']).val(mod);
           }else if(arrayHabilidades[i]['modificador']=="des"&&nom=="destreza"){
             $("#"+arrayHabilidades[i]['id']+"_mod").val(mod);
             $("#"+arrayHabilidades[i]['id']).val(mod);
           }else if(arrayHabilidades[i]['modificador']=="car"&&nom=="carisma"){
             $("#"+arrayHabilidades[i]['id']+"_mod").val(mod);
             $("#"+arrayHabilidades[i]['id']).val(mod);
           }else if(arrayHabilidades[i]['modificador']=="fue"&&nom=="fuerza"){
             $("#"+arrayHabilidades[i]['id']+"_mod").val(mod);
             $("#"+arrayHabilidades[i]['id']).val(mod);
           }
  }
        if (nom=="constitucion") {
          pg=parseInt(pg_base);
          for (let i = 0; i < level; i++) {
            pg=pg+mod; 
          }
          $("#pg").val(pg);
          $("#fortaleza_mod").val(mod);
          $("#fortaleza").val(parseInt(mod)+parseInt(($("#fortaleza_clase").val())));
        }else if(nom=="destreza"){
          $("#iniciativa").val(mod);
          $("#ca_destreza").val(mod);
          $("#ca").val(parseInt(mod)+10+$("#totalProteccion").val());
          $("#reflejos_mod").val(mod);
          $("#reflejos").val(parseInt(mod)+parseInt(($("#reflejos_clase").val())));
        }else if(nom=="sabiduria"){
          $("#voluntad_mod").val(mod);
          $("#voluntad").val(parseInt(mod)+parseInt(($("#voluntad_clase").val())));
        }
      }

      function envio() {
        var insertarArmas = $("#armas #arma");
        var insertarProteccion = $("#protecciones #proteccion");
        var insertarPertenencias = $("#pertenencias .pertenencia");
        var insertarDotes = $("#dotes .dote");
        var insertarIdiomas = $("#idiomas .idioma");
        var insertarHabilidades= $("#habil .rango");



        var nombreUsu = $("#id").val();
        var clase = $("#clase").val();
        var nivel = $("#nivel").val();
        var nombre = $("#nombre").val();
        var raza = $("#raza").val();
        var edad = $("#edad").val();
        var sexo = $("#sexo").val();
        var exp = $("#experiencia").val();
        var dinero = $("#dinero").val();
        var descripcion = $("#descripcion").val();
        var fuerza = $("#fuerza").val();
        var destreza = $("#destreza").val();
        var constitucion = $("#constitucion").val();
        var inteligencia = $("#inteligencia").val();
        var sabiduria = $("#sabiduria").val();
        var carisma = $("#carisma").val();
        var fortaleza = $("#fortaleza").val();
        var reflejos = $("#reflejos").val();
        var voluntad = $("#voluntad").val();
        var pg = $("#pg").val();
        var velocidad = $("#velocidad").val();
        var at_base = $("#at_base").val();
        var iniciativa = $("#iniciativa").val();
        var ca = $("#ca").val();
        $.ajax({
   url: "ajax/datosPj.php?nombreUsu="+nombreUsu+"&clase="+clase+"&nivel="+nivel+"&nombre="+nombre+"&raza="+raza+"&edad="+edad+"&sexo="+sexo+"&exp="+exp+"&dinero="+dinero+
   "&descripcion="+descripcion+"&fuerza="+fuerza+"&destreza="+destreza+"&constitucion="+constitucion+"&inteligencia="+inteligencia+"&sabiduria="+sabiduria+"&carisma="+carisma+
   "&fortaleza="+fortaleza+"&reflejos="+reflejos+"&voluntad="+voluntad+"&pg="+pg+"&velocidad="+velocidad+"&at_base="+at_base+"&iniciativa="+iniciativa+"&ca="+ca,
   dataType: 'json',
   success: function(respuesta) {
      if (respuesta['info']==true) {
        $.ajax({
   url: "ajax/seleccionarPersonajes.php?id_usuario="+usuario+"&nombre="+nombrePj,
   dataType: 'json',
   success: function(respuesta) {
    for (const a in respuesta) {	

      id_ficha.push(respuesta[a]);

  }
  for (let i = 1; i <= insertarArmas.length; i++) {
          console.log($("#arma"+i).val());
          for (let j = 0; j < arrayArmas.length; j++) {
            if ($("#arma"+i).val()==arrayArmas[j]['nombre']) {
              id_arma=arrayArmas[j]["id"];
              var municion=$("#municion"+i).val();
 $.ajax({
    url: "ajax/insertarArmas.php?id_personaje="+id_ficha[0]['id']+"&id_arma="+id_arma+"&municion="+municion,
    dataType: 'json',
    success: function(respuesta) {
   },
    error: function() {
    	console.log("No se ha podido obtener la información");
 }});

            }
          }
            
          }
          for (let i = 1; i <= insertarProteccion.length; i++) {
          console.log(arrayProtecciones);
          for (let j = 0; j < arrayProtecciones.length; j++) {
            if ($("#proteccion"+i).val()==arrayProtecciones[j]['nombre']) {
              id_armadura=arrayProtecciones[j]["id"];
               console.log(arrayProtecciones[0]['id']);
 $.ajax({
    url: "ajax/insertarProtecciones.php?id_personaje="+id_ficha[0]['id']+"&id_proteccion="+id_armadura,
    dataType: 'json',
    success: function(respuesta) {
   },
    error: function() {
    	console.log("No se ha podido obtener la información");
 }});

            }
          }
            
          }
          for (let i = 1; i <= insertarPertenencias.length; i++) {
          console.log($("#pertenencia"+i).val());
          for (let j = 0; j < arrayPertenencias.length; j++) {
            if ($("#pertenencia"+i).val()==arrayPertenencias[j]['nombre']) {
              id_Pertenencia=arrayPertenencias[j]["id"];;
              var cantidad=$("#cantidad"+i).val();
 $.ajax({
    url: "ajax/insertarPertenencias.php?id_personaje="+id_ficha[0]['id']+"&id_Pertenencia="+id_Pertenencia+"&cantidad="+cantidad,
    dataType: 'json',
    success: function(respuesta) {
   },
    error: function() {
    	console.log("No se ha podido obtener la información");
 }});

            }
          }
            
          }
          for (let i = 1; i <= insertarDotes.length; i++) {
          for (let j = 0; j < arraydotes.length; j++) {
            if ($("#dote"+i).val()==arraydotes[j]['nombre']) {
              id_dote=arraydotes[j]["id"];
               console.log(arraydotes[0]['id']);
 $.ajax({
    url: "ajax/insertarDotes.php?id_personaje="+id_ficha[0]['id']+"&id_dote="+id_dote,
    dataType: 'json',
    success: function(respuesta) {
   },
    error: function() {
    	console.log("No se ha podido obtener la información");
 }});

            }
          }
            
          }
          for (let i = 1; i <= insertarIdiomas.length; i++) {
          console.log("idioma: "+$("#idioma"+i).val());
          for (let j = 0; j < arrayIdiomas.length; j++) {
            if ($("#idioma"+i).val()==arrayIdiomas[j]['idioma']) {
              id_idioma=arrayIdiomas[j]["id"];
 $.ajax({
    url: "ajax/insertarIdioma.php?id_personaje="+id_ficha[0]['id']+"&id_idioma="+id_idioma,
    dataType: 'json',
    success: function(respuesta) {
   },
    error: function() {
    	console.log("No se ha podido obtener la información");
 }});

            }
          }
            
          }

          for (let i = 0; i < insertarHabilidades.length; i++) {
          for (let j = 0; j < arrayHabilidades.length; j++) {
            if ($("#habilidad"+i).html()==arrayHabilidades[j]['nombre']) {
              id_habilidad=arrayHabilidades[j]["id"];
              var rango=$("#rango"+i).val();
 $.ajax({
    url: "ajax/insertarHabilidades.php?id_personaje="+id_ficha[0]['id']+"&id_habilidad="+id_habilidad+"&rango="+rango,
    dataType: 'json',
    success: function(respuesta) {
   },
    error: function() {
    	console.log("No se ha podido obtener la información");
 }});

            }
          }
            
          }
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
        alert("Se ha creado el personaje");
        setTimeout('window.location.replace("index.php")',1000);
      }else{
        alert("No se pudo crear el personaje, revisa los campos y vuelve a intentarlo");
      }
  
  },
   error: function() {
   	alert("No se ha crear el personaje, revisa que el nombre este bien puesto, el nombre de usuario y la clase");
}});

        }

  function autocompletar() {
    var level = $("#nivel").val();
    if (level=="") {
    }else{
    makeRequest(level,tipo);
    }
  }

  function dotes(){
    $.ajax({
   url: "ajax/datosDotes.php",
   dataType: 'json',
   success: function(respuesta) {
       for (const a in respuesta) {	

arraydotes.push(respuesta[a]);

  }
  for (let i = 0; i < arraydotes.length; i++) {
    $("#collapseDotes").append("<p><b>Nombre:</b> "+arraydotes[i]["nombre"]+"<br> Prerrequisito: " + arraydotes[i]["prerrequisito"]+"<br> Descripcion: " + arraydotes[i]['descripcion']+"<div class='dropdown-divider'></div></p>");
    
  }
  
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
  }
  function todaExperiencia(){
    $.ajax({
   url: "ajax/datosExperiencia.php",
   dataType: 'json',
   success: function(respuesta) {
       for (const a in respuesta) {	

arrayExperiencia.push(respuesta[a]);

  }
  for (let i = 0; i < arrayExperiencia.length; i++) {
    $("#collapseExperiencia").append("<p><b>Nivel:</b> "+arrayExperiencia[i]["nivel"]+" Experiencia: " + arrayExperiencia[i]["experiencia"]+"<div class='dropdown-divider'></div></p>");
    
  }
  
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
  }

  function armas(){
    $.ajax({
   url: "ajax/datosArmas.php",
   dataType: 'json',
   success: function(respuesta) {
       for (const a in respuesta) {	

arrayArmas.push(respuesta[a]);

  }
  for (let i = 0; i < arrayArmas.length; i++) {
    $("#collapseArmas").append("<p><b>Nombre:</b> "+arrayArmas[i]["nombre"]+"<br> Daño: " + arrayArmas[i]["daño"]+" Critico: " + arrayArmas[i]['critico']+"<div class='dropdown-divider'></div></p>");
    
  }
  
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
  }
  function protecciones(){
    $.ajax({
   url: "ajax/datosProtecciones.php",
   dataType: 'json',
   success: function(respuesta) {
       for (const a in respuesta) {	

        arrayProtecciones.push(respuesta[a]);

  }
  for (let i = 0; i < arrayProtecciones.length; i++) {
    $("#collapseProtecciones").append("<p><b>Nombre:</b> "+arrayProtecciones[i]["nombre"]+"<br> Bonificador: " + arrayProtecciones[i]["bonificador"]+" Tipo: " + arrayProtecciones[i]['tipo']+"<div class='dropdown-divider'></div></p>");
    
  }
  
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
  }
  function pertenencias(){
    $.ajax({
   url: "ajax/datosPertenencias.php",
   dataType: 'json',
   success: function(respuesta) {
       for (const a in respuesta) {	

        arrayPertenencias.push(respuesta[a]);

  }
  for (let i = 0; i < arrayPertenencias.length; i++) {
    $("#collapsePertenencias").append("<p><b>Nombre:</b> "+arrayPertenencias[i]["nombre"]+"<div class='dropdown-divider'></div></p>");
    
  }
  
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
  }
  function habilidades(tipo){
    $.ajax({
   url: "ajax/datosHabilidades.php?tipo="+tipo,
   dataType: 'json',
   success: function(respuesta) {
       for (const a in respuesta) {	

        arrayHabilidades.push(respuesta[a]);

  }
  for (let i = 0; i < arrayHabilidades.length; i++) {
    $("#habil").append("<p><label for='inputEmail3' class='label3' id='habilidad"+i+"'>"+arrayHabilidades[i]['nombre']+"</label><label> ("+arrayHabilidades[i]['modificador'] +")</label><input type='text' class='m-2' name='' id='"+arrayHabilidades[i]['id']+"' value='' size='3'><input type='text' class='m-2' id='"+arrayHabilidades[i]['id']+"_mod' name='' value='' size='3'><input type='text' class='rango m-2' id='rango"+i+"' name='' value='0' onchange='rango($(this).val());' size='3'></p>");
    
  }
  
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
  }

  function idiomas(){
    $.ajax({
   url: "ajax/datosIdiomas.php",
   dataType: 'json',
   success: function(respuesta) {
       for (const a in respuesta) {	

        arrayIdiomas.push(respuesta[a]);

  }
  for (let i = 0; i < arrayIdiomas.length; i++) {
    $("#collapseIdiomas").append("<p><b>Idioma:</b> "+arrayIdiomas[i]["idioma"]+"<div class='dropdown-divider'></div></p>");
    
  }
  
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
  }
  function conjuros(tipo,nivelconjuro){
    arrayConjuros=[];
    $.ajax({
   url: "ajax/datosConjuros.php?tipo="+tipo+"&nivel="+nivelconjuro,
   dataType: 'json',
   success: function(respuesta) {
       for (const a in respuesta) {	

        arrayConjuros.push(respuesta[a]);

  }
  $("#conjuros").empty();
  $("#conjuros").append("<p><div class='btn-group dropright'>Conjuros<label size='20' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-info-circle ml-2'></i></label><div class='dropdown-menu'>Estos son los conjuros que un mago/clerigo puede lanzar.</div></div></p><p> Nivel de conjuro Maximo: <input type='text' class='m-2' id='nivel_conjuro' name='correo' value='' size='2'>Maximos conjuros lanzados <input type='text' class='m-2' id='max_conjuros' name='correo' value='' size='2'></p>");$("#nivel_conjuro").val(clases[2]);
$("#max_conjuros").val(clases[3]);
  for (let i = 0; i < arrayConjuros.length; i++) {
    console.log(arrayConjuros[i]['nombre']);
    $("#conjuros").append("<br><label class='' id='label'><b>nivel: </b>"+arrayConjuros[i]['nivel']+" &nbsp;</label><label id='label'> <b>Nombre: </b>"+arrayConjuros[i]['nombre']+" &nbsp;</label><label id='label'> <b>escuela: </b>"+arrayConjuros[i]['escuela']+" &nbsp;</label><label id='label'> <b>Descripcion: </b>"+arrayConjuros[i]['descripcion']+"</label><div class='dropdown-divider' id='divide'></div>");
    
  }
  
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
  }
function nombre(){
   nombrePj = $(this).val();
  $.ajax({
   url: "ajax/comprobarNombre.php?nombre="+nombrePj,
   dataType: 'json',
   success: function(respuesta) {
       if (respuesta['info']==false) {
         alert("el nombre que intenta crear existe, por favor busque otro");
         $("#nombre").val('');
         nombrePj='';
       }else{

       }
  
  },
   error: function() {
   	console.log("No se ha podido obtener la información");
}});
}
function ca (){
  if ($(this).val()=="") {
  $(this).val("0");
 }
var bonProteccion=parseInt($("#bonificador1").val()) + parseInt($("#bonificador2").val());
 $("#totalProteccion").val(bonProteccion);
 $("#ca").val(10+bonProteccion+parseInt($("#ca_destreza").val()));
}

function rango(valor){
for (let i = 0; i < arrayHabilidades.length; i++) {
  if ($("#rango"+i).val()==valor) {
    var valorMod = $("#"+arrayHabilidades[i]['id']+"_mod").val();
    $("#"+arrayHabilidades[i]['id']).val(parseInt(valor) + parseInt(valorMod));
  }
  
}
}
window.onload=function(){
  $("#clase").val(tipo);
  habilidades(tipo);
  document.getElementById("nivel").onchange= autocompletar;
  document.getElementById("nombre").onchange= nombre;
  document.getElementById("fuerza").onchange= caracteristicas;
  document.getElementById("destreza").onchange= caracteristicas;
  document.getElementById("constitucion").onchange= caracteristicas;
  document.getElementById("inteligencia").onchange= caracteristicas;
  document.getElementById("sabiduria").onchange= caracteristicas;
  document.getElementById("carisma").onchange= caracteristicas;
  document.getElementById("enviar").onclick= envio;
  document.getElementById("bonificador1").onchange= ca;
  document.getElementById("bonificador2").onchange= ca;
  todaExperiencia();
  dotes();
  armas();
  protecciones();
  pertenencias();
  idiomas();
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
#datosPj{
  border:1px solid black;
}
#principal{
  border:1px solid black;
}
 #label1{
  display:inline-block;
  width:85px;
}
#label2{
  display:inline-block;
  width:70px;
}
.label3{
  display:inline-block;
  width:210px;
}
#conjuros #label{
  display:inline-block;
  width:300px;
}
#enviar{
  position:absolute;
right:0%;
}
#divide{
  border-bottom:1px grey solid;
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

    <title>Crear personaje</title>
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
                <p>
                <div class="btn-group dropright">
              Datos del Personaje
  <label data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-info-circle ml-2"></i></label>
  <div class="dropdown-menu">
    Los datos de personaje son los datos principales, tales como el nombre del personaje, la clase el nivel etc. (El nombre tienes que ponerlo es obligatorio)
  </div>
</div>
<input type="submit"class="btn btn-primary" id="enviar" value='Crear'>
                </p>

                      <p class=' text-center p-0' value='' id='datosPj'>
                      <label for="inputEmail3" class="" id="label1">Nombre</label>
                        <input type="text" class="m-2" id="nombre" name="correo" value=''>
                      
                        <?php
                            $array_de_productos = Base::usuario($_SESSION["id"]);
                            foreach ($array_de_productos as $o) {
                              $usu=$o->getUsuario();
                          }
                        ?>
                        <label for="inputEmail3" class=""id="label1">Jugador</label>
                        <input type="text" class="m-2" id="id" readonly name="correo" value='<?php echo($usu); ?>'>
                        <label for="inputEmail3" class=""id="label1">Clase</label>
                        <input type="text" class="m-2" id="clase" readonly name="correo" value=''>
                        <label for="inputEmail3" class=""id="label1">Nivel</label>
                        <input type="text" class="m-2" id="nivel" name="correo" value=''>
                        <label for="inputEmail3" class=""id="label1">Experiencia</label>
                        <input type="text" class="m-2" id="experiencia" name="correo" value=''>
                        <br>
                        <label for="inputEmail3" class=""id="label1">Raza</label>
                        <input type="text" class="m-2" id="raza" name="correo" value=''>
                        <label for="inputEmail3" class=""id="label1">Edad</label>
                        <input type="text" class="m-2" id="edad" name="correo" value=''>
                        <label for="inputEmail3" class=""id="label1">Sexo</label>
                        <input type="text" class="m-2" id="sexo" name="correo" value=''>
                      </p>
                      
                     <div class="container-fluid">
                       <div class="row">
                         <div class="col-8">
                           <p> <div class="btn-group dropright">
                                    Caracteristicas
                        <label data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle ml-2"></i></label>
                        <div class="dropdown-menu">
                         Las caracteristicas son los atributos que va a tener tu personaje, la fuerza de tu pj(personaje), la destreza etc, la ca es la armadura total de tu personaje, los pg los puntos de vida,
                          el at_Base la probabilidad de que acierte tu ataque y la iniciativa lo rapido que eres a la hora de los turnos.
                        </div>
                      </div></p>
                        
                         <label for="inputEmail3" class=""id="label1">Fuerza</label>
                        <input type="text" class="m-2" id="fuerza" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="fuerza_mod" name="correo" value='0' size='3'>
                        <label for="inputEmail3" class=" ml-5" id="label2">Ca</label>
                        <input type="text" class="" id="ca" name="correo" value='' size='5'>= +10
                        <input type="text" class="" id="totalProteccion" name="correo" value='' size='5'>
                        <input type="text" class="" id="ca_destreza" name="correo" value='' size='5'>
                        <br>
                        <label for="inputEmail3" class=""id="label1">Destreza</label>
                        <input type="text" class="m-2" id="destreza" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="destreza_mod" name="correo" value='0' size='3'>
                        <label for="inputEmail3" class=" ml-5" id="label2">Pg</label>
                        <input type="text" class="" id="pg" name="correo" value='' size='5'>
                        <br>
                        <label for="inputEmail3" class=""id="label1">Constitución</label>
                        <input type="text" class="m-2" id="constitucion" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="constitucion_mod" name="correo" value='0' size='3'>
                        <label for="inputEmail3" class=" ml-5" id="label2">Velocidad</label>
                        <input type="text" class="" id="velocidad" name="correo" value='' size='5'>
                        <br>
                        <label for="inputEmail3" class=""id="label1">Inteligencia</label>
                        <input type="text" class="m-2" id="inteligencia" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="inteligencia_mod" name="correo" value='0' size='3'>
                        <label for="inputEmail3" class=" ml-5" id="label2">At_Base</label>
                        <input type="text" class="" id="at_base" name="correo" value='' size='5'>
                        <br>
                        <label for="inputEmail3" class=""id="label1">Sabiduria</label>
                        <input type="text" class="m-2" id="sabiduria" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="sabiduria_mod" name="correo" value='0' size='3'>
                        <label for="inputEmail3" class=" ml-5" id="label2">Iniciativa</label>
                        <input type="text" class="" id="iniciativa" name="correo" value='' size='5'>
                        <br>
                        <label for="inputEmail3" class=""id="label1">Carisma</label>
                        <input type="text" class="m-2" id="carisma" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="carisma_mod" name="correo" value='0' size='3'>
                        <label for="inputEmail3" class=" ml-5" id="label2">Dinero</label>
                        <input type="text" class="" id="dinero" name="correo" value='' size='5'> PO (piezas de oro)
                        <br>
                        <label for="inputEmail3" class=""id="label1">Fortaleza</label>
                        <input type="text" class="m-2" id="fortaleza" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="fortaleza_clase" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="fortaleza_mod" name="correo" value='' size='3'>
                        <br>
                        <label for="inputEmail3" class=""id="label1">Reflejos</label>
                        <input type="text" class="m-2" id="reflejos" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="reflejos_clase" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="reflejos_mod" name="correo" value='' size='3'>
                        <br>
                        <label for="inputEmail3" class=""id="label1">Voluntad</label>
                        <input type="text" class="m-2" id="voluntad" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="voluntad_clase" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="voluntad_mod" name="correo" value='' size='3'>
                         </div>
                         <div class="col">
                           <p></p>
                         <label for="inputEmail3" class="" id="label3">
                         <div class="btn-group dropright">
                         Descripción
                        <label data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle ml-2"></i></label>
                        <div class="dropdown-menu">
                         Una pequeña descripción de tu personaje.
                        </div>
                      </div>
                         </label>
                         <br>
                        <textarea type="" class="" id="descripcion" name="correo" value='' rows="10" cols="50"></textarea>
                         </div>
                       </div>
                     </div>
                     <div class='dropdown-divider' id='divide'></div>
                     
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col" id="armas">
                          <label>
                          <div class="btn-group dropright">
                          Armas
                        <label data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle ml-2"></i></label>
                        <div class="dropdown-menu">
                         La cantidad de armas que puedes llevar, el primer cuadro es para el nombre, el segundo para la municion de las armas a distancia, el tercero para el daño(el dado
                         con el que pega) y el cuarto la probabilidad de critico.
                        </div>
                      </div>
                          </label>
                          <p id="arma"> <label for="inputEmail3" class=""id="label1">Arma</label>
                        <input type="text" class="m-2" id="arma1" name="correo" value='' size='12'>
                        <input type="text" class="m-2" id="municion1" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="" name="daño1" value='' size='3'>
                        <input type="text" class="m-2" id="critico1" name="correo" value='' size='3'></p>
                        <p id="arma"><label for="inputEmail3" class=""id="label1">Arma</label>
                        <input type="text" class="m-2" id="arma2" name="correo" value='' size='12'>
                        <input type="text" class="m-2" id="municion2" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="daño2" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="critico2" name="correo" value='' size='3'></p>

                        <p id="arma"><label for="inputEmail3" class=""id="label1">Arma</label>
                        <input type="text" class="m-2" id="arma3" name="correo" value='' size='12'>
                        <input type="text" class="m-2" id="municion3" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="daño3" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="critico3" name="correo" value='' size='3'></p>
                        <p id="arma"><label for="inputEmail3" class=""id="label1">Arma</label>
                        <input type="text" class="m-2" id="arma4" name="correo" value='' size='12'>
                        <input type="text" class="m-2" id="municion4" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="daño4" name="correo" value='' size='3'>
                        <input type="text" class="m-2" id="critico4" name="correo" value='' size='3'></p>
                         <p><div class="btn-group dropright">
                         Pertenencias
                        <label data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle ml-2"></i></label>
                        <div class="dropdown-menu">
                         La cantidad de objetos que puedes llevar, nombre y cantidad.
                        </div>
                      </div>
                           
                         </p>
                        <p id="pertenencias">
                        <input type="text" class="pertenencia m-2" id="pertenencia1" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad1" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia2" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad2" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia3" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad3" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia4" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad4" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia5" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad5" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia6" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad6" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia7" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad7" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia8" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad8" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia9" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad9" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia10" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad10" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia11" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad11" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia12" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad12" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia13" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad13" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia14" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad14" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia15" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad15" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia16" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad16" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia17" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad17" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia18" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad18" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia19" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad19" name="correo" value='' size='3'>
                        <input type="text" class="pertenencia m-2" id="pertenencia20" name="correo" value='' size='14'>
                        <input type="text" class="m-2" id="cantidad20" name="correo" value='' size='3'>
                        </p>
                       

                          </div>
                          <div class="col" id='protecciones'>
                          <div class="btn-group dropright">
                         Proteccion
                        <label data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle ml-2"></i></label>
                        <div class="dropdown-menu">
                         La amadura y/o el escudo que puedes llevar. nombre-bonificador a la ca(armadura)-tipo(ligera,pesada,etc).
                        </div>
                      </div>
                          <p id='proteccion'>
                          <label for="inputEmail3" class=""id="label1">Armadura</label>
                        <input type="text" class="m-2" id="proteccion1" name="correo" value='' size='20'>
                        <input type="text" class="m-2" id="bonificador1" name="correo" value='0' size='3'>
                        <input type="text" class="m-2" id="voluntad_mod" name="correo" value='' size='3'></p>
                       <p id='proteccion'>
                       <label for="inputEmail3" class=""id="label1">Escudo</label>
                        <input type="text" class="m-2" id="proteccion2" name="correo" value='' size='20'>
                        <input type="text" class="m-2" id="bonificador2" name="correo" value='0' size='3'>
                        <input type="text" class="m-2" id="voluntad_mod" name="correo" value='' size='3'></p>
                        <br>
                        <p><div class="btn-group dropright">
                         Dotes
                        <label data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle ml-2"></i></label>
                        <div class="dropdown-menu">
                         Las dotes son las habilidades especiales de tu personaje.
                        </div>
                      </div> <input class="ml-5"type="text"id="totalDotes" size="1"></p>
                        <p id="dotes">
                        <input type="text" class="dote m-2" id="dote1" name="correo" value='' size='57'>
                        <input type="text" class="dote m-2" id="dote2" name="correo" value='' size='57'>
                        <input type="text" class="dote m-2" id="dote3" name="correo" value='' size='57'>
                        <input type="text" class="dote m-2" id="dote4" name="correo" value='' size='57'>
                        <input type="text" class="dote m-2" id="dote5" name="correo" value='' size='57'>
                        <input type="text" class="dote m-2" id="dote6" name="correo" value='' size='57'>
                        <input type="text" class="dote m-2" id="dote7" name="correo" value='' size='57'>
                        <input type="text" class="dote m-2" id="dote8" name="correo" value='' size='57'>
                        <input type="text" class="dote m-2" id="dote9" name="correo" value='' size='57'>
                        <input type="text" class="dote m-2" id="dote10" name="correo" value='' size='57'></p>
                        <p class="pb-2"><div class="btn-group dropright">
                         idiomas
                        <label data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle ml-2"></i></label>
                        <div class="dropdown-menu">
                         Los idiomas que puede hablar tu personaje.
                        </div>
                      </div></p>
                        <p id="idiomas">
                        <input type="text" class="idioma m-2" id="idioma1" name="correo" value='' size='10'>
                        <br>
                        <input type="text" class="idioma m-2" id="idioma2" name="correo" value='' size='10'>
                        <br>
                        <input type="text" class="idioma m-2" id="idioma3" name="correo" value='' size='10'></p>
                          </div>
                          <div class="col">
                          <div class="btn-group dropright">
                         Habilidades
                        <label data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle ml-2"></i></label>
                        <div class="dropdown-menu">
                         Estas son las habilidades que tu personaje usa conforme vaya pasando la historia, las habilidades esscalan con los atributos principales y los puntos totales a repartir
                         que se dan al subir de nivel.
                        </div>
                      </div>
                          <p id="habil" class="text-right">Habilidades Totales a repartir:   <input type="text" class="m-2" id="habilidadTotal" name="correo" value='' size='3'>
                            
                         
                          
                          </p>

                          </div>
                        </div>
                      </div>
                      <div class='dropdown-divider' id='divide'></div>
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col" id="last">
                            
                            <p id='conjuros'></p>
                          </div>
                        </div>
                      </div>
              </div>
              <div class="col-2 p-2">
                          <div class="container fluid">
                          <div class="row">
                            <div class="col p-2">
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
                            <div class="col p-2">
                            <div class="card" style="width: 18rem;">
                          <div class="card-body p-1">
                            <p class="card-text">
                            </p>
                            <div class="accordion" id="accordion">
                            <div class="card">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseExperiencia" aria-expanded="false" aria-controls="collapseExperiencia">
                                <div class="" id="headingExperiencia">
                                  Experiencia
                                  </div>
                                </button>
                            <div id="collapseExperiencia" class="collapse" aria-labelledby="headingExperiencia" data-parent="#accordion">
                              <div class="card-body">
                              </div>
                            </div>
                            <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseArmas" aria-expanded="false" aria-controls="collapseArmas">
                                <div class="" id="headingArmas">
                                  Armas
                                  </div>
                                </button>
                            <div id="collapseArmas" class="collapse" aria-labelledby="headingArmas" data-parent="#accordion">
                              <div class="card-body">
                              </div>
                            </div>
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseProtecciones" aria-expanded="false" aria-controls="collapseProtecciones">
                                <div class="" id="headingProtecciones">
                                  Protecciones
                                  </div>
                                </button>
                            <div id="collapseProtecciones" class="collapse" aria-labelledby="headingProtecciones" data-parent="#accordion">
                              <div class="card-body">
                              </div>
                            </div>
                            <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapsePertenencias" aria-expanded="false" aria-controls="collapsePertenencias">
                                <div class="" id="headingPertenencias">
                                  Pertenencias
                                  </div>
                                </button>
                            <div id="collapsePertenencias" class="collapse" aria-labelledby="headingPertenencias" data-parent="#accordion">
                              <div class="card-body">
                              </div>
                            </div>
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseDotes" aria-expanded="false" aria-controls="collapseDotes">
                                <div class="" id="headingDotes">
                                  Dotes
                                  </div>
                                </button>
                            <div id="collapseDotes" class="collapse" aria-labelledby="headingDotes" data-parent="#accordion">
                              <div class="card-body">
                              </div>
                            </div>
                            <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseIdiomas" aria-expanded="false" aria-controls="collapseIdiomas">
                                <div class="" id="headingIdiomas">
                                  idiomas
                                  </div>
                                </button>
                            <div id="collapseIdiomas" class="collapse" aria-labelledby="headingIdiomas" data-parent="#accordion">
                              <div class="card-body">
                              </div>
                            </div>
                          </div>
                          </div>
                          </p>
                          </div>
                        </div>
                            </div>
                          </div>
                          </div>
              </div>
            </div>
        </div>
    <script src="estilos/popper.min.js" ></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>
