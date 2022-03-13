<?php
	/**
	* Este archivo se encarga de controlar el inicio de sessiones
	*/
	class ControladorAuth
	{
		
		public static function inicoSession(){
			//Validamos que vengan los campos
			if(isset($_POST['txtEmailBomB']) && isset($_POST['txtPasswordBom'])){
				/*Validamos que no intenten hacer Inyeccion sql o meter caracteres extraños */
				if($_POST['txtEmailBomB'] != '' && $_POST['txtPasswordBom'] != ''){
						
						$item 	= "user_correo_v";
						$valor	= $_POST['txtEmailBomB'];
						//Encriptamos la contraseña
						$pass = md5($_POST['txtPasswordBom']);
						//Mandamos a preguntar la información
						$respuesta = ModeloAuth::getDatosUsuarioLogin($item, $valor);
						
						if($respuesta['user_correo_v'] == $_POST['txtEmailBomB'] && $respuesta['user_password_v'] == $pass){

							$imagen = 'views/assets/img/usuarios/default/anonymous.png';
							if($respuesta['user_image_v'] != null){
								$imagen = $respuesta['user_image_v'];
							}
							$_SESSION['SessionWorky'] 				= 'ok';
							$_SESSION['codigo']						= $respuesta['user_id'];
							$_SESSION['perfil']						= $respuesta['user_per_id_i'];
							$_SESSION['nombrePer']					= $respuesta['per_descripcion_v'];
							$_SESSION['nombres'] 					= $respuesta['user_primer_nombre_v'].' '.$respuesta['user_segundo_nombre_v'];
							$_SESSION['correo'] 					= $respuesta['user_correo_v'];
							$_SESSION['idSession'] 					= Time().rand();
							$_SESSION['rango']						= $respuesta['user_ran_id_i'];
							$_SESSION['imagen']						= $imagen;
							$_SESSION['per_elimina_i']				= $respuesta['per_elimina_i'];
							$_SESSION['per_edita_i']				= $respuesta['per_edita_i'];
							$_SESSION['per_adiciona_i']				= $respuesta['per_adiciona_i'];
							/*=============================================
								REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN, AUDIORIA
							=============================================*/
							date_default_timezone_set('America/Bogota');
							$fecha = date('Y-m-d H:i:s');
							/*Enviamos la carga de informacion para guardar la ultima vez que esta persona se logeo en el sistema */
							$tabla = "users";
							$datos = "user_ultimo_login_d = '".$fecha."' , user_online_i = 1";
							$condicion = "user_id = ".$respuesta["user_id"];
							$ultimoLogin = ModeloAuth::mdlEditar($tabla, $datos, $condicion);
							if($ultimoLogin == "ok"){
								/*No paso nada y guardo todo bien, la mandamos al inicio*/
								echo '<script>
										window.location = "dashboard";
									</script>';
							}else{
								var_dump($ultimoLogin);
								/*ALgo paso y no actualizo el campo de fecha del ultimo login*/
							}
							
						}else{
							echo "<br>";
							echo "<div class='alert alert-danger'>Error al ingresar, correo y/o contraseña incorrectos</div>";
						}

					
				}else{
					echo "<br>";
					echo "<div class='alert alert-danger'>Error al ingresar, se enviaron caracteres extraños</div>";
				}
			}
		}

	}	


