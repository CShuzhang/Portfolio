<?php

class show{

	function __construct($tweet){
		$this->tweet = $tweet;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function requete(){
		$requete = "SELECT first_name, last_name, pseudo, tweets.id, tweets.text FROM tweets LEFT JOIN hashtags ON tweets.id = hashtags.id_tweet LEFT JOIN users ON tweets.id_poster = users.id WHERE hashtags.text = '#".$this->tweet."' ORDER BY tweets.id DESC";
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
			  $do = new show($this->tweet);
			  $do -> retweet($info['id']);
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
		$show = new show($this->tweet);
		$show -> like($id);
	}

	public function like($id){
		$requete_like = "SELECT id_tweet FROM likes WHERE id_tweet='".$id."'";
		$row = $this->stock->query($requete_like);
		$count = $row->rowCount($this->tweet);
		echo '<div class="like"><button type="submit" class="iLike" name="iLiked" value="'.$id.'"><i class="far fa-heart"></i></button><span class="nbLike">'.$count.'</span></div>
		</div>
		    </div>
		</div>';
	}

}

$do = new show($_GET['text']);
$do -> requete();


?>