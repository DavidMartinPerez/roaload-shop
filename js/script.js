$(document).ready(function(){
    $.ajax({url: "app/principal.php", success: function(result){
        $(".principalCuerpo").html(result);
    }});
    $(".dropdown-button").dropdown();
});//Document ready

//##################################################################################
$(function() {
    $('.perfil-navbar').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true, // Choose whether you can drag to open on touch screens,
        onOpen: function(el) { }, // A function to be called when sideNav is opened
        onClose: function(el) {  }, // A function to be called when sideNav is closed
    });
});
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
