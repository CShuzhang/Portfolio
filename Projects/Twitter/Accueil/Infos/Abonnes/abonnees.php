<?php

class abonnees{

	function __construct(){
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function something(){
		$requete = "SELECT id_follower from follows WHERE id_following = '".$_GET['id']."'";
		$row = $this->stock->query($requete);
		$count = $row->rowCount();
		echo "<p>".$count."</p>";
	}

}

$abonnees = new abonnees();
$abonnees -> something();

?>