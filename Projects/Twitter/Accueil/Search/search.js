$( "#search" ).keyup(function( ) {

 	var text = $('#search').val();

		var request = $.ajax({
			
			url: 'Search/search.php',
			type: 'POST',
			data: { search : text},
		})

		request.done( function (data){
			$('.result').html(' ');
			$('.result').append(data);
		});
 	
});