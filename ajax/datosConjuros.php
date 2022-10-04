<?php
 require_once ("../base.php");
if (isset($_REQUEST["tipo"]) && isset($_REQUEST["nivel"])) {
    $tipo = $_REQUEST["tipo"];
    $nivel= $_REQUEST["nivel"];
    $array_de_productos = Base::selectConjuros($nivel,$tipo);
 foreach ($array_de_productos as $o) {
    $datos[$o->getId()]["id"]=$o->getId();
    $datos[$o->getId()]["nivel"]=$o->getNivel();
    $datos[$o->getId()]["clase"]=$o->getClase();
    $datos[$o->getId()]["escuela"]=$o->getEscuela();
    $datos[$o->getId()]["nombre"]=$o->getNombre();
    $datos[$o->getId()]["descripcion"]=$o->getDescripcion();
}
echo json_encode($datos);
}
 
?>