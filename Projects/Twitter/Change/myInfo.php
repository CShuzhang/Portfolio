<?php

class myInfo{

	function __construct(){
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function requete(){
		$requete = "SELECT * FROM users";
		$search = $this->stock->query($requete);
		while ($donnees = $search->fetch()){
			if($_SESSION['id'] == $donnees['id']){
				echo "<div class='name'>";
				echo "<p>".$donnees['first_name']."</p><p>".$donnees['last_name']."</p><p>".$donnees['pseudo']."</p><p>".$donnees['birth_date']."</p><p>".$donnees['email']."</p>";	
				echo "<div class='pass'><i class='fas fa-circle'></i><i class='fas fa-circle'></i><i class='fas fa-circle'></i><i class='fas fa-circle'></i><i class='fas fa-circle'></i><i class='fas fa-circle'></i></div>";
				echo "</div>";
			}
		} 
	}

}


$place = new myInfo();
$place->requete();

?>