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
        
        function getNumArticulos(objeto){
            let cantidad=0;
             $.each(objeto, (key,value) => {
                cantidad+=parseInt(value.cantidad);
             });
             return cantidad;
        
        }
        
        function getArticulos(objeto){
            let resultado='';
            for(let i = 0; i<objeto.articulo.length;i++){
                resultado+='<tr class=""><td>'+objeto.articulo[i].modelo+'</td>';
                resultado+='<td>'+objeto.detalles[i].cantidad+'</td>';
                resultado+='<td>'+objeto.detalles[i].precio+'</td></tr>';
            }
            return resultado; 
        }
        
        function getTotal(objeto){
            let total = 0;
            for(let i = 0; i<objeto.articulo.length;i++){
                total+=parseFloat(objeto.detalles[i].precio);
            }
            return total; 
        }
        
        
     var pintar = function (objeto) {
         console.log(objeto)
         let CantidadArticulosTotal = getNumArticulos(objeto.detalles);
         let articulo=getArticulos(objeto);
         let total = getTotal(objeto)
         let envio = 7.5;
         total +=parseFloat(envio);
         console.log(articulo);

        //  let precioSin=objeto.detalle.precio/1.21;
        //  let Iva=objeto.detalle.precio-(objeto.detalle.precio/1.21);
        //  let precio = 7.6;
        //  let total=(parseFloat(objeto.detalle.precio) + parseFloat(precio));
        var listaitems = `
        <div>Id del pedido : ${objeto.pedido} | numero de articulos : ${CantidadArticulosTotal}</div>
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
                <div>
                <span class="spanDetalles">
                <i class="fas fa-file-alt comunDetalle"></i>
                Resumen :
                </span>
                </div>
                <table class="tableDetalle">
                    <thead>
                        <tr>
                            <th class="">Modelo</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${articulo}
                    </tbody>
                    
                </table>
                <div class="sameTable2"><p class="pprecio">Envio</p><p>${envio}</p></div>
                <div class="sameTable"><p class="pDetalleTotal">${total} €</p></div>
            </div>
        </div>
        `;
        // <div class="containerDetalles">
        //         <div><span class="spanDetalles"><i class="fas fa-file-alt comunDetalle"></i>Resumen :</span></div>
        //         <div class="comundivDetalle">Subtotal : ${precioSin.toFixed(2)}</div>
        //         <div class="comundivDetalle">Envío : 7.6</div>
        //         <div class="comundivDetalle">Impuestos : ${Iva.toFixed(2)}</div>
        //         <br>
        //         <div class="comundivDetalle">Total : ${total}</div>
        //     </div>
        
        
        
        console.log(listaitems)

        $('.modal-body').empty();
        $('.modal-body').append(listaitems);
        
    }
    
    
})();