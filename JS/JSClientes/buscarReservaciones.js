
$(buscar_datos());

function buscar_datos(consulta){
	var id = document.getElementById("id").value
	$.ajax({
		url: '../../PHP/PHPClientes/buscarReservaciones.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta: consulta, id:id},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	})
		
}


$(document).on('keyup', '#caja_busqueda', function(){
	var valor = $(this).val();
	if(valor != ""){
		buscar_datos(valor);
	}
		else{
			buscar_datos();
		}
})

