$(document).ready(function(){
    $.ajax({url: "version.php", success: function(result){
        $(".cuerpo").append(result);
    }});

    //############ SIDENAV ####################
    $('.button-collapse').sideNav({
        menuWidth: 240, // Default is 300
        edge: 'left', // Choose the horizontal origin
        closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true // Choose whether you can drag to open on touch screens,
    });
    //~############# /SIDENAV ############################

});//Document ready



//desplegar sidenav
function sidenav(){
    $("#sidenavAdmin").removeClass("sidenav-cerrado");
    $("#sidenavAdmin").addClass("sidenav-abiero");
}
//Rediracionamiento
function mostrarVersiones(){
    $.ajax({url: "version.php", success: function(result){
        $(".cuerpo").empty();
        $(".cuerpo").html(result);
    }});
}
function mostrarJuegos(){
    $.ajax({url: "juego.php", success: function(result){
        $(".cuerpo").empty();
        $(".cuerpo").html(result);
    }});
}
function mostrarPlataformas(){
    $.ajax({url: "plataforma.php", success: function(result){
        $(".cuerpo").empty();
        $(".cuerpo").html(result);
    }});
}
function mostrarEdiciones(){
    $.ajax({url: "edicion.php", success: function(result){
        $(".cuerpo").empty();
        $(".cuerpo").html(result);
    }});
}
//#####Funcioens para Versiones
//Funcion para borra version / DELETE
function borrar(idVersion){
    var idEliminar =  idVersion.id;
    $(".NombreVersionEliminar").html($(idVersion).parent().siblings("td.nombreJuegoTabla").html());
    $(".edicionVersionEliminar").html($(idVersion).parent().siblings("td.edicionTabla").html());
    $(".plataformaVersionEliminar").html($(idVersion).parent().siblings("td.plataformaTabla").html());
    $( ".eliminarVersionModal" ).dialog({
        resizable: false,
        height: "auto",
        width: 350,
        show: {
            effect: "drop",
            direction: "up",
        },
        hide: {
            effect: "drop",
            direction: "down",
        },
        modal: true,
        buttons: {
            Eliminarlo: function() {
                $.get("borrarVersion.php",{
                    "idVersion":idEliminar
                },function(){
                    $("#parte_" + idEliminar).fadeOut(500);
                });
                $( this ).dialog( "close" );
            },
            Cancel: function() {
                $( this ).dialog( "close" );
            }
        }
    });
}
//Funcion para una nueva Version / CREATE
function nuevaVersion(){
    $( ".fechapicker" ).datepicker({
                            firstDay: 1,
                            dateFormat: "yy-mm-dd"
                        });
    $( ".añadirVersionModal" ).dialog({
        resizable: false,
        height: "auto",
        width: 350,
        show: {
            effect: "drop",
            direction: "up",
        },
        open: function(){ //validacion
            $("#formNuevoVersion").validate({//Validate
                rules: {
                    precioNV: {required: true,min: 1, maxlength: 10},
                    stockNV:{required:true, min: 1, maxlength: 10},
                    fechaNV:{required:true}
                },
                messages:{
                    precioNV: "No puede ser negativo",
                    stockNV: "No puede ser negativo",
                    fechaNV: "Fecha obligatoria"
                },
                submitHandler: function(form){//Si el validate funciona lo manda post
                    $.post("guardarVersion.php", {
                        idNombre:  $("#idJuegoNuevo").val(),
                        nombreJuego: $("#idJuegoNuevo option:selected").text(),
                        idEdicion: $("#edicionJuegoNuevo").val(),
                        idPtl: $("#plataformaJuegoNuevo").val(),
                        nombrePlataforma: $("#plataformaJuegoNuevo option:selected").text(),
                        idDis: $("#idDistribuidora").val(),
                        precio: $("#precioNuevo").val(),
                        stock: $("#stockNuevo").val(),
                        fecha: $("#fechaNueva").val()
                    },function(data){
                        $(".cuerpo").empty();
                        $(".cuerpo").append(data);
                    });
                    $(".añadirVersionModal").dialog( "close" );
                    $("label.error").empty();
                    $("#formNuevoVersion")[0].reset();
                }
            })
        },
        hide: {
            effect: "drop",
            direction: "down",
        },
        modal: true,
        buttons: {
            Añadir: function() {
                $("#formNuevoVersion").submit();
            },
            Cancel: function() {
                $( this ).dialog( "close" );
                $("label.error").empty();
                $("#formNuevoVersion")[0].reset();
            }
        }
    });
}
//#########################################
//Modificar el registro / UPDATE
function modificarVersion(elemento){
    // Recoger los datos
    $( ".fechapickerModi" ).datepicker({
                    firstDay: 1,
                    dateFormat: "yy-mm-dd"
                });
    idVersionModificar =  elemento.id;
    iDnombreTabla = $(elemento).parent().siblings("td.nombreJuegoTabla").attr('id');
    iDedicionTabla = $(elemento).parent().siblings("td.edicionTabla").attr('id');
    iDplataformaTabla = $(elemento).parent().siblings("td.plataformaTabla").attr('id');
    precioTabla = $(elemento).parent().siblings("td.precioTabla").html();
    stockTabla = $(elemento).parent().siblings("td.stockTabla").html();
    fechaSalidaTabla = $(elemento).parent().siblings("td.fechaSalidaTabla").html();
    iDdisTabla = $(elemento).parent().siblings("td.disTabla").attr('id');
    //Meter los datos en el formulario
    $("#idJuegoModificar").val(iDnombreTabla);
    $("#edicionJuegoModificar").val(iDedicionTabla);
    $("#plataformaJuegoModificar").val(iDplataformaTabla);
    $("#precioModificar").val(precioTabla);
    $("#stockModificar").val(stockTabla);
    $("#fechaModificar").val(fechaSalidaTabla);
    $("#idDistribuidoraModificar").val(iDdisTabla);

    //Dialogo
    $( "#formularioPaModificar" ).dialog({
        resizable: false,
        height: "auto",
        width: 350,
        show: {
            effect: "drop",
            direction: "up",
        },
        close: $("label.error").empty(),
        open: function(){
            $("#formularioPaModificar").validate({//Validate
                rules: {
                  precioV: {required: true,min: 1, maxlength: 10},
                  stockV:{required:true, min: 1, maxlength: 10},
                  fechaV:{required:true}
                },
                messages:{
                  precioV: "Longitud errónea",
                  stockV: "Longitud errónea",
                  fechaV: "Fecha obligatoria"
                },
                submitHandler: function(form){//Si el validate funciona lo manda post
                    $.post("actualizarDatosVersion.php",{
                        idVersion: idVersionModificar,
                        juegoActualizado: $("#idJuegoModificar").val(), //value del option
                        nombreJuegoActualizado: $("#idJuegoModificar option:selected").text(), //texto del option
                        edicionActualizar: $("#edicionJuegoModificar").val(), //value del option
                        edicionJuegoActualizado: $("#edicionJuegoModificar option:selected").text(), //texto del option
                        plataformaActualizar: $("#plataformaJuegoModificar").val(), //value
                        plataformaJuegoActualizado: $("#plataformaJuegoModificar option:selected").text(), //texto
                        precioActualizar: $("#precioModificar").val(),
                        stockActualizar: $("#stockModificar").val(),
                        fechaActualizar: $("#fechaModificar").val(),
                        disActualizar: $("#idDistribuidoraModificar").val(), //value
                        disJuegoActualizado: $("#idDistribuidoraModificar option:selected").text() //texto
                    },function(data){
                        //sustituimos el contenido del tr por otro.
                        $("#parte_" + idVersionModificar).html(data);
                    });
                    $("#formularioPaModificar").dialog( "close" );
                    $("label.error").empty();
                }
            })
        },
        hide: {
            effect: "drop",
            direction: "down",
        },
        modal: true,
        buttons: {
            Modificar: function() {
                $("#formularioPaModificar").submit();
            },
            Cancel: function() {
                $( this ).dialog( "close" );
                $("label.error").empty();
            }
        }
    });
}

