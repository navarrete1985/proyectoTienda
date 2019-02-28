(function () {

    /* global $ */
    var aliasok = true;
    var emailok = false;
    var usuario = null
    let genericAjax = new GenericAjax();
    var data = "";
    
    $('.onClickLista').on('click', function(event){
        event.preventDefault();
        data = $(event.currentTarget).attr('data-lista');
        pagina = $(event.currentTarget).attr('data-pagina');
        orden = $(event.currentTarget).attr('data-orden');
        history.pushState(null, "", 'admin/'+data);
        getListado(data,pagina);
    });
    
    $('.onClickListaZapatos').on('click', function(event){
        event.preventDefault();
        data = $(event.currentTarget).attr('data-lista');
        pagina = $(event.currentTarget).attr('data-pagina');
        orden = $(event.currentTarget).attr('data-orden');
        history.pushState(null, "", 'admin/'+data);
        getListado(data,pagina);
    });
    
    $(document).ajaxStart(function () {
        $('.wrapper-loader').removeClass('hidden');
    });

    $(document).ajaxStop(function () {
        $('.wrapper-loader').addClass('hidden');
    });
  
    var getListado = function (data, pagina) {      
        switch(data) {
            case 'usuario':
                genericAjax.request(null, 'ajax/listarUsuario', {'pagina': pagina ,'orden' : orden}, 'get', function(json) {
                    console.log(json.usuarios);
                    pintar(json.usuarios);
                    procesarPaginas(json.paginas);
                });
                break;
            case 'complementos':
                genericAjax.request(null, 'ajax/listaciudades', {'pagina': pagina}, 'get', function(json) {
                    procesarCiudades(json.ciudades);
                    procesarPaginas(json.paginas);
                });
                break;
            case 'zapatos':
                genericAjax.request(null, 'ajax/listarZapato', {'pagina': pagina ,'orden' : orden}, 'get', function(json) {
                    console.log(json.zapatos);
                    pintar(json.zapatos);
                    procesarPaginas(json.paginas);
                    
                });
                break;
        }
    }

    var getHeader = function (objeto) {
        let result = '<tr>';
        console.log(objeto);
        
        var value = objeto[0];
        $.each(value, (key2,value2) => {
            if(key2 != "id"){
              result += '<th><i class="fas fa-sort flechasOrden"></i><a href="#" data-orden='+key2+'>' + key2 + '</a></th>';  
            }
              
        });
        
        result += '<td>Editar</td>'; 
        result += '<td>Borrar</td>'; 
        result += '</tr>';
        return result;
    }

    var getBody = function (objeto) {
        let result = '<tr>';
        $.each(objeto, (key, value) => {
            if(value == true){
                result += '<td><i class="fa fa-check-circle verde tamanioCirulo"></i></td>'; 
            }else if(value == false){
                result += '<td><i class="fa fa-times-circle rojo tamanioCirulo"></td>'; 
            }else if(key != "id"){
               result += '<td>' + value + '</td>';   
            }
          
        });
        result += '<td><a href="admin/edituser?id='+objeto.id+'" class="btn btn-dark editar-usuario">Editar</a></td>'; 
        result += '<td><a href="#"  data-id="'+objeto.id+'" class="btn borrar-user btn-dark editar-usuario">Borrar</a></td>'; 
        
        result += '</tr>';
        return result;
    }

    var pintar = function (objeto) {
        var listaitems = '';
        var div = '<div id="pintarPaginas"></div>';
        var header = getHeader(objeto);
        $.each(objeto, (key, value)  =>{
            listaitems += getBody(value);
        });
        console.log(listaitems)
        var tabla = '<div class="contenedorTabla"><table class="table"><thead class="table_thead"></thead><tbody class="table_body"></tbody></table></div>'
        $('.main').empty();
        $('.main').append(tabla);
        $('.main').append(div);
        $('.table_thead').empty();
        $('.table_thead').append(header);
        $('.table_body').empty();
        $('.table_body').append(listaitems);
    }
    
    var procesarPaginas = function (paginas) {
        var stringFirst = '<a href = "#" class = "btn btn-primary">' + paginas.primero + '</a>';
        var stringPrev  = '<a href = "#" class = "btn btn-primary">' + paginas.anterior + '</a>';
        var stringRange = '';
        
        $.each(paginas.rango, function(key, value) {
            if(paginas.pagina == value) {
                stringRange += '<a href = "#" class = "btnNoPagina btn btn-info">' + value + '</a> ';
            } else {
                stringRange += '<a href = "#" class = "btnPagina btn btn-primary" data-pagina="' + value + '">' + value + '</a> ';
            }
        });
        
        var stringNext = '<a href = "#" class = "btnPagina btn btn-primary">' + paginas.siguiente + '</a>';
        var stringLast = '<a href = "#" class = "btnPagina btn btn-primary">' + paginas.ultimo + '</a>';
        var finalString = stringFirst + stringPrev + stringRange + stringNext + stringLast;
        $('#pintarPaginas').empty();
        $('#pintarPaginas').append(stringRange);
        
        $('.btnPagina').on('click', function(e) {
            e.preventDefault();
            var p = e.target.getAttribute('data-pagina');
            getListado(data,p); 
        });
        
        $('.btnNoPagina').on('click', function(e) {
            e.preventDefault();
        });
        
        $('.table_thead tr th a').on('click', function(event){
            event.preventDefault();
            orden = $(event.currentTarget).attr('data-orden');
            history.pushState(null, "", 'admin/'+data);
            getListado(data,pagina,orden);
        })
    
        $('.borrar-user').on('click', function(event){
            event.preventDefault();
            id = $(event.currentTarget).attr('data-id');
            if(confirm("¿Seguro que quieres borrar al usuario cuya id es :" +id+"?")){
                
            
            history.pushState(null, "", 'admin/borrar'+id);
             genericAjax.request(null, 'ajax/deleteuser', {'id': id }, 'get', function(json) {
                        getListado(data,pagina,dataorden)
                    });
            }
        });
    }
})();

