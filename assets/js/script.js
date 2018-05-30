'use strict'

$(document).ready(function(){
    // MODALES INICIALES
    if(!getCookie('usoAtajos')){
        console.log("Cookies: Muestro modal de atajos de teclado.")
    }
    // MENSAJES DE COOKIE
    if(!getCookie('cookies')){
        $('body').append('<div class="msgUsoCookie">Cookies<button onclick="aceptarCookies()">Aceptar</button><a class="btn" href="noCookies_noLife">Cancelar</button></div>');
    }

    // ATAJOS DE TECLADO PARA FUNCIONALIDADES DE LA WEB
    var atajoTeclado = true;
    $(document).keypress(function(e) {
        if(atajoTeclado == true){
            console.log(e.charCode)
            if(e.charCode == 10){
                console.log("atajo: abre sidenav");
                $(".perfil-navbar").sideNav('show');
            }
            if(e.charCode == 2){
                console.log("atajo: Abre modal de de atajos");
            }
            if(e.charCode == 26){
                console.log("atajo: ir al login")
                location.href = location.href + "/login";
            }
        }
    });
    $(".dropdown-button").dropdown();
    //NAVBAR responsivo
    $(".button-collapse").sideNav();
    //Carrousel inicial
    $('.slider').slider();
    //buscar datos en base de datos
    $( ".busInicio" ).keypress(function() {
        $.get( "app/recuperarDatos.php", function( data ) {
            alert( "Load was performed." );
        });
    });
    var datos = {
      "Kingdom Hearts": null,
      "Mario Bros": null,
      "Pokemon": null,
    };
    //autocompletado
    $('input.autocomplete').autocomplete({
      data: datos,
      limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
      onAutocomplete: function(val) {
        alert(val)
      },
      minLength: 3, // The minimum length of the input for the autocomplete to start. Default: 1.
    });

    $('.perfil-navbar').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true, // Choose whether you can drag to open on touch screens,
        onOpen: function(el) {  }, // A function to be called when sideNav is opened
        onClose: function(el) {  }, // A function to be called when sideNav is closed
    });
    $.ajax({url: "app/vistas/infoInicio.php?nsw&init", success: function(result){
        $("#nswIndex").html(result);
        //$("#vendidoIndex").html(result);
        //$("#salidaIndex").html(result);
        }
    });
    $.ajax({url: "app/vistas/infoInicio.php?ps4&init", success: function(result){
        $("#ps4Index").html(result);
    }});
    $.ajax({url: "app/vistas/infoInicio.php?xone&init", success: function(result){
        $("#xboxIndex").html(result);
    }});
    $.ajax({url: "app/vistas/infoInicio.php?pc&init", success: function(result){
        $("#pcIndex").html(result);
    }});
});//Document ready

//##################################################################################

function vistaPtl(plataforma, filtro=4,pagina=1){
    $.ajax({url: "app/vistas/infoInicio.php?" + plataforma + "&filtro=" + filtro + "&pagina=" + pagina,
        success: function(result){
            $(".contenido").html(result);
            if(plataforma == 'todo'){
                breadcrumControl(true,'videojuegos');
            }else{
                breadcrumControl(true,plataforma);
            }
        }
    });
}
function limpiarBreadcrum(){ //Carga index en el contenedor y limpiar el breadcrum
    //paginaPrincipal();
    breadcrumControl(true);
}
function infoVersion(idJ, nombre, plataforma){ //Carga la información de el producto y lo añade en el contenedor
    breadcrumControl(null, null, nombre);
    $.get("app/infoProducto.php", {
        id: idJ,
        ptl: plataforma
    },function(data){
        $(".contenido").html(data);
    });
}
function paginaPrincipal(){
    $.ajax({url: "app/principal.php",
    success: function(result){
        $(".contenido").html(result);
    }});
}

function añadirCarrito(idP){ //añade un producto o suma a uno existente a la cesta (guardada en sesion)
    $.get("app/carrito.php",{
        idA: idP
    },function(data){
        Materialize.toast('¡Añadido al carrito!', 3000, 'green rounded');
        console.log(data);
        $(".carritoP").html(data);
    }
)};

function breadcrumControl(limpiar = null,plataforma = null, nombre = null){ //Remover o añadir div's al breadcrum
    //[1º limpiar todo, 2º nombre de la plataforma eliminado el 3º paso, 3º nombre del juego]
    if(limpiar != null) {
        $(".juegoMigas").remove();
        $(".migasInfoJuego").remove();
        console.log("borro breadcrum");
    }
    if(plataforma != null){
        $(".migasDePan").append("<a class='breadcrumb juegoMigas'>" + plataforma.toUpperCase() + "</a>");
        console.log("añado plataforma");
    }
    if(nombre != null){
        $(".migasDePan").append('<a class="breadcrumb migasInfoJuego">' + nombre + '</a>');
        console.log("añado nombre");
    }

}
// funcion comprobar cookie
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return true;
        }
    }
    return false;
}

// funcion crear cookie
function setCookie(cname, exdays) {
    var d = new Date();
    var cvalue = new Date().toJSON().slice(0,10);
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// Crear cookies si se aceptan
function aceptarCookies(){
    setCookie('cookies', 365);
    $('.msgUsoCookie').fadeOut(1000);
}

// Redirecionamos a la cesta

function cargarCesta(){
    $.ajax({
        url: "./app/vistas/cesta.php",
        method: "POST",
        success: function(result){
            $(".contenido").html(result);
        }
    });
}