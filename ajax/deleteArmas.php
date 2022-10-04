<?php
 require_once ("../base.php");
    if (isset($_REQUEST['id_personaje'])) {
        $id_personaje=$_REQUEST['id_personaje'];
        $array_de_productos['info'] = Base::deleteArmas($id_personaje);
       echo json_encode($array_de_productos);
    }


?>