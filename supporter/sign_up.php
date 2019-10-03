<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$password = htmlspecialchars(trim($_POST["password"]));
	$pseudo = htmlspecialchars(trim($_POST["pseudo"]));
	$favoriteTeam = htmlspecialchars(trim($_POST["favoriteTeam"]));

	if($password != null && $pseudo != null && $favoriteTeam != null){
		$supporter = new Supporter($pseudo, $password, $favoriteTeam);
		$id = $supporter->inscription();

		if($id != -1) json_sign_up($id, $pseudo, $password, $favoriteTeam);
		else json_sign_up(-1, "", "", ,"");
	}
	else json_sign_up(-1, "", "", "");
?>
