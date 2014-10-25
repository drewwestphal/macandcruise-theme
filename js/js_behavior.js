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
    
    
    //faq
    var faqCount = $('#faq-overflow .faq-item-container').length;
	faqPosition = 0;
	$('.faq-carousel a').click(function(event){
	    faqPosition = $(this).index();
	    var faqAdjusted = -(faqPosition-1)*100;
        $('#faq-overflow').css('left', faqAdjusted+'%');
        $('#faq-carousel-small a').removeClass('orange-text');
        $(this).addClass('orange-text');
        
	    event.preventDefault();
    });
    $('.faq-carousel span').click(function(){
	    var faqOverflowWidth = $('#faq-overflow').width();
	    var faqOverflowLeft = $('#faq-overflow').css('left');
	    var faqWindowWidth = $(window).width();
	    var faqSpanPosition = $(this).index();
	    var faqOrange = function(){
		    $('#faq-carousel-small a').removeClass('orange-text');
		    $('#faq-carousel-small a:nth-child('+(faqPosition+1)+')').addClass('orange-text');
	    };
		
		if (faqSpanPosition > 0){
			faqPosition++;
			if (faqPosition > faqCount) {
				$('#faq-overflow').css('left', 0);
				faqPosition=1;
				faqOrange();
			} else {
				$('#faq-overflow').css('left', -((faqPosition-1)*100)+'%');
				faqOrange();
			}
		} else {
			faqPosition--;
			if (faqPosition < 1) {
				$('#faq-overflow').css('left', -((faqCount-1)*100)+'%');
				faqPosition=faqCount;
				faqOrange();
			} else {
				$('#faq-overflow').css('left', -((faqPosition-1)*100)+'%');
				faqOrange();
			}
		}
	});
	$('#faq-view-all').click(function(){
		$(this).hide();
		$('.wide-hidden').removeClass('wide-hidden');
	});
	
	//smooth scroll
	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 500);
	        return false;
	      }
	    }
	  });
	});

});

$(window).resize(function(){
	//artist
    if ($(window).width()>767){
	    $('#overflow').css('left', 0);
	    $('#faq-overflow').css('left', 0);
    }
});