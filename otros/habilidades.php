<?Php

class habilidades {

    private $id;
    private $nombre;
    private $clase;
    private $modificador;



	function __Construct ($registro){
		
        $this->id=  $registro['id'];
        $this->nombre=  $registro['nombre'];
        $this->clase=  $registro['clase'];
        $this->modificador=  $registro['modificador'];

		
	}

	//Getters	

	function getId(){
		return $this->id;
    }
    function getNombre(){
		return $this->nombre;
    }
    function getClase(){
		return $this->clase;
    }
    function getModificador(){
		return $this->modificador;
	}

	

	//Setters

	function setId($id){
		$this->id=$id;
    }
    function setNombre($nombre){
		$this->nombre=$nombre;
    }
    function setClase($clase){
		$this->clase=$clase;
    }
    function setModificador($modificador){
		$this->modificador=$modificador;
    }


}
	
	

?>