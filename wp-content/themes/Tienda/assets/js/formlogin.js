jQuery(document).ready(function(){
    
    jQuery("#user_login").removeClass('input').addClass('form-control');
    jQuery("#user_login").attr('placeholder','Usuario');
    jQuery("#user_pass").removeClass('input').addClass('form-control');  
    jQuery("#user_pass").attr('placeholder','Password');
    jQuery("#wp-submit").removeClass('button button-primary').addClass("btn btn-md btn-round btn-fill btn-brand");
});