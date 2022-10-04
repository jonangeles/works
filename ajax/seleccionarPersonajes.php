<?php
 require_once ("../base.php");
 if (isset($_REQUEST['nombre'])&&isset($_REQUEST['id_usuario'])) {
     $id_usuario=$_REQUEST['id_usuario'];
     $nombre = $_REQUEST['nombre'];
    $array_de_productos = Base::selectPjPorNombre($nombre,$id_usuario);
   if (count($array_de_productos)>0) {
    foreach ($array_de_productos as $o) {
        $datos[$o->getId()]["id"]=$o->getId();
    }
    echo json_encode($datos);
   }else{
   }
   
 }


?>