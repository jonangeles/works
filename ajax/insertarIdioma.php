<?php
 require_once ("../base.php");
    if (isset($_REQUEST['id_personaje'])&&isset($_REQUEST['id_idioma'])) {
        $id_personaje=$_REQUEST['id_personaje'];
        $id_idioma=$_REQUEST['id_idioma'];
        $array_de_productos['info'] = Base::insertarIdiomas($id_personaje,$id_idioma);
       echo json_encode($array_de_productos);
    }


?>