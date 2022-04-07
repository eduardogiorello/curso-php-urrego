<?php



class ControladorFormularios
{

	/*=============================================
	Registrar en la bbdd
	=============================================*/

	static public function ctrRegistro()
	{

		if (isset($_POST['registroNombre'])) {

			$tabla = "registros";

			$datos = array(
				"nombre" => $_POST['registroNombre'],
				"email" => $_POST['registroEmail'],
				"password" => $_POST['registroPassword']

			);

			/*intancio el modelo con su metodo para registrar*/
			$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

			return $respuesta;
		}
	}

	/*=============================================
	listar Registros
	=============================================*/

	static public function ctrSeleccionarRegistros($item, $valor)
	{

		$tabla = "registros";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	ingreso
	=============================================*/

	public function ctrIngreso()
	{

		if (isset($_POST['ingresoEmail'])) {

			$tabla = "registros";
			$item = "email";
			$valor = $_POST['ingresoEmail'];

			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

			if ($respuesta['email'] == $_POST['ingresoEmail'] && $respuesta['password'] == $_POST['ingresoPassword']) {

				/*variable de sesion para comprobar login */
				$_SESSION['login'] = 'ok';

				//esto limpia las variables post
				echo '<script>

				if ( window.history.replaceState ) {

					window.history.replaceState( null, null, window.location.href ); 

				}
				window.location = "index.php?pagina=inicio";

			</script>';
			} else {

				echo '<script>

				if ( window.history.replaceState ) {

					window.history.replaceState( null, null, window.location.href );

				}

			</script>';

				echo '<div class="alert alert-danger">Usuario o password invalidos</div>';
			}
		}
	}


	/**************************
      actualizar registro
	 **************************/

	public function ctrActualizarRegistro()
	{
		if (isset($_POST['actualizarNombre'])) {
			if ($_POST['actualizarPassword'] != '') {
				$password = $_POST['actualizarPassword'];
			} else {
				$password = $_POST['passwordActual'];
			}


			$tabla = "registros";

			$datos = array(
				"id" => $_POST['idUsuario'],
				"nombre" => $_POST['actualizarNombre'],
				"email" => $_POST['actualizarEmail'],
				"password" => $password

			);

			/*instancio el modelo con su metodo para actualizar*/
			$respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>
	
					if ( window.history.replaceState ) {
	
						window.history.replaceState( null, null, window.location.href );
	
					}
	
					</script>';

				echo '<div class="alert alert-success">El usuario ha Actualizado</div>';
			}
		}
	}
}
