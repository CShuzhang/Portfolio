<?php
	session_start();
	header("Location: ../Profil/profil.php?id=".$_SESSION['id']);
?>