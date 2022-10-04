<?Php

class dotado {

	private $id_dotes;
	private $id_personaje;



	function __Construct ($registro){
		
		$this->id_dotes=  $registro['id_dotes'];
		$this->id_personaje=  $registro['id_personaje'];

		
	}

	//Getters	

	function getId_dotes(){
		return $this->id_dotes;
	}
	function getId_personaje(){
		return $this->id_personaje;
	}

	

	//Setters

	function setId_pertenencia($id_pertenencia){
		$this->id_pertenencia=$id_pertenencia;
	}
	function setId_dotes($id_dotes){
		$this->id_dotes=$id_dotes;
	}



	

}
	
	

?>