<?php
session_start();

class modification{

	function __construct($birth){
		$this->birth = $birth;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function verif(){
		if(isset($this->birth) && !empty($this->birth)){
			$modif = new modification($this->birth);
			$modif -> birth();
		}
	}

	public function birth(){
        $birthday = strtotime($this->birth);

        if(time() - $birthday < 18 * 31536000){
            echo "<script>alert('Vous etes trop jeune !');window.location.replace('../change.php');</script>";
        }
        elseif(time() - $birthday > 140 * 31536000){
            echo "<script>alert('Vous etes trop vieux !');window.location.replace('../change.php'); </script>";
        }
        else{
	       	echo $requete = "UPDATE users SET birth_date='".$this->birth."' WHERE id='".$_SESSION['id']."'";
			$donnees = $this->stock->prepare($requete);
			$donnees->execute();
			header("Location: ../../Change/change.php");
        }
	}
}

$modif = new modification($_GET['birth_modified']);
$modif ->verif();

?>