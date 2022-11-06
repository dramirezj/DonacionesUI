$(document).ready(function() {

	saveProduct();
	savePerson();
	editPerson()
	saveEnterprise();
	editEnterprise();
	saveEntry();
	traerMunicipiosPorDepto();
	mostrarDatosPersona();
	addInputFile();
	//cargarPDF();

});

function saveProduct() {

	$("#formNewProduct").submit(function(e) {

		e.preventDefault();

		save = $("#save").val();

		var formData = new FormData($("#formNewProduct").get(0));
		
		formData.append("save", save);

		$.ajax({
			url: window.location.origin+"/DonacionesUI/app/controlador/save.controller.php",
			method: "POST",
			datatype: "json",
			processData:false,
            contentType: false,
			data: formData,
			success: function(data) {
				console.log(data);
				if(data == "Ok") {
					$("#errores").html("");
					Swal.fire({
						icon: "success",
						title: "Producto guardado exitosamente!",
						backdrop: true,
						position: "center",
						allowOutsideClick: true,
						allowEscapeKey: false,
						allowEnterKey: false
					}).then(function() {
						window.location.reload();
					});
				} else {
					if(data == "Error") {
						Swal.fire({
							icon: "error",
							title: "No se pudo guardar el producto!",
							backdrop: true,
							position: "center",
							allowOutsideClick: true,
							allowEscapeKey: false,
							allowEnterKey: false
						}).then(function() {
							window.location.reload();
						});
					} else {

						$("#errores").html(data);

					}
				}
			},
			error: function(data) {

				console.log(data);

			}
		});

	});

};

function savePerson() {

	$("#formNewPerson").submit(function(e) {

		e.preventDefault();

		save = $("#save").val();

		var formData = new FormData($("#formNewPerson").get(0));
		
		formData.append("save", save);

		$.ajax({
			url: window.location.origin+"/DonacionesUI/app/controlador/save.controller.php",
			method: "POST",
			datatype: "json",
			processData:false,
            contentType: false,
			data: formData,
			success: function(data) {
				console.log(data);
				if(data == "Ok") {
					$("#errores").html("");
					Swal.fire({
						icon: "success",
						title: "Donante guardado exitosamente!",
						backdrop: true,
						position: "center",
						allowOutsideClick: true,
						allowEscapeKey: false,
						allowEnterKey: false
					}).then(function() {
						window.location.reload();
					});
				} else {
					if(data == "Error") {
						Swal.fire({
							icon: "error",
							title: "No se pudo guardar el donante!",
							backdrop: true,
							position: "center",
							allowOutsideClick: true,
							allowEscapeKey: false,
							allowEnterKey: false
						}).then(function() {
							window.location.reload();
						});
					} else {

						$("#errores").html(data);

					}
				}
			},
			error: function(data) {

				console.log(data);

			}
		});

	});

}

function saveEnterprise() {

	$("#formNewEnterprise").submit(function(e) {

		e.preventDefault();

		save = $("#save").val();

		var formData = new FormData($("#formNewEnterprise").get(0));
		formData.append("save", save);

		$.ajax({
			url: window.location.origin+"/DonacionesUI/app/controlador/save.controller.php",
			method: "POST",
			datatype: "json",
			processData:false,
            contentType: false,
			data: formData,
			success: function(data) {
				console.log(data);
				if(data == "Ok") {
					$("#errores").html("");
					Swal.fire({
						icon: "success",
						title: "Empresa guardada exitosamente!",
						backdrop: true,
						position: "center",
						allowOutsideClick: true,
						allowEscapeKey: false,
						allowEnterKey: false
					}).then(function() {
						window.location.reload();
					});
				} else {
					if(data == "Error") {
						Swal.fire({
							icon: "error",
							title: "No se pudo guardar la empresa!",
							backdrop: true,
							position: "center",
							allowOutsideClick: true,
							allowEscapeKey: false,
							allowEnterKey: false
						}).then(function() {
							window.location.reload();
						});
					} else {

						$("#errores").html(data);

					}
				}
			},
			error: function(data) {

				console.log(data);

			}
		});

	});

}

