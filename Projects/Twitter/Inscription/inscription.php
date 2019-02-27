<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">  
	<link rel="stylesheet" type="text/css" href="inscription.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<title>Inscription</title>
</head>
<body>

<div class='container'>
	<div class="row">
    	<div class="col">Inscription</div>
	</div>

	<form metho=POST>
		<h5>MON PROFIL</h5>

		<div class='lastname'>
			<p>MON NOM :</p>
			<input type="text" name="lastname" required>
		</div>

		<div class='firstname'>
			<p>MON PRENOM :</p>
			<input type="text" name="firstname" required>
		</div>

		<div class='pseudo'>
			<p>TON PSEUDO</p>
			<input id='pseudo' type="text" name="pseudo" required>
		</div>

		<div class='birth'>
			<p>JE SUIS NE/NEE</p>
			<input id='birth' type="date" name="birth" required>
		</div>

		<div class='email'>
			<p>MON EMAIL</p>
			<input id='email' type="email" name="email" required>
		</div>

		<div class='mdp'>
			<p>MOT DE PASSE</p>
			<input type="password" name="mdp" required>
		</div>

		<div class='id_theme'>
			<p>THEME :</p>
			<select name='id_theme'>
				<option value="1">BLANC</option>
				<option value='2'>NOIR</option>
			</select>
		</div>

		<div class='valid'>
			<input id='press' type="submit" name="valid", value='ENVOYER'>
		</div>
	</form>
</div>

</body>
</html>

<?php
	include "inscriptionBack.php";
?>