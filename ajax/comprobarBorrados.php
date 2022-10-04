<?php
 require_once ("../base.php");
if (isset($_REQUEST["termino"])) {
    $termino=$_REQUEST['termino'];
    $array_de_productos = Base::buscarBorrados($termino);
    foreach ($array_de_productos as $o) {
       $datos[$o->getId()]["id"]=$o->getId();
       $datos[$o->getId()]["nombre"]=$o->getNombre();
       $datos[$o->getId()]["clase"]=$o->getClase();
       $datos[$o->getId()]["nivel"]=$o->getNivel();
   
   }
   echo json_encode($datos);
}

?>