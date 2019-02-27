<?php

class tweets{

	function __construct(){
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function something(){
		$requete = "SELECT text from tweets WHERE id_poster = '".$_GET['id']."'";
		$row = $this->stock->query($requete);
		$count = $row->rowCount();
		echo "<p>".$count."</p>";
	}

}

$tweets = new tweets();
$tweets -> something();

?>