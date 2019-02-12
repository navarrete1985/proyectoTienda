// var elem = document.querySelector('.grid');
// var msnry = new Masonry( elem, {
//   // options
//   itemSelector: '.grid-item',
//   columnWidth: 200
// });

// // element argument can be a selector string
// //   for an individual element
// var msnry = new Masonry( '.grid', {
//   // options
// });


 var autor = document.getElementById('author')
 var email = document.getElementById('email')
 if(autor != null || email !=null){
     autor.placeholder = "Introduce tu nombre ";
     email.placeholder = "Introduce tu email ";
 }
 document.getElementById('comment').placeholder = "Descripcion ";