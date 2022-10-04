<?php
        require_once ("../base.php");
    if (isset($_REQUEST["clase"])&&isset($_REQUEST["nivel"])) {
        $id = $_REQUEST["id"];
        $clase=$_REQUEST["clase"];
        $nivel=$_REQUEST["nivel"];
        $nombre = $_REQUEST["nombre"];
        $raza = $_REQUEST["raza"];
        $edad = $_REQUEST["edad"];
        $sexo = $_REQUEST["sexo"];
        $exp = $_REQUEST["exp"];
        $dinero = $_REQUEST["dinero"];
        $descripcion = $_REQUEST["descripcion"];
        $fuerza = $_REQUEST["fuerza"];
        $destreza = $_REQUEST["destreza"];
        $constitucion = $_REQUEST["constitucion"];
        $inteligencia = $_REQUEST["inteligencia"];
        $sabiduria = $_REQUEST["sabiduria"];
        $carisma = $_REQUEST["carisma"];
        $fortaleza = $_REQUEST["fortaleza"];
        $reflejos = $_REQUEST["reflejos"];
        $voluntad = $_REQUEST["voluntad"];
        $pg = $_REQUEST["pg"];
        $velocidad = $_REQUEST["velocidad"];
        $at_base = $_REQUEST["at_base"];
        $iniciativa = $_REQUEST["iniciativa"];
        $ca = $_REQUEST["ca"];

        $array_de_productos['info'] = Base::modificarPj($id, $clase,$nivel,$nombre,$raza,$edad,$sexo,$exp,$dinero,$descripcion,$fuerza,
        $destreza,$constitucion,$inteligencia,$sabiduria,$carisma,$fortaleza,$reflejos,$voluntad,$pg,$velocidad,$at_base,$iniciativa,$ca);
echo json_encode($array_de_productos);
    }
?>