function editEnterprise() {

	$("#formEditEnterprise").submit(function(e) {

		e.preventDefault();

		save = $("#save").val();

		var formData = new FormData($("#formEditEnterprise").get(0));
		formData.append("save", save);

		$.ajax({
			url: window.location.origin+"/DonacionesUI/app/controlador/save.controller.php",
			method: "POST",
			datatype: "json",
			processData:false,
            contentType: false,
			data: formData,
			success: function(data) {
				console.log(data);
				if(data == "Ok") {
					$("#errores").html("");
					Swal.fire({
						icon: "success",
						title: "Empresa actualizada exitosamente!",
						backdrop: true,
						position: "center",
						allowOutsideClick: true,
						allowEscapeKey: false,
						allowEnterKey: false
					}).then(function() {
						window.location.reload();
					});
				} else {
					if(data == "Error") {
						Swal.fire({
							icon: "error",
							title: "No se pudo actualizar la empresa!",
							backdrop: true,
							position: "center",
							allowOutsideClick: true,
							allowEscapeKey: false,
							allowEnterKey: false
						}).then(function() {
							window.location.reload();
						});
					} else {

						$("#errores").html(data);

					}
				}
			},
			error: function(data) {

				console.log(data);

			}
		});

	});

}

function saveEntry() {

	$("#formNewEntry").submit(function(e) {

		e.preventDefault();

		save = $("#save").val();

		var formData = new FormData($("#formNewEntry").get(0));
		
		formData.append("save", save);

		$.ajax({
			url: window.location.origin+"/DonacionesUI/app/controlador/save.controller.php",
			method: "POST",
			datatype: "json",
			processData:false,
            contentType: false,
			data: formData,
			success: function(data) {
				if(data == "Ok") {
					$("#errores").html("");
					Swal.fire({
						icon: "success",
						title: "Entrada guardada exitosamente!",
						backdrop: true,
						position: "center",
						allowOutsideClick: true,
						allowEscapeKey: false,
						allowEnterKey: false
					}).then(function() {
						window.location.reload();
					});
				} else {
					if(data == "Error") {
						Swal.fire({
							icon: "error",
							title: "No se pudo guardar la entrada!",
							backdrop: true,
							position: "center",
							allowOutsideClick: true,
							allowEscapeKey: false,
							allowEnterKey: false
						}).then(function() {
							window.location.reload();
						});
					} else {

						$("#errores").html(data);

					}
				}
			}
		});

	});

};

function mostrarDatosPersona() {

	$("#identificacion_rep").on('blur',function() {

		parametros = {
			"id_tipo_doc": $("#id_tipo_doc_rep").val(),
			"identificacion": $("#identificacion_rep").val(),
			"mostrar": "mostrarDatosPersona"
		};

		$

		$.ajax({
			url: window.location.origin+"/DonacionesUI/app/controlador/data.controller.php",
			method: "POST",
			datatype: "json",
			data: parametros,
			beforeSend:function() { },
			success:function(response) {

				datos = $.parseJSON(response);

				if(datos["codigo"] != 404) {

					$("#persona_id").val(datos["id"]);
					$("#id_tipo_doc_rep").val(datos["id_tipo_doc"]);
					$("#identificacion_rep").val(datos["identificacion"]);
					$("#primer_nombre_rep").val(datos["primer_nombre"]);
					$("#segundo_nombre_rep").val(datos["segundo_nombre"]);
					$("#primer_apellido_rep").val(datos["primer_apellido"]);
					$("#segundo_apellido_rep").val(datos["segundo_apellido"]);
					$("#direccion_rep").val(datos["direccion"]);
					$("#telefono_rep").val(datos["telefono"]);
					$("#email_rep").val(datos["email"]);
					$("#departamento_id_rep").val(datos["departamento_id"]);
					traerMunicipios(datos["departamento_id"],datos["municipio_id"]);
					$("#estado_rep").val(datos["enabled"]);

				} else {

					$("#persona_id").val("");
					$("#primer_nombre_rep").val("");
					$("#segundo_nombre_rep").val("");
					$("#primer_apellido_rep").val("");
					$("#segundo_apellido_rep").val("");
					$("#direccion_rep").val("");
					$("#telefono_rep").val("");
					$("#departamento_id_rep").val("NULL");
					$("#municipio_id_rep").val("NULL");
					$("#email_rep").val("");
					$("#estado_rep").val("NULL");

				}

			}


		})

	});

}