//Módulo para agregar y editar usuarios/artículos
(function() {
    
    let genericAjax = new GenericAjax();
    //Objeto para sacar los feedbacks
    let message = new Message();
    
    //Destapar clave
    $('#form-container .password-container a').on('click', event => {
        event.preventDefault();
        let ico = event.currentTarget.firstChild;
        let input = event.currentTarget.nextElementSibling;
        if(ico.classList.contains('fa-eye')) {
            ico.classList.remove('fa-eye');
            ico.classList.add('fa-eye-slash');
            input.type = 'text';
        }else {
            ico.classList.remove('fa-eye-slash');
            ico.classList.add('fa-eye');
            input.type = 'password';
        }
    })
    
    //PRevisualización de la imagen destacada
    $('#img-thumbnail').on('change', function() {
        imagePreview($(this)[0], '#img-thumbnail-container'); 
    })
    
    var editar = document.getElementById("editar-update");
    if (editar !== null) {
        $('#signup-password').attr('data-empty', true);
    }
    
    //Comprobamos de que tengamos un contenedor de formulario
    if ($('#form-container').length > 0) {
        
        //Ponemos listener para nuestra imagen destacada
        $('.btn-thubnail-img').on('click', e => {
            e.preventDefault();
            $('#img-thumbnail').trigger('click');
        })
        
        //valores de alias y correo en caso de que editemos
        if (editar !== null) {
            var alias = document.getElementById("signup-alias").value;
            var correo = document.getElementById("signup-email").value;   
        }
        
        $('.submit').on('click', event => {
            event.preventDefault();
            validacion.start();
        })
        
        let validacion = new Validate('form-container');
        
        validacion.addSuccessListener(result => {
            let data = null;
            let dt = 'formData';
            switch($('#form-container').attr('data-class')) {
                case 'usuario':
                    data = validacion.getFormData(['text', 'checkbox', 'email', 'password']);
                    data.append('usuario', 'usuario');
                    data.id = document.getElementById("id-edit") !== null ? document.getElementById("id-edit").value : '';
                    break;
                case 'articulo':
                    data = validacion.getFormData(['text', 'checkbox', 'email', 'number', 'file']);
                    data.append('articulo', 'articulo');
                    // dt = 'formData';
                    break;
            }
            
            if (data !== null) {
                data.append('class', $('#form-container').attr('data-class'));
                //Ponemos la acción dependiendo de lo que queramos hacer, o editar o agregar
                let action = editar == null ? 'ajax/adddata' : 'ajax/updatedata';
                genericAjax.request(dt, action, data, 'post', response => {
                   if (response.result == 1) {
                       if (editar === null) {
                            validacion.clearAllFields();
                       }
                       message.showMessage('Operación realizada con éxito', 'El usuario se ha añadido satisfactoriamente', 'success');
                   }else {
                       message.showMessage('Operación fallida', 'Ha ocurrido algún error al añadir al usuario', 'success');
                   }
                });
            }
        });
        
        validacion.addErrorListener(error => {
            
        });
        
        validacion.addBlurCallback(node => {
            let data = {
                class: $('#form-container').attr('data-class'),
                key: node.name,
                value: node.value.trim(),
            }
            
            if (editar !== undefined && editar !== null) {
                if (node.type === 'email') {
                    data.valoranterior = correo;
                }else {
                    data.valoranterior = alias;
                }    
            }
            
            if (data.value.length > 0) {
                let accion = editar == null ? 'ajax/isavailable' : 'ajax/isavailableedit';
                genericAjax.request(null, accion, data, 'get', json => {
                    if(json.result == 0) {
                        validacion.__addSpanError(node, 'Campo existente en la base de datos, por favor inserte otro valor.')
                    }else {
                        validacion.__removeSpanError(node)
                    }
                })
            }else {
                validacion.__removeSpanError(node);
            }
        });
        
        function imagePreview(input, previewContainer) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $(previewContainer).attr('style', 'background-image: url(' + e.target.result + ')');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
})();


//modulo de pedidos


(function() {
    
    let genericAjax = new GenericAjax();
    //Objeto para sacar los feedbacks
    let message = new Message();
    
    $('.detalles').on('click', function(event){
            event.preventDefault();
            let id = e.target.getAttribute('data-idpedido');
            console.log(id);
        })
})();