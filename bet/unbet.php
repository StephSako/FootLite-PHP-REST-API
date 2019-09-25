<?php
	include(realpath('../rest.php'));
	include(realpath('../objects/bet.php'));
	include(realpath('../objects/supporter.php'));

	$idBet = intval(htmlspecialchars($_POST["idBet"]));
	$idSupporter = intval(htmlspecialchars($_POST["idSupporter"]));
	$supporter = new Supporter($idSupporter);

	json_message($supporter->unbet($idBet));
?>
