<?Php

class armado {

	private $id_arma;
	private $id_personaje;
	private $municion;



	function __Construct ($registro){
		
		$this->id_arma=  $registro['id_arma'];
		$this->id_personaje=  $registro['id_personaje'];
		$this->municion=  $registro['municion'];

		
	}

	//Getters	

	function getId_arma(){
		return $this->id_arma;
	}
	function getId_personaje(){
		return $this->id_personaje;
	}
	function getMunicion(){
		return $this->municion;
	}

	

	//Setters

	function setId_arma($id_arma){
		$this->id_arma=$id_arma;
	}
	function setId_personaje($id_personaje){
		$this->id_personaje=$id_personaje;
	}
	function setMunicion($municion){
		$this->municion=$municion;
	}


	

}
	
	

?>