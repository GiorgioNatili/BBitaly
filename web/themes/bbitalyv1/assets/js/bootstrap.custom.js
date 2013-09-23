$(function () {
	$('#bbTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
        /**
         * $('.popover-login').html(
                '<a href="#"'+
                'id="popover_login" '+
                'data-placement="bottom" '+
                'rel="popover" '+
                'data-html="true" '+
                'data-content="'+'<ul class="form-list">'+
                    '<li>'+
                        '<label>username</label>'+
                        '<div class="input-box">'+
                            '<input type="text" class="input-field small" value="" />'+
                        '</div>'+
                    '</li>'+
                    '<li>'+
                        '<label>password</label>'+
                        '<div class="input-box">'+
                            '<input type="password" class="input-field small" value="" />'+
                        '</div>'+
                    '</li>'+
                    '<li class="a-center">'+
                        '<div class="button-sets">'+
                            '<button class="button login-btn" type="submit">'+
                                '<span><span>accedi</span></span>'+
                            '</button>'+
                        '</div>'+
                        '<p><a href="#">hai dimenticato la password?</a></p>'+
                    '</li>'+
            '</ul><i class="icon-user"></i> Accedi</a>'
        );
         */
	$("#popover_login").popover({ html : true });
});