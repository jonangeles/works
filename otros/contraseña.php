<?Php

class contraseña {

	private $usuario;
	private $contraseña;


	function __Construct ($registro){
		
		$this->usuario=  $registro['usuario'];
		$this->contraseña=  $registro['contraseña'];
		
	}

	//Getters	

	function getUsuario(){
		return $this->usuario;
    }
    function getContraseña(){
		return $this->contraseña;
	}


	

	//Setters

	function setUsuario($usuario){
		$this->usuario=$usuario;
	}
	function setContraseña($contraseña){
		$this->contraseña=$contraseña;
	}

	

}
	
	

?>