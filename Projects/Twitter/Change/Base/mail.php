<?php
session_start();

class modification{

	function __construct($email){
		$this->email = $email;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function verif(){
		if(isset($this->email) && !empty($this->email)){
			$modif = new modification($this->email);
			$modif -> email();
		}
	}

	public function email(){
		$requete_mail = "SELECT email FROM users WHERE email ='".$this->email."'";
		$row = $this->stock->query($requete_mail);
		$count = $row->rowCount();

		if($count == 1){
			echo "<script>alert('Email deja pris !');
        				window.location.replace('../change.php');</script>;";	
		}
		else{
			$requete = "UPDATE users SET email='".$this->email."' WHERE id='".$_SESSION['id']."'";
			$donnees = $this->stock->prepare($requete);
			$donnees->execute();
			header ('Location: ../../Connexion/connexion.php');
		}
	}


}

$modif = new modification($_GET['email_modified']);
$modif ->verif();

?>