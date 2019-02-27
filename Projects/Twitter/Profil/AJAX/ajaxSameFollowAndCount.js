$(document).ready( function(){
	$('.follow').click( function(){
		var click = $(this);
		var request = $.ajax({		
			url: '../Accueil/Follow/follow.php',
			type: 'POST',
			data: { id : $(this).val()},
		})

		request.done( function (data){
			if(data == "follow"){
				$(click).html('<a href="#">Ne pas suivre</a>');
			} 
			else{
				$(click).html('<a href="#">Suivre</a>');
			}
		});

		var myAboCount = $.ajax({
			url: '../Accueil/Infos/Abonnements/script_abonnement.php',
			type: "POST",
		})

		myAboCount.done( function(data){
			$('#myCountAbo').html(data);
		});
	});

	$('.unfollow').click( function(){
		var click = $(this);
		var request = $.ajax({		
			url: '../Accueil/Follow/follow.php',
			type: 'POST',
			data: { id : $(this).val()},
		})

		request.done( function (data){
			if(data == "follow"){
				$(click).html('<a href="#">Ne pas suivre</a>');
			} 
			else{
				$(click).html('<a href="#">Suivre</a>');
			}
		});

		var myAboCount = $.ajax({
			url: '../Accueil/Infos/Abonnements/script_abonnement.php',
			type: "POST",
		})

		myAboCount.done( function(data){
			$('#myCountAbo').html(data);
		});
	});
});
