(function() {
    
    let genericAjax = new GenericAjax();
    //Objeto para sacar los feedbacks

    $('.detalles').on('click', function(event){
            event.preventDefault();
            let id = event.target.getAttribute('data-idpedido');
            genericAjax.request(null, 'ajax/detallespedido', {'id': id }, 'get', function(json) {
                    console.log(json);
                    var hola = 'j';
                    console.log(hola);
                    
                });
        })
})();