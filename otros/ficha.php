<?Php

class ficha {

    private $id;
    private $id_usuario;
    private $borrado;
    private $clase;
    private $nivel;
    private $nombre;
    private $raza;
    private $edad;
    private $sexo;
    private $experiencia;
    private $dinero;
    private $descripcion;
    private $fuerza;
    private $destreza;
    private $constitucion;
    private $inteligencia;
    private $sabiduria;
    private $carisma;
    private $fortaleza;
    private $reflejos;
    private $voluntad;
    private $vida;
    private $velocidad;
    private $at_base;
    private $iniciativa;
    private $ca;



	function __Construct ($registro){
		
        $this->id=  $registro['id'];
        $this->id_usuario=  $registro['id_usuario'];
        $this->borrado=  $registro['borrado'];
        $this->clase=  $registro['clase'];
        $this->nivel=  $registro['nivel'];
        $this->nombre=  $registro['nombre'];
        $this->raza=  $registro['raza'];
        $this->edad=  $registro['edad'];
        $this->sexo=  $registro['sexo'];
        $this->experiencia=  $registro['experiencia'];
        $this->dinero=  $registro['dinero'];
        $this->descripcion=  $registro['descripcion'];
        $this->fuerza=  $registro['fuerza'];
        $this->destreza=  $registro['destreza'];
        $this->constitucion=  $registro['constitucion'];
        $this->inteligencia=  $registro['inteligencia'];
        $this->sabiduria=  $registro['sabiduria'];
        $this->carisma=  $registro['carisma'];
        $this->fortaleza=  $registro['fortaleza'];
        $this->reflejos=  $registro['reflejos'];
        $this->voluntad=  $registro['voluntad'];
        $this->vida=  $registro['vida'];
        $this->velocidad=  $registro['velocidad'];
        $this->at_base=  $registro['at_base'];
        $this->iniciativa=  $registro['iniciativa'];
        $this->ca=  $registro['ca'];

		
	}

	//Getters	

	function getId(){
		return $this->id;
    }
    function getId_usuario(){
		return $this->id_usuario;
    }
    function getBorrado(){
		return $this->borrado;
    }
    function getClase(){
		return $this->clase;
    }
    function getNivel(){
		return $this->nivel;
    }
    function getNombre(){
		return $this->nombre;
    }
    function getRaza(){
		return $this->raza;
    }
    function getEdad(){
		return $this->edad;
    }
    function getSexo(){
		return $this->sexo;
    }
    function getExperiencia(){
		return $this->experiencia;
    }
    function getDinero(){
		return $this->dinero;
    }
    function getDescripcion(){
		return $this->descripcion;
    }
    function getFuerza(){
		return $this->fuerza;
    }
    function getDestreza(){
		return $this->destreza;
    }
    function getConstitucion(){
		return $this->constitucion;
    }
    function getInteligencia(){
		return $this->inteligencia;
    }
    function getSabiduria(){
		return $this->sabiduria;
    }
    function getCarisma(){
		return $this->carisma;
    }
    function getFortaleza(){
      return $this->fortaleza;
    }
    function getReflejos(){
      return $this->reflejos;
    }
    function getVoluntad(){
      return $this->voluntad;
    }
    function getVida(){
		return $this->vida;
    }
    function getVelocidad(){
		return $this->velocidad;
    }
    function getAt_base(){
		return $this->at_base;
	}
    function getIniciativa(){
		return $this->iniciativa;
    }
    function getCa(){
		return $this->ca;
	}
	

	//Setters

	function setId($id){
		$this->id=$id;
    }
    function setId_usuario($id_usuario){
		$this->id_usuario=$id_usuario;
    }
    function setBorrado($borrado){
		$this->borrado=$borrado;
    }
    function setClase($clase){
		$this->clase=$clase;
    }
    function setNivel($nivel){
		$this->nivel=$nivel;
    }
    function setNombre($nombre){
		$this->nombre=$nombre;
    }
    function setRaza($raza){
		$this->raza=$raza;
    }
    function setEdad($edad){
		$this->edad=$edad;
    }
    function setSexo($sexo){
		$this->sexo=$sexo;
    }
    function setExperiencia($experiencia){
		$this->experiencia=$experiencia;
    }
    function setDinero($dinero){
		$this->dinero=$dinero;
    }
    function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
    }
    function setFuerza($fuerza){
		$this->fuerza=$fuerza;
    }
    function setDestreza($destreza){
		$this->destreza=$destreza;
    }
    function setConstitucion($constitucion){
		$this->constitucion=$constitucion;
    }
    function setInteligencia($inteligencia){
		$this->inteligencia=$inteligencia;
    }
    function setSabiduria($sabiduria){
		$this->sabiduria=$sabiduria;
    }
    function setCarisma($carisma){
		$this->carisma=$carisma;
    }
    function setFortaleza($fortaleza){
      $this->fortaleza=$fortaleza;
    }
    function setReflejos($reflejos){
      $this->reflejos=$reflejos;
    }
    function setVoluntad($voluntad){
      $this->voluntad=$voluntad;
    }
    function setVida($vida){
		$this->vida=$vida;
    }
    function setVelocidad($velocidad){
		$this->velocidad=$velocidad;
    }
    function setAt_base($at_base){
		$this->at_base=$at_base;
    }
    function setIniciativa($iniciativa){
		$this->iniciativa=$iniciativa;
    }
    function setCa($ca){
		$this->ca=$ca;
	}

}
	
	

?>