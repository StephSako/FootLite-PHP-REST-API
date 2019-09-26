<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$idSupporter = htmlspecialchars(trim($_POST["idSupporter"]));
	$password = htmlspecialchars(trim($_POST["password"]));
	$favoriteTeam = htmlspecialchars(trim($_POST["favoriteTeam"]));
	$pseudo = htmlspecialchars(trim($_POST["pseudo"]));

	if($pseudo != null && $password != null && $favoriteTeam != null && $idSupporter != null){
		$supporter = new Supporter($pseudo, $password, $favoriteTeam, $idSupporter);
		$id = $supporter->update();

		if ($id == 1) json_sign_in_up($id, "Profil mis à jour.", true);
		else json_sign_in_up($id, "Vous n'êtes pas inscrit.", false);
	}
	else json_sign_in_up($id, "Les informations sont incomplètes.", false);
?>
