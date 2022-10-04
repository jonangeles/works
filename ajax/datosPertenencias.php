<?php
 require_once ("../base.php");
 $array_de_productos = Base::selectPertenencias();
 foreach ($array_de_productos as $o) {
    $datos[$o->getId()]["id"]=$o->getId();
    $datos[$o->getId()]["nombre"]=$o->getNombre();

}
echo json_encode($datos);
?>