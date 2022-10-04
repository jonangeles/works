<?php
 require_once ("../base.php");
 $array_de_productos = Base::selectArmas();
 foreach ($array_de_productos as $o) {
    $datos[$o->getId()]["id"]=$o->getId();
    $datos[$o->getId()]["nombre"]=$o->getNombre();
    $datos[$o->getId()]["daño"]=$o->getDaño();
    $datos[$o->getId()]["critico"]=$o->getCritico();
}
echo json_encode($datos);
?>