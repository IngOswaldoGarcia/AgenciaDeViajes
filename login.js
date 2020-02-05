jQuery(document).on('submit','#formlg',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'../PHP/PHPLogin/login.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                		$('.botonlg').val('Validando...');
                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                if(!respuesta.error){
                	if(respuesta.nombre == 'correcto'){
                		location.href='principal.html';
                	}
                	else{
                		$('.error').slideDown('slow');
                		setTimeout(function(){
						$('.error').slideUp('slow');
	                	},3000);
	                	$('.botonlg').val('Iniciar Sesion');
                	}
                }
                else{
                	$('.error').slideDown('slow');
                	setTimeout(function(){
					$('.error').slideUp('slow');
                	},3000);
                	$('.botonlg').val('Iniciar Sesion');
                }
              })
              .fail(function(resp){
                console.log(resp.responseText);
              })
              .always(function(){
                console.log("complete");
            });
      });


