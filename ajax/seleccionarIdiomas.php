<?php
 require_once ("../base.php");
 if (isset($_REQUEST['id'])) {
     $id=$_REQUEST['id'];
    $array_de_productos = Base::selectPosee_idioma($id);
   if (count($array_de_productos)>0) {
    foreach ($array_de_productos as $a) {
       $array_de_idioma = Base::selectIdiomasPorId($a->getId_idioma());
        foreach ($array_de_idioma as $o) {
            $datos[$o->getId()]["id"]=$o->getId();
            $datos[$o->getId()]["nombre"]=$o->getIdioma();
        }
    }
    echo json_encode($datos);
   }else{
   }
   
 }


?>