<?php
class Activity {
	private $identifiant;
	private $duree;
	private $date;
	private $description;
	private $lieu; 
        private $nbPersonnes; 
        private $inscriptionRequise; 
        private $dateLimite; 
        private $cout; 
        

        	public function __construct($identification="", $duree="", $date="", $description = "", $lieu="", $nbPersonnes=0, $inscriptionRequise='false', $dateLimite="", $cout=0) {
		$this -> identifiant = $identification;
		$this -> duree = $duree;
		$this -> date = $date;
		$this -> description = $description;
                $this->lieu = $lieu; 
                $this->nbPersonnes = $nbPersonnes; 
                $this->inscriptionRequise = $inscriptionRequise; 
                $this->dateLimite = $dateLimite;
                $this->cout = $cout; 
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
	public function getLieu()
	{
		return $this->lieu; 
	}
	public function setLieu($nouveauLieu)
	{
		$this->lieu = $nouveauLieu; 
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
        public function getNbPersonnes() {
            return $this->nbPersonnes;
        }

        public function setNbPersonnes($nbPersonnes) {
            $this->nbPersonnes = $nbPersonnes;
        }

        public function isInscriptionRequise() {
            return $this->inscriptionRequise;
        }

        public function setInscriptionRequise($inscriptionRequise) {
            $this->inscriptionRequise = $inscriptionRequise;
        }

        public function getDateLimite() {
            return $this->dateLimite;
        }

        public function setDateLimite($dateLimite) {
            $this->dateLimite = $dateLimite;
        }

        public function getCout() {
            return $this->cout;
        }

        public function setCout($cout) {
            $this->cout = $cout;
        }
    public function getArrayObject()
    {
    	return get_object_vars($this); 
    }
	public function __toString(){
		$result = "<b>Identifiant </b> : ".$this->getIdentifiant().", <b>Duree </b> : ".$this->getDuree(). ", <b>Date </b> : ".$this->getDate().", <b>Description </b> : ".$this->getDescription().", Lieu : ".$this->lieu; 
		return $result;
	}
	public function loadFromRecord($line)
	{
		$this -> identifiant = $line["identifiant"];
		$this -> duree = $line["duree"];
		$this -> date = $line["date"];
		$this -> description = $line["description"];
		$this->lieu = $line["lieu"]; 
                $this->cout = $line["cout"];
                $this->dateLimite = $line["datelimite"];
                $this->inscriptionRequise = $line["isInscription"];
                $this->nbPersonnes = $line["nbpersonnes"];
	}

}
?>