<?php
        include(realpath('../objects/supporter.php'));
        include(realpath('../rest.php'));

        $idMatch = intval(htmlspecialchars($_POST["idMatch"]));
        $idWinner = intval(htmlspecialchars($_POST["idWinner"]));

        $supporter = new Supporter();
        $pourcent = $supporter->getPourcent($idMatch, $idWinner);
        json_pourcent($pourcent);
?>

