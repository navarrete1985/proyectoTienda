jQuery(document).ready(function(){

    jQuery(".filter").on('click', function(){
        var filtro = jQuery(this).data('filter');

        if (filtro == '*') {
            jQuery('.category-count').show();
        }else {
            jQuery('.category-count').hide();
            jQuery(filtro).show();           
        } 
    });
  


});