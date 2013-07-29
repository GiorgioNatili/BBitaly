(function($) {
  //alert("hi");
  Drupal.behaviors.ajaxlogin = { 
    attach: function(context, settings) {
      // Redirect if ajaxlogin_reload property is set
      if (settings.ajaxlogin_reload) {
		if (settings.redirect_page) {
			if (settings.redirect_page == "accommodation") {
				//alert("accomation owner");
				document.location.href = document.location.href+"accommodation";
			} else if (settings.redirect_page == "traveller") {
				//alert("traveller");
				document.location.href = document.location.href+"traveller";
			} else if (settings.redirect_page == "admin") {
				
				//alert("admin");
				document.location.href = document.location.href+"user";
				
			}
		} else {
			window.location.reload();
		}
		
	  //alert($(this).attr('href'));
	  
       
      }   
    },  
  };  
  
}) (jQuery);




