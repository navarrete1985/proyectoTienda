(function() {
    
    var lightboxDescription = GLightbox({
        selector: 'gallery'
    });
    let genericAjax = new GenericAjax();
    
    var orden = 'a.marca';
    var pagina = 1;
    var filtro = null;
    var data = "todos";
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
    
    
    
    
    $('.onClickLista2').on('click', function(event){
        event.preventDefault();
        data = $(event.currentTarget).attr('data-lista');
        pagina = $(event.currentTarget).attr('data-pagina');
        orden = $(event.currentTarget).attr('data-orden');
        getListado2(data,pagina);
    });
    
    
     var getListado2 = function (data, pagina) {      
        switch(data) {
            case 'Categoria':
                genericAjax.request(null, 'ajax/listarCatAndDes', {'data': data,'pagina': pagina ,'orden' : orden}, 'get', function(json) {
                    console.log(json.zapatos);
                    pintar(json.zapatos);
                    procesarPaginas(json.paginas);
                });
                break;
            case 'Destinatario':
                genericAjax.request(null, 'ajax/listarCatAndDes', {'data': data ,'pagina': pagina ,'orden' : orden}, 'get', function(json) {
                    console.log(json.zapatos);
                    pintar(json.zapatos);
                    procesarPaginas(json.paginas);
                    
                });
                break;
            
        }
    }
    
    
    
    
    
    
    $('.btnPagina').on('click', function(e) {
            e.preventDefault();
            pagina = e.target.getAttribute('data-pagina');
            getListado(); 
        });
    
    $('#filtroBt').on('click', function(e) {
            e.preventDefault();
            filtro = document.getElementById('filtro').value;
            pagina = 1;
            getListado(); 
        });
    
     $('.onClickLista').on('click', function(event){
        event.preventDefault();
        data = $(event.currentTarget).attr('data-lista');
        pagina = 1;
        filtro = null;
        orden = 'a.marca';
        getListado();
    });
    
     var getListado = function () {
             switch(data) {
            case 'todos':
                genericAjax.request(null, 'ajax/listarArticulo', {'tipo': 2, 'filtro':filtro,'pagina': pagina ,'orden' : orden}, 'get', function(json) {
                    
                    pintarArticulos(json.articulos);
                    procesarPaginas(json.paginas);
                });
                break;
            case 'complementos':
                genericAjax.request(null, 'ajax/listarArticulo', {'tipo': 1, 'filtro':filtro,'pagina': pagina ,'orden' : orden}, 'get', function(json) {
                    
                    pintarArticulos(json.articulos);
                    procesarPaginas(json.paginas);
                });
                break;
            case 'zapatos':
                genericAjax.request(null, 'ajax/listarArticulo', {'tipo': 0, 'filtro':filtro,'pagina': pagina ,'orden' : orden}, 'get', function(json) {
                    
                    pintarArticulos(json.articulos);
                    procesarPaginas(json.paginas);
                });
                break;
        }
        
    }

    var pintarArticulos = function (objeto) {
        var listaitems = '';
        $.each(objeto, (key, item)  =>{
            listaitems += `<div class="col-sm-4 col-md-4 col-lg-4 post-item">
						<article  class="post-27 post type-post status-publish format-standard has-post-thumbnail hentry category-branding category-design category-printing tag-business tag-lifestyle tag-music tag-news tag-travel">
							<div class="post-preview">
								<a href="/tienda/index/item?id=${item.id}">
									
									<img width="340px" src="data:image/jpg;base64, ${item.img}">
								</a>
								

							<div class="post-header">
								<h2 class="post-title font-alt">
									<a href="/tienda/index/item?id=${item.id}">${item.modelo}</a>
								</h2>
								<ul class="post-meta font-alt">
									<li>
										<span>${item.marca}</span>
										
									</li>
									<li>
										<span>${item.referencia}</span>
									</li>
								</ul>
							</div>
							<div class="post-content">
								<p>${item.detalle}</p>
								<p>${item.precio}€</p>
							</div>
							<div class="post-more">
								<a class="font-alt" href="/tienda/index/item?id=${item.id}">Read More &rarr;</a>
							</div>
						</article>
					</div>`;
        });
       
        $('.contenedorArticulos').empty();
        $('.contenedorArticulos').append(listaitems);
        
    }
    
    var procesarPaginas = function (paginas) {
        let pagination = '';
        
        if (paginas.pagina != 1) {
            if (paginas.pagina > 2) {
                pagination += `<li>
    							 <a href = "#" class = "btnPagina btnPagina2 " data-pagina='${paginas.primero}'><<</a>
    						  </li>`;
            }
            pagination += `<li>
    				   		  <a href = "#" class = "btnPagina btnPagina2" data-pagina='${paginas.anterior}'><</a>
    					   </li>`;
        }
        
        $.each(paginas.rango, (key, value) => {
            if (paginas.pagina == value) {
                pagination += `<li>
                             	   <a href = "#" class="btnPagina btnPagina2 actual-index">${value}</a>
                        	   </li>`
            }else {
                pagination += `<li>
                             	   <a href = "#" class = "btnPagina btnPagina2 " data-pagina='${value}'>${value}</a>
                        	   </li>`
            }
        });
        
        if (paginas.pagina != paginas.ultimo) {
            pagination += `<li>
						 	   <a href = "#" class = "btnPagina btnPagina2" data-pagina='${paginas.siguiente}'>></a>
						   </li>`;
			if (paginas.pagina != paginas.ultimo - 1) {
			    pagination += `<li>
						 	   <a href = "#" class = "btnPagina btnPagina2" data-pagina='${paginas.ultimo}'>>></a>
						   </li>`;
			}
        }
        
        $('#pintarPaginas').empty();
        $('#pintarPaginas').append(pagination);
        $('.btnPagina2').on('click', function(e) {
            e.preventDefault();
            pagina = e.target.getAttribute('data-pagina');
            getListado(); 
        });
    
    } 
    
    
    
    
    
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

// CARRITO
(function() {
    
    let cart = new Cart(".shopping-cart");
    $('.btn-add-cart').on('click', function(e) {
        e.preventDefault();
        let artId = $(this).attr('data-id');
        let artQuantity = $('#quantity').length > 0 ? $('#quantity').val() : 1;
        cart.request('ajax/addtocart', {id: artId, quantity: artQuantity}, response => {
            console.log(response);
            if (response.result === 1) {
                cart.addItem(response.object);
            }
        })
    })
    cart._refreshTotal();
    cart._refreshBadge();
    
})();