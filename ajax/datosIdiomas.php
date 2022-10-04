<?php
 require_once ("../base.php");
 $array_de_productos = Base::selectIdiomas();
 foreach ($array_de_productos as $o) {
    $datos[$o->getId()]["id"]=$o->getId();
    $datos[$o->getId()]["idioma"]=$o->getIdioma();
}
echo json_encode($datos);
?>