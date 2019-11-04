<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$pseudo = htmlspecialchars(trim($_POST["pseudo"]));
	$favoriteTeam = htmlspecialchars(trim($_POST["favoriteTeam"]));
	$favoriteTeamName = htmlspecialchars(trim($_POST["favoriteTeamName"]));
	$idSupporter = htmlspecialchars(trim($_POST["idSupporter"]));

	$supporter = new Supporter($pseudo, "", $favoriteTeam, $idSupporter, $favoriteTeamName);
	$id = $supporter->editAccount();
?>
