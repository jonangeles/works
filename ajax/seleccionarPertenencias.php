<?php
 require_once ("../base.php");
 if (isset($_REQUEST['id'])) {
     $id=$_REQUEST['id'];
    $array_de_productos = Base::selectPosee($id);
   if (count($array_de_productos)>0) {
    foreach ($array_de_productos as $a) {
       $array_de_pertenencia = Base::selectPertenenciasPorId($a->getId_pertenencia());
        foreach ($array_de_pertenencia as $o) {
            $datos[$o->getId()]["id"]=$o->getId();
            $datos[$o->getId()]["nombre"]=$o->getNombre();
            $datos[$o->getId()]["cantidad"]=$a->getCantidad();
        }
    }
    echo json_encode($datos);
   }else{
   }
   
 }


?>