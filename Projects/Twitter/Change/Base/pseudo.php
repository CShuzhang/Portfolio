<?php
session_start();

class modification{

	function __construct($name){
		$this->name = $name;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function verification(){ 
		if(isset($this->name) && !empty($this->name)){
			$modif = new modification($this->name);
			$modif -> pseudo();
		}
	}

	 public function pseudo(){
        $user = 'phpmyadmin';
        $pass = '123456789';
        $this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
        $requete_pseudo = "SELECT pseudo FROM users WHERE pseudo ='@".$this->name."'";
        $row = $this->stock->query($requete_pseudo);
        $count = $row->rowCount();

        if($count == 1){
        	echo "<script>alert('Nom deja utilise');
        				window.location.replace('../../Change/change.php');</script>;";
        }
        else{
            $modif = new modification($this->name);
            $modif->name();
        }   
    }

	public function name(){
		echo $requete = "UPDATE users SET pseudo='@".$this->name."' WHERE id='".$_SESSION['id']."'";
		$donnees = $this->stock->prepare($requete);
		$donnees->execute();
		header("Location: ../../Change/change.php");
	}


}

$modif = new modification($_GET['pseudo_modified']);
$modif ->verification();

?>