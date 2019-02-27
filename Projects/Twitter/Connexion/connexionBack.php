<?php
class connect{

	function __construct($email, $password){
		$this->password = $password;
		$this->email = $email;
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);

	}

	public function requete(){
		$requete = "SELECT email, pswrd, id FROM users";
		$search = $this->stock->query($requete);
		while($donnees = $search->fetch()){
			if($this->email == $donnees['email']) {
				$pass_hash = hash('ripemd160', $this->password);
        		$pass = crypt($pass_hash,'si tu aimes la wac tape dans tes mains');
        		if($pass == $donnees['pswrd']){
        			session_start();
        			$_SESSION['email'] = $donnees['email'];
        			$_SESSION['id'] = $donnees['id'];
        			 header ('Location: ../Accueil/onePage.php?id='.$_SESSION['id']);
        		}
        		else{
        			echo '<script>$(".formu").append("<div class=co_error>Mot de passe ou email incorrect !</div>");</script>';
        			exit;
        		}
			}	
		} 
	}
}

class verif{

	public function verif(){
		if(isset($_POST["connect_email"]) && !empty($_POST["connect_email"]) && isset($_POST["connect_pass"]) && !empty($_POST["connect_pass"])){
			$connect = new connect($_POST['connect_email'], $_POST['connect_pass']);
			$connect->requete();
		}
	}
}

$verif = new verif();
$verif->verif();

?>