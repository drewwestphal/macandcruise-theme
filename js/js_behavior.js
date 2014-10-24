$(document).ready(function(){
	//hero
	$('#hero-more-info-button').click(function(){
		$('#hero-more-info-button span').toggleClass('rotate');
		$('#hero-travel-description_narrow').toggleClass('hidden');
	});
	
	//artist
	$('.artist-more-info-button').click(function(){
		$('.artist-more-info-button span').toggleClass('rotate');
		$('.artists-description').toggleClass('nope');
	});
	
	$('#overflow').css('left', 0);
	var count = $('#artist-carousel a').length;
	var position = 1;
    $('#artist-carousel a').click(function(event){
	    position = $(this).index();
	    var adjusted = -(position-1)*100;
        $('#overflow').css('left', adjusted+'%');
        $('#artist-carousel a').removeClass('orange-text');
        $(this).addClass('orange-text');
        
	    event.preventDefault();
    });
    $('#artist-carousel span').click(function(){
	    var overflowWidth = $('#overflow').width();
	    var overflowLeft = $('#overflow').css('left');
	    var windowWidth = $(window).width();
	    var spanPosition = $(this).index();
	    var orange = function(){
		    $('#artist-carousel a').removeClass('orange-text');
		    $('#artist-carousel a:nth-child('+(position+1)+')').addClass('orange-text');
	    };
		
		if (spanPosition > 0){
			position++;
			if (position > count) {
				$('#overflow').css('left', 0);
				position=1;
				orange();
			} else {
				$('#overflow').css('left', -((position-1)*100)+'%');
				orange();
			}
		} else {
			position--;
			if (position < 1) {
				$('#overflow').css('left', -((count-1)*100)+'%');
				position=count;
				orange();
			} else {
				$('#overflow').css('left', -((position-1)*100)+'%');
				orange();
			}
		}
	});
    
    $(window).resize(function(){
	    if ($(window).width()>767){
		    $('#overflow').css('left', 0);
	    }
    });

});