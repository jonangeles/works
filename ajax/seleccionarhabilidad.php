<?php
 require_once ("../base.php");
 if (isset($_REQUEST['id'])) {
     $id=$_REQUEST['id'];
    $array_de_productos = Base::selectHabilitado($id);
   if (count($array_de_productos)>0) {
    foreach ($array_de_productos as $a) {
       $array_de_habilidades = Base::selectHabilidadesPorId($a->getId_habilidad());
        foreach ($array_de_habilidades as $o) {
            $datos[$o->getId()]["id"]=$o->getId();
            $datos[$o->getId()]["nombre"]=$o->getNombre();
            $datos[$o->getId()]["modificador"]=$o->getModificador();
            $datos[$o->getId()]["rango"]=$a->getRango();
        }
    }
    echo json_encode($datos);
   }else{
   }
   
 }


?>