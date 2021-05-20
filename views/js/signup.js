$(document).ready(function() {
	$('#loginform').submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: 'views/handlers/loginHandler.php?signup',	
			data: $(this).serialize(),
			success: function(response){
				var jsonData = JSON.parse(response);
				if (jsonData.success) {
					alert('Registrado con exito, ya puede irse a la ventana de login');
					location.href = location.href;
				}else{
					alert('Error al registrarse');
				}
			}
		});
	});
});
	