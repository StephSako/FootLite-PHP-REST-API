<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$password = htmlspecialchars(trim($_POST["password"]));
	$pseudo = htmlspecialchars(trim($_POST["pseudo"]));
	$favoriteTeam = htmlspecialchars(trim($_POST["favoriteTeam"]));

	$supporter = new Supporter($pseudo, $password, $favoriteTeam);

	if($password != null && $pseudo != null && $favoriteTeam != null){
		$id = $supporter->inscription();

		if($id != -1) json_sign_in_up($id, "Vous êtes inscrit.", true);
		else json_sign_in_up(-1, "Vous êtes déjà inscrit.", false);
	}
	else json_sign_in_up(-1, "Les informations sont incomplètes.", false);
?>
