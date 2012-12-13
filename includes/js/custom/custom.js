jQuery(document).ready(function( $ ) { 
			
		//Flexslider
		$('.flexslider').flexslider({
			animation: "fade",
			animationSpeed: 150
		});
		
		$(".flex-next").html('<i class="icon-chevron-right"></i>');
		$(".flex-prev").html('<i class="icon-chevron-left"></i>');
		
		
		
		//Fitvid
		function fitvids() {
			$(".fitvid").fitVids();	
		}
		
		fitvids();
		
		
		
		//Infinite Scroll
		if ((custom_js_vars.infinite_scroll) == 'disabled') { } else { 
			$('.posts').infinitescroll({
			      loading: {
			          msgText: "...loading more posts...",
			          finishedMsg: "- All posts loaded -"
			      },
			      nextSelector: '.post-nav-right a',
			      navSelector: '.post-nav',
			      itemSelector: 'article',
			      contentSelector: '.posts',
			      appendCallback: true
			},function () { fitvids(); });		
		}
		
		
		
		//Accordion Menu
		$(".header .widget ul,.header .widget select,.header #calendar_wrap,.header .textwidget,.header .tagcloud,.header .widgets .search-form").hide();
		$('.header .widgettitle').click(function(){
		    if ($(this).attr('class') != 'widgettitle active'){
		    
		      //Hide Widget and Activate Clicked
		      $('.header-nav').removeClass('header-nav-open');
		      $('.header .widget ul,nav div,.header .widget select,.header .nav,.header .widget select,#calendar_wrap,.header .textwidget,.header .tagcloud,.header .widgets .search-form').slideUp();
		      $(this).next().slideToggle();
		      
		      //Add Class To Active Widget
		      $('.header .widgettitle').removeClass('active');
		      $(this).addClass('active');
		      
		      //Add Class To Open Widget
		      $('.header .widget').removeClass('open-widget');
		      $(this).parent().toggleClass('open-widget');
		      
		    }
	    });
	    
	    //Open Main Nav When Clicked
	    $("nav h2").click(function () {
	    	
	    	//Add Open Class
	    	$('.header-nav').addClass('header-nav-open');
	    	
	    	//Open the Menu
	    	$('.header .nav').slideDown();
	    	
	    	//Remove Open Class From Widgets
	    	$('.header .open-widget').removeClass('open-widget');
			
			//Hide Widget Menus
			$('.header .widget ul').slideUp();
			
			//Show Nav Menu
			$("nav div").slideDown();		
			return false;
		});
		
		
		
		//Replace Scrollbars
		enquire.register("screen and (min-width: 755px)", function() {
	        
	        $('.nano').toggleClass('overthrow navigation-content');
	        
	        $(".navigation-content").nanoScroller({
		    	contentClass: 'navigation-inner',
		    	preventPageScrolling: 'true',
		    });
		    
	    }).listen();   
	    
	    enquire.register("screen and (max-width: 755px)", function() {  
	        $('.nano').removeClass('overthrow navigation-content');
	    }).listen();
	
	
	
});