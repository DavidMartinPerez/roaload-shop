'use strict'

$(document).ready(function(){
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
    $.ajax({url: "app/vistas/infoInicio.php?nsw", success: function(result){
        $("#nswIndex").html(result);
        $("#vendidoIndex").html(result);
        $("#salidaIndex").html(result);
    }});
    $.ajax({url: "app/vistas/infoInicio.php?ps4", success: function(result){
        $("#ps4Index").html(result);
    }});
    $.ajax({url: "app/vistas/infoInicio.php?xbox", success: function(result){
        $("#xboxIndex").html(result);
    }});
    $.ajax({url: "app/vistas/infoInicio.php?pc", success: function(result){
        $("#pcIndex").html(result);
    }});
});//Document ready

//##################################################################################

function vistaPtl(plataforma){
    $.ajax({url: "app/vistas/infoInicio.php?" + plataforma + "&filtro=20", 
        success: function(result){
            $(".contenido").html(result);
            if(plataforma == 'todo'){
                breadcrumControl(null,'videojuegos');
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

function añadirCarrito(idP){
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