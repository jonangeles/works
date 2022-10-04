<?php
 require_once ("../base.php");
 if (isset($_REQUEST['id'])) {
     $id=$_REQUEST['id'];
    $array_de_productos = Base::selectPjPorId($id);
   if (count($array_de_productos)>0) {
    foreach ($array_de_productos as $o) {
        $datos[$o->getId()]["id"]=$o->getId();
        $datos[$o->getId()]["nombre"]=$o->getNombre();
        $datos[$o->getId()]["clase"]=$o->getClase();
        $datos[$o->getId()]["nivel"]=$o->getNivel();
        $datos[$o->getId()]["raza"]=$o->getRaza();
        $datos[$o->getId()]["edad"]=$o->getEdad();
        $datos[$o->getId()]["sexo"]=$o->getSexo();
        $datos[$o->getId()]["experiencia"]=$o->getExperiencia();
        $datos[$o->getId()]["dinero"]=$o->getDinero();
        $datos[$o->getId()]["descripcion"]=$o->getDescripcion();
        $datos[$o->getId()]["fuerza"]=$o->getFuerza();
        $datos[$o->getId()]["destreza"]=$o->getDestreza();
        $datos[$o->getId()]["constitucion"]=$o->getConstitucion();
        $datos[$o->getId()]["inteligencia"]=$o->getInteligencia();
        $datos[$o->getId()]["sabiduria"]=$o->getSabiduria();
        $datos[$o->getId()]["carisma"]=$o->getCarisma();
        $datos[$o->getId()]["fortaleza"]=$o->getFortaleza();
        $datos[$o->getId()]["reflejos"]=$o->getReflejos();
        $datos[$o->getId()]["voluntad"]=$o->getVoluntad();
        $datos[$o->getId()]["vida"]=$o->getVida();
        $datos[$o->getId()]["velocidad"]=$o->getVelocidad();
        $datos[$o->getId()]["at_base"]=$o->getAt_base();
        $datos[$o->getId()]["iniciativa"]=$o->getIniciativa();
        $datos[$o->getId()]["ca"]=$o->getCa();
    }
    echo json_encode($datos);
   }else{
   }
   
 }


?>