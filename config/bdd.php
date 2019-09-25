<?php

	$username = "stephsako";
	$password = "jesuis95etgta#";

	try {
	    $co = new PDO('mysql:host=mysql-stephsako.alwaysdata.net;dbname=stephsako_footlite', $username, $password);
	} catch (PDOException $e) {
	    die("ERROR DATABASE");
	}
?>
