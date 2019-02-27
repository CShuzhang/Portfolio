<?php

class showMyAbonnement{

	function __construct(){
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function name(){
		$requete = "SELECT id_following, last_name, first_name, pseudo from follows LEFT JOIN users ON follows.id_following = users.id WHERE id_follower = '".$_GET['id']."'";
		$donnees = $this->stock->query($requete);
		while ($info = $donnees->fetch()) {
			echo '<div class="card" style="width: auto;">
		 		<div class="card-body"><strong>'.
		   			$info['last_name'].' '.$info['first_name'].'</strong> '.$info['pseudo'].';
		  		</div>
			</div>'	;			
		}
	}

}

$showMyAbonnement = new showMyAbonnement();
$showMyAbonnement -> name();

?>