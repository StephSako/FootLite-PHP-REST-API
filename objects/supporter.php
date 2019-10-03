<?php
	class Supporter{
		private $idSupporter;
		private $connexion;
		private $favoriteTeam;
		private $pseudo;
		private $password;

		public function __construct(){
	    		include(realpath('../config/bdd.php'));
	    		$this->connexion = $co;

			if (func_num_args() == 4){
                                // update
                                $this->pseudo = func_get_arg(0);
                                $this->password = func_get_arg(1);
                                $this->favoriteTeam = func_get_arg(2);
				$this->idSupporter = func_get_arg(3);
                        }
	        	else if (func_num_args() == 3){
	        		// sign up
				$this->pseudo = func_get_arg(0);
				$this->password = func_get_arg(1);
				$this->favoriteTeam = func_get_arg(2);
	        	}
			else if (func_num_args() == 2){
	        		// sign in
				$this->pseudo = func_get_arg(0);
		        	$this->password = func_get_arg(1);
	    		}
	    		else if (func_num_args() == 1){
	    			// other treatments
	    			$this->idSupporter = func_get_arg(0);
	    		}
	    	}

		public function connexion(){
			$stmt = $this->connexion->prepare("SELECT idSupporter, pseudo, password, favoriteTeam FROM SUPPORTER WHERE pseudo = '".$this->pseudo."' AND password = '".$this->password."'");
			$stmt->execute();
			$tab = $stmt->fetch(PDO::FETCH_ASSOC);
			$tab_infos["idSupporter"] = $tab['idSupporter'];
			$tab_infos["favoriteTeam"] = $tab['favoriteTeam'];

			$stmt = $this->connexion->prepare("SELECT idMatch, idBet, idWinner, idSupporter FROM BET NATURAL JOIN SUPPORTER WHERE pseudo = '".$this->pseudo."' AND password = '".$this->password."'");
                        $stmt->execute();
			$tab_infos["tab_bets"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $tab_infos;
		}

		public function inscription(){
			$stmt = $this->connexion->prepare("SELECT pseudo FROM SUPPORTER WHERE pseudo = '".$this->pseudo."'");
			$stmt->execute();

            		if (count($stmt->fetchAll()) == 0){
	                	$stmt = $this->connexion->prepare("INSERT INTO SUPPORTER (pseudo, password, favoriteTeam) VALUES ('".$this->pseudo."', '".$this->password."', '".$this->favoriteTeam."')");
        	    		$stmt->execute();
				return $this->connexion->lastInsertId();
			}
            		else return -1;
		}

		public function update(){
                        $stmt = $this->connexion->prepare("SELECT pseudo FROM SUPPORTER WHERE pseudo = '".$this->pseudo."'");
                        $stmt->execute();

                        if (count($stmt->fetchAll()) == 0){
                                $stmt = $this->connexion->prepare("UPDATE SUPPORTER SET pseudo = '".$this->pseudo."', password = '".$this->password."', favoriteTeam = ".$this->favoriteTeam." WHERE idSupporter = ".$this->idSupporter);
				$stmt->execute();

                                return 1;
                        }
                        else return -1;
                }

		public function bet($bet){
    			$stmt = $this->connexion->prepare("SELECT idBet FROM BET WHERE idSupporter = ".$this->id." AND idWinner = ".$bet->idWinner." AND idMatch = ".$bet->idMatch);
    			$stmt->execute();
    			$tab = $stmt->fetchAll(PDO::FETCH_ASSOC);

    			if(count($tab) == 0){
	    			$stmt = $this->connexion->prepare("INSERT INTO BET (idMatch, idWinner, idSupporter) VALUES (".$bet->idMatch.", ".$bet->idWinner.", ".$this->idSupporter.")");
	    			$stmt->execute();

				return "Paris effectué.";
			}
			else return "Ce pari existe déjà.";
		}

		public function unbet($idBet){
                	$stmt = $this->connexion->prepare("SELECT idBet FROM BET WHERE idBet = ".$idBet);
                	$stmt->execute();
                	$tab = $stmt->fetchAll(PDO::FETCH_ASSOC);

                	if(count($tab) != 0){
                        	$stmt = $this->connexion->prepare("DELETE FROM BET WHERE idBet = ".$idBet);
                        	$stmt->execute();

                        	return "Paris annulé.";
                	}
                	else return "Ce paris n'existe pas.";
            	}
	}
?>
