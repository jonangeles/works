<?php
 require_once ("../base.php");
    if (isset($_REQUEST['id_personaje'])&&isset($_REQUEST['id_arma'])) {
        $id_personaje=$_REQUEST['id_personaje'];
        $id_arma=$_REQUEST['id_arma'];
        $municion=$_REQUEST['municion'];
        $array_de_productos['info'] = Base::insertarArmas($id_personaje,$id_arma,$municion);
       echo json_encode($array_de_productos);
    }


?>