<?php
 require_once ("../base.php");
if (isset($_REQUEST['nombre'])) {
    $nombre = $_REQUEST['nombre'];
    $array_de_productos = Base::comprobarNombre($nombre);
if (count($array_de_productos)>0) {
    $datos['info']=false;
}else{
    $datos['info']=true;
}
   echo json_encode($datos);
}
?>