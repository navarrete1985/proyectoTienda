<?php

namespace tienda\app;

class App {
    
    const DATABASE = 'mvc',
          HOST = 'localhost',    
          PASSWORD = 'mvc',
          USER = 'mvc',
          APPLICATION_NAME = 'CorreoWeb',
          CLIENT_ID = '123796518941-ptgju1jq1a68ll00ek7harhmn8jps1ee.apps.googleusercontent.com',
          CLIENT_SECRET = 'eACBhPjTM7Vvjg_m3eXodfJO',
          EMAIL_ORIGIN = 'nacho.pena1985@gmail.com',
          EMAIL_ALIAS = 'Proyecto usuarios MVC',
          EMAIL_TOKEN_FILE = 'https://proyecto-tienda-navarrete.c9users.io/tienda/classes/tienda/email/token.conf',
          
          JWT_KEY = 'Proyecto_App_Usuarios',
          USER_SESSION_KEY = 'App_users',
          
          SESSION_NAME = 'APP_MVC_SESSION',
            
          BASE= 'https://proyecto-tienda-navarrete.c9users.io/tienda/',
          OBJECT = [
              'usuario'     => 'tienda\data\Usuario',
              'color'       => 'tienda\data\Color',
              'categoria'   => 'tienda\data\Categoria',
              'destinatario'=> 'tienda\data\Destinatario',
              'articulo'    => 'tienda\data\Articulo'
          ];
}