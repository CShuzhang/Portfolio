<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Coiny" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="connexion.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<title>Twitter</title>
</head>
<body>

<div class="container">
	<div class="row">
    	<div class="col">Twitter</div>
	</div>
 	
 	<div class='row'>
		<div class='connexion col'>Connexion<p>
		Utilisez le compte email: cshu@outlook.fr mdp:shushu</p><p>La prochaine interface sera belle promis, connectez vous !</div>
		<div class='formu'>
			<form method="POST">
				<p>Email:</p>
				<input type="email" name="connect_email">
				<p>Mot de passe:</p>
				<input type="password" name="connect_pass">
				<input id='sub' type="submit" name="valid_connect" value='ENVOYER'>
			</form>
			<a id='account' href="../Inscription/inscription.php">Pas de compte ?</a>
		</div>
	</div>
</div>

</body>
</html>

<?php
	include 'connexionBack.php';
?>
