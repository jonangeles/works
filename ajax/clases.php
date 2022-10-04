<?php
        require_once ("../base.php");
    if (isset($_REQUEST["clase"])&&isset($_REQUEST["nivel"])) {
        $clase=$_REQUEST["clase"];
        $nivel=$_REQUEST["nivel"];

        $array_de_productos = Base::clase($clase, $nivel);
        if ($clase=="guerrero") {
            foreach ($array_de_productos as $o) {
                $datos["nivel"]=$o->getNivel();
                $datos["vida"]=$o->getVida();
                $datos["at_base"]=$o->getAt_base();
                $datos["fortaleza"]=$o->getFortaleza();
                $datos["Reflejos"]=$o->getReflejos();
                $datos["voluntad"]=$o->getVoluntad();
                $datos["dotes"]=$o->getDotes();
                $datos["habilidad"]=$o->getHabilidad();
            }
        }else{
            foreach ($array_de_productos as $o) {
                $datos["nivel"]=$o->getNivel();
                $datos["vida"]=$o->getVida();
                $datos["nivel_conjuro"]=$o->getNivel_conjuro();
                $datos["conjuros_diarios"]=$o->getConjuros_diarios();
                $datos["at_base"]=$o->getAt_base();
                $datos["fortaleza"]=$o->getFortaleza();
                $datos["Reflejos"]=$o->getReflejos();
                $datos["voluntad"]=$o->getVoluntad();
                $datos["dotes"]=$o->getDotes();
                $datos["habilidad"]=$o->getHabilidad();
            }  
        }
        echo json_encode($datos);
    }
?>