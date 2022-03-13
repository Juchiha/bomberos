<?php 
	/*Clase para manipular la tabla Perfiles*/
  class PerfilesModelo extends ModeloDAO
  {
  		public static function getMenusPerfilesOdenado($perfil){
  			$Lsql = "SELECT * FROM sys_perfiles_menu JOIN sys_menus ON pem_men_id_i = menus_id_i WHERE pem_per_id_i = ".$perfil." ORDER BY menus_orden_i ASC";
  			$stmt = Conexion::conectar()->prepare($Lsql);
  			$stmt->execute();
			return $stmt->fetchAll();
  		}


  		public static function insertDatos($datos)
  		{ 
	  		$pdo = Conexion::conectar();
	  		$stmt = $pdo-> prepare("INSERT INTO
	  			sys_perfiles(
					per_descripcion_v,
					per_estado_i,
					per_adiciona_i,
					per_edita_i,
					per_elimina_i,
					per_superadin_i
				)VALUES(
					:per_descripcion_v,
					:per_estado_i,
					:per_adiciona_i,
					:per_edita_i,
					:per_elimina_i,
					:per_superadin_i
				)");
  			$stmt->bindParam(":per_descripcion_v",$datos['per_descripcion_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_estado_i", $datos['per_estado_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_adiciona_i",$datos['per_adiciona_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_edita_i",$datos['per_edita_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_elimina_i",$datos['per_elimina_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_superadin_i",$datos['per_superadin_i'], PDO::PARAM_STR);
	  		if($stmt->execute()){
				$stmt = null;
				return $pdo->lastInsertId();
			}else{
				self::logError('2404', "Error insertando sys_perfiles.modelo.php => " . $stmt->errorInfo());
				return 'error';
			}	
		}

  		public static function updateDatos($datos){
  			$pdo = Conexion::conectar();
  			$stmt = $pdo-> prepare("UPDATE sys_perfiles SET
  			 		per_descripcion_v          = :per_descripcion_v,
  			   	    per_estado_i               = :per_estado_i,
  			   	    per_adiciona_i             = :per_adiciona_i,
  			   	    per_edita_i                = :per_edita_i,
  			   	    per_elimina_i              = :per_elimina_i,
  			   	    per_superadin_i            = :per_superadin_i
  			    WHERE
  			    per_id_i  = :per_id_i ");
  			$stmt->bindParam(":per_descripcion_v",$datos['per_descripcion_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_estado_i", $datos['per_estado_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_adiciona_i",$datos['per_adiciona_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_edita_i", $datos['per_edita_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_elimina_i", $datos['per_elimina_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_superadin_i", $datos['per_superadin_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":per_id_i",  $datos['per_id_i'], PDO::PARAM_STR);
  			if($stmt->execute()){
  				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error actualizando sys_perfiles.modelo.php => " . $stmt->errorInfo());
				return 'error';
			}
		}

		public static function deleteDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("DELETE FROM sys_perfiles WHERE per_id_i  = :per_id_i ");
			$stmt->bindParam(":per_id_i", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando sys_perfiles.modelo.php => " . $stmt->errorInfo());
				return 'error';
			}
		}
	}