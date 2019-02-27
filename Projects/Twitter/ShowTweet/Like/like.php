<?php
session_start();

class requete{

	function __construct($id){
		$this->id = $id;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function verifLike(){
		$requete = "SELECT * FROM likes WHERE id_user = '".$_SESSION['id']."' AND id_tweet= '".$this->id."'";
		$row_iLike = $this->stock->query($requete);
		$count_iLike = $row_iLike->rowCount();
		if($count_iLike == 1){
			$num = new requete($_POST['id']);
			$num -> delLike();
		}
		elseif($count_iLike == 0){
			$num = new requete($_POST['id']);
			$num -> addLike();
		}
	}

	public function addLike(){
		$requete_like = "INSERT INTO likes (id_user, id_tweet) VALUES('".$_SESSION['id']."', '".$this->id."')";
		$iLike = $this->stock->prepare($requete_like);
		$iLike->execute();
		return;
	}

	public function delLike(){
		$requete_delete = "DELETE FROM likes WHERE id_user= '".$_SESSION['id']."' AND id_tweet='".$this->id."'";
		$delLike = $this->stock->prepare($requete_delete);
		$delLike->execute();
		return;
	}
}

$num = new requete($_POST['id']);
$num -> verifLike();

?>