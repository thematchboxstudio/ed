/*-----------------------------------------------------------------------------------*/
/* GENERAL SCRIPTS */
/*-----------------------------------------------------------------------------------

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {

		// function for site menu display toggle
		var showMenu = function() {
			$('body').removeClass("active-sidebar").toggleClass("active-nav");
			$('.sidebar-button').removeClass("active-button");				
			$('.menu-button').toggleClass("active-button");	
			$('#container').toggleClass('close');
			$('.container-wrap, .container-wrap a, .container-wrap span, .footer').click(function(e){
		      if ( $('body').hasClass("active-nav") ) {
		       showMenu();
		       return false;
					}
		});
		}

	
		$('.menu-button').click(function(e) {
				showMenu();	
				e.preventDefault();
		});	
   
   
    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */
    
    /* getting viewport width */
    var responsive_viewport = $(window).width();
    
    /* if is below 481px */
    if (responsive_viewport < 481) {
    } /* end smallest screen */
    
    /* if is larger than 481px */
    if (responsive_viewport > 481) {
    } /* end larger than 481px */
    
    /* if is above or equal to 768px */
    if (responsive_viewport >= 768) {
			
	
$(window).load(function() {
    //get the natural page height -set it in variable above.

 		var highestCol = $('#main').height();

			if (highestCol >= 600) {
				$('#sidebar').css('height', highestCol);
   		}
   		else {
   			$('#sidebar').css('height','auto' );
   		}

});
    
    }// 768
    
    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {

    }
    
   });
    
    