function editPerson() {

	$("#formEditPerson").submit(function(e) {

		e.preventDefault();

		save = $("#save").val();

		var formData = new FormData($("#formEditPerson").get(0));
		formData.append("save", save);

		$.ajax({
			url: window.location.origin+"/DonacionesUI/app/controlador/save.controller.php",
			method: "POST",
			datatype: "json",
			processData:false,
            contentType: false,
			data: formData,
			beforeSend:function() { },
			success:function(response) {
				console.log(response);
				if(response == "Ok") {
					$("#errores").html("");
					Swal.fire({
						icon: "success",
						title: "Datos de la persona editados exitosamente!",
						backdrop: true,
						position: "center",
						allowOutsideClick: true,
						allowEscapeKey: false,
						allowEnterKey: false
					}).then(function() {
						window.location.reload();
					});
				} else {
					if(response == "Error") {
						Swal.fire({
							icon: "error",
							title: "No se pudo editar los datos de la persona!",
							backdrop: true,
							position: "center",
							allowOutsideClick: true,
							allowEscapeKey: false,
							allowEnterKey: false
						}).then(function() {
							window.location.reload();
						});
					} else {

						$("#errores").html(response);

					}
				}
			}

		})

	})

}

function traerMunicipios(departamento_id, municipio_id) {

	parametros = {
		"departamento_id": departamento_id,
		"mostrar": "traerMunicipios"
	}

	$.ajax({
		url: window.location.origin+"/DonacionesUI/app/controlador/data.controller.php",
		method: "POST",
		datatype: "json",
		data: parametros,
		beforeSend:function() { },
		success:function(response) {
			//console.log(response);
			municipios = $.parseJSON(response);
			$("#municipio_id_rep").empty().append("<option value='NULL'>..:: Seleccione ::..</option>");
			for(i = 0; i < municipios.length; i++) {
				$("#municipio_id_rep").append("<option value='"+municipios[i]["id"]+"'>"+municipios[i]["nombre"]+"</option>");
			}
			$("#municipio_id_rep").val(municipio_id);			
		}
		
	})

}

