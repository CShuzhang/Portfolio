<?php
	session_start();
	header("Location: ../Accueil/onePage.php?id=".$_SESSION['id']);
?>