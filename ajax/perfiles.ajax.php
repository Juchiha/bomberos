<?php
	/*Clase para asignar seguridad a el controlador de perfiles, se reciben las peticiones por POST y por GET*/
	/*Fecha Creacion: 13/03/2022 */
	/*Autor Nombre del Autor: Jose Giron */
	session_start();
	require_once '../controllers/mail.controller.php';
	require_once '../controllers/plantilla.controller.php';
	require_once '../controllers/perfiles.controller.php';

	require_once '../models/dao.modelo.php';
	require_once '../models/datatables.modelo.php';
	/*Modelos que se vallan a utilizar, generalmente los de la tabla a usar*/
	require_once '../models/perfiles.modelo.php';

	class ajaxPerfiles {
		public function insertDatos(){ /*Funcion para insercion*/
			echo ControladorPerfiles::insertDatos();
		}
		
		public function updateDatos(){/*Funcion para actualizar*/
			echo ControladorPerfiles::UpdateDatos();
		}

		public function deleteDatos(){/*Funcion para eliminar*/
			echo ControladorPerfiles::deleteDatos();
		}

		public function getDatos($IdTabla){
			$perfilDatos = ControladorPerfiles::getData('sys_perfiles', 'per_id_i', $IdTabla);
			$manusDatos = ControladorPerfiles::getMenusPerfilesOdenado($IdTabla);
			echo json_encode(array('datosPerfil' => $perfilDatos, 'DatosMenus' => $manusDatos));

		}

		public function getAllDatos(){/*Funcion para obtener todos los datos de una tabla*/
			
            $registros = ControladorPerfiles::getData('sys_perfiles', NULL, NULL);

echo '{
  	"data" : [';
  			$i = 0;
		 	foreach ($registros as $key => $value) {
		 		/*Esto se escribe en el mismo orden que se dibuja en la tabla de la vista o DataTable*/
		 		if($i != 0){ /*Si ya va por el segundo registro, se necesita una coma*/
            		echo ",";
            	}
				echo '[';
				echo '"'.($key+1).'",';
				echo '"'.$value["per_descripcion_v"].'",';
				echo '"'.$value["per_id_i"].'"';
				echo ']';
            	$i++; /*Aumentamos la variable contador*/
		 	}
		echo ']
}';
		}
	}

	/*Zona de llamado de Funciones*/
	if(isset($_POST['insertR'])){ /*Invocar la funcion de insertar*/
		$ajaxPerfiles = new ajaxPerfiles(); /*Creamos el objeto de la clase AJAX*/
		$ajaxPerfiles->insertDatos(); /*Invocamos la funcion en este caso Insertar*/
	}

	if(isset($_POST['editarR'])){/*Invocar la funcion de Actualizar*/
		$ajaxPerfiles = new ajaxPerfiles();/*Creamos el objeto de la clase AJAX*/
		$ajaxPerfiles->updateDatos();/*Invocamos la funcion en este caso Actualizar*/
	}

	if(isset($_POST['eliminarR'])){/*Invocar la funcion de Borrar*/
		$ajaxPerfiles = new ajaxPerfiles();/*Creamos el objeto de la clase AJAX*/
		$ajaxPerfiles->deleteDatos();/*Invocamos la funcion en este caso Borrar*/
	}

	if(isset($_POST['getDatos'])){/*Invocar la funcion de obtener los datos de un registro*/
		$ajaxPerfiles = new ajaxPerfiles();/*Creamos el objeto de la clase AJAX*/
		$ajaxPerfiles->getDatos($_POST['ID']);/*Invocamos la funcion en este caso Obtener los datos de un registro especifico con el ID*/
	}

	if(isset($_GET['allDatos'])){/*Invocar la funcion de tener todos los datos*/
		$ajaxPerfiles = new ajaxPerfiles();/*Creamos el objeto de la clase AJAX*/
		$ajaxPerfiles->getAllDatos();/*Invocamos la funcion en este caso Obtener Todos los datos*/
	}
