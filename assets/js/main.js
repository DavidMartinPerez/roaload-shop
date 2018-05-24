'use strict' //modo estricto

$(document).ready(function(){
	// sparkline charts
	var sparklineNumberChart = function() {

		var params = {
			width: '140px',
			height: '30px',
			lineWidth: '2',
			lineColor: '#20B2AA',
			fillColor: false,
			spotRadius: '2',
			spotColor: false,
			minSpotColor: false,
			maxSpotColor: false,
			disableInteraction: false
		};

		$('#number-chart1').sparkline('html', params);
		$('#number-chart2').sparkline('html', params);
		$('#number-chart3').sparkline('html', params);
		$('#number-chart4').sparkline('html', params);
	};

	sparklineNumberChart();


	// traffic sources
	var dataPie = {
		series: [45, 25, 30]
	};

	var labels = ['Direct', 'Organic', 'Referral'];
	var sum = function(a, b) {
		return a + b;
	};

	new Chartist.Pie('#demo-pie-chart', dataPie, {
		height: "270px",
		labelInterpolationFnc: function(value, idx) {
			var percentage = Math.round(value / dataPie.series.reduce(sum) * 100) + '%';
			return labels[idx] + ' (' + percentage + ')';
		}
	});


	// progress bars
	$('.progress .progress-bar').progressbar({
		display_text: 'none'
	});

	// line chart
	var data = {
		labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
		series: [
			[200, 380, 350, 480, 410, 450, 550],
		]
	};

	var options = {
		height: "200px",
		showPoint: true,
		showArea: true,
		axisX: {
			showGrid: false
		},
		lineSmooth: false,
		chartPadding: {
			top: 0,
			right: 0,
			bottom: 30,
			left: 30
		},
		plugins: [
			Chartist.plugins.tooltip({
				appendToBody: true
			}),
			Chartist.plugins.ctAxisTitle({
				axisX: {
					axisTitle: 'Day',
					axisClass: 'ct-axis-title',
					offset: {
						x: 0,
						y: 50
					},
					textAnchor: 'middle'
				},
				axisY: {
					axisTitle: 'Reach',
					axisClass: 'ct-axis-title',
					offset: {
						x: 0,
						y: -10
					},
				}
			})
		]
	};

	new Chartist.Line('#demo-line-chart', data, options);


	// sales performance chart
	var sparklineSalesPerformance = function() {

		var lastWeekData = [142, 164, 298, 384, 232, 269, 211];
		var currentWeekData = [352, 267, 373, 222, 533, 111, 60];

		$('#chart-sales-performance').sparkline(lastWeekData, {
			fillColor: 'rgba(90, 90, 90, 0.1)',
			lineColor: '#5A5A5A',
			width: '' + $('#chart-sales-performance').innerWidth() + '',
			height: '100px',
			lineWidth: '2',
			spotColor: false,
			minSpotColor: false,
			maxSpotColor: false,
			chartRangeMin: 0,
			chartRangeMax: 1000
		});

		$('#chart-sales-performance').sparkline(currentWeekData, {
			composite: true,
			fillColor: 'rgba(60, 137, 218, 0.1)',
			lineColor: '#3C89DA',
			lineWidth: '2',
			spotColor: false,
			minSpotColor: false,
			maxSpotColor: false,
			chartRangeMin: 0,
			chartRangeMax: 1000
		});
	}

	sparklineSalesPerformance();

	var sparkResize;
	$(window).on('resize', function() {
		clearTimeout(sparkResize);
		sparkResize = setTimeout(sparklineSalesPerformance, 200);
	});


	// top products
	var dataStackedBar = {
		labels: ['Q1', 'Q2', 'Q3'],
		series: [
			[800000, 1200000, 1400000],
			[200000, 400000, 500000],
			[100000, 200000, 400000]
		]
	};

	new Chartist.Bar('#chart-top-products', dataStackedBar, {
		height: "250px",
		stackBars: true,
		axisX: {
			showGrid: false
		},
		axisY: {
			labelInterpolationFnc: function(value) {
				return (value / 1000) + 'k';
			}
		},
		plugins: [
			Chartist.plugins.tooltip({
				appendToBody: true
			}),
			Chartist.plugins.legend({
				legendNames: ['NINTENDO', 'SONY', 'XBOX']
			})
		]
	}).on('draw', function(data) {
		if (data.type === 'bar') {
			data.element.attr({
				style: 'stroke-width: 30px'
			});
		}
	});
	// Mensaje de bienvenida
	toastr.options.closeButton = true;
	toastr.options.positionClass = 'toast-bottom-right';
	toastr.options.showDuration = 1000;
	toastr['success']("Buenas días Administrador, ¿Qué tal?");

});//Document ready

