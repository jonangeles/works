<?php
 require_once ("../base.php");
 if (isset($_REQUEST['id'])) {
     $id=$_REQUEST['id'];
    $array_de_productos = Base::selectProtegido($id);
   if (count($array_de_productos)>0) {
    foreach ($array_de_productos as $a) {
       $array_de_proteccion = Base::selectProteccionPorId($a->getId_proteccion());
        foreach ($array_de_proteccion as $o) {
            $datos[$o->getId()]["id"]=$o->getId();
            $datos[$o->getId()]["nombre"]=$o->getNombre();
            $datos[$o->getId()]["bonificador"]=$o->getBonificador();
            $datos[$o->getId()]["tipo"]=$o->getTipo();
        }
    }
    echo json_encode($datos);
   }else{
   }
   
 }


?>