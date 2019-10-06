<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$pseudo = htmlspecialchars(trim($_POST["pseudo"]));
	$password = htmlspecialchars(trim($_POST["password"]));

	$supporter = new Supporter($pseudo, $password);
	$tab_infos = $supporter->connexion();

	if ($tab_infos["idSupporter"] != null) json_authentification($tab_infos["idSupporter"], $pseudo, $password, $tab_infos["favoriteTeam"], $tab_infos["tab_bets"]);
	else json_authentification(-1, "", "", -1, []);
?>
