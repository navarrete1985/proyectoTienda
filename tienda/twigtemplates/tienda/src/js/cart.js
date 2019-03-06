class Cart {
    
    constructor(container) {
        this._container = container;
        this._addItemCallback = null;
        this._success = null;
        this.error = null;
        $("#cart").on("click", e => {
            e.preventDefault();
           this.fade();
        });
        this.fade();
        $('.container-cart').removeClass('hidden');
    }
    
    addItem(object) {
        let row = '';
        
        if ($(`.clearfix[data-id='${object.id}]'`).length > 0) {
            $(`.clearfix[data-id='${object.id}]'] span.item-quantity-value`).text(object.cantidad);
        }else {
            row = `
                <li class="clearfix" data-id='${object.id}'>
                    <img width="70" src="${object.img}" alt="item1" />
                    <span class="item-name">${object.modelo}</span>
                    <span class="item-price">${object.precio}</span>€
                    <span class="item-quantity">Quantity: </span>
                    <span class="item-quantity-value">${object.cantidad}</span>
                </li>
            `;
            $('.shopping-cart-items').append(row);
        }
        this._refreshTotal();
        this._refreshBadge();
    }
    
    removeItem(id, quantity) {
        if (quantity == 0) {
            $(`.clearfix[data-id=${id}]`).remove();
        }else {
            $(`.clearfix[data-id=${id}] span.item-quantity-value`).text(quantity);
        }
        this._refreshTotal();
        this._refreshBadge();
    }
    
    _refreshTotal() {
        let total = 0;
        $('.clearfix').each((index, element) => {
            let unidades = parseInt($(element).children('.item-quantity-value')[0].textContent);
            let precioUnitario = $(element).children('.item-price').text();
            // let op = parseFloat(unidades * precioUnitario).toFixed(2);
            total += parseFloat(unidades * precioUnitario);
        });
        $('#cart-total').text(total.toFixed(2) + '€');
    }
    
    _refreshBadge() {
        let total = 0;
        $('span.item-quantity-value').each((index, element) => {
            total += parseInt($(element).text());
        });
        $('.badge').text(total + '');
    }
    
    fade() {
        $(this._container).fadeToggle("fast");
        $(this._container).toggleClass('visible');
    }
    
    request(url, data, callBackDone, callBackFail = null, callBackAlways = null) {
        // dt = dt == null ? 'json' : dt;
        $.ajax({
            url: url,
            data: data,
            type: 'post',
            dataType : 'json',
            // contentType: false,
            // processData: pd,
        })
        .done( json => {
            callBackDone(json);
            if (!$(this._container).hasClass('visible')) {
                this.fade();
            }
            console.log('Carrito ok');
        })
        .fail((xhr, status, errorThrown) => {
            if (callBackFail !== null) {
                callBackFail(status);   
            }
            console.log('Carrito fail');
            console.log('Estado ' + status);
            console.log('Error ' + errorThrown);
        })
        .always((xhr, status) => {
            if (callBackAlways !== null) {
                callBackAlways(status);   
            }
        });
    }
    
}