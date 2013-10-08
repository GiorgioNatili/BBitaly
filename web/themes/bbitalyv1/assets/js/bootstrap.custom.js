$(function () {
	$('#bbTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	$("#popover_login").popover({ html : true });
	
    $('#account_tabbable').bootstrapWizard({'tabClass': 'account-tabs'});
	
	$('.jcarousel-horizontal').jcarousel({scroll:1});
        
    
});

function choosePolicy(i) {
    var $ins = $(i);
    $('#fPolicy').val($ins.val());
}