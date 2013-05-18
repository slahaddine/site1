<?php
	require_once('Navigable.interface.php');
	class ListeUsers implements Navigable
	{
		private $users;
		private $current = -1; 
		public function __construct()
		{
			$this->users = array(); 
		}
		public function add($users)
		{
			array_push($this->users, $users);
		}
		public function next(){
		
			if($this->current < count($this->users))
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
			if(isset($this->users[$this->current]))
				echo $this->users[$this->current]; 
			return false; 
		}
		public function getCurrent(){
			if(isset($this->users[$this->current]))
				return $this->users[$this->current]; 
			return false; 
		}
	
	}
?>