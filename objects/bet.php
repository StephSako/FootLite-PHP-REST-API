<?php
	class Bet{
		public $id;
		public $idMatch;
		public $idSupporter;
		public $idWinner;

		public function __construct(){
	    		include(realpath('../config/bdd.php'));

	        	if (func_num_args() == 3){
				$this->idMatch = func_get_arg(0);
				$this->idSupporter = func_get_arg(1);
				$this->idWinner = func_get_arg(2);
	        	}
	    	}
	}
?>
