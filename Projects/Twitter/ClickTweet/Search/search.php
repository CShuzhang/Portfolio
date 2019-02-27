<?php

session_start();

class search{

	function __construct($text){
		$this->text = $text;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function path(){
		$word = substr($this->text, 0, 1);

		if($word == "@"){
			$do = new search($this->text);
			$do -> ats();
		}
		elseif ($word == "#") {
			$do = new search($this->text);
			$do -> hashtags();
		}
		elseif($word == NULL){
			return;
		}
		else{
			$do = new search($this->text);
			$do -> name();
		}
	}

	public function ats(){
		$requete_one = "SELECT pseudo FROM users WHERE pseudo LIKE '".$this->text."%' LIMIT 5";
		$donnees_one = $this->stock->query($requete_one);
		$count_one = $donnees_one->rowCount();
		if($count_one > 0){
			while ($info = $donnees_one->fetch()){
				echo '<li class="nav-item">
   						 <a class="nav-link" href="#">'.$info["pseudo"].'</a>
  						</li>';
			}
		}
	}

	public function hashtags(){
		$requete_two = "SELECT text, count(id_tweet) FROM hashtags WHERE text LIKE '".$this->text."%' GROUP BY text LIMIT 5";
		$donnees_two = $this->stock->query($requete_two);
		$count_two = $donnees_two->rowCount();
		if($count_two > 0){
			while ($info = $donnees_two->fetch()){
				 $hstags = substr($info['text'], 1, strlen($info['text']));
				 echo '<li class="nav-item">
   						 <a class="nav-link" href="clicktweet.php?text='.$hstags.'&id='.$_SESSION['id'].'">'.$info["text"].'</a>
  						</li>';
				
			}
		}
	}

	public function name(){
		$requete_three = "SELECT first_name, id FROM users WHERE first_name LIKE '".$this->text."%' LIMIT 5";
		$donnees_three = $this->stock->query($requete_three);
		$count_three = $donnees_three->rowCount();
		if($count_three > 0){
			while ($info = $donnees_three->fetch()){
				echo '<li class="nav-item">
   						 <a class="nav-link" href="../OtherProfil/otherProfil.php?id='.$info["id"].'">'.$info["first_name"].'</a>
  						</li>';
			}
		}
	}

}

$do = new search($_POST['search']);
$do -> path();

?>