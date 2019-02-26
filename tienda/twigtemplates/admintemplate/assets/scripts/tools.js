class GenericAjax {
    
    constructor() {}
    
    request(url, data, type, callBackDone, callBackFail = null, callBackAlways = null) {
        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType : 'json',
        })
        .done(function( json ) {
            callBackDone(json);
        })
        .fail(function( xhr, status, errorThrown ) {
            if (callBackFail !== null) {
                callBackFail(status);   
            }
        })
        .always(function( xhr, status ) {
            if (callBackFail !== null) {
                callBackAlways(status);   
            }
        });
    }
    
}

class Message {
    
    constructor(delay = 3000, animateEnter = 'animated zoomInDown', animateExit = 'animated zoomOutUp', axisX = 'left', axisY = 'top'){
        this._delay = delay;
        this._animateEnter = animateEnter;
        this._animateExit = animateExit;
        this._axisX = axisX;
        this._axisY = axisY;
    }
    
    set animateEnter(animate) {
        this._animateEnter = animate;
    }
    
    set animateExit(animate) {
        this._animateExit = animate;
    }
    
    set delay(delay) {
        this._delay = delay;
    }
    
    showMessage(title, message, type) {
    	let titleContent = title == undefined ? '' : '<strong>'+ title + '</strong><br>'
    	$.notify({
    		title: titleContent,
    		message: message
    	},
    	{
    		type: type,
    		delay: this._delay,
    		animate: {
    			enter: this._animateEnter,
    			exit: this._animateExit
    		},
    		placement: {
    			from: this._axisY,
    			align: this._axisX
    		},
    	});
    }

}