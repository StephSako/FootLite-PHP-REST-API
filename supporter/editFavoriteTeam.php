<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$favoriteTeam = htmlspecialchars(trim($_POST["favoriteTeam"]));
	$favoriteTeamName = htmlspecialchars(trim($_POST["favoriteTeamName"]));
	$idSupporter = htmlspecialchars(trim($_POST["idSupporter"]));

	$supporter = new Supporter("", "", $favoriteTeam, $idSupporter, $favoriteTeamName);
	$id = $supporter->editFavoriteTeam();
?>
