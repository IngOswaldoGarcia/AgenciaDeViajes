function datos_cliente_nuevo(){
	var f = document.getElementById("folio").value
	var n = document.getElementById("nombre").value
	var a = document.getElementById("apellidos").value
	var t = document.getElementById("telefono").value
	var co = document.getElementById("email").value
	var ci = document.getElementById("ciudad").value

	var url = "../../PHP/PHPClientes/nuevoCliente.php";

	$.ajax({
		type:"POST",
		url:url,
		data:{folio:f, nombre:m, apellidos:a, telefono:t, email:co, ciudad:ci},
		success: function(response)
            {
               alert('datos guardados')
            },
            error : function(response)
            {
                alert('error al guardar los datos')
            }
   //return false;
	})
}