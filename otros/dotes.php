<?Php

class dotes {

    private $id;
    private $nombre;
    private $prerrequisito;
    private $descripcion;



	function __Construct ($registro){
		
        $this->id=  $registro['id'];
        $this->nombre=  $registro['nombre'];
        $this->prerrequisito=  $registro['prerrequisito'];
        $this->descripcion=  $registro['descripcion'];

		
	}

	//Getters	

	function getId(){
		return $this->id;
    }
    function getNombre(){
		return $this->nombre;
    }
    function getPrerrequisito(){
		return $this->prerrequisito;
    }
    function getDescripcion(){
		return $this->descripcion;
	}

	

	//Setters

	function setId($id){
		$this->id=$id;
    }
    function setNombre($nombre){
		$this->nombre=$nombre;
    }
    function setPrerrequisito($prerrequisito){
		$this->prerrequisito=$prerrequisito;
    }
    function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
    }


}
	
	

?>