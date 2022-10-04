<?php
 require_once ("../base.php");
 $array_de_productos = Base::selectProtecciones();
 foreach ($array_de_productos as $o) {
    $datos[$o->getId()]["id"]=$o->getId();
    $datos[$o->getId()]["nombre"]=$o->getNombre();
    $datos[$o->getId()]["bonificador"]=$o->getBonificador();
    $datos[$o->getId()]["tipo"]=$o->getTipo();
}
echo json_encode($datos);
?>