class Validate {
    /**
     * 
     * @param {String} formId Identificador del formulario a tratar
     */
    constructor(container, action) {
        this._form = document.getElementById(container);
        this._success = null;
        this._error = null;
        this._blurCallback = null;
        this.__checkBlur();
    }

    /**
     * @param {callback} callback para que se llama al realizar la validación satisfactoriamente
     */
    addSuccessListener(success) {
        this._success = success;
    }

    addErrorListener(error) {
        this._error = error;
    }
    
    addBlurCallback(blurCallback) {
        this._blurCallback = blurCallback;
    }

    start() {
        this._elementos = this._form.querySelectorAll('input');
        let errors = 0;
        Array.from(this._elementos).forEach(field => {
        if(field.getAttribute('data-empty') !== "true"){
            switch (field.type) {
                case 'password':
                if(this._elementos[0].value !== '')
                errors += this.validarInput(field, field.type, "4", "16");
                break;
                case 'text':
                errors += this.validarInput(field, field.type, "5", "30");
                break;
                case 'email':
                errors += this.validarInput(field, field.type);
                break;
            }
        }
        });
        
        if(errors === 0 && this._success !== null) {
            this._success();
        }else if (this._error !== null) {
            this._error(errors);
        }
    }

    validarInput(field, type, minDefault = "", maxDefault = "") {
        let result = 1;
        let errorMessage = "El campo no puede estar vacío";
        if (field !== undefined && field !== null) {
            let minLength = this.__getAtributeValue(field, 'min-legth', minDefault);
            let maxLength = this.__getAtributeValue(field, 'max-length', maxDefault);
            let noEmpty = this.__getAtributeValue(field, 'no-empty', undefined);
            var regex = new RegExp("^(?!\s*$).+");
            switch(type) {
                case 'password':
                    regex = new RegExp("^([a-zA-Z0-9\\s]{" + minLength + "," + maxLength + "})$");
                    errorMessage = `El campo debe tener entre ${minLength} y ${maxLength} caracteres alfanuméricos`;
                break;
                case 'text':
                    if (noEmpty === undefined) {
                        regex = new RegExp("^([\u00C0-\u00FF-a-zA-Z0-9\\s_@./#&+-]{" + minLength + "," + maxLength + "})$");
                        errorMessage = `El campo debe tener entre ${minLength} y ${maxLength} caracteres alfanuméricos`;
                    }
                break;
                case 'email':
                    regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    errorMessage = 'Formato de email inválido';
                break;
            }
            result = this.__validate(field, regex, errorMessage);
        }
        return result;
    }
    
    getFormData(types) {
        let formData = new FormData();
        Array.from(types).forEach(type => {
            $(`input[type=${type}]`).each(function() {
                if (type === 'file') {
                    formData.append($(this).attr('name'), $(this)[0].files[0]);
                }else if (type === 'checkbox') {
                    $(this).is(':checked') ? formData.append($(this).attr('name'), $(this).val()) : '';
                }else {
                    formData.append($(this).attr('name'), $(this).val());   
                }
            });
        });
        $('textarea').each(function() {
            formData.append($(this).attr('name'), $(this).val());
        });
        return formData;
    }
    
    getObjectValues(types) {
        let result = {};
        Array.from(types).forEach(type => {
            $(`input[type=${type}]`).each(function() {
                result[$(this).attr('name')] = $(this).val();
            })
        });
        $('textarea').each(function() {
            result[$(this).attr('name')] = $(this).val();
        })
        return result;
    }
    
    clearAllFields() {
        $('input').each(function() {
            $(this).val('');
        })
    }
    
    __getAtributeValue(field, atributeName, defaultValue) {
        let value = field.getAttribute(atributeName);
        return (value === null || value === '') ? defaultValue : value;
    }

    __addSpanError(field, error) {
        let nextElement = field.nextElementSibling;
        if (nextElement !== null && nextElement !== undefined && nextElement.tagName === 'SPAN' && nextElement.classList.contains('error')) {
            nextElement.textContent = error;
            return;
        }
        let node = document.createElement('span');
        node.classList.add('error');
        node.textContent = error;
        $(field).after(node);
    }

    __removeSpanError(field) {
        let nextElement = field.nextElementSibling;
        if (nextElement === null || nextElement === undefined || nextElement.tagName !== 'SPAN') {
            return;
        }
        nextElement.parentNode.removeChild(nextElement);
    }

    __validate(field, regex, errorMessage) {
        let result = 1;
        if(regex.test(field.value.trim())) {
            this.__removeSpanError(field);
            result = 0;
        }else {
            this.__addSpanError(field, errorMessage);
        }
        return result;
    }
    
    __checkBlur() {
        let elements = this._form.querySelectorAll('input');
        Array.from(elements).forEach(node => {
           node.addEventListener('blur', event => {
                if(event.currentTarget.getAttribute('data-empty') !== "true") {
                   if(node.hasAttribute('ajax-callback') && this._blurCallback !== null) {
                       this._blurCallback(event.currentTarget);
                    }else {
                       let min = node.type == 'password' ? '4' : '5';
                       let max = node.type == 'password' ? '16' : '30';
                       this.validarInput(node, node.type, min, max);
                   }
                }
           });
        });
    }
}