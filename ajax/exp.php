<?php
        require_once ("../base.php");
    if (isset($_REQUEST["nivel"])) {
        $nivel=$_REQUEST["nivel"];

        $array_de_productos = Base::experiencia($nivel);
            foreach ($array_de_productos as $o) {
                $datos["nivel"]=$o->getNivel();
                $datos["experiencia"]=$o->getExperiencia();
                $datos["dotes"]=$o->getDotes();
            }
        echo json_encode($datos);
    }
?>