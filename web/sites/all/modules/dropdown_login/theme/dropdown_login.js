jQuery(document).ready(function($) {
    
    // Drop down login animation
    $('#dropdown-login').addClass('enable-dd');    
    $('#dropdown-login .login').click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active').siblings('.dropdown').slideUp();
        } else {
            $(this).addClass('active').siblings('.dropdown').slideDown();
        }        
        return false;
    });
    
});