//  ORDER BY  ---Investigar como hacerlo desde html por ahoraa lo hace con diferentes consultas

function ordenar(){
    $.post("version.php",{
        campo: $(".selectOrdenar").val(), //valor del select
        orden: $(".selectAlternal").val()
        // campo: campito //campo por ordenar
        // orden: ordensito
    },function(data){
        $(".cuerpo").html(data);
    });
}

//######################################!./Verisiones
//############################ Funciones para juegos
function nuevoJuego(){
    $( ".añadirJuegoModal" ).dialog({
        resizable: false,
        height: "auto",
        width: 350,
        show: {
            effect: "drop",
            direction: "up",
        },
        open: function(){ //validacion
            $("#formNuevoJuego").validate({//Validate
                rules: {
                    nombre: {required: true,minlength: 1, maxlength: 20},
                    des:{required:true,minlength: 1, maxlength: 20}
                },
                messages:{
                    nombre: "Obligatorio",
                    des: "Obligatorio"
                },
                submitHandler: function(form){//Si el validate funciona lo manda post
                    $.post("guardarJuego.php", {
                        nombre:  $("#nombreNuevo").val(),
                        des:  $("#desNuevo").val()
                    },function(data){
                        $(".cuerpo").empty();
                        $(".cuerpo").append(data);
                    });
                    $(".añadirJuegoModal").dialog( "close" );
                    $("label.error").empty();
                    $("#formNuevoJuego")[0].reset();
                }
            })
        },
        hide: {
            effect: "drop",
            direction: "down",
        },
        modal: true,
        buttons: {
            Añadir: function() {
                $("#formNuevoJuego").submit();
            },
            Cancel: function() {
                $( this ).dialog( "close" );
                $("label.error").empty();
                $("#formNuevoJuego")[0].reset();
            }
        }
    });
}
//########!./Juegos
//##############################!./Ediciones
function nuevaEdicion(){
    $( ".añadirEdicionModal" ).dialog({
        resizable: false,
        height: "auto",
        width: 350,
        show: {
            effect: "drop",
            direction: "up",
        },
        open: function(){ //validacion
            $("#formNuevaEdicion").validate({//Validate
                rules: {
                    edicion: {required: true,minlength: 1, maxlength: 20}
                },
                messages:{
                    edicion: "Obligatorio"
                },
                submitHandler: function(form){//Si el validate funciona lo manda post
                    $.post("guardarEdicion.php", {
                        nombre:  $("#edicionNueva").val()
                    },function(data){
                        $(".cuerpo").empty();
                        $(".cuerpo").append(data);
                    });
                    $(".añadirEdicionModal").dialog( "close" );
                    $("label.error").empty();
                    $("#formNuevaEdicion")[0].reset();
                }
            })
        },
        hide: {
            effect: "drop",
            direction: "down",
        },
        modal: true,
        buttons: {
            Añadir: function() {
                $("#formNuevaEdicion").submit();
            },
            Cancel: function() {
                $( this ).dialog( "close" );
                $("label.error").empty();
                $("#formNuevoJuego")[0].reset();
            }
        }
    });
}
//########!./Edicion
//##############################!./Plataforma
function nuevaPlataforma(){
    $( ".añadirPlataformaModal" ).dialog({
        resizable: false,
        height: "auto",
        width: 350,
        show: {
            effect: "drop",
            direction: "up",
        },
        open: function(){ //validacion
            $("#formNuevaPlataforma").validate({//Validate
                rules: {
                    plata: {required: true,minlength: 1, maxlength: 20}
                },
                messages:{
                    plata: "Obligatorio"
                },
                submitHandler: function(form){//Si el validate funciona lo manda post
                    $.post("guardarPlataforma.php", {
                        nombre:  $("#plataNueva").val()
                    },function(data){
                        $(".cuerpo").empty();
                        $(".cuerpo").append(data);
                    });
                    $(".añadirPlataformaModal").dialog( "close" );
                    $("label.error").empty();
                    $("#formNuevaPlataforma")[0].reset();
                }
            })
        },
        hide: {
            effect: "drop",
            direction: "down",
        },
        modal: true,
        buttons: {
            Añadir: function() {
                $("#formNuevaPlataforma").submit();
            },
            Cancel: function() {
                $( this ).dialog( "close" );
                $("label.error").empty();
                $("#formNuevoJuego")[0].reset();
            }
        }
    });
}
//########!./Plataforma
