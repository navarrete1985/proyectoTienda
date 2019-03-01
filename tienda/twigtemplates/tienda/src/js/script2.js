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
         let precioSin=objeto.detalle.precio/1.21;
         let Iva=objeto.detalle.precio-(objeto.detalle.precio/1.21);
         let precio = 7.6;
         let total=(parseFloat(objeto.detalle.precio) + parseFloat(precio));
        var listaitems = `
        <div>Id del pedido : ${objeto.pedido.id} | numero de articulos : ${objeto.detalle.cantidad}</div>
        <div class="containerTotalDetalle">
            
            <br>
            <div class="containerDetalles">
                <div><span class="spanDetalles"><i class="fas fa-truck comunDetalle"></i>Enviado a :</span></div>
                <div class="comundivDetalle">${objeto.usuario.nombre} ${objeto.usuario.apellidos}</div>
                <div class="comundivDetalle">${objeto.usuario.direccion}</div>
            </div>
            <br>
            <div class="containerDetalles">
                <div><span class="spanDetalles"><i class="fas fa-credit-card comunDetalle"></i>Metodo de pago :</span></div>
                <div class="comundivDetalle">Tarjeta de crédito</div>
            </div>
            <br>
            <div class="containerDetalles">
                <div><span class="spanDetalles"><i class="fas fa-file-alt comunDetalle"></i>Resumen :</span></div>
                <div class="comundivDetalle">Subtotal : ${precioSin.toFixed(2)}</div>
                <div class="comundivDetalle">Envío : 7.6</div>
                <div class="comundivDetalle">Impuestos : ${Iva.toFixed(2)}</div>
                <br>
                <div class="comundivDetalle">Total : ${total}</div>
            </div>
        </div>
        `;
        
        
        
        
        console.log(listaitems)

        $('.modal-body').empty();
        $('.modal-body').append(listaitems);
        
    }
    
    
})();