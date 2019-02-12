(function () {

    /* global $ */

    var aliasok = true;
    var emailok = false;
    var usuario = null
    var data = "";    
    $('.onClickLista').on('click', function(event){
        event.preventDefault();
        data = $(event.currentTarget).attr('data-lista');
        pagina = $(event.currentTarget).attr('data-pagina');
        getListado(data,pagina);
    })
    console.log(data);
    console.log()
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


    var getListado = function (data,pagina) {
            
            switch(data) {
                
            case 'usuario':
                
                genericAjax('ajax/listarUsuario', {'pagina': pagina}, 'get', function(json) {
                    pintar(objeto.usuario);
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
        $.each(objeto, (key, value) => {
          result += '<td>' + objeto.key + '<td>'; 
        });
        result += '</tr>';
        return resutl;
    };

    var getBody = function (objeto) {
        let result = '<tr>';
        $.each(objeto, (key, value) => {
          result += '<td>' + value + '<td>'; 
        });
        result += '</tr>';
        return resutl;
    };

    var pintar = function (objeto) {
        var listaitems = '';
        var header = getHeader(objeto);
        $.each(objeto, function(key, value) {
            listaitems += getBody(value);
        });
        var tabla = '<table class="table"></table>'
        $('.main').empty();
        $('.main').append(tabla);
        $('.table_thead').empty();
        $('.table_thead').append(header);
        $('.table_body').empty();
        $('.table_body').append(header);
    }
    
    $(document).ajaxStart(function () {
        console.log('pre shadow');
        $('#loading').show();
    });

    $(document).ajaxStop(function () {
        console.log('post shadow');
        $('#loading').hide();
    });

    // $('.onClickLista').on('click', function(){
        
    //     var parametros = {
    //         usuarios        :  $(e.currentTarget).attr('data-listar-usuario'),
    //         complementos    :  $(e.currentTarget).attr('data-listar-complementos'),
    //         zapatos         :  $(e.currentTarget).attr('data-listar-zapatos'),
    //         accion          :  'listar'
    //     }    
    //     genericAjax(url, parametros, "POST");
    // })
    
    
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
            getCiudades(p); 
        });
        $('.btnNoPagina').on('click', function(e) {
            e.preventDefault();
        });
    }

})();