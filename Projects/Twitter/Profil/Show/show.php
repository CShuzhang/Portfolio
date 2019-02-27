<?php

class show{

	function __construct(){
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function abonnement(){
		$requete = "SELECT text, first_name, last_name, pseudo, tweets.id FROM users LEFT JOIN tweets ON users.id = tweets.id_poster WHERE users.id =".$_SESSION['id']." ORDER BY tweets.id DESC";
		$donnees = $this->stock->query($requete);
		while($info = $donnees->fetch()){
			echo '<div id="shadow" class="card text">
			  <div class="card-header"><strong>'
			  .$info['last_name']." ".$info['first_name']."</strong> ".$info['pseudo'].
			  '</div>
			  <div class="card-body">
			    <p class="card-text">'.$info['text'].'</p>
			    <input id="id_tweet" type="hidden" value="'.$info['id'].'">
			  </div>';
			$show = new show();
			$show -> retweet($info['id']);
		}
	} 

	public function retweet($id){
		$requete_retweet = "SELECT id_tweet FROM retweet WHERE id_tweet='".$id."'";
		$row_retweet = $this->stock->query($requete_retweet);
		$countRetweet = $row_retweet->rowCount();
		echo '<div id="likeBar" class="card-footer text-muted">
		<div class="numBar">
		<div class="commentaire">
		    <i class="far fa-comment"></i></div><div class="retweet"><button type="submit" class="iRetweet" name="iRetweeted" value="'.$id.'"><i class="fas fa-retweet"></i></button><span class="nbRetweet">'.$countRetweet.'</span></div>';
		$show = new show();
		$show -> like($id);
	}

	public function like($id){
		$requete_like = "SELECT id_tweet FROM likes WHERE id_tweet='".$id."'";
		$row = $this->stock->query($requete_like);
		$count = $row->rowCount();
		echo '<div class="like"><button type="submit" class="iLike" name="iLiked" value="'.$id.'"><i class="far fa-heart"></i></button><span class="nbLike">'.$count.'</span></div>
		</div>
		    </div>
		</div>';
	}

}

$show = new show();
$show -> abonnement();


?>
