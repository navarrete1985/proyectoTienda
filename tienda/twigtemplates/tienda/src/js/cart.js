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
    
    // addItemCallback(callback) {
    //     this._addItemCallback = callback;
    // }
    
    // addErrorItemCallback(callback) {
    //     this._error = callback;
    // }
    
    // addSuccessItemCallback(callback) {
    //     this._success = callback;
    // }
    
    addItem(id, img, name, price, quantity) {
        let row = '';
        
        if ($(`clearfix[data-id=${id}`).length > 0) {
            $(`clearfix[data-id=${id} span.item-quantity-value`).text(quantity);
        }else {
            row = `
                <li class="clearfix" data-id='${id}'>
                    <img src="${img}" alt="item1" />
                    <span class="item-name">${name}</span>
                    <span class="item-price">${price}</span>
                    <span class="item-quantity">Quantity: </span class="item-quantity-value"></span>${quantity}</span>
                </li>
            `;   
        }
        this._refreshTotal();
        this._refreshBadge();
    }
    
    removeItem(id, quantity) {
        if (quantity == 0) {
            $(`clearfix[data-id=${id}`).remove();
        }else {
            $(`clearfix[data-id=${id} span.item-quantity-value`).text(quantity);
        }
        this._refreshTotal();
        this._refreshBadge();
    }
    
    _refreshTotal() {
        let total = 0;
        $('span.item-quantity-value').each((index, element) => {
            total += parseInt(element.text());
        });
        $('#cart-total').text(total + '€');
    }
    
    _refreshBadge() {
        let total = 0;
        $('span.item-quantity-value').each((index, element) => {
            total += parseInt(element.text());
        });
        $('#cart-total').text(total + '€');
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