//Rediracionamiento
// VISTAS: version, edicion, juego, plataformas.
function mostrarVista(vista){
    $.ajax({url: "app/trastienda/" + vista + ".php",
        success: function(result){
            $("#cuerpo").empty();
            $("#cuerpo").html(result);
        }
    });
}

//  ORDER BY  ---Investigar como hacerlo desde html por ahora lo hace con diferentes consultas
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


//Nuevos Modales y Creación
function juegoNuevo(){ // JUEGO NUEVO
    $('#nuevoJuegoForm')[0].reset(); //limpia formulario
    $('#nuevoJuegoForm').parsley().reset(); //resetea errores de parsley
    $("#nuevoJuego").modal('show');
    $("#nuevoJuegoForm").on('submit', function(){
        $.ajax({
            type: "POST",
            url: "app/trastienda/accionesCrud.php?juego&accion=crear",
            data: {
                nombre: $("#nombreJuegoNuevo").val(),
                desc: $("#descripcionJuegoNuevo").val()
            },
            success: function(response){
                if(response == "true"){
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    $("#nuevoJuego").modal('hide');
                    toastr['success']("¡Listo!");
                }else if(response == "false"){
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Ya existe el juego");
                }else{
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Fallo en el servidor...");
                }
                //FIXME: Añadir uno nuevo a la lista
                //mostrarVista('juego');
            },
            error: function(){
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.showDuration = 1000;
                toastr['error']("No se puedo crear el juego...");
            }
        })
    });
}
function plataformaNueva(){ // Plataforma nueva
    // TODO: Crear formulario y modal...
    console.log('hola');
    $('#nuevaPlataformaForm')[0].reset(); //limpia formulario
    $('#nuevaPlataformaForm').parsley().reset(); //resetea errores de parsley
    $("#nuevaPlataforma").modal('show');
    $("#nuevaPlataformaForm").on('submit', function(){
        $.ajax({
            type: "POST",
            url: "app/trastienda/accionesCrud.php?plataforma&accion=crear",
            data: {
                nombre: $("#nombrePlataformaNueva").val()
            },
            success: function(response){
                if(response == "true"){
                    $("#nuevaPlataforma").modal('hide');
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['success']("¡Listo!");
                }else if(response == "false"){
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Ya existe esta Version...");
                }else{
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Fallo en el servidor... Recuerda que no puedes usar numeros para empezar los nombres...");
                }
                //FIXME: Añadir uno nuevo a la lista
                //mostrarVista('plataforma');
            },
            error: function(){
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.showDuration = 1000;
                toastr['error']("No se puedo crear esta versión...");
            }
        })
    });
}

function edicionNueva(){ // Edicion nueva
    //TODO: Crear formulario y modal...
    $('#nuevaEdicionForm')[0].reset(); //limpia formulario
    $('#nuevaEdicionForm').parsley().reset(); //resetea errores de parsley
    $("#nuevaEdicion").modal('show');
    $("#nuevaEdicionForm").on('submit', function(){
        $.ajax({
            type: "POST",
            url: "app/trastienda/accionesCrud.php?edicion&accion=crear",
            data: {
                nombre: $("#nombreEdicionNueva").val(),
                desc: $("#descripcionEdicionNueva").val() //FIXME: Añadir funcion para terner una desc de la version(cosas que trae,regalos, etc)
            },
            success: function(response){
                if(response == "true"){
                    $("#nuevaEdicion").modal('hide');
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['success']("¡Listo!");
                }else if(response == "false"){
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Ya existe la edicion");
                }else{
                    toastr.options.closeButton = true;
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.showDuration = 1000;
                    toastr['error']("Fallo en el servidor... Recuerda que no puedes usar numeros para empezar los nombres...");
                }
                //TODO: RECAGAR LA LISTA CON EL NUEVO PRODUCTO o Añadir uno nuevo a la lista
                console.log(response);
                //FIXME: Añadir uno nuevo a la lista
                //mostrarVista('edicion');
            },
            error: function(){
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';
                toastr.options.showDuration = 1000;
                toastr['error']("No se puedo crear la edición...");
            }
        })
    });
}
function versionNueva(){ // CREAR UNA VERSIÓN
    //TODO: Realizar
}
// Eliminar Productos
function deshabilitarVersion(idVersion){ // Deshabilitar
    //TODO: Deshabilitar un versión de un juego

}
// EDITAR

// mensajes
//################################################# DEPRECATED #############################################

//#####Funcioens para Versiones
//Funcion para borra version / DELETE
function borrarDEPRECATED(idVersion){
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
function nuevaVersionDEPRECATED(){
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
function modificarVersionDEPRECATED(elemento){
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
//######################################!./Verisiones
//############################ Funciones para juegos
function nuevoJuegoDEPRECATED(){
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
function nuevaEdicionDEPRECATED(){
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
function nuevaPlataformaDEPRECATED(){
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
//############################################### /.DEPRECATED #############################################