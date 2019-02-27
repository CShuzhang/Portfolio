$(document).ready( function(){
	$('.iLike').click( function(){
		var request = $.ajax({		
			url: '../ShowTweet/Like/like.php',
			type: 'POST',
			data: { id : $(this).val()},
		})

		request.done( function (data){
			console.log('okay');
		});
	});
});
