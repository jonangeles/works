<?Php

class habilitado {

	private $id_habilidad;
	private $id_personaje;
	private $rango;




	function __Construct ($registro){
		
		$this->id_habilidad=  $registro['id_habilidad'];
		$this->id_personaje=  $registro['id_personaje'];
		$this->rango=  $registro['rango'];

		
	}

	//Getters	

	function getId_habilidad(){
		return $this->id_habilidad;
	}
	function getId_personaje(){
		return $this->id_personaje;
	}
	function getRango(){
		return $this->rango;
	}

	

	//Setters

	function setId_habilidad($id_habilidad){
		$this->id_habilidad=$id_habilidad;
	}
	function setId_personaje($id_personaje){
		$this->id_personaje=$id_personaje;
	}
	function setRango($rango){
		$this->rango=$rango;
	}



	

}
	
	

?>