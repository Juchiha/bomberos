<?php
	/*Controlador para CRUD de la tabla in_perfiles, se reciben las peticiones por POST*/
	/*Los metodos para hacer consultas o SELECT estan en plantilla, asi que se heredan*/
	/*Fecha Creacion: 11/11/2021 */
	/*Autor Nombre del Autor: Richard Fonseca */
	class ControladorPerfiles extends ControladorPlantilla
	{	
		/*Obtner los menus por perfil, ordenados en su respectivo orden*/
		public static function getMenusPerfilesOdenado($perfil){
			return PerfilesModelo::getMenusPerfilesOdenado($perfil);
		}
		/*
		*Funcion para Insertar los datos, se invoca por Form, Method POST
		*Return JSON => Code 1 Exito, 0 Error, message con el mensaje a mostrar en cada caso
		incopleto
		**/
		public static function insertDatos(){			
			if(isset($_POST['insertR'])){  /*Variable que se espera para validar que se esta insertando*/
				/*Array con los valores de los campos en la tabla y los valores que vienen por POST*/
				$adicionar = 0;
				$editar___ = 0;
				$eliminar_ = 0;
				if(isset($_POST['NuevoAdicionar'])){
					$adicionar = 1;
				}
				if(isset($_POST['NuevoEditar'])){
					$editar___ = 1;
				}
				if(isset($_POST['NuevoEliminar'])){
					$eliminar_ = 1;
				}
				$datos = array(
  			 		'per_descripcion_v'        => $_POST['NuevoNombre'],
  			   	    'per_estado_i'             => 1,
  			   	    'per_adiciona_i'           => $adicionar,
  			   	    'per_edita_i'              => $editar___,
  			   	    'per_elimina_i'            => $eliminar_,
  			   	    'per_superadin_i'          => 0	
				);
				/*
					Se invoca el modelo de esa tabla y se manda a insertar, con el array que se llena en la parte superior
				*/

				$respuesta = PerfilesModelo::insertDatos($datos);
				/*Solo puede haber dos respuesta este metodo, el Id insertado o error, por eso este IF - ELSE */
				/*Retornamos la respuesta en json*/
				if($respuesta != "error"){
					/*Inserto Correctamente*/
					/*le damos los permisos*/
					if(isset($_POST['NuevoMenusPerfil'])){
						/*Borramos los permisos*/
						foreach($_POST['NuevoMenusPerfil'] as $men){
							$campos = 'pem_per_id_i, pem_men_id_i';
							$valores = "'".$respuesta."', '".$men."' ";
							PerfilesModelo::mdlCrear('sys_perfiles_menu', $campos, $valores);
						}
					}
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
			if(isset($_POST['editarR'])){ /*Variable que se espera para validar que se esta insertando*/
				/*Array con los valores de los campos en la tabla y los valores que vienen por POST*/
				/*Lleva el ID del registro que se esta Actualizando */
				$adicionar = 0;
				$editar___ = 0;
				$eliminar_ = 0;
				if(isset($_POST['EditarAdicionar'])){
					$adicionar = 1;
				}
				if(isset($_POST['EditarEditar'])){
					$editar___ = 1;
				}
				if(isset($_POST['EditarEliminar'])){
					$eliminar_ = 1;
				}
				$datos = array(
  			 		'per_descripcion_v'        => $_POST['EditarNombre'],
  			   	    'per_estado_i'             => 1,
  			   	    'per_adiciona_i'           => $adicionar,
  			   	    'per_edita_i'              => $editar___,
  			   	    'per_elimina_i'            => $eliminar_,
  			   	    'per_superadin_i'          => 0,
  			   	    'per_id_i' 				   => $_POST['idPerfilEdicion'],
					
				);
				/*
					Se invoca el modelo de esa tabla y se manda a actualizar, con el array que ser llena en la parte superior
				*/
				$respuesta = PerfilesModelo::UpdateDatos($datos);
				/*Solo puede haber dos respuesta este metodo, ok o error, por eso este IF - ELSE */
				/*Retornamos la respuesta en json*/
				if($respuesta == "ok"){
					/*Actualizo Correctamente*/
					/*le damos los permisos*/
					if(isset($_POST['EditarMenusPerfil'])){
						/*Borramos los permisos*/
						PerfilesModelo::mdlBorrar('sys_perfiles_menu','pem_per_id_i = '.$_POST['idPerfilEdicion']);
						foreach($_POST['EditarMenusPerfil'] as $men){
							$campos = 'pem_per_id_i, pem_men_id_i';
							$valores = "'".$_POST['idPerfilEdicion']."', '".$men."' ";
							PerfilesModelo::mdlCrear('sys_perfiles_menu', $campos, $valores);
						}
					}

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
			    $respuesta = PerfilesModelo::deleteDatos($datos);
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
