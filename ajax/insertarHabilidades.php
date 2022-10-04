<?php
 require_once ("../base.php");
    if (isset($_REQUEST['id_personaje'])&&isset($_REQUEST['id_habilidad'])) {
        $id_personaje=$_REQUEST['id_personaje'];
        $id_habilidad=$_REQUEST['id_habilidad'];
        $rango=$_REQUEST['rango'];
        $array_de_productos['info'] = Base::insertarHabilidades($id_personaje,$id_habilidad,$rango);
       echo json_encode($array_de_productos);
    }


?>