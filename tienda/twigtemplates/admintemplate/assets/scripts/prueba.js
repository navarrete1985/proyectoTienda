(function() {
    
    let persona = {
        contador: 0,
        incremento: function() {
            // var that = this;
            // function hola () {
            //     this.contador++;    
            // };
            
            // let hola = (incremento, suma) => {
            //   this.contador = incremento + suma;  
            // };
            
            let hola = function(incremento, suma) {
              this.contador += incremento + suma;  
            };
            // hola.call(this);
            // hola(3, 1);
            hola.call(this, 3, 1);
            hola.call(this, 3 ,1);
            console.log(this.contador);
        }
    }
    persona.incremento();
    
    // persona.saluda();
    
    function Person(first, last, age, eyecolor) {
      this.firstName = first;
      this.lastName = last;
      this.age = age;
      this.eyeColor = eyecolor;
    }
    
    // una = Person('una', 'dos', 'asd', 'asdasd');
    // una.name();
    
    Person.prototype.name = function() {
      return this.firstName + " " + this.lastName;
    };
    
    una = new Person('una', 'dos', 'asd', 'asdasd');
    console.log(una.name());
    
    Array.prototype.listar = function() {
        salida = '';
        //this el objeto array
        this.forEach(value => {
            salida += value;
        })
        console.log(salida);
    };
    
    let miarray = [1, 2, 3, 4, 6, 7, 8];
    miarray.listar();
    
    
    // $('#id').on('click', e => {
    //     $(e.currentTarget)
    // })
    // $('#id').on('click', e => {
    //     $(e.currentTarget)
    // })
    
})();