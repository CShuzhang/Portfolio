<?php
session_start();

class write{

	function __construct($text){
		$this->text = $text;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function something(){
		$requete = 'INSERT INTO tweets (id_poster, text, id_img) VALUES ("'.$_SESSION['id'].'", "'.$this->text.'",0)';	
		$donnees = $this->stock->prepare($requete);	
		$donnees->execute();
		$write = new write($this->text);
		$write -> hashtags();
	}

	public function hashtags(){
		$requete_show = "SELECT id FROM tweets WHERE id_poster='".$_SESSION['id']."' ORDER BY id DESC LIMIT 1";
		$donnees_show = $this->stock->query($requete_show);
			
		while($info_show = $donnees_show->fetch()){
			$words = explode(" ", $this->text);
			foreach ($words as $value) {
				if(preg_match('/#/', $value)){
					$requete_hashtag = "INSERT INTO hashtags (text, id_tweet) VALUES ('".$value."', '".$info_show['id']."')";
					$donnees_hashtag = $this->stock->prepare($requete_hashtag);
					$donnees_hashtag->execute();
					header("Location: ../../BackToMyProfil/backToMyProfil.php");
				}
				else{
					header("Location: ../../BackToMyProfil/backToMyProfil.php");
				}
			}
		}
	} 
}


if(isset($_POST['textarea']) && !empty($_POST['textarea'])){
	$write = new write($_POST['textarea']);
	$write -> something();
}

?>