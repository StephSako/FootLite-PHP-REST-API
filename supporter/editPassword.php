<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/supporter.php'));

	$password = htmlspecialchars(trim($_POST["password"]));
	$idSupporter = htmlspecialchars(trim($_POST["idSupporter"]));

	$supporter = new Supporter("", $password, "", $idSupporter, "");
	$id = $supporter->editPassword();
?>
