<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="change.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<title>OnePage</title>
</head>
<body>

<header>
	<div class='fixed-top'>
		<div class='container'>
			<ul class="nav justify-content-center">
				<li class="nav-item">
					<a class="nav-link" href="../BackToMyProfil/backToAccueil.php"><i class="fas fa-home"></i></a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link" href="#"><i class="fas fa-envelope"></i></a>
			  	</li>
			  	<li class="nav-item">
			    	<a id='twitterLogo'class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
			  	</li>
			  	<nav class="navbar navbar-light">
				  <form class="form-inline">
				    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
				    <button type="submit"><i class="fas fa-search"></i></button>
				  </form>
				</nav>
				<li id="dropdown" class="nav-item dropdown">
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          			My
        			</a>
       				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
         				<a class="dropdown-item" href="../BackToMyProfil/backToMyProfil.php">Profil</a>
          				<a class="dropdown-item" href="../Deconnexion/logout.php">Deconnexion</a>
         		 	<div class="dropdown-divider"></div>
          				<a class="dropdown-item" href="#">Mode nuit</a>
        			</div>
      			</li>
				<li class="nav-item">
			    	<button id='tweet' type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Tweeter</button>
			  	</li>
			</ul>
		</div>
	</div>
</header>

<div class='box'>
	<div class='container d-flex justify-content-center'>
		<div class='my_profil'>
			<div class='name_info'>
				<p>Nom: </p>
				<p>Prenom: </p>
				<p>Pseudo: </p>
				<p>Date: </p>
				<p>Email: </p>
				<p>Mot de passe: </p>
			</div>
			<?php
				include "myInfo.php";
			?>
			<div class='edit'>
				<p><i id='modif_name'class="fas fa-pen"></i></p>
				<p><i id='modif_lastname' class="fas fa-pen"></i></p>
				<p><i id='modif_pseudo' class="fas fa-pen"></i></p>
				<p><i id='modif_birth' class="fas fa-pen"></i></p>
				<p><i id='modif_mail' class="fas fa-pen"></i></p>
				<p><i id='modif_pass' class="fas fa-pen"></i></p>
			</div>
		</div>
	</div>
</div>


<script src="change.js"></script>

</body>
</html>
