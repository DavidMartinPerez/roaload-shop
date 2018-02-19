$(document).ready(function(){
    $.ajax({url: "version.php", success: function(result){
        $(".cuerpo").append(result);
    }});
});//Document ready


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
//-Funcion para una nueva Version / CREATE
function nuevaVersion(){
    $(".btn-version").addClass("disabled");
    $.get("formulario.php",
    function(data){
        $(".tablaVersiones > tbody").prepend(data);
        $( ".fechapicker" ).datepicker({
                        firstDay: 1,
                        dateFormat: "yy-mm-dd"
                    });
    });
    // $("#formNuevoVersion").validate({//Validate
    //     rules: {
    //       precioNV: {required: true,min: 1, maxlength: 10},
    //       stockNV:{required:true, min: 1, maxlength: 10},
    //       fechaNV:{required:true}
    //     },
    //     messages:{
    //       precioNV: "Longitud errónea",
    //       stockNV: "Longitud errónea",
    //       fechaNV: "Fecha obligatoria"
    //     },
    //     submitHandler: function(form){//Si el validate funciona lo manda post
    //         guardarDatos();
    //     }
    // })
}
// function validar(){
//     $("#formNuevoVersion").submit();
// }

function cancelarFormulario(){
    $("#formularioNuevo").fadeOut(350, function(){
        $("#formularioNuevo").remove();
    });
    $(".btn-version").removeClass("disabled");
}

function guardarDatos(){
    $.post("guardarVersion.php", {
        idNombre:  $("#idJuegoNuevo").val(),
        idEdicion: $("#edicionJuegoNuevo").val(),
        idPtl: $("#plataformaJuegoNuevo").val(),
        idDis: $("#idDistribuidora").val(),
        precio: $("#precioNuevo").val(),
        stock: $("#stockNuevo").val(),
        fecha: $("#fechaNueva").val()
    },function(data){
        $(".cuerpo").empty();
        $(".cuerpo").append(data);
    });
}

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
                    $.post("actualizarDatos.php",{
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
