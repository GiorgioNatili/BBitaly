$(function () {
	$('#bbTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	$("#popover_login").popover({ html : true });
	
    $('#account_tabbable').bootstrapWizard({'tabClass': 'account-tabs'});
	
	$('.jcarousel-horizontal').jcarousel({scroll:1});
        $('#add-location').click(function() {
           // Append Location
           var sno = $('.itin-loca-count').size() +1;
           var html = '<li>'
                     + '<div class="itin-loca-count count">'+sno+'</div>'
                        + '<div class="outcome">'
                            + '<div class="name"><input type="text" class="search-query" name="location['+sno+'][name]" placeholder="Name the itinerary location.." /></div>'
                            + '<div class="date"><i class="icon-flag"></i> 10/01/2013</div>'
                            + '<div class="date"><i class="icon-flag"></i> 10/01/2013</div>'
                            + '<div class="day"><i class="icon-flag"></i> 10</div>'
                            + '<div class="delete"><a href="#"><i class="icon-flag"></i> D</a></div>'
                        + '</div>'
                    + '</li>';
           $('#itin-loc-list-end').before(
               html
            );
        });
    
});

function choosePolicy(i) {
    var $ins = $(i);
    $('#fPolicy').val($ins.val());
}

