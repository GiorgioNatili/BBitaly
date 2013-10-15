$(function () {
    $('#bbTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
    });
    $("#popover_login").popover({ html : true });

    $('#account_tabbable').bootstrapWizard({'tabClass': 'account-tabs'});

    $('.jcarousel-horizontal').jcarousel({scroll:1});

    $('.datepicker').datepicker();

    $('.lightbox-img').lightbox();

    $('#property_gallery').on('load', function () {
            var modalData = $(this).data('modal');
    });

    $('#photo_gallery li a').click(function() {
            var src = $(this).find('img').attr('src');
            $('#photo_gallery').children('.photo-main').find('img').attr('src',src);
    });

    $('.range-slider').slider();

    $('.fileupload').fileupload();

    var checkin = $('#checkin').datepicker({
            onRender: function(date) {
                    return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
    }).on('changeDate', function(ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.setValue(newDate);
            }
            checkin.hide();
            $('#checkout')[0].focus();
    }).data('datepicker');

    var checkout = $('#checkout').datepicker({
            onRender: function(date) {
                    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
    }).on('changeDate', function(ev) {
            checkout.hide();
    }).data('datepicker');
    
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


$(document).ready(function() {
    // Traveler Form.
    $('#traveler-form').isHappy({
           fields: {
               "#Users_first_name": {
                   required: true,
                   message: 'Please enter your first name.'
               },
               '#Users_last_name': {
                   required: true,
                   message: 'Please enter your last name'
               },
               "#Users_email": {
                   required: true,
                   message: "Enter your valid Email.",
                   test: happy.email
               },
               '#Confirm_Email': {
                   required: true,
                   message: 'Please match & confirm email',
                   arg: '#Users_email',
                   test: happy.cequal
               },
               '#Users_password': {
                   required: true,
                   message: 'Please enter your password!',  
               },
               '#Confirm_Password': {
                   required: true,
                   message: "Password doesn't matched!",
                   arg: '#Users_password',
                   test: happy.cequal
               },
               '#t_agreement': {
                   //required: true,
                   message: "Please accept terms & conditions!",
                   arg: "#t_agreement",
                   test: happy.checked
               }
           },
           submitButton: '#tsubmit'
       });
       
      // Owner Form
      $('#owner-form').isHappy({
          submitButton: '#osubmit',
          fields: {
              '#ofname': {
                  required: true,
                  message: "Your first name is required!"
               },
               '#olname': {
                   required: true,
                   message: 'Your last name is required!'
               },
               '#oemail': {
                   required: true,
                   message: 'Please enter a valid email!',
                   test: happy.email
               },
               '#ocemail': {
                   required: true,
                   message: 'Please match & confirm email',
                   arg: '#oemail',
                   test: happy.cequal
               },
               '#opassword': {
                   required: true,
                   message: 'Enter your password!',
               },
               '#ocpassword': {
                   required: true,
                   message: 'Enter & Match your password!',
                   arg: '#opassword',
                   test: happy.cequal
               },
               '#Property_title': {
                   required: true,
                   message: "Property title is required!"
               },
               '#Property_people_min': {
                   required: true,
                   message: 'Min people?'
               },
               '#Property_people_max': {
                   required: true,
                   message: 'Max people?'
               },
               '#Property_base_price': {
                   required: true,
                   message: 'Property price?'
               },
               '#total_rooms': {
                   required: true,
                   message: 'Total No. of rooms?'
               },
               '#Property_address': {
                   required: true,
                   message: "Enter the address of property!"
               },
               '#Property_city': {
                   required: true,
                   message: "Enter the city of property!"
               },
               '#Property_zip_code': {
                   required: true,
                   message: "What's your property zipcode?"
               },
               '#o_agreement': {
                   //required: true,
                   message: "Please accept terms & conditions!",
                   arg: "#o_agreement",
                   test: happy.checked
               }
          }
      });
});

function onOwnerFormSubmit() {
    
}

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

function nextMonth(idf, room_id) {
    var cur_month = parseInt($('#'+idf).attr('data-month'))
        , next_month = cur_month === 12 ? 1 : (cur_month) + 1
        , cur_year = parseInt($('#'+idf).attr('data-year'))
        , next_year = cur_month === 12 ? parseInt(cur_year) + 1 : cur_year;
    
    $('.cal-container-'+room_id).load('/availability/_calendar?room='+room_id+'&month='+next_month+'&year='+next_year);
}

function lastMonth(idf, room_id) {
    var cur_month = parseInt($('#'+idf).attr('data-month'))
        , now_month = (new Date().getMonth()) +1
        , last_month = cur_month === 1 ? 12 : (cur_month) - 1
        , cur_year = parseInt($('#'+idf).attr('data-year'))
        , last_year = cur_month === 1 ? parseInt(cur_year) - 1 : cur_year;
    
    
        $('.cal-container-'+room_id).load('/availability/_calendar?room='+room_id+'&month='+last_month+'&year='+last_year);
    
}


function matchEmail(r,c) {
    var $r = $('#'+r)
        , $c = $('#'+c);
        
    if ( $c.val() !== $r.val()) {
        alert('Both Email Addresses does not match!');
        $r.focus();
        return false;
    }
    return true;
}

function matchPassword(r,c) {
    var $r = $('#'+r)
        , $c = $('#'+c);
        
    if ( $c.val() !== $r.val()) {
        alert('Both Passwords does not match!');
        $r.focus();
        return false;
    }
    
    return true;
}

function addService(i) {
    var $elem = $(i)
    
    if ( $elem.prev().size() === 0) {
        $elem.before(
                $('<input />')
                    .attr('type','hidden')
                    .attr('name', $elem.attr('data-rel'))
                    .attr('value',1)
            )
    } else {
        $elem.prev().remove();
    }
}

function addToFavorites(i) {
    var $elem = $(i);
    
    $.ajax({
        url: '/favorites/create?ajax=1',
        type: "POST",
        data: {
            'Favorites': {
                'property_id': $elem.attr('data-pid'),
                'user_id': USER_ID
            }  
        },
        success: function(data) {
            data = $.parseJSON(data);
            if ( data.is_success === 1) {
                $elem.attr('onclick','removeFromFavorites(this);')
                .attr('title','Already your favorite!');
                // Lets +1.
                var count = parseInt($elem.prev().html());
                $elem.prev().html(count + 1);
                $elem.html('- Favorite');
            }
            
        }
    });
}

function removeFromFavorites(i, cb) {
    var $elem = $(i);
    
    $.ajax({
        url: '/favorites/remove?ajax=1',
        type: "POST",
        data: {
            'property_id': $elem.attr('data-pid'),
            'user_id': USER_ID
        },
        success: function(data) {
            data = $.parseJSON(data);
            if ( data.is_success === 1) {
                if ( typeof cb === 'function') {
                    cb(data);
                } else {
                    $elem.attr('onclick','addToFavorites(this);')
                    .attr('title','Add to Favorites!');
                    // Lets +1.
                    var count = parseInt($elem.prev().html());
                    $elem.prev().html(count - 1);
                    $elem.html('+ Favorite');
                }
            }
            
               
        }
    });
}