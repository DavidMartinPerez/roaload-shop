# WOW SHOP
### Proyecto de PHP - MYSQL
* Una APP sobre una tienda.
---------------------------

### Tecnologias utilizadas:
* Jquery
* Jquery UI Modal
* Jquery Validate
* PHP
* Mysql - mysqli
* Materializecss
* API Telegram con bot
* Ajax (en pesatañas estables)

## Detalles de la APP

Es una tienda en la cual puedes ver productos sin tener que iniciar sesión, le administrador puede crear nuevos productos.
Faltan aun añadirle funcionalidad de comprar productos.

## Detalles sobre la API

Para poder comprobar que se mandan los datos correctamente(Más adelante se explica el funcionamiento),
deberás unirte a este  grupo de telegram [Este link](https://t.me/joinchat/AAAAAEVY1AOMUGzFyMhsuw)
- La API mas adelante se utilizará para avisar a los usuarios de sus pedidos(con permiso de los usuarios por las políticas de Telegram)
- Y para servicios técnicos y dudas

# Capturas de la APP
Aquí enseñaremos parte de la aplicacion explicada (El diseño CSS puede ser diferente al original)

* E/R BBDD

![ER](/00/er.png "Entidad/Relación")

* Index
Vista general de la primera página de la web puede ser accedida por cualquier persona.

![Index](/00/principal.png "Index")

* Login
Para iniciar sesión a la derecha del navbar redirecciona a iniciarSesion.php si no estas conectado.
Todos los datos de la sesión se guardan en sesiones.

![Login](/00/login.png "Login")

Login Error

![LoginErr](/00/loginerr.png "Login Error")

* Registrarse
Para registrarnos en el login tenemos la opción Registrarse, cuando te registre te pide iniciar sesión.
Las contraseñas estan cifradas y comprueba si hay usuarios con ese nombre.

![Registro](/00/registro.png "Registro")

Registro Error

![RegistroErr](/00/registroerr.png "Registro")

* Perfil en el index
Nuestro perfil y opciones a funcionalidades estan en un sidenav al lado derecho con un desplegable.
Actualmente no tiene ninguna funcionalidad de cesta en el usuario simple (Algunos usuarios tienen cestas de prueba).

![PerfilUsuario](/00/perfilusuario.png "Perfil Usuario")

El perfil del administrador solo sale si eres administrador de la web, el perfil cual añade el a la administración de la web.

![PerfilAdmi](/00/perfiladmi.png "Perfil Administrador")

* Apartado de administración de productos
Podemos crear tanto como productos los cuales se llaman "Versiones", plataformas nuevas, ediciones y información sobre un juego.
Aun no esta disponible la administración de pedidos.

    * Versiones
    Esta parte es la cual donde se crean los productos que se muestran en la página principal
    Lista las Versiones existentes - Con filtros

    ![Administacion](/00/administacionVersiones.png "Administación Principal")

    En esta sección tenemos para crear una nueva en la cual entera en acción la Api de Telegram

    ![nuevaVersion](/00/nuevaversion.png "Nueva Version")

    El mensaje que manda a Telegram es el cual con esos datos.
    El formato del mensaje sera modificado cuando se añadan fotos y más información de los productos.
    ![telegram](/00/telegram_mensaje.jpeg "Mensaje en telegram")

    Sale un mensaje de confirmación como en los anteriores.
    A la hora de modificar se modiffca en un formulario y se añade a la misma columna.
    A la hora de eliminar se borra de la columna.

    * Ediciones / Plataformas / Juego
    (Estas pestañas son muy parecidas y solo pondré una sección)
    En la cual sale listado de las ediciones disponibles y puedes crear nuevas.

    ![edicionlista](/00/edicionlista.png "Lista de ediciones")

    Crear edición / Formulario de nueva edición.

    ![edicionnueva](/00/edicionformu.png "Formulario edición")

    Ya existe una edición.

    ![edicionexiste](/00/edicionexiste.png "Ya existe una edicion")

    Edición creada.

    ![edicioncreada](/00/edicioncreada.png "Exito")
