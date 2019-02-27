$( "#message-text" ).keyup(function( ) {

 	var count = $('#message-text').val().length;
 	$('.count').html('');
 	$('.count').append(count+"/140");
 	if(count <= 100){
		$('.count').css('color', 'black');
 	}
 	if(count > 100 && count < 140){
 		$('.count').css('color', 'orange');
 	}
 	else if(count == 140){
 		$('.count').css('color', 'red');
 	}
});