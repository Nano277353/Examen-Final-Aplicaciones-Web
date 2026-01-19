$(".agregarFoto").change(function()		// . si es un punto es una clase...
{
	var imagen = this.files[0]; 	//console.log("imagen", imagen);

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png")
		{

		$(".agregarFoto").val("");
		window.alert("El formato para la imagen debe ser .JPG o .PNG...");

	} else if(imagen["size"] > 2097152)
		{

			$(".agregarFoto").val("");
			window.alert("El tamaño de la foto no puede ser mayor a 2 MB...")

	}else
		{

			var datosImagen = new FileReader;
			datosImagen.readAsDataURL(imagen);

			$(datosImagen).on("load", function(event)
			{

				var rutaImagen = event.target.result;

				$(".previsualizar").attr("src", rutaImagen);

			})

		}
})

// VALIDAR NO repetir correo...
$("#txtCorreo").change(function(){

	$(".alert").remove();

	var correo = $(this).val();
	var datos = new FormData();

	datos.append("validarCorreo", correo);
	//console.log("datos", datos);

	$.ajax({
		url:"ajax/usuarios.ajax.php",		//OJO...
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			
			if(respuesta == "1"){

				$("#txtCorreo").after('<div class="alert alert-danger">Este correo ya existe en la base de datos</div>');

			}

		}

	})
})

$(".btnEditarUsuario").click(function()
{
  	var idusuario = $(this).attr("idusuario");
  	//var fotoUsuario = $(this).attr("fotoUsuario");

	window.location = "index.php?ruta=editar-usuario&idusuario="+idusuario;

})


$(".btnEditarClase").click(function()
{
  	var idclase = $(this).attr("idclase");
  	//var fotoUsuario = $(this).attr("fotoUsuario");

	window.location = "index.php?ruta=editar-clase&idclase="+idclase;

})

