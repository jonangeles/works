<!doctype html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="images/icono.PNG"/>
  <?php
  session_start();
        require_once ("base.php");
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';

  ?>
  <script>
function comprobarCodigo(){
var codigo_introducido = $("#introducido").val();
var url = window.location.href;
var split = url.split('codigo=');
if (split[1] == codigo_introducido) {
    window.location.href= "cambiarContraseña.php";
}else{
  $("#error").html("El codigo no coincide");
}

return false;
}
  window.onload = function(){
    document.getElementById("enviar").onclick = comprobarCodigo;
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

    <title>Recuperacion ded Datos</title>
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
                        if (isset($_REQUEST['email'])) {
                            if ($_REQUEST['email']==true) {
                                $email = $_REQUEST['email'];
                                $array_de_productos = Base::email($email);
                                if (count($array_de_productos)==1) {
                                  foreach ($array_de_productos as $o) {
                                    $_SESSION['email']=$o->getCorreo();
                                }
                                    ?>
<div class="form-group">
    <label for="exampleInputEmail1" id=''>Codigo</label>
    <input type="email" id='introducido'class="form-control" name="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Te hemos mandando un codigo a tu correo electrónico</small>
    <p id="error"></p>
  </div>
  <button type="submit" class="btn btn-primary" id='enviar'>Enviar</button>
<?php
foreach ($array_de_productos as $o) {
    $destino = $o->getCorreo();
}
$asunto= 'Recuperacion de contraseña';
$mensaje="Código de recuperación: ".$_REQUEST['codigo'];





 $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
 try {
     //Server settings
     $mail->SMTPDebug = 0;                                 // Enable verbose debug output
     $mail->isSMTP();                                      // Set mailer to use SMTP
     $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                               // Enable SMTP authentication
     $mail->Username = 'jonangeles1@gmail.com';            // SMTP username
     $mail->Password = 'joni1999';                           // SMTP password
     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
     $mail->Port = 587;                                    // TCP port to connect to
     $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
     //Recipients
     $mail->setFrom('jonangeles1@gmail.com', 'jonangeles');
     $mail->addAddress($destino);     // Add a recipient
 
     //Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = $asunto;
     $mail->Body    = $mensaje;
 
     $mail->send();
 } catch (Exception $e) {
     echo 'No me pudo mandar por un error.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
 }



                                }else{
                                   header('location: olvido.php');
                                }
                            }else{
                                header('location: olvido.php');
                            }
                        }else{
                            
                         
                ?>
                <script>
                  function aleatorio() {
    var array =['','A','B','C','D','E','F','G','H','1','2','3','4','5','6','7','8','9'];
    var codigo="";
    for (let i = 0; i < 6; i++) {
       var num= Math.floor(Math.random()*17)+1;
        codigo = codigo + array[num];
    }
    return codigo;

  }
  var codigo = aleatorio();
                document.write("<form method='post' action='olvido.php?email=true&codigo="+codigo+"'>");
                </script>
                             
  <div class="form-group">

    <script>

    </script>
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">introduzca una direccion de correo válida</small>
  </div>
  <button type="submit" class="btn btn-primary" id='env'>Enviar</button>
</form>
  <?php
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