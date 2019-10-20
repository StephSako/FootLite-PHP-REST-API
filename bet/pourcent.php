<?php
        include(realpath('../objects/supporter.php'));
        include(realpath('../rest.php'));

        $idMatch = intval(htmlspecialchars($_POST["idMatch"]));
        $idHome = intval(htmlspecialchars($_POST["idHome"]));
	$idAway = intval(htmlspecialchars($_POST["idAway"]));

        $supporter = new Supporter();
        $pourcentHome = floatval($supporter->getPourcent($idMatch, $idHome));
	$pourcentAway = floatval($supporter->getPourcent($idMatch, $idAway));
	json_pourcent($pourcentHome, $pourcentAway);
?>

