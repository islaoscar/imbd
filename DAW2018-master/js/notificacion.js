			function alertaTrue(){
				//un alert
				alertify.alert("<b>¡Mensaje enviado correctamente!</b>", function () {
				});
			}			
            function alertaEliminarPelicula(){
				//un alert
				alertify.alert("<b>¡Película borrada correctamente!</b>", function () {
				});
			}	
            function alertaModificarPelicula(){
				//un alert
				alertify.alert("<b>¡Película modificada correctamente!</b>", function () {
				});
			}	
			function confirmar(){
				//un confirm
				alertify.confirm("<p>¿Estás seguro de que quieres borrar esta película?.<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
					if (e) {
						window.location="php/procesar.php?accion=borrar";
					} else {
                        alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
					}
				}); 
				return false
			}
			function alertaError(){
				alertify.error("¡Ha habido un error con la consultaS!"); 
				//return false; 
			}
			
			
			
