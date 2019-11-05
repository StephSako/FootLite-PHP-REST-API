<?php
	class Supporter{
		private $idSupporter;
		private $connexion;
		private $favoriteTeam;
		private $favoriteTeamName;
		private $pseudo;
		private $password;

		public function __construct(){
	    		include(realpath('../config/bdd.php'));
	    		$this->connexion = $co;

			if (func_num_args() == 5){
                                // update
                                $this->pseudo = func_get_arg(0);
                                $this->password = func_get_arg(1);
                                $this->favoriteTeam = func_get_arg(2);
				$this->idSupporter = func_get_arg(3);
				$this->favoriteTeamName = func_get_arg(4);
                        }
	        	else if (func_num_args() == 4){
	        		// sign up
				$this->pseudo = func_get_arg(0);
				$this->password = func_get_arg(1);
				$this->favoriteTeam = func_get_arg(2);
				$this->favoriteTeamName = func_get_arg(3);
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
			$stmt = $this->connexion->prepare("SELECT idSupporter, pseudo, password, favoriteTeam, favoriteTeamName FROM SUPPORTER WHERE pseudo = '".$this->pseudo."' AND password = '".$this->password."'");
			$stmt->execute();
			$tab = $stmt->fetch(PDO::FETCH_ASSOC);
			$tab_infos["idSupporter"] = $tab['idSupporter'];
			$tab_infos["favoriteTeam"] = $tab['favoriteTeam'];
			$tab_infos["favoriteTeamName"] = $tab['favoriteTeamName'];

			$stmt = $this->connexion->prepare("SELECT idMatch, idBet, idWinner, idSupporter FROM BET NATURAL JOIN SUPPORTER WHERE pseudo = '".$this->pseudo."' AND password = '".$this->password."'");
                        $stmt->execute();
			$tab_infos["tab_bets"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $tab_infos;
		}

		public function inscription(){
			$stmt = $this->connexion->prepare("SELECT pseudo FROM SUPPORTER WHERE pseudo = '".$this->pseudo."'");
			$stmt->execute();

            		if (count($stmt->fetchAll()) == 0){
	                	$stmt = $this->connexion->prepare("INSERT INTO SUPPORTER (pseudo, password, favoriteTeam, favoriteTeamName) VALUES ('".$this->pseudo."', '".$this->password."', ".$this->favoriteTeam.",'".$this->favoriteTeamName."')");
        	    		$stmt->execute();
				return $this->connexion->lastInsertId();
			}
            		else return -1;
		}

		public function bet($bet){
			$stmt = $this->connexion->prepare("SELECT idBet FROM BET WHERE idSupporter = ".$this->idSupporter." AND idMatch = ".$bet->idMatch);
    			$stmt->execute();
    			$tabVerif = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($tabVerif) == 0){
				$stmt = $this->connexion->prepare("INSERT INTO BET (idMatch, idWinner, idSupporter) VALUES (".$bet->idMatch.", ".$bet->idWinner.", ".$this->idSupporter.")");
	   			$stmt->execute();
			}
			else{
				$stmt = $this->connexion->prepare("UPDATE BET SET idWinner = ".$bet->idWinner." WHERE idSupporter =".$this->idSupporter." AND idMatch = ".$bet->idMatch);
                        	$stmt->execute();
			}

			$stmt = $this->connexion->prepare("SELECT idMatch, idBet, idWinner, idSupporter FROM BET WHERE idSupporter = ".$this->idSupporter);
                        $stmt->execute();
                        $bets["tab_bets"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $bets;
		}

		public function unbet($idBet){
                       	$stmt = $this->connexion->prepare("DELETE FROM BET WHERE idBet = ".$idBet);
                       	$stmt->execute();
            	}

		public function getPourcent($idMatch, $idWinner){
			$stmt = $this->connexion->prepare("SELECT ((COUNT(*)*100)/(SELECT COUNT(*) FROM BET WHERE idMatch = ".$idMatch.")) as pourcent FROM BET WHERE idMatch = ".$idMatch." AND idWinner = ".$idWinner);
    			$stmt->execute();
    			$tabPourcent = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $tabPourcent[0]["pourcent"];
		}

		public function getNbParieurs($idMatch){
                        $stmt = $this->connexion->prepare("SELECT * FROM BET WHERE idMatch = ".$idMatch);
                        $stmt->execute();
                        $tabNbParieurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        return count($tabNbParieurs);
                }

		public function editPseudo(){
			$stmt = $this->connexion->prepare("UPDATE SUPPORTER SET pseudo = '".$this->pseudo."' WHERE idSupporter = ".$this->idSupporter);
                        $stmt->execute();
		}

		public function editFavoriteTeam(){
			$stmt = $this->connexion->prepare("UPDATE SUPPORTER SET favoriteTeam = ".$this->favoriteTeam.", favoriteTeamName = '".$this->favoriteTeamName."' WHERE idSupporter = ".$this->idSupporter);
                        $stmt->execute();
		}

		public function editPassword(){
                        $stmt = $this->connexion->prepare("UPDATE SUPPORTER SET password = '".$this->password."'");
                        $stmt->execute();
                }

	}
?>
