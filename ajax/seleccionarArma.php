<?php
 require_once ("../base.php");
 if (isset($_REQUEST['id'])) {
     $id=$_REQUEST['id'];
    $array_de_productos = Base::selectArmados($id);
   if (count($array_de_productos)>0) {
    foreach ($array_de_productos as $a) {
       $array_de_armas = Base::selectArmasPorId($a->getId_arma());
        foreach ($array_de_armas as $o) {
            $datos[$o->getId()]["id"]=$o->getId();
            $datos[$o->getId()]["nombre"]=$o->getNombre();
            $datos[$o->getId()]["municion"]=$a->getMunicion();
            $datos[$o->getId()]["daño"]=$o->getDaño();
            $datos[$o->getId()]["critico"]=$o->getCritico();
        }
    }
    echo json_encode($datos);
   }else{
   }
   
 }


?>