/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth

(function ($, Drupal, window, document, undefined) {
	Drupal.behaviors.myBehavior = {
		attach: function (context, settings) {
			jQuery( "#edit-datefrom" ).datepicker({
				dateFormat: "dd/mm/yy",
				autoSize: true
			});
		  
			jQuery( "#edit-dateto" ).datepicker({
				dateFormat: "dd/mm/yy",
				autoSize: true
			});
		}
	}
 

	jQuery("#edit-nopersons").change(function() {
		var select=$(this).val();
		if(select=="1")
		{
			var types=" person";
			$(".form-item-nopersons").text(select+types);
		}
		else
		{
			var type=" persons";
			$(".form-item-nopersons").text(select+type);
		}
	});
	  
})(jQuery, Drupal, this, this.document);


jQuery(document).ready(function(){
  
   jQuery("#edit-location").val("Cerca la localita");
   jQuery("#edit-datefrom").val("check-in");
   jQuery("#edit-dateto").val("check-out");
   
   });