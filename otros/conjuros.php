<?Php

class conjuros {

    private $id;
    private $nivel;
    private $clase;
    private $escuela;
    private $nombre;
    private $descripcion;



	function __Construct ($registro){
		
        $this->id=  $registro['id'];
        $this->nivel=  $registro['nivel'];
        $this->clase=  $registro['clase'];
        $this->escuela=  $registro['escuela'];
        $this->nombre=  $registro['nombre'];
        $this->descripcion=  $registro['descripcion'];


		
	}

	//Getters	

	function getId(){
		return $this->id;
    }
    function getNivel(){
		return $this->nivel;
    }

    function getClase(){
      return $this->clase;
      }
      function getEscuela(){
      return $this->escuela;
      }
      function getNombre(){
        return $this->nombre;
        }
        function getDescripcion(){
        return $this->descripcion;
        }
    


	

	//Setters

	function setId($id){
		$this->id=$id;
    }
    function setNivel($nivel){
		$this->nivel=$nivel;
    }
    function setClase($clase){
      $this->clase=$clase;
      }
      function setEscuela($escuela){
      $this->escuela=$escuela;
      }
      function setNombre($nombre){
        $this->nombre=$nombre;
        }
        function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
        }

}
	
	

?>