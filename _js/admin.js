function updateCount( $, $textarea ) {

	var iCount, iRemaining;
	iCount = parseInt( $textarea.val().length, 10 );
	// console.log( iCount );
	iRemaining = 160 - iCount;
	// console.log( iRemaining );
	// 
	// element = $textarea.find('p').append('fuck all the sis');
	// console.log(element);

	$textarea
		.css({
			color : 'red'
		})
		.next()
		.children('.front-to-back-count')
		.text( iRemaining );

	// console.log( iRemaining );
	// console.log( $textarea );

}

function updateTextareas( $, $textareas ) {

	$textareas.each(function(){
		updateCount( $, $(this) );
		$(this).keyup(function(event) {
			/* Act on the event */
			updateCount( $, $(this) );
			// alert($(this));
		});
	});
}

(function($) {

	// alert('working');

	$(function(){
		updateTextareas( $, $('.front-to-back textarea') );
	});

	$(document).ajaxSuccess(function() {
		updateTextareas( $, $('.front-to-back textarea') );
	});

}(jQuery));