<?php

class numLike{

	function __construct($id_tweet){
		$this->id_tweet = $id_tweet;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function countLike(){
		$requete_like = "SELECT id_tweet FROM likes WHERE id_tweet='".$this->id_tweet."'";
		$row = $this->stock->query($requete_like);
		$count = $row->rowCount();
		echo $count;
	}
}


$num = new numLike($_POST['id']);
$num -> countLike();
?>