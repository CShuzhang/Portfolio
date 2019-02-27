<?php

class formulaire{

    function __construct($firstname, $lastname, $pseudo, $email, $pass, $id_theme, $birth_date){
        
        $this->birth_date = $birth_date;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->id_theme = $id_theme;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->pass = $pass;
        $user = 'phpmyadmin';
        $pass = '123456789';
        $this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
    }

    public function requete(){
        $requete = "INSERT INTO users (first_name, last_name, pseudo, email, pswrd, actif, id_theme, birth_date) VALUES ('".$this->firstname."', '".$this->lastname."', '@".$this->pseudo."', '".$this->email."', '".$this->pass."', 1, '".$this->id_theme."', '".$this->birth_date."')";
        $donnees = $this->stock->prepare($requete);
        $donnees->execute();
    }
}

class verification{

    public function things(){

        if(isset($_GET['lastname']) && isset($_GET['firstname']) && isset($_GET['pseudo']) && isset($_GET['birth']) && isset($_GET['birth']) && isset($_GET['email']) && isset($_GET['mdp']) && isset($_GET['id_theme']) && !empty($_GET['id_theme']) && !empty($_GET['lastname']) && !empty($_GET['firstname']) && !empty($_GET['pseudo']) && !empty($_GET['birth']) && !empty($_GET['birth']) && !empty($_GET['email']) && !empty($_GET['mdp']))
        {
            $verification = new verification();
            $verification->email();
        }
	}

    public function email(){

		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
		$requete_mail = "SELECT email FROM users WHERE email ='".$_GET['email']."'";
		$row = $this->stock->query($requete_mail);
		$count = $row->rowCount();

		if($count == 1){
			echo "<script>
			$('#email').css('border', '3px solid #ee332f');
			$('.email').append('<p>Ce mail est deja utiliser !</p>');
			$('.email p').css('color', '#ee332f');
			</script>";	
		}
		else{
			$verification = new verification();
			$verification->pseudo();
			return;
		}	
	}

    public function pseudo(){
        $user = 'phpmyadmin';
        $pass = '123456789';
        $this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
        $requete_pseudo = "SELECT pseudo FROM users WHERE pseudo ='".$_GET['pseudo']."'";
        $row = $this->stock->query($requete_pseudo);
        $count = $row->rowCount();

        if($count == 1){
            echo "<script>
            $('#pseudo').css('border', '3px solid #ee332f');
            $('.pseudo').append('<p>Ce mail est deja utiliser !</p>');
            $('.pseudo').css('color', '#ee332f');
            </script>"; 
        }
        else{
            $verification = new verification();
            $verification->password();
            return;
        }   
    }

    public function password(){
        $pass_hash = hash('ripemd160', $_GET['mdp']);
        $pass = crypt($pass_hash,'si tu aimes la wac tape dans tes mains');
        $verification = new verification();
        $verification->birth($pass);
    }

    public function birth($pass){
        $date = $_GET["birth"];
        $birthday = strtotime($date);

        if(time() - $birthday < 18 * 31536000){

            echo "<script>
            $('#birth').css('border', '3px solid #ee332f');
            $('.birth').append('<p>Vous etes trop jeune !</p>');
            $('.birth p').css('color', '#ee332f');
            </script>";
        }
        elseif(time() - $birthday > 140 * 31536000){
            echo "<script>
            $('#birth').css('border', '3px solid #ee332f');
            $('.birth').append('<p>Vous etes trop vieux !</p>');
            $('.birth p').css('color', '#ee332f');
            </script>";
        }
        else{
            $formulaire = new formulaire($_GET['firstname'], $_GET['lastname'], $_GET['pseudo'], $_GET['email'], $pass, $_GET['id_theme'], $_GET['birth']);
            $formulaire->requete();
            header ('Location: ../Connexion/connexion.php');
        }
    }
}


$verification = new verification();
$verification->things();
?>