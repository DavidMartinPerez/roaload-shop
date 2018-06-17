# Roaload
### Proyecto de PHP - MYSQL
# Tienda Online SPA
---------------------------

### Tecnologias utilizadas:
* Jquery
* parsley.js (Para validaciones)
* PHP
* Mysql - mysqli
* Materializecss (Framework CSS)
* API Telegram con bot
* Ajax (Para crear una aplicación SPA)
* Bootstrap

## Detalles de la APP

Es una tienda en la cual puedes ver productos sin tener que iniciar sesión, le administrador puede crear nuevos productos.
Faltan aun añadirle funcionalidad de comprar productos.

## Detalles sobre la API

Para poder comprobar que se mandan los datos correctamente(Más adelante se explica el funcionamiento),
deberás unirte a este  grupo de telegram [Este link](https://t.me/joinchat/AAAAAEVY1AOMUGzFyMhsuw)
- La API mas adelante se utilizará para avisar a los usuarios de sus pedidos(con permiso de los usuarios por las políticas de Telegram)
- Y para servicios técnicos y dudas


# Todo lo que puede ver un usuario no registrado
## Principalmente esta web destaca por solo terner una carga incial y no volver a recargar más. Podeis fijaros en la ruta que no cambia.

## Tenemos la pantalla de incio o index, que es común tanto para usuarios regitrados o no:

![ER](/00/index.png "index")

![ER](/00/index1.png "inicio")

## Tenemos un mensaje que te advierte de las cookie si aceptamos desaparece y no volverá a aparecer hasta que borremos las cookies y si cancelamos seremos redireccionados a marvel.

![ER](/00/msgcookie.png "cookies")

## Footer

## Una cosa importante a tener encuenta es el "BreadCrum" que nos ayudará a navegar

![ER](/00/bc.png "bc")
![ER](/00/bc1.png "bc 1")
![ER](/00/bc2.png "bc 2")


![ER](/00/footer.png "footer")

## Info producto
* Ver información sobre un juego! Pinchando en cualquier foto de un producto:

![ER](/00/infoProducto.png "info Producto")

## Podemos usar los puntos de menos para entrar mejor los juegos:

* Tendremos un páginado en la pagina que nos ayudará a cargar la información visualmente más bonita

![ER](/00/filtroMenu.png "filtro menu")
![ER](/00/filtroMenu2.png "filtro menu")

## Filtrar Por el Buscador
* Si no tienes ganas de buscar por consola puedes buscar directamente en el buscador de la web
* Si hay resultados te lo mostrará y sino te avisará que no encontro!
* Mínimo tienes que buscar por 3 letras
![ER](/00/filtroBuscador.png "filtroBuscador.png")
![ER](/00/filtroBuscador2.png "filtroBuscador2.png")

## Pestaña de error cuando no encuentra nada:
![ER](/00/filtroBuscador2.png "filtroBuscador2.png")


## Inicio de sesión

* Pinchamos en ->

![ER](/00/perfil1.png "perfil")

* Si no hemos inciado sesión, te pedirá iniciar sesión:

![ER](/00/log.png "log")


* Una vez iniciada sesión, nos aparecerá el perfil:

# Apartir de aquí es todo el contenido que puede ver un usuario registrado
Donde tendrémos muchas funciones.
![ER](/00/PERFIL2.png "perfil")



# COMPRAR
## Añadir un producto a la cesta
* Si no tienes tienes productos en la cesta saldrá un mensaje de error, diciendote que esta vacia
* Hay 3 tipos de productos:
    * Con stock el cual saldrá su botón de comprar y se podra comprar
    * Sin stock osea ¡Agotado!
    * Descatalogado, este solo lo puede ver un administrador en la pestaña de administración(más adelante lo veremos)

![ER](/00/comprar1.png "diferencias compra")

* Al añadir un producto, nos saldrá un mensaje y en la cesta se añadirá nuestro producto
Por ejemplo añadiremos Splatoon 2:
El formato con el que salen es: "Producto" x "Cantidad"

![ER](/00/compra2.png "perfil compra")

* Una vez añadidos productos a la cesta podemos ver la cesta y realizar un pedido!

![ER](/00/cesta.png "cesta")

## Realizar un pedido
* Rellenamos los datos del pedido:

![ER](/00/datosPersonales.png "datos Perosnales")

* Datos de entrega:
![ER](/00/datosPersonales2.png "datos Perosnales")

* Servicio de correo(Actualmente solo dispone de correos):

![ER](/00/datosPersonales3.png "datos Perosnales")
* Métodos de pago(Actualmente solo dispone transferencia bancaria):
    * La base de datos esta preparada solo faltaría valdiación de datos.

![ER](/00/datosPersonales4.png "datos Perosnales")


## Resumen del pedido
* Una vez terminado nos enviará al resumen del pedido
    * Localizador del pedido para poder realizar consultas con la atención al cliente
    * Tenemos la información del cliente
    * Información del dato de pago
    * Resumen del pedido

![ER](/00/finPedido.png "resumen del pedido")

## Podemos ver la información del pedido en nuestro perfil

![ER](/00/pedidos.png "historial pedidos")
* Hay 4 estados de los pedidos:
    * 1 - Pendiente: Que se ha encargado pero aun no ha sido pagado(En este paso podemos cancelarlo sin problemas)
    * 2 - Pagado: Ha sido recibido el dinero pero aun no ha sido enviado
    * 3 - Recibido: Este lo establece el cliente cuando recibe el pedido
    * 4 - Cancelado: Por diversos motivos, ya sea por el cliente o el administrador

* Pedidos pendientes son los que aun no han sido finalizados
    * Estos muestra una lista los que aun estan pediente de pago o de envio
    * Los de estado pendiente pueden ser cancelados libremente

![ER](/00/pedidosP.png "pendientes pedidos")

* Si intentas cancelar un pedido en estado "pagado"
    * Te pedira contactar con un administrador ya sea correo o administración
    * Actualmente el mensaje es un + "mensaje al soporte tecnico"

![PedidoPagado](/00/errorCancelarPagado.png "Pedido cancelado Error estado incorrecto")

* Si cancelamos uno pendiente desaparecerá de la lista y aparecerá en la de histórico

* El resumen de pedido es igual pero con un boton que nos permitira avanzar el pedido a completado

![completado](/00/recibido.png "Pedido cancelado Error estado incorrecto")


* En la pestaña de Historial del pedido tenemos
    * Todos los pedidos relizados para poder ver su resumen
    * También deja cancelar los pendientes

![completado](/00/historico.png "Pedido cancelado Error estado incorrecto")

## Soporte técnico

![ER](/00/sp.png "soporte tecnico")
![ER](/00/sp2.png "soporte tecnico")

# Apartir de aquí es todo lo que puede ver un usuario Administrador.

## Todo lo que veremos ahora es apartir de entrar como administrador: admin admin

## El menú es diferente y tiene un opción que te manda a la consola de administración

![ER](/00/perfilAdmin.png "admin")

## Esta consola tiene varias opciones

* En el menú desplegable encontramos:
    * Productos: Administrar productos
    * Clientes: Administrar clientes
* Menú superior:
    * Documentación
    * Volver a la tienda
* Análisis sobre la web:
    * Ganancias totales de todas las ventas: (Se calcula apartir de el precio de venta de todos los productos vendidos)
    * VENTAS totales: El número de productos que se han vendido
* Resumen de los últimos pedidos
* Social: número de usuarios que hay registrados

![ER](/00/consoleAdmin.png "admin")

## Administración de productos:

![ER](/00/productos.png "admin")

* Tenemos 4 opciones(Se entiende mejor viendo el E/R):
    * Versiones: Aquí se administran los productos (Ver más abajo)
    * Juegos: Aquí se administran los juegos, creando juegos nuevo.
        * Tenemos la lista de juegos y el botón de añadir
![ER](/00/juego.png "jeugo")
        * Crear un nuevo juego despliega un nuevo modal para rellenar
![ER](/00/juego2.png "jeugo")
        * Se validan con Parsley.js una libreria de validación
![ER](/00/juego3.png "jeugo")
        * El juego se añade a la lista
![ER](/00/juego4.png "jeugo")

    * Plataforma: Se crean igual que en Juego
    * Ediciones: Se crea un nuevo producto igual que en Juego

## Para versiones:
* Opcion de filtrar para buscar un producto que administrar
* Opcion de crear nueva version(En este caso crearemos una de spiderman para seguir el ejemplo)
* Listado de producto
* Editar version
* Deshabilitar una version: las versiones deshabilitada no apareceran en la web

![ER](/00/version.png "jeugo")

* Filtro:

![ER](/00/version2.png "jeugo")

* Crear una versión:

![ER](/00/version3.png "jeugo")
![ER](/00/version4a.png "jeugo")

## API telegram
* Aquí entra en juego nuestra api de telegram
    * Mandandonos un mensaje atravez del bot en nuestro canal de telegram
![ER](/00/api1.png "jeugo")

* Juego en la tienda:

![ER](/00/version5.png "jeugo")

* Deshabilitar:
    * Si deshabilitamos una versión automaticamente no aparecera en la web.

![ER](/00/version6.png "jeugo")
![ER](/00/version7.png "jeugo")

## Administrar usuarios

![ER](/00/clientes.png "clientes")

* Usuarios, podemos bloquearlos:

![ER](/00/clientes2.png "clientes")

* Pedidos: Podemos ver los pedidos y administrarlos

![ER](/00/clientes3.png "clientes")

* Mensajes: Ver los reportes de los clientes

![ER](/00/clientes4.png "clientes")


# FIN de la Aplicación!
-------------------------

------------------------
# ANTIGUOS DETALLES / EVOLUCION DE LA APP


# Capturas de la APP
Aquí enseñaremos parte de la aplicacion explicada (El diseño CSS puede ser diferente al original)

* E/R BBDD

![ER](/00/old(er.png "Entidad/Relación")

* Index

Vista general de la primera página de la web puede ser accedida por cualquier persona.

![Index](00/old/principal.png "Index")

* Login

Para iniciar sesión a la derecha del navbar redirecciona a iniciarSesion.php si no estas conectado.
Todos los datos de la sesión se guardan en sesiones.

![Login](/00/old/login.png "Login")

Login Error

![LoginErr](/00/old/loginerr.png "Login Error")

* Registrarse

Para registrarnos en el login tenemos la opción Registrarse, cuando te registre te pide iniciar sesión.
Las contraseñas estan cifradas y comprueba si hay usuarios con ese nombre.

![Registro](/00/old/registro.png "Registro")

Registro Error

![RegistroErr](/00/old/registroerr.png "Registro")

* Perfil en el index

Nuestro perfil y opciones a funcionalidades estan en un sidenav al lado derecho con un desplegable.
Actualmente no tiene ninguna funcionalidad de cesta en el usuario simple (Algunos usuarios tienen cestas de prueba).

![PerfilUsuario](/00/old/perfilusuario.png "Perfil Usuario")

El perfil del administrador solo sale si eres administrador de la web, el perfil cual añade el a la administración de la web.

![PerfilAdmi](/00/old/perfiladmi.png "Perfil Administrador")

* Apartado de administración de productos

Podemos crear tanto como productos los cuales se llaman "Versiones", plataformas nuevas, ediciones y información sobre un juego.
Aun no esta disponible la administración de pedidos.

* Versiones

Esta parte es la cual donde se crean los productos que se muestran en la página principal
Lista las Versiones existentes - Con filtros

![Administacion](/00/old/administacionVersiones.png "Administación Principal")

En esta sección tenemos para crear una nueva en la cual entera en acción la Api de Telegram

![nuevaVersion](/00/old/nuevaversion.png "Nueva Version")

El mensaje que manda a Telegram es el cual con esos datos.
El formato del mensaje sera modificado cuando se añadan fotos y más información de los productos.
![telegram](/00/old/telegram_mensaje.jpeg "Mensaje en telegram")

Sale un mensaje de confirmación como en los anteriores.
A la hora de modificar se modiffca en un formulario y se añade a la misma columna.
A la hora de eliminar se borra de la columna.

* Ediciones / Plataformas / Juego

(Estas pestañas son muy parecidas y solo pondré una sección)
En la cual sale listado de las ediciones disponibles y puedes crear nuevas.

![edicionlista](/00/old/edicionlista.png "Lista de ediciones")

Crear edición / Formulario de nueva edición.

![edicionnueva](/00/old/edicionformu.png "Formulario edición")

Ya existe una edición.

![edicionexiste](/00/old/edicionexiste.png "Ya existe una edicion")

Edición creada.

![edicioncreada](00/old/edicioncreada.png "Exito")
