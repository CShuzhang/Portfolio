<?php
session_start();

class modification{

	function __construct($name){
		$this->name = $name;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function verif(){
		if(isset($this->name) && !empty($this->name)){
			$modif = new modification($this->name);
			$modif -> name();
		}
	}

	public function name(){
		echo $requete = "UPDATE users SET first_name='".$this->name."' WHERE id='".$_SESSION['id']."'";
		$donnees = $this->stock->prepare($requete);
		$donnees->execute();
		header("Location: ../../Change/change.php");
	}


}

$modif = new modification($_GET['name_modified']);
$modif ->verif();

?>