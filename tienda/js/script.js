(function () {

    /* global $ */

    var aliasok = true;
    var emailok = false;
    var usuario = null;

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


    var getCiudades = function (pagina) {
        genericAjax('ajax/listaciudades', {'pagina': pagina}, 'get', function(json) {
            pintar(objeto);
        });
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


    

})();