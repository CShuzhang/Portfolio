<?php

session_start();

class abonnement{

	function __construct(){
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function something(){
		$requete = "SELECT id_following from follows WHERE id_follower = '".$_SESSION['id']."'";
		$row = $this->stock->query($requete);
		$count = $row->rowCount();
		echo $count;
	}

}

$abonnement = new abonnement();
$abonnement -> something();

?>