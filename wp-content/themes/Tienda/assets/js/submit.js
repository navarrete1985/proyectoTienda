jQuery(document).ready(function(){

    jQuery(".comments-area #submit").click(function(e){
            if (!jQuery('#rgpd').prop('checked')){
                e.preventDefault();
                jQuery('#mensaje-rgpd').show();
                return false;
            }            
    });
    
    jQuery('#mensaje-rgpd').click(function(){
        jQuery('#mensaje-rgpd').hide();
    });

});