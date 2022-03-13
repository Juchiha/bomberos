<?php
   	/*Clase para asignar seguridad a el controlador de perfiles, se reciben las peticiones por POST y por GET*/
	/*Fecha Creacion: 13/03/2022 */
	/*Autor Nombre del Autor: Jose Giron */
    session_start();
    /*Seccion de llamado a controladores, mail y plantilla son obligatorios*/
    require_once '../controllers/mail.controller.php';
    require_once '../controllers/plantilla.controller.php';
    /*Seccion de los controladores que se vallan a utilizar*/ 
    require_once '../controllers/usuarios.controller.php';

    /*Seccion modelos, DAO es obligatorio, asu qye debe quedarse*/
    require_once '../models/dao.modelo.php';
    require_once '../models/datatables.modelo.php';
    /*Modelos que se vallan a utilizar, generalmente los de la tabla a usar*/
    require_once '../models/usuarios.modelo.php'; 

    /*Clase para manipular el controlador*/
    class AjaxUsuarios{ //Reemplazar nombre tabla
    
        public function insertDatos(){ /*Funcion para insercion*/
          echo ControladorUsuarios::insertDatos();
        }
        
        public function updateDatos(){/*Funcion para actualizar*/
          echo ControladorUsuarios::UpdateDatos();
        }

        public function deleteDatos(){/*Funcion para eliminar*/
          echo ControladorUsuarios::deleteDatos();
        }

        public function getDatos($IdTabla){
          echo json_encode(ControladorUsuarios::getData('users', "user_id", $IdTabla));
        } 

        public function getAllDatos(){/*Funcion para obtener todos los datos de una tabla*/
      
          $strCampos__ =' user_id, user_doc_id, ran_sigla_v, user_primer_nombre_v, user_segundo_nombre_v, user_primer_apellido_v, user_segundo_apellido_v, user_title_v, user_cargo_v, user_telephone_v, user_correo_v, user_psw_mail_v, user_password_v, user_per_id_i, user_image_v, es_descripcipcion_v, user_fecha_registro, user_ultimo_login_d, user_current_session_i, user_online_i, user_a_registro';
	        $strTablas__ = " users JOIN uti_estados ON est_id_i = user_est_id_i JOIN uti_rangos ON user_ran_id_i = ran_id_i";
	        $strWhere___ = " user_est_id_i = 1 ";
	        $arrayRespue = ModeloDAO::mdlMostrarGroupAndOrder($strCampos__,$strTablas__,$strWhere___, null, "ORDER BY user_primer_nombre_v DESC");


echo '{
    "data" : [';
        $i = 0;
      foreach ($arrayRespue as $key => $value) {
        /*Esto se escribe en el mismo orden que se dibuja en la tabla de la vista o DataTable*/
        if($i != 0){ /*Si ya va por el segundo registro, se necesita una coma*/
                echo ",";
              }
        echo '[';
        echo '"'.($key+1).'",';
        echo '"'.$value['ran_sigla_v'].'",';
        echo '"'.mb_strtoupper(($value['user_primer_nombre_v'].' '.$value['user_primer_apellido_v'])).'",';
        echo '"'.$value['user_correo_v'].'",';
        echo '"'.$value['es_descripcipcion_v'].'",';
        echo '"'.$value['user_ultimo_login_d'].'",';
        echo '"'.$value["user_id"].'"'; 
        echo ']';
              $i++; /*Aumentamos la variable contador*/
      }
    echo ']
}';
        }
    }    

    /*Zona de llamado de Funciones*/
    if(isset($_POST["insertR"])){ /*Invocar la funcion de insertar*/
      $AjaxUsuarios = new AjaxUsuarios(); /*Creamos el objeto de la clase AJAX*/
      $AjaxUsuarios->insertDatos(); /*Invocamos la funcion en este caso Insertar*/
    }

    if(isset($_POST["editarR"])){/*Invocar la funcion de Actualizar*/
      $AjaxUsuarios = new AjaxUsuarios();/*Creamos el objeto de la clase AJAX*/
      $AjaxUsuarios->updateDatos();/*Invocamos la funcion en este caso Actualizar*/
    }

    if(isset($_POST["eliminarR"])){/*Invocar la funcion de Borrar*/
      $AjaxUsuarios = new AjaxUsuarios();/*Creamos el objeto de la clase AJAX*/
      $AjaxUsuarios->deleteDatos();/*Invocamos la funcion en este caso Borrar*/
    }

    if(isset($_POST["getDatos"])){/*Invocar la funcion de obtener los datos de un registro*/
      $AjaxUsuarios = new AjaxUsuarios();/*Creamos el objeto de la clase AJAX*/
      $AjaxUsuarios->getDatos($_POST["ID"]);/*Invocamos la funcion en este caso Obtener los datos de un registro especifico con el ID*/
    }

    if(isset($_GET["allDatos"])){/*Invocar la funcion de tener todos los datos*/
      $AjaxUsuarios = new AjaxUsuarios();/*Creamos el objeto de la clase AJAX*/
      $AjaxUsuarios->getAllDatos();/*Invocamos la funcion en este caso Obtener Todos los datos*/
    } 
?>