<?Php

class correo {

	private $correo;


	function __Construct ($registro){
		
		$this->correo=  $registro['correo'];
		
	}

	//Getters	
	function getCorreo(){
		return $this->correo;
	}
	

	//Setters
	function setCorreo($correo){
		$this->correo=$correo;
	}

	

}
	
	

?>