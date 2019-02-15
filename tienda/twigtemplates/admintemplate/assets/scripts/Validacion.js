class Validacion {
    /**
     * 
     * @param {String} formId Identificador del formulario a tratar
     */
    constructor(formId) {
        this._form = document.getElementById(formId);
        this._success = null;
        this._error = null;
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

    start() {
        this._elementos = this._form.querySelectorAll(`input`);
        let errors = 0;
        Array.from(this._elementos).forEach(field => {
            switch (field.type) {
                case 'password':
                errors += this.validarInput(field, field.type, "4", "16");
                break;
                case 'text':
                errors += this.validarInput(field, field.type, "5", "30");
                break;
                case 'email':
                errors += this.validarInput(field, field.type);
                break;
                case 'checkbox':
                errors += this.validarCheckbox(field);
                break;
            }
        });

        errors += this.validarRadio();

        if(errors === 0 && this._success !== null) {
            this._success();
        }else if (this._error !== null) {
            this._error(errors);
        }
    }

    validarInput(field, type, minDefault = "", maxDefault = "") {
        let result = 1;
        let errorMessage = "Formato de email inválido";
        if (field !== undefined && field !== null) {
            let minLength = this.__getAtributeValue(field, 'min-legth', minDefault);
            let maxLength = this.__getAtributeValue(field, 'max-length', maxDefault);
            let regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            switch(type) {
                case 'password':
                regex = new RegExp("^([a-zA-Z0-9\\s]{" + minLength + "," + maxLength + "})$");
                errorMessage = `El campo debe tener entre ${minLength} y ${maxLength} caracteres alfanuméricos`;
                break;
                case 'text':
                regex = new RegExp("^([a-zA-Z0-9\\s]{" + minLength + "," + maxLength + "})$");
                errorMessage = `El campo debe tener entre ${minLength} y ${maxLength} caracteres alfanuméricos`;
                break;
            }
            
            result = this.__validate(field, regex, errorMessage);
        }
        return result;
    }

    validarCheckbox(field) {
        let result = 0;
        if (field.getAttribute('checkRequired') !== undefined) {
            if (!field.checked) {
                this.__addSpanError(field, "Campo obligatorio");
                result = 1;
            }else {
                this.__removeSpanError(field);
            }
        }
        return result;
    }

    validarRadio() {
        let inputs = Array.from(this._form.querySelectorAll("input[type=radio][requireOne=true]"), input => input.name);
        inputs = new Set(inputs);
        let result = 0;
        inputs.forEach(element => {
            let checked = 0;
            let radios = this._form.querySelectorAll(`input[type=radio][name=${element}]`);
            Array.from(radios, item => {
                checked += (item.checked) ? 1 : 0;
            })
            if (checked === 0) {
                this.__addSpanError(radios[0], 'Obligatorio marcar una opción');
                result += 1;
            }else {
                this.__removeSpanError(radios[0]);
            }
        });
        return result;
    }
    
    __getAtributeValue(field, atributeName, defaultValue) {
        let value = field.getAttribute(atributeName);
        return (value === null || value === '') ? defaultValue : value;
    }

    __addSpanError(field, error) {
        let nextElement = field.nextElementSibling;
        if (nextElement !== null && nextElement !== undefined && nextElement.tagName === 'SPAN' && nextElement.classList.contains('error')) {
            return;
        }
        let node = document.createElement('span');
        node.classList.add('error');
        node.textContent = error;
        if (nextElement === null || nextElement === undefined) {
            this._form.appendChild(node);
        }else {
            this._form.insertBefore(node, nextElement);
        }
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
}