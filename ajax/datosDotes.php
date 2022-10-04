<?php
 require_once ("../base.php");
 $array_de_productos = Base::selectDotes();
 foreach ($array_de_productos as $o) {
    $datos[$o->getId()]["id"]=$o->getId();
    $datos[$o->getId()]["nombre"]=$o->getNombre();
    $datos[$o->getId()]["prerrequisito"]=$o->getPrerrequisito();
    $datos[$o->getId()]["descripcion"]=$o->getDescripcion();
}
echo json_encode($datos);
?>