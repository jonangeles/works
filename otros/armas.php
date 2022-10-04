<?Php

class armas {

    private $id;
    private $nombre;
    private $daño;
    private $critico;



	function __Construct ($registro){
		
        $this->id=  $registro['id'];
        $this->nombre=  $registro['nombre'];
        $this->daño=  $registro['daño'];
        $this->critico=  $registro['critico'];

		
	}

	//Getters	

	function getId(){
		return $this->id;
    }
    function getNombre(){
		return $this->nombre;
    }
    function getDaño(){
		return $this->daño;
    }
    function getCritico(){
		return $this->critico;
	}

	

	//Setters

	function setId($id){
		$this->id=$id;
    }
    function setNombre($nombre){
		$this->nombre=$nombre;
    }
    function setDaño($daño){
		$this->daño=$daño;
    }
    function setCritico($critico){
		$this->critico=$critico;
    }


}
	
	

?>