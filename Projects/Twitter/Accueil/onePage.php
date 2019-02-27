<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="onePage.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
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
			  		<ul id=test class="nav flex-column">
					  <li class="nav-item">
					   <form class="form-inline">
				    	<input  autocomplete="off" class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" id='search'>
					  </li>
					  <div class='result'>
					  </div>  
					</ul>
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
<div class='container'>
	<div class='row'>
		<div class='col-5'>
			<div class="card" style="width: 18rem;">
		 		<div class="card-body">
		    		<?php
						include 'onePageBack.php';
					?>
					<div class='infos'>
						<div class='infoTweet'>
							Tweets
							<?php
								include "Infos/tweets.php";
							?>
						</div>
						<div class='infoAbonnement'>

							<button id='showAbonnement'type="button" data-toggle="modal" data-target="#exampleModalLong">
							  Abonnements
							</button>
							<?php
								include "Infos/Abonnements/abonnements.php";
							?>

						</div>
						<div class='infoAbo'>
							<button id='showAbonnes'type="button" data-toggle="modal" data-target="#exampleModalLongAbo">
							  Abonnes
							</button>
							<?php
								include "Infos/Abonnes/abonnees.php";
							?>
						</div>
					</div>
		  		</div>
			</div>

			<div class="card" style="width: 18rem;">
		 		<div class="card-body">
		   			<div class='suggestion'>
		   				<strong>Suggestion</strong>
		   			</div>
		   			<?php
		   				include 'Suggestion/suggestion.php';
		   			?>
		  		</div>
			</div>		

			<div class="card" style="width: 18rem;">
		 		<div class="card-body">
		   			<div class='tendance'>
		   				<strong>Tendances pours vous</strong>
		   			</div>
		   			<?php
		   				include "Tendance/tendance.php";
		   			?>
		  		</div>
			</div>	

			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Mes Abonnements</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      <?php
			      	include 'Infos/Abonnements/showNameAbonnement.php';
			      ?>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

			<div class="modal fade" id="exampleModalLongAbo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Mes Abonnes</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      <?php
			       		include 'Infos/Abonnes/showNameAbonnes.php';
			      ?>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

		</div>
		
		<div class='col-7'>	
			<?php
				include '../ShowTweet/Show/show.php';
			?>
		</div>
	</div>
</div>
     
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ecrire un nouveau Tweet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       	<form method="POST" action="WriteTweet/tweetText.php">
     		<div class="modal-body">
      			<div class="form-group">
            		<textarea maxlength='140' name='textarea'class="form-control" id="message-text"></textarea>
         		</div>
         		<div class='count'>
         			0/140
         		</div>
         		<script src="WriteTweet/maxLengthTweet.js"></script>
      		</div>
    		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        		<button type="submit" class="btn btn-primary">Tweeter</button>
      		</div>
     	</form>
    </div>
</div>

<script src="../ShowTweet/Like/like.js"></script>
<script src="../ShowTweet/Like/numlike.js"></script>

<script src="Follow/followAjax.js"></script>

//<script src="../ShowTweet/Retweet/retweet.js"></script>

<script src="Search/search.js"></script>

</body>
</html>