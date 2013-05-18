<?php
	require_once('Navigable.interface.php');
	class ListeActivity implements Navigable
	{
		private $activities;
		private $current = -1; 
		public function __construct()
		{
			$this->activities = array(); 
		}
		public function add($activity)
		{
			array_push($this->activities, $activity);
		}
		public function next(){
		
			if($this->current < count($this->activities))
			{
				$this->current++; 
				return true; 
			}
			return false; 
		}
		public function previous()
		{
			if($this->current > 0)
			{
				$current = -1; 
				return true; 
			}
			return false; 
		}
		public function printCurrent(){
			if(isset($this->activities[$this->current]))
				echo $this->activities[$this->current]; 
		}
		public function getCurrent(){
			if(isset($this->activities[$this->current]))
				return $this->activities[$this->current]; 
			return false; 
		}
	
	}
?>
