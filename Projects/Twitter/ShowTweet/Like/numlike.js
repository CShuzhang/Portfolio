$(document).ready( function(){
	$('.iLike').click( function(){
		var stock = $(this);
		var request = $.ajax({		
			url: '../ShowTweet/Like/numlike.php',
			type: 'POST',
			data: { id : $(this).val()},
		})

		request.done( function (data){
			var search = stock.next();
			search.html(data);
			
		});
	});
});


