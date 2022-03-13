<?php
	/*Controlador para CRUD de la tabla in_usurios, se reciben las peticiones por POST*/
	/*Los metodos para hacer consultas o SELECT estan en plantilla, asi que se heredan*/
	/*Fecha Creacion: 11/11/2021 */
	/*Autor Nombre del Autor: Richard Fonseca */
	class ControladorUsuarios extends ControladorPlantilla
	{
		/*
		*Funcion para Insertar los datos, se invoca por Form, Method POST
		*Return JSON => Code 1 Exito, 0 Error, message con el mensaje a mostrar en cada caso
		**/

		public static function insertDatos(){			
			if(isset($_POST['insertR'])){  /*Variable que se espera para validar que se esta insertando*/
				/*Array con los valores de los campos en la tabla y los valores que vienen por POST*/
				$image = null;
        		if(isset($_FILES['user_image_v']['tmp_name']) && !empty($_FILES['user_image_v']['tmp_name']) ){
			      	/*---JGM--- el metodo putImage recibe, el tmpName que vienen en el Type File, el  Type tyambien del File, la ruta real y la ruta que guardamos en la BD*/
					     /*---JGM--- Retorna la RUTA que vamos a guardar en la Base de datos*/
                  	$image = self::putImage($_FILES['user_image_v']['tmp_name'], $_FILES["user_image_v"]["type"] , __DIR__."/../views/usuarios/", 'views/usuarios/');
              	}

				$datos = array(
					'user_doc_id' 		            => $_POST['user_doc_id'], 
					'user_ran_id_i' 		        => $_POST['user_ran_id_i'],
					'user_primer_nombre_v'		    => $_POST['user_primer_nombre_v'],
					'user_segundo_nombre_v'		    => $_POST['user_segundo_nombre_v'],
                    'user_primer_apellido_v' 		=> $_POST['user_primer_apellido_v'], 
					'user_segundo_apellido_v' 		=> $_POST['user_segundo_apellido_v'],
					'user_title_v'		   			=> $_POST['user_title_v'],
					'user_cargo_v'		       		=> $_POST['user_cargo_v'],
					'user_telephone_v'     			=> $_POST['user_telephone_v'],
					'user_correo_v' 		   		=> $_POST['user_correo_v'], 
					'user_psw_mail_v' 		   		=> $_POST['user_psw_mail_v'],
					'user_password_v'		   		=> md5($_POST['user_password_v']),
					'user_per_id_i'		       		=> $_POST['user_per_id_i'],
                    'user_image_v' 		       		=> $image, 
					'user_est_id_i' 		   		=> 1,
					'user_a_registro'		   		=> $_POST['user_a_registro']
				);
				/*
					Se invoca el modelo de esa tabla y se manda a insertar, con el array que se llena en la parte superior
				*/

				$respuesta = UsuarioModelo::insertDatos($datos);
				/*Solo puede haber dos respuesta este metodo, el Id insertado o error, por eso este IF - ELSE */
				/*Retornamos la respuesta en json*/
				if($respuesta != "error"){
					/*Inserto Correctamente*/
					return json_encode(array('code' => 1, 'message' => 'Registro guardadado con exito'));
				}else{	
					/*No Correctamente*/
					return json_encode(array('code' => 0, 'message' => 'Registro no guardadado'));
				}
			}
		}

		/*
		*Funcion para Actualizar los datos, se invoca por Form, Method POST
		*Return JSON => Code 1 Exito, 0 Error, message con el mensaje a mostrar en cada caso
		**/

		public static function UpdateDatos(){
			if(isset($_POST['editarR'])){ /*Variable que se espera para validar que se esta Editando*/
				/*Array con los valores de los campos en la tabla y los valores que vienen por POST*/
				/*Lleva el ID del registro que se esta Actualizando */

				/*Validar password*/
				$pass = null;
				if ($_POST["user_password_v"] != "") {
				   	$pass = md5($_POST['user_password_v']);
				}else{
					$pass = $_POST["passwordUsuario"];
				}

				$image = $_POST["imagenUsuario"];
        		if(isset($_FILES['user_image_v']['tmp_name']) && !empty($_FILES['user_image_v']['tmp_name']) ){
			      	/*---JGM--- el metodo putImage recibe, el tmpName que vienen en el Type File, el  Type tyambien del File, la ruta real y la ruta que guardamos en la BD*/
					/*---JGM--- Retorna la RUTA que vamos a guardar en la Base de datos*/
                  	$image = self::putImage($_FILES['user_image_v']['tmp_name'], $_FILES["user_image_v"]["type"] , __DIR__."/../views/usuarios/", 'views/usuarios/');
              	}

				$datos = array(
					'user_doc_id' 		            => $_POST['user_doc_id'], 
					'user_ran_id_i' 		        => $_POST['user_ran_id_i'],
					'user_primer_nombre_v'		    => $_POST['user_primer_nombre_v'],
					'user_segundo_nombre_v'		    => $_POST['user_segundo_nombre_v'],
                    'user_primer_apellido_v' 		=> $_POST['user_primer_apellido_v'], 
					'user_segundo_apellido_v' 		=> $_POST['user_segundo_apellido_v'],
					'user_title_v'		   			=> $_POST['user_title_v'],
					'user_cargo_v'		       		=> $_POST['user_cargo_v'],
					'user_telephone_v'     			=> $_POST['user_telephone_v'],
					'user_correo_v' 		   		=> $_POST['user_correo_v'], 
					'user_psw_mail_v' 		   		=> $_POST['user_psw_mail_v'],
					'user_password_v'		   		=> $pass,
					'user_per_id_i'		       		=> $_POST['user_per_id_i'],
                    'user_image_v' 		       		=> $image, 
					'user_est_id_i' 		   		=> 1,
					'user_a_registro'		   		=> $_POST['user_a_registro'],
					'user_id'		           		=> $_POST['idUsuario']
					
				);
				/*
					Se invoca el modelo de esa tabla y se manda a actualizar, con el array que ser llena en la parte superior
				*/
				$respuesta = UsuarioModelo::UpdateDatos($datos);
				/*Solo puede haber dos respuesta este metodo, ok o error, por eso este IF - ELSE */
				/*Retornamos la respuesta en json*/
				if($respuesta == "ok"){
					/*Actualizo Correctamente*/
					return json_encode(array('code' => 1, 'message' => 'Registro actualizado Exitosamente'));
				}else{	
					/*No Actualizo Correctamente*/
					return json_encode(array('code' => 0, 'message' => 'No se pudo ejecutar el proceso'));
				}
			}
		}

		/*
		*Funcion para Eliminar los datos, se invoca por Form, Method POST
		*Return JSON => Code 1 Exito, 0 Error, message con el mensaje a mostrar en cada caso
		**/
		public static function deleteDatos(){
		    if(isset($_POST['eliminarR'])){ /*Variable que se espera para validar que se esta insertando*/
			    $datos = $_POST["eliminarR"];/*Variable con el ID que vamos a eliminar*/
			    /*
					Se invoca el modelo de esa tabla y se manda a eliminar, con la variable que recibimos en la parte superior
				*/
			    $respuesta = UsuarioModelo::deleteDatos($datos);
			    /*Solo puede haber dos respuesta este metodo, ok o error, por eso este IF - ELSE */
				/*Retornamos la respuesta en json*/
				if($respuesta == "ok"){
					/*Se Borro Correctamente*/
					return json_encode(array('code' => 1, 'message' => 'Registro eliminado exitosamente'));
			    }else{	
			    	/*No Se Borro Correctamente*/
					return json_encode(array('code' => 0, 'message' => 'Error al intentar eliminar el registro'));
				}
			}
		}
	}
