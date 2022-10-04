<?php
 require_once ("../base.php");
    if (isset($_REQUEST['id_personaje'])&&isset($_REQUEST['id_Pertenencia'])) {
        $id_personaje=$_REQUEST['id_personaje'];
        $id_pertenencia=$_REQUEST['id_Pertenencia'];
        $cantidad=$_REQUEST['cantidad'];
        $array_de_productos['info'] = Base::insertarPertenencias($id_personaje,$id_pertenencia,$cantidad);
       echo json_encode($array_de_productos);
    }


?>