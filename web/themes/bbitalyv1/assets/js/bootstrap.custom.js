$(function () {
	$('#bbTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	$("#popover_login").popover({ html : true });
	
    $('#account_tabbable').bootstrapWizard({'tabClass': 'account-tabs'});
});