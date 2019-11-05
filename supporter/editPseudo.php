<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$pseudo = htmlspecialchars(trim($_POST["pseudo"]));
	$idSupporter = htmlspecialchars(trim($_POST["idSupporter"]));

	$supporter = new Supporter($pseudo, "", 0, $idSupporter, 0);
	$id = $supporter->editPseudo();
?>
