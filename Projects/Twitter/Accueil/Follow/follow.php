<?php
session_start();

class follows{

	function __construct($id){
		$this->id = $id;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function verifFollow(){
		$requete_verif = "SELECT * FROM follows WHERE id_follower='".$_SESSION['id']."' AND id_following='".$this->id."'";
		$row_iFollow = $this->stock->query($requete_verif);
		$count_iFollow = $row_iFollow->rowCount();
		if($count_iFollow == 1){
			$do = new follows($this->id);
			$do -> unfollow();
		}
		elseif ($count_iFollow == 0) {
			$do = new follows($this->id);
			$do -> follow();
		}
	}

	public function follow(){
		$requete_follow = "INSERT INTO follows (id_follower, id_following) VALUES('".$_SESSION['id']."', '".$this->id."')";
		$iFollow = $this->stock->prepare($requete_follow);
		$iFollow->execute();
		echo "follow";
	}

	public function unfollow(){
		$requete_delete = "DELETE FROM follows WHERE id_follower= '".$_SESSION['id']."' AND id_following='".$this->id."'";
		$delLike = $this->stock->prepare($requete_delete);
		$delLike->execute();
		echo "unfollow";
	}
}


$do = new follows($_POST['id']);
$do -> verifFollow();
?>