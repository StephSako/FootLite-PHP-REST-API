<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$password = htmlspecialchars(trim($_POST["password"]));
	$pseudo = htmlspecialchars(trim($_POST["pseudo"]));
	$favoriteTeam = htmlspecialchars(trim($_POST["favoriteTeam"]));

	$supporter = new Supporter($pseudo, $password, $favoriteTeam);
	$id = $supporter->inscription();

	if($id != -1) json_authentification($id, $pseudo, $password, $favoriteTeam, []);
	else json_authentification(-1, "", "", -1, []);
?>
