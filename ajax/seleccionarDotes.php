<?php
 require_once ("../base.php");
 if (isset($_REQUEST['id'])) {
     $id=$_REQUEST['id'];
    $array_de_productos = Base::selectDotado($id);
   if (count($array_de_productos)>0) {
    foreach ($array_de_productos as $a) {
       $array_de_dotes= Base::selectDotesPorId($a->getId_dotes());
        foreach ($array_de_dotes as $o) {
            $datos[$o->getId()]["id"]=$o->getId();
            $datos[$o->getId()]["nombre"]=$o->getNombre();
        }
    }
    echo json_encode($datos);
   }else{
   }
   
 }


?>