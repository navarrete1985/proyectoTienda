jQuery(document).ready(function(){
    var indice = 0,
        quotes = jQuery('#content-quote blockquote'),
        numquotes = quotes.length; 
    console.log (quotes[0]);
    
    jQuery('#content-quote blockquote ').hide();
    quotes.eq(indice).show("slow");

    function cambiarQuote(){
        var quote = quotes.eq(indice);
        quote.show("slow");
    }        
   
    var proceso = setInterval(function(){
        var quote = quotes.eq(indice);
        quote.hide();
        indice += 1;
        if(indice > (numquotes -1)){
            indice = 0;
        }
        cambiarQuote();
    }, 5000);   
    
});