<?php
 require_once ("../base.php");
if (isset($_REQUEST["tipo"])) {
    $tipo = $_REQUEST["tipo"];
    $array_de_productos = Base::selectHabilidadesPorClase($tipo);
    foreach ($array_de_productos as $o) {
       $datos[$o->getId()]["id"]=$o->getId();
       $datos[$o->getId()]["nombre"]=$o->getNombre();
       $datos[$o->getId()]["clase"]=$o->getClase();
       $datos[$o->getId()]["modificador"]=substr($o->getModificador(),0,3);
   }
   echo json_encode($datos);
}
?>