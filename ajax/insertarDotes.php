<?php
 require_once ("../base.php");
    if (isset($_REQUEST['id_personaje'])&&isset($_REQUEST['id_dote'])) {
        $id_personaje=$_REQUEST['id_personaje'];
        $id_dote=$_REQUEST['id_dote'];
        $array_de_productos['info'] = Base::insertarDotes($id_personaje,$id_dote);
       echo json_encode($array_de_productos);
    }


?>