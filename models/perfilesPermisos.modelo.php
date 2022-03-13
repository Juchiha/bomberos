<?php 
	/*Clase para manipular la tabla in_perfiles_permisos*/
  class PerfilesPModelo extends ModeloDAO
  {
  		public static function insertDatos($datos)
  		{ 
	  		$pdo = Conexion::conectar();
	  		$stmt = $pdo-> prepare("INSERT INTO
	  			in_perfiles_permisos(
					perfiles_permisos_perfil_id_i,
					perfiles_permisos_menu_id_i,
					
				)VALUES(
					:perfiles_permisos_perfil_id_i,
					:perfiles_permisos_menu_id_i,
					
				)");
	  		$stmt->bindParam(":perfiles_permisos_perfil_id_i",  $datos['perfiles_permisos_perfil_id_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":perfiles_permisos_menu_id_i",$datos['perfiles_permisos_menu_id_i'], PDO::PARAM_STR);
	  		if($stmt->execute()){
				$stmt = null;
				return $pdo->lastInsertId();
			}else{
				self::logError('2404', "Error insertando in_perfiles_permisos.modelo.php => " . $stmt->errorInfo());
				return 'error';
			}	
		}

  		public static function updateDatos($datos){
  			$pdo = Conexion::conectar();
  			$stmt = $pdo-> prepare("UPDATE in_perfiles_permisos SET
  					perfiles_permisos_perfil_id_i            = :perfiles_permisos_perfil_id_i,
  			 		perfiles_permisos_menu_id_i           = :perfiles_permisos_menu_id_i,
  			   		           
  			    WHERE
  			    perfiles_permisos_reportes_id_i  = :perfiles_permisos_reportes_id_i ");

  			$stmt->bindParam(":perfiles_permisos_perfil_id_i",  $datos['perfiles_permisos_perfil_id_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":perfiles_permisos_menu_id_i",$datos['perfiles_permisos_menu_id_i'], PDO::PARAM_STR);
  			if($stmt->execute()){
  				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error actualizando in_perfiles_permisos.modelo.php => " . $stmt->errorInfo());
				return 'error';
			}
		}

		public static function deleteDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("DELETE FROM in_perfiles_permisos WHERE perfiles_permisos_reportes_id_i    = :perfiles_permisos_reportes_id_i   ");
			$stmt->bindParam(":perfiles_permisos_reportes_id_i  ", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando in_perfiles_permisos.modelo.php => " . $stmt->errorInfo());
				return 'error';
			}
		}
	}