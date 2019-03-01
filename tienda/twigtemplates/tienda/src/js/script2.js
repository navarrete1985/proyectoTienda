(function() {
    
    let genericAjax = new GenericAjax();
    //Objeto para sacar los feedbacks
    // var genericAjax = function (url, data, type, callBack) {
    //     $.ajax({
    //         url: url,
    //         data: data,
    //         type: type,
    //         dataType : 'json',
    //     })
    //     .done(function( json ) {
    //         console.log('ajax done');
    //         console.log(json);
    //         callBack(json);
    //     })
    //     .fail(function( xhr, status, errorThrown ) {
    //         console.log('ajax fail');
    //     })
    //     .always(function( xhr, status ) {
    //         console.log('ajax always');
    //     });
    // }
    
    $('.detalles').on('click', function(event){
            event.preventDefault();
            let id = event.target.getAttribute('data-idpedido');
            genericAjax.request(null,'ajax/detallespedido', {'id': id }, 'get', function(json) {
                    // console.log(json);
                    // var hola = 'j';
                    // console.log(hola);
                    pintar(json.resultado);
                });
        })
        
        
        
     var pintar = function (objeto) {
         console.log(objeto)
        var listaitems = `
        <div>
            <div>Id del pedido : ${objeto.detalle.id} | numero de articulos : ${objeto.detalle.cantidad}</div>
            <br>
            <div>
                <div>Enviado a :</div>
                <div>${objeto.usuario.nombre} ${objeto.usuario.apellidos}</div>
                <div>${objeto.usuario.direccion}</div>
            </div>
            <br>
            <div>
                <div>Metodo de pago</div>
                <div>Tarjeta de crédito</div>
            </div>
            <br>
            <div>
                <div>Resumen</div>
                <div>Subtotal : ${objeto.detalle.precio/1.21}</div>
                <div>Envío</div>
                <div>Impuestos</div>
                <br>
                <div>Total : ${objeto.detalle.precio}</div>
            </div>
        </div>
        `;
        
        
        
        
        console.log(listaitems)

        $('.modal-body').empty();
        $('.modal-body').append(listaitems);
        
    }
    
    
})();