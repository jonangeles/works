<?php
 require_once ("../base.php");
    if (isset($_REQUEST['id_personaje'])&&isset($_REQUEST['id_proteccion'])) {
        $id_personaje=$_REQUEST['id_personaje'];
        $id_proteccion=$_REQUEST['id_proteccion'];
        $array_de_productos['info'] = Base::insertarProtecciones($id_personaje,$id_proteccion);
       echo json_encode($array_de_productos);
    }


?>