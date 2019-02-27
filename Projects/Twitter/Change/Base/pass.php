<?php
session_start();

class modification{

	function __construct($pass){
		$this->pass = $pass;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function verif(){
		if(isset($this->pass) && !empty($this->pass)){
			$modif = new modification($this->pass);
			$modif -> pass();
		}
	}

	public function pass(){
		$pass_hash = hash('ripemd160', $this->pass);
        echo $pass = crypt($pass_hash,'si tu aimes la wac tape dans tes mains');
		$requete = "UPDATE users SET pswrd='".$pass."' WHERE id='".$_SESSION['id']."'";
		$donnees = $this->stock->prepare($requete);
		$donnees->execute();
		session_destroy();
		header ('Location: ../../Connexion/connexion.php');
	}
}

$modif = new modification($_GET['pass_modified']);
$modif ->verif();

?>