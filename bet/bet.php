<?php
	include(realpath('../objects/bet.php'));
	include(realpath('../objects/supporter.php'));
	include(realpath('../rest.php'));

	$idSupporter = intval(htmlspecialchars($_POST["idSupporter"]));
	$idWinner = intval(htmlspecialchars($_POST["idWinner"]));
	$idMatch = intval(htmlspecialchars($_POST["idMatch"]));

	$bet = new Bet($idMatch, $idSupporter, $idWinner);
	$supporter = new Supporter($idSupporter);
	$tab_bets = $supporter->bet($bet);
	json_bet($tab_bets["tab_bets"]);
?>
