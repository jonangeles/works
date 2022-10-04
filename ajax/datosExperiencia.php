<?php
 require_once ("../base.php");
 $array_de_productos = Base::selectExperiencia();
 foreach ($array_de_productos as $o) {
    $datos[$o->getNivel()]["nivel"]=$o->getNivel();
    $datos[$o->getNivel()]["experiencia"]=$o->getExperiencia();
}
echo json_encode($datos);
?>