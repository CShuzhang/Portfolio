<?php
session_start();

class requete{

	function __construct($id){
		$this->id = $id;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function verifRetweet(){
		$requete = "SELECT * FROM retweet WHERE id_user = '".$_SESSION['id']."' AND id_tweet= '".$this->id."'";
		$row_iRewteet = $this->stock->query($requete);
		$count_iRetweet = $row_iRewteet->rowCount();
		if($count_iRetweet == 1){
			$num = new requete($_POST['id']);
			$num -> delRetweet();
		}
		elseif($count_iRetweet == 0){
			$num = new requete($_POST['id']);
			$num -> addRetweet();
		}
	}

	public function addRetweet(){
		$requete_retweet = "INSERT INTO retweet (id_user, id_tweet) VALUES('".$_SESSION['id']."', '".$this->id."')";
		$iRetweet = $this->stock->prepare($requete_retweet);
		$iRetweet->execute();
		$num = new requete($this->id);
		$num -> countRetweet();
	}

	public function delRetweet(){
		$requete_delete = "DELETE FROM retweet WHERE id_user= '".$_SESSION['id']."' AND id_tweet='".$this->id."'";
		$delRetweet = $this->stock->prepare($requete_delete);
		$delRetweet->execute();
		$num = new requete($this->id);
		$num -> countRetweet();
	}

	public function countRetweet(){
		$requete_nbRetweet = "SELECT id_tweet FROM retweet WHERE id_tweet='".$this->id."'";
		$row = $this->stock->query($requete_nbRetweet);
		$count = $row->rowCount();
		echo $count;
	}
}

$num = new requete($_POST['id']);
$num -> verifRetweet();

?>