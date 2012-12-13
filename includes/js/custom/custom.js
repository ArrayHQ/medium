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
		$('.accordion-toggle').click(function(){
		    if (!$(this).hasClass("active")) {
		    
		      //Hide Widget and Activate Clicked
		      $('.accordion-toggle').next().slideUp();
		      $(this).next().slideToggle();
		      
		      //Add Class To Active Widget
		      $('.header .accordion-toggle').removeClass('active');
		      $(this).addClass('active');
		      
		      //Add Class To Open Widget
		      $('.header .widget, .header-nav').removeClass('open-widget');
		      $(this).parent().toggleClass('open-widget');
		      
		    }
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
