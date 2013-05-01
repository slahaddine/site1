<?php
class Activity {
	private $identifiant;
	private $duree;
	private $date;
	private $description;
	public function __construct($identification, $duree, $date, $description = "") {
		$this -> identifiant = $identification;
		$this -> duree = $duree;
		$this -> date = $date;
		$this -> description = $description;
	}

	public function getIdentifiant() {
		return $this->identifiant; 
	}
	public function setIdentifiant($identifiant=''){
		$this->identifiant = $identifiant; 
	}
	
	public function getDuree(){
		return $this->duree;
	}
	function setDuree($duree='')
	{
		$this->duree = $duree; 
	}
	public function getDate()
	{
		return $this->date; 
	}
	public function setDate($date='')
	{
		$this->date = $date; 
	}
	public function getDescription()
	{
		if ($this->description == null)
			$this->description = ""; 
		return $this->description; 
	}
	public function setDescription($text='')
	{ 
		$this->description = $text; 
	}

}
?>