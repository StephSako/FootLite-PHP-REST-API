<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$pseudo = htmlspecialchars(trim($_POST["pseudo"]));
	$password = htmlspecialchars(trim($_POST["password"]));

	if($pseudo != null && $password != null){
		$supporter = new Supporter($pseudo, $password);
		$tab_infos = $supporter->connexion();

		if ($tab_infos["idSupporter"] != null) json_sign_in($tab_infos["idSupporter"], $pseudo, $password, $tab_infos["favoriteTeam"], $tab_infos["tab_bets"]);
		else json_sign_in(-1, "", "", "", "");
	}
	else json_sign_in(-1, "", "", "", "");
?>