function traerMunicipiosPorDepto() {

	departamentoEmp = $("#departamento_id_emp");

	departamentoEmp.change(function() {

		if(departamentoEmp != null) {

			console.log(departamentoEmp.val());

			parametros = {
				"departamento_id": departamentoEmp.val(),
				"mostrar": "traerMunicipios"
			};

			$.ajax({
				url: window.location.origin+"/DonacionesUI/app/controlador/data.controller.php",
				method: "POST",
				datatype: "json",
				data: parametros,
				beforeSend:function() { },
				success:function(response) {
					municipios = $.parseJSON(response);
					$("#municipio_id_emp").empty().append("<option value='NULL'>..:: Seleccione ::..</option>");
					for(i = 0; i < municipios.length; i++) {
						$("#municipio_id_emp").append("<option value='"+municipios[i]["id"]+"'>"+municipios[i]["nombre"]+"</option>");
					}
				}
				
			})

		}

	})

	departamentoRep = $("#departamento_id_rep");

	departamentoRep.change(function() {

		if(departamentoRep != null) {

			parametros = {
				"departamento_id": departamentoRep.val(),
				"mostrar": "traerMunicipios"
			}

			$.ajax({
				url: window.location.origin+"/DonacionesUI/app/controlador/data.controller.php",
				method: "POST",
				datatype: "json",
				data: parametros,
				beforeSend:function() { },
				success:function(response) {
					municipios = $.parseJSON(response);
					$("#municipio_id_rep").empty().append("<option value='NULL'>..:: Seleccione ::..</option>");
					for(i = 0; i < municipios.length; i++) {
						$("#municipio_id_rep").append("<option value='"+municipios[i]["id"]+"'>"+municipios[i]["nombre"]+"</option>");
					}
				}
				
			})

		}

	})

	departamento = $("#departamento_id");

	departamento.change(function() {

		if(departamento != null) {

			parametros = {
				"departamento_id": departamento.val(),
				"mostrar": "traerMunicipios"
			}

			$.ajax({
				url: window.location.origin+"/DonacionesUI/app/controlador/data.controller.php",
				method: "POST",
				datatype: "json",
				data: parametros,
				beforeSend:function() { },
				success:function(response) {
					municipios = $.parseJSON(response);
					$("#municipio_id").empty().append("<option value='NULL'>..:: Seleccione ::..</option>");
					for(i = 0; i < municipios.length; i++) {
						$("#municipio_id").append("<option value='"+municipios[i]["id"]+"'>"+municipios[i]["nombre"]+"</option>");
					}
				}
				
			})

		}

	})

}

function addInputFile() {

	$("#addFile").click(function() {

		var html = '';
		html =  '<div class="col-sm-12">';
		html += 	'<div class="inputFormRow">';
		html += 		'<div class="col-sm-3">';
		html += 			'<div class="form-group">';
		html += 				'<label for="filetype">Tipo archivo *</label>';
		html += 				'<select class="form-control" id="filetype" name="filetype[]" name="enabledRep" required>';
		html += 					'<option value="NULL">..::Seleccione::..</option>';
		html += 				'</select>';
		html += 			'</div>';
		html += 		'</div>';
		html += 		'<div class="col-sm-4">';
		html += 			'<div class="form-group">';
		html += 				'<label for="file">Archivo *</label>';
		html +=						'<div class="input-group">';
		html += 						'<input type="file" id="file" name="file[]" class="form-control">';
		html +=							'<div class="input-group-btn"> ';
        html +=                				'<button type="button" id="removeFile" class="btn btn-danger btn-sn btn-block"><i class="fa fa-close"></i> Borrar</button>';
        html +=            				'</div>';
        html +=            			'</div>';
		html += 				'<div class="label label-warning">Peso m&aacute;ximo  10 MB</div>';
		html += 			'</div>';
		html += 		'</div>';
		html += 	'</div>'
		html += '</div>';

		$("#newRow").append(html);

	});

	$(document).on('click', '#removeFile', function() {
		$(this).closest('.inputFormRow').remove();

	})

}

function cargarPDF(archivo) {

	var origin = window.location.origin;
	var path = origin+"/DonacionesUI/app/documentos"

	var myState = {
		pdf: null,
		currentPage: 1,
		zoom: 0.9
	}

	pdfjsLib.getDocument(path+'/PazySalvo.pdf').then((pdf) => {
		myState.pdf = pdf,
		render(myState);
	})

}

function render(myState) {

    myState.pdf.getPage(myState.currentPage).then((page) => {
 
        var canvas = document.getElementById("pdf_renderer");
        var ctx = canvas.getContext('2d');

        var viewport = page.getViewport(myState.zoom);

        canvas.width = viewport.width;
        canvas.height = viewport.height;
 
        page.render({
            canvasContext: ctx,
            viewport: viewport
        });
    });

}

function mostrarDocumento(id) {

	parametros = {
		"id": id,
		"mostrar": $("#mostrar").val()
	};

	$.ajax({
		url: window.location.origin+"/DonacionesUI/app/controlador/data.controller.php",
		method: "POST",
		datatype: "json",
		data: parametros,
		beforeSend:function() { },
		success:function(response) {
			
		}
	})

}