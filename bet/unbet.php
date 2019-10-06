<?php
	include(realpath('../objects/bet.php'));
	include(realpath('../objects/supporter.php'));

	$idBet = intval(htmlspecialchars($_POST["idBet"]));
	$supporter = new Supporter();
	$supporter->unbet($idBet);
?>
