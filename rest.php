<?php
	header('Content-Type: application/json');

	function get_request_method(){
		return $_SERVER['REQUEST_METHOD'];
	}

	function json_sign_up($id, $pseudo, $password, $favorite_team){
		$retour ["idSupporter"] = $id;
		$retour ["pseudo"] = $pseudo;
		$retour ["password"] = $password;
		$retour ["favoriteTeam"] = $favorite_team;

		echo json_encode($retour);
	}

	function json_sign_in($id, $pseudo, $password, $favorite_team, $tab_bets){
		$retour ["idSupporter"] = $id;
		$retour ["pseudo"] = $pseudo;
		$retour ["password"] = $password;
		$retour ["favoriteTeam"] = $favorite_team;
		$retour ["tab_bets"] = $tab_bets;

		echo json_encode($retour);
	}

	function json_message($message){
		$retour ["message"] = $message;

		echo json_encode($retour);
	}
?>
