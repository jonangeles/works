<?Php

class idiomas {

    private $id;
    private $idioma;



	function __Construct ($registro){
		
        $this->id=  $registro['id'];
        $this->idioma=  $registro['idioma'];


		
	}

	//Getters	

	function getId(){
		return $this->id;
    }
    function getIdioma(){
		return $this->idioma;
    }

	

	//Setters

	function setId($id){
		$this->id=$id;
    }
    function setIdioma($idioma){
		$this->idioma=$idioma;
    }

}
	
	

?>