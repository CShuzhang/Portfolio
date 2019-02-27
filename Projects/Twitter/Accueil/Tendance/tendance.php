<?php

class classementTendance{

	function __construct(){
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);

	}

	public function tendance(){
		$requete_tendance = "SELECT text, count(id_tweet) AS nb FROM hashtags GROUP BY text ORDER BY nb DESC LIMIT 10";
		$donnees_tendance = $this->stock->query($requete_tendance);
		while($info = $donnees_tendance->fetch()){
			$hstags = substr($info['text'], 1, strlen($info['text']));
			echo "<div class='classTendance'><a href='../ClickTweet/clicktweet.php?text=".$hstags."&id=".$_GET['id']."'><strong>".$info['text']."</strong></a> ".$info['nb']." tweets</div>";
		}
	}
}

$tendance = new classementTendance();
$tendance -> tendance();

?>