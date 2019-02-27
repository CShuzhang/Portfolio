<?php

class place{

	function __construct(){
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function requete(){
		$requete = "SELECT * FROM users";
		$search = $this->stock->query($requete);
		while($donnees = $search->fetch()){
			if($_GET['id'] == $donnees['id']){
				echo "<strong>".$donnees['first_name']." ".$donnees['last_name']."</strong><p>".$donnees['pseudo']."</p>";
				return;
			}
		}
	}
}


$place = new place();
$place->requete();

?>
