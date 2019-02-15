
(function () {

    /* global $ */
    var aliasok = true;
    var emailok = false;
    var usuario = null
     data = "";
    
    $('.onClickLista').on('click', function(event){
        event.preventDefault();
        data = $(event.currentTarget).attr('data-lista');
        pagina = $(event.currentTarget).attr('data-pagina');
        dataorden = $(event.currentTarget).attr('data-orden');
        history.pushState(null, "", 'admin/'+data);
        getListado(data,pagina,dataorden);
    });
    
    $(document).ajaxStart(function () {
        $('.wrapper-loader').removeClass('hidden');
    });

    $(document).ajaxStop(function () {
        $('.wrapper-loader').addClass('hidden');
    });
  
    var genericAjax = function (url, data, type, callBack) {
        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType : 'json',
        })
        .done(function( json ) {
            console.log('ajax done');
            console.log(json);
            callBack(json);
        })
        .fail(function( xhr, status, errorThrown ) {
            console.log('ajax fail');
        })
        .always(function( xhr, status ) {
            console.log('ajax always');
        });
    }
  
    var getListado = function (data, pagina, orden) {      
        switch(data) {
            case 'usuario':
                genericAjax('ajax/listarUsuario', {'pagina': pagina ,'orden' : orden}, 'get', function(json) {
                    console.log(json.usuarios);
                    pintar(json.usuarios);
                    procesarPaginas(json.paginas);
                });
                break;
            case 'complementos':
                genericAjax('ajax/listaciudades', {'pagina': pagina}, 'get', function(json) {
                    procesarCiudades(json.ciudades);
                    procesarPaginas(json.paginas);
                });
                break;
            case 'zapatos':
                genericAjax('ajax/listar', {'pagina': pagina}, 'get', function(json) {
                    pintar(objeto);
                    
                });
                break;
        }
    }

    var getHeader = function (objeto) {
        let result = '<tr>';
        console.log(objeto);
        // $.each(objeto, (key, value) => {
            var value = objeto[0];
            $.each(value, (key2,value2) => {
                if(key2 != "id"){
                  result += '<th><a href="#" data-orden='+key2+'>' + key2 + '</a></th>';  
                }
                  
            });
         
        // });
        result += '<td>Editar</td>'; 
        result += '<td>Borrar</td>'; 
        result += '</tr>';
        return result;
    }

    var getBody = function (objeto) {
        let result = '<tr>';
        $.each(objeto, (key, value) => {
            if(value == true){
                result += '<td><i class="fa fa-check-circle verde"></i></td>'; 
            }else if(value == false){
                result += '<td><i class="fa fa-times-circle rojo"></td>'; 
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
        var tabla = '<table class="table"><thead class="table_thead"></thead><tbody class="table_body"></tbody></table>'
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
        dataorden = $(event.currentTarget).attr('data-orden');
        history.pushState(null, "", 'admin/'+data);
        getListado(data,pagina,dataorden);
    })
    
    $('.borrar-user').on('click', function(event){
        event.preventDefault();
        id = $(event.currentTarget).attr('data-id');
        if(confirm("¿Seguro que quieres borrar al usuario cuya id es :" +id+"?")){
            
        
        history.pushState(null, "", 'admin/borrar'+id);
         genericAjax('ajax/deleteuser', {'id': id }, 'get', function(json) {
                    getListado(data,pagina,dataorden)
                });
        }
        
    })
    
    
    
    }
    
    
    // $('.onClickLista').on('click', function(){
        
    //     var parametros = {
    //         usuarios        :  $(e.currentTarget).attr('data-listar-usuario'),
    //         complementos    :  $(e.currentTarget).attr('data-listar-complementos'),
    //         zapatos         :  $(e.currentTarget).attr('data-listar-zapatos'),
    //         accion          :  'listar'
    //     }    
    //     genericAjax(url, parametros, "POST");
    // })
})();

(function() {
    
    var genericAjax = function (url, data, type, callBack) {
        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType : 'json',
        })
        .done(function( json ) {
            console.log('ajax done');
            console.log(json);
            callBack(json);
        })
        .fail(function( xhr, status, errorThrown ) {
            console.log('ajax fail');
        })
        .always(function( xhr, status ) {
            console.log('ajax always');
        });
    }
    
    if ($('#form-container').length > 0) {
        let validacion = new Validate('form-container');
        validacion.addSuccessListener(result => {
            
        });
        
        validacion.addErrorListener(error => {
            
        });
        
        validacion.addBlurCallback(node => {
            let data = {
                class: $('#form-container').attr('data-class'),
                key: node.name,
                value: node.value.trim(),
            }
            if (data.value.length > 0) {
                genericAjax('ajax/isavailable', data, 'post', json => {
                    if(json.result == 0) {
                        validacion.__addSpanError(node, 'Campo existente en la base de datos, por favor inserte otro valor.')
                    }
                })
            }
        });
        
        $('a.submit').on('click', event => {
            event.preventDefault();
            validacion.start();
        });
    }
    
})();