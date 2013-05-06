$(document).ready(function(){

	var validar = $('#form_login').validate({

		rules:{

			usuario: 'required',
			password: 'required'

		}

	});

	validar.showErrors({

		usuario: 'Necesitas un numero de cuenta',
		password: 'Necesitas tu contraseña'

	})

});