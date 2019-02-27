$.fn.game = function(options){
	var settings = $.extend({
		col: 7,
		lg: 6,
	}, options);

	for (var i = 0; i < settings.col; i++) {
		$('.game').append("<div class='col'></div>");
		for (var l = 0; l < settings.lg; l++) {
			$('<div class="bubble"></div>').appendTo($(".col")[i])
			.attr('col', i)
			.attr('lg', l);
		}
	}

	let player = 'red';
	let n = $(this)[0].children[0].children.length;

	$('.col').click( function(){
		var that = $(this);

		function diagonalRight(cell){
			const col = parseInt(cell.getAttribute('col'));
			const lg = parseInt(cell.getAttribute('lg'));

			const startPlayer = $(cell).data('player');
			let count = 0;

			for (x = col - 3, y = lg + 3; x < settings.col, y < settings.lg, y < lg + 4, x <= col + 3; x++, y--){
				const currentCell = $(`.bubble[col=${x}][lg=${y}]`);
				const currentPlayer = $(currentCell).data('player');

				if (startPlayer === currentPlayer) {
					count++;
				} else {
					count = 0;
				}

				if (count === 4) {
					return startPlayer;
				}
			}
		}

		function diagonalLeft(cell){
			const col = parseInt(cell.getAttribute('col'));
			const lg = parseInt(cell.getAttribute('lg'));

			const startPlayer = $(cell).data('player');
			let count = 0;

			for (x = col + 3, y = lg + 3;  x < settings.col, y > settings.lg, y > lg - 4, x >= col - 3; x--, y--){
				const currentCell = $(`.bubble[col=${x}][lg=${y}]`);
				const currentPlayer = $(currentCell).data('player');

				if (startPlayer === currentPlayer) {
					count++;
				} else {
					count = 0;
				}

				if (count === 4) {
					return startPlayer;
				}
			}
		}


		function down(cell) {
			const col = parseInt(cell.getAttribute('col'));
			const lg = parseInt(cell.getAttribute('lg'));

			const startPlayer = $(cell).data('player');
			let count = 0;

			for (let y = lg; y < lg + 4 && y < settings.lg; y++) {
				const currentPlayer = $($(that)[0].children[y]).data('player');

				if (startPlayer === currentPlayer) {
					count++;
				} else {
					count = 0;
				}

				if (count === 4) {
					return startPlayer;
				}
			}
		}

		function horizontal(cell) {
			const col = parseInt(cell.getAttribute('col'));
			const lg = parseInt(cell.getAttribute('lg'));

			const startPlayer = $(cell).data('player');
			let count = 0;

			for (let x = Math.max(col - 3, 0); x <= col + 3 && x < settings.col; x++) {
				const currentCell = $(`.bubble[col=${x}][lg=${lg}]`);
				const currentPlayer = $(currentCell).data('player');
				
				if (startPlayer === currentPlayer) {
					count++;
				} else {
					count = 0;
				}

				if (count === 4) {
					return startPlayer;
				}
			}
		}

		function empty(n) {
			var cell = $(that)[0].children[n];

			if($(cell).css('backgroundColor') === 'rgb(255, 255, 255)') {
				if(player === 'red'){
					player = 'yellow';
				} else {
					player = 'red';
				}

				$(cell).css('transition', "0.3s");
				$(cell).css('backgroundColor', player);
				$(cell).data('player', player);
				
				const winner = down(cell) || horizontal(cell) || diagonalRight(cell) || diagonalLeft(cell);
				if (winner) {
					alert(winner[0].toUpperCase()+winner.substr(1)+ " win");
					location.reload();
				}
			}
			else{
				if(n < 0){
					return;
				}
				else{
					var newNb = n - 1;
					empty(newNb);
				}
			}
		}
		empty(n);
	});
}

$('.game').game({

});