<?Php

class id {

	private $id;
	private $grupo;



	function __Construct ($registro){
		
		$this->id=  $registro['id'];
		$this->grupo=  $registro['grupo'];

		
	}

	//Getters	

	function getId(){
		return $this->id;
	}
	function getGrupo(){
		return $this->grupo;
	}

	

	//Setters

	function setId($id){
		$this->id=$id;
	}
	function setGrupo($grupo){
		$this->grupo=$grupo;
	}


	

}
	
	

?>