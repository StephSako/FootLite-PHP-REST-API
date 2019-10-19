<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$password = htmlspecialchars(trim($_POST["password"]));
	$pseudo = htmlspecialchars(trim($_POST["pseudo"]));
	$favoriteTeam = htmlspecialchars(trim($_POST["favoriteTeam"]));
	$favoriteTeamName = htmlspecialchars(trim($_POST["favoriteTeamName"]));

	$supporter = new Supporter($pseudo, $password, $favoriteTeam, $favoriteTeamName);
	$id = $supporter->inscription();

	if($id != -1) json_authentification($id, $pseudo, $password, $favoriteTeam, $favoriteTeamName, []);
	else json_authentification(-1, "", "", -1, "", []);
?>
