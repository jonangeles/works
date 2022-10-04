<?Php

class mago {

	private $nivel;
	private $vida;
	private $nivel_conjuro;
	private $conjuros_diarios;
    private $at_base;
    private $fortaleza;
	private $reflejos;
    private $voluntad;
	private $dotes;
	private $habilidad;


	function __Construct ($registro){
		
		$this->nivel=  $registro['nivel'];
		$this->vida=  $registro['vida'];
		$this->nivel_conjuro=  $registro['nivel_conjuro'];
		$this->conjuros_diarios=  $registro['conjuros_diarios'];
        $this->at_base=  $registro['at_base'];
        $this->fortaleza=  $registro['fortaleza'];
		$this->reflejos=  $registro['reflejos'];
        $this->voluntad=  $registro['voluntad'];
		$this->dotes=  $registro['dotes'];
		$this->habilidad=  $registro['habilidad'];

		
	}

	//Getters	

	function getNivel(){
		return $this->nivel;
	}
	function getVida(){
		return $this->vida;
	}
    function getNivel_conjuro(){
		return $this->nivel_conjuro;
	}
	function getConjuros_diarios(){
		return $this->conjuros_diarios;
	}
	function getAt_base(){
		return $this->at_base;
    }
    function getFortaleza(){
		return $this->fortaleza;
    }
    function getReflejos(){
		return $this->reflejos;
	}
	function getVoluntad(){
		return $this->voluntad;
    }
    function getDotes(){
		return $this->dotes;
	}
	function getHabilidad(){
		return $this->habilidad;
    }

	

	//Setters

	function setNivel($nivel){
		$this->nivel=$nivel;
	}
	function setVida($vida){
		$this->vida=$vida;
	}
	function setNivel_conjuro($nivel_conjuro){
		$this->nivel_conjuro=$nivel_conjuro;
	}
	function setConjuros_diarios($conjuros_diarios){
		$this->conjuros_diarios=$conjuros_diarios;
	}
	function setAt_base($at_base){
		$this->at_base=$at_base;
    }
    function setFortaleza($fortaleza){
		$this->fortaleza=$fortaleza;
	}
	function setReflejos($reflejos){
		$this->reflejos=$reflejos;
	}
	function setVoluntad($voluntad){
		$this->voluntad=$voluntad;
    }
    function setDotes($dotes){
		$this->dotes=$dotes;
	}
	function setHabilidad($habilidad){
		$this->habilidad=$habilidad;
	}
}
	