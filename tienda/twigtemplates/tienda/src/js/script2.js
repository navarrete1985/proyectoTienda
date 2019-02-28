(function() {
    
    let genericAjax = new GenericAjax();
    //Objeto para sacar los feedbacks

    $('.detalles').on('click', function(event){
            event.preventDefault();
            let id = event.target.getAttribute('data-idpedido');
            genericAjax.request(null, 'pedidos/detallespedido', {'id': id }, 'get', function(json) {
                    console.log(json);
                    
                });
        })
})();