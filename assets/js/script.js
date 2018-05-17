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
    var datos =    {
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
});//Document ready

//##################################################################################

function todos(filtro){
    $.ajax({url: "app/principal.php", success: function(result){
        $(".principalCuerpo").html(result);
    }});
}
function infoVersion(juego){
    console.log(juego.id)
    $.get("app/infoProducto.php", {
        id: juego.id
    },function(data){
        $(".principalCuerpo").empty();
        $(".principalCuerpo").append(data);
    });
}
function paginaPrincipal(){
    $.ajax({url: "app/principal.php",
    success: function(result){
        $(".principalCuerpo").html(result);
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
