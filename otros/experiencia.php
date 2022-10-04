<?Php

class experiencia {

	private $nivel;
	private $experiencia;
	private $dotes;



	function __Construct ($registro){
		
		$this->nivel=  $registro['nivel'];
		$this->experiencia=  $registro['experiencia'];
		$this->dotes=  $registro['dotes'];


		
	}

	//Getters	

	function getNivel(){
		return $this->nivel;
	}
	function getExperiencia(){
		return $this->experiencia;
	}
    function getDotes(){
		return $this->dotes;
	}


	

	//Setters

	function setNivel($nivel){
		$this->nivel=$nivel;
	}
	function setExperiencia($experiencia){
		$this->experiencia=$experiencia;
	}
	function setDotes($dotes){
		$this->dotes=$dotes;
	}

}
	