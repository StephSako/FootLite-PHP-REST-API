<?php
	header('Content-Type: application/json');

	function json_authentification($id, $pseudo, $password, $favorite_team, $favorite_team_name, $tab_bets){
		$retour ["idSupporter"] = $id;
		$retour ["pseudo"] = $pseudo;
		$retour ["password"] = $password;
		$retour ["favoriteTeam"] = $favorite_team;
		$retour ["favoriteTeamName"] = $favorite_team_name;
		$retour ["tab_bets"] = $tab_bets;

		echo json_encode($retour);
	}

	function json_bet($bets){
		$retour ["tab_bets"] = $bets;

		echo json_encode($retour);
	}

	function json_pourcent($pourcentHome, $pourcentAway, $nbParieurs){
		$retour ["pourcentHome"] = $pourcentHome;
		$retour ["pourcentAway"] = $pourcentAway;
		$retour ["nbParieurs"] = $nbParieurs;

		echo json_encode($retour);
	}
?>
