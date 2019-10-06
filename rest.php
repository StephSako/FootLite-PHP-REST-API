<?php
	header('Content-Type: application/json');

	function json_authentification($id, $pseudo, $password, $favorite_team, $tab_bets){
		$retour ["idSupporter"] = $id;
		$retour ["pseudo"] = $pseudo;
		$retour ["password"] = $password;
		$retour ["favoriteTeam"] = $favorite_team;
		$retour ["tab_bets"] = $tab_bets;

		echo json_encode($retour);
	}

	function json_bet($bets){
		$retour ["tab_bets"] = $bets;

		echo json_encode($retour);
	}
?>
