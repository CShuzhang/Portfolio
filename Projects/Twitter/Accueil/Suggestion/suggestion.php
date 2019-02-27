<?php

class sugg{

	function __construct(){
		$user = 'phpmyadmin';
		$pass = '123456789';
		$this->stock = new PDO('mysql:host=localhost;dbname=twittous;charset=utf8', $user,$pass);
	}

	public function show(){
		$nb = 0;
		$array = array();
		$requete = "SELECT last_name, first_name, pseudo, id FROM users WHERE id != '".$_SESSION['id']."' ORDER BY RAND() LIMIT 6 ";
		$donnees = $this->stock->query($requete);
		while($info = $donnees->fetch()){
			$count = strlen($info['pseudo']);
			if($count > 7){
				$name = substr($info['pseudo'], 0, 9)."...";
			}
			else{
				$name = $info['pseudo'];
			}
			echo "<div class='all_sugg'><a href='../OtherProfil/otherProfil.php?id=".$info['id']."'><strong>".$info['last_name']." ".$info['first_name']."</strong></a><span> ".$name."</span></div>";
			array_push($array, $info['id']);

			for ($i= $nb; $i < 7; $i++) { 
				if(isset($array[$i])){
					$requete_follow = "SELECT * FROM follows WHERE id_follower='".$_SESSION['id']."' AND id_following= '".$array[$i]."'";
					$row = $this->stock->query($requete_follow);
					$count = $row->rowCount();

					if($count == 0){
						echo "<button type='submit' class='follow' value='".$array[$i]."'><a href='#'>Suivre</a></button>";
							}		
					elseif($count == 1){
						echo "<button type='submit' class='unfollow'value='".$array[$i]."'><a href='#'>Ne plus suivre</a></button>";
					}
				}		
			}
			$nb += 1;
		}
	}
}

$sugg = new sugg();
$sugg -> show();

?>