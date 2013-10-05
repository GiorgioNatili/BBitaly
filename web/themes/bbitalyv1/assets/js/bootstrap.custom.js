$(function () {
	$('#bbTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	$("#popover_login").popover({ html : true });
	
        $('#account_tabbable').bootstrapWizard({'tabClass': 'account-tabs'});
	
	$('.jcarousel-horizontal').jcarousel({scroll:1});
	
	$('.datepicker').datepicker({
            autoclose: true
        });
        
        $('#add-location').click(function() {
            var sno = $('.itin-count').size() + 1;
            $('#itin-loc-list-end').before(
                '<li class="init-loc-'+sno+'">'
                +    '<div class="count itin-count">'+sno+ '</div>'
                +    '<div class="outcome">'
                +        '<div class="name">'
                +            '<input type="text" class="inut-field medium" required name="Location['+sno+'][name]" value="" />'
                +        '</div>'
                +        '<div class="date">'
                +            '<i class="icon-flag"></i> '
                +            '<input type="text" class="inut-field small datepicker" required name="Location['+sno+'][from]" value="" />'
                +        '</div>'
                +        '<div class="date">'
                +            '<i class="icon-flag"></i> '
                +            '<input type="text" class="inut-field small datepicker" required name="Location['+sno+'][to]" value="" />'
                +        '</div>'
                +        '<div class="day">'
                +            '<i class="icon-flag"></i> '
                +            '<input type="text" class="inut-field x-small" required name="Location['+sno+'][people] value="" maxlength="3" />'
                +        '</div>'
                +        '<div class="delete"><a href="javascript:void(0);" required data-index=".init-loc-'+sno+'" onclick="deleteLocation(this);"><i class="icon-delete"></i></a></div>'
                +    '</div>'
                + '</li>'
            );
                $('.datepicker').datepicker({
                    autoclose: true
                });
        });
});

function deleteLocation(i) {
    var $this = $(i);
    $($this.attr('data-index')).remove();
}

function choosePolicy(i) {
    var $ins = $(i);
    $('#fPolicy').val($ins.val());
}

$.fn.hasAttr = function(name) {
    return this.attr(name) !== undefined;
}

function enableOffer(r,i) {
    var _c = '._offer_'+r+'_'+i
    , $elem = $(_c);
    
    if ( $elem.hasAttr('readonly')) {
        $elem.removeAttr('readonly');
    } else {
        $elem.attr('readonly','readonly');
    }
}