<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$pseudo = htmlspecialchars(trim($_POST["pseudo"]));
	$password = htmlspecialchars(trim($_POST["password"]));

	if($pseudo != null && $password != null){
		$supporter = new Supporter($pseudo, $password);
		$id = $supporter->connexion();

		if ($id != null) json_sign_in_up($id, "Vous êtes connecté.", true);
		else json_sign_in_up(-1, "Vous n'êtes pas inscrit.", false);
	}
	else json_sign_in_up(-1, "Les informations sont incomplètes.", false);
?>
