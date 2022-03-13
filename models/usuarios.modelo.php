<?php 
	/*Clase para manipular la tabla users*/
  class UsuarioModelo extends ModeloDAO
  {
  		public static function insertDatos($datos)
  		{ 
	  		$pdo = Conexion::conectar();
	  		$stmt = $pdo-> prepare("INSERT INTO
	  			users(
					user_doc_id,
					user_ran_id_i,
					user_primer_nombre_v,
					user_segundo_nombre_v,
					user_primer_apellido_v,
					user_segundo_apellido_v,
					user_title_v,
					user_cargo_v,
					user_telephone_v,
					user_correo_v,
					user_psw_mail_v,
					user_password_v,
					user_per_id_i,
					user_image_v,
					user_est_id_i,
					user_a_registro
					
				)VALUES(
					:user_doc_id,
					:user_ran_id_i,
					:user_primer_nombre_v,
					:user_segundo_nombre_v,
					:user_primer_apellido_v,
					:user_segundo_apellido_v,
					:user_title_v,
					:user_cargo_v,
					:user_telephone_v,
					:user_correo_v,
					:user_psw_mail_v,
					:user_password_v,
					:user_per_id_i,
					:user_image_v,
					:user_est_id_i,
					:user_a_registro
				)");
	  		$stmt->bindParam(":user_doc_id",  $datos['user_doc_id'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_ran_id_i",$datos['user_ran_id_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_primer_nombre_v", $datos['user_primer_nombre_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_segundo_nombre_v",$datos['user_segundo_nombre_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_primer_apellido_v",  $datos['user_primer_apellido_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_segundo_apellido_v",$datos['user_segundo_apellido_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_title_v", $datos['user_title_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_cargo_v",$datos['user_cargo_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_telephone_v",$datos['user_telephone_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_correo_v",$datos['user_correo_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_psw_mail_v",$datos['user_psw_mail_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_password_v",$datos['user_password_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_per_id_i",$datos['user_per_id_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_image_v",$datos['user_image_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_est_id_i",$datos['user_est_id_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_a_registro",$datos['user_a_registro'], PDO::PARAM_STR);
	  		if($stmt->execute()){
				$stmt = null;
				return $pdo->lastInsertId();
			}else{
				self::logError('2404', "Error insertando users.modelo.php => " . $stmt->errorInfo());
				return 'error';
			}	
		}


  		public static function updateDatos($datos){
  			$pdo = Conexion::conectar();
  			$stmt = $pdo-> prepare("UPDATE users SET
  					user_doc_id               = :user_doc_id,
  			 		user_ran_id_i             = :user_ran_id_i,
  			   		user_primer_nombre_v      = :user_primer_nombre_v,
  			   		user_segundo_nombre_v     = :user_segundo_nombre_v,
  			   		user_primer_apellido_v    = :user_primer_apellido_v,
  			   		user_segundo_apellido_v   = :user_segundo_apellido_v,
  			   		user_title_v 			  = :user_title_v,
  			   		user_cargo_v              = :user_cargo_v,
  			   		user_telephone_v 		  = :user_telephone_v,
					user_correo_v			  = :user_correo_v,
					user_psw_mail_v           = :user_psw_mail_v,
					user_password_v           = :user_password_v,
					user_per_id_i             = :user_per_id_i,
					user_image_v              = :user_image_v,
					user_est_id_i             = :user_est_id_i,
					user_a_registro           = :user_a_registro
  			    WHERE
  			    user_id  = :user_id ");
  			$stmt->bindParam(":user_doc_id",  $datos['user_doc_id'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_ran_id_i",$datos['user_ran_id_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_primer_nombre_v", $datos['user_primer_nombre_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_segundo_nombre_v",$datos['user_segundo_nombre_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_primer_apellido_v",  $datos['user_primer_apellido_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_segundo_apellido_v",$datos['user_segundo_apellido_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_title_v", $datos['user_title_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_cargo_v",$datos['user_cargo_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_id",$datos['user_id'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_telephone_v",$datos['user_telephone_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_correo_v",$datos['user_correo_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_psw_mail_v",$datos['user_psw_mail_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_password_v",$datos['user_password_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_per_id_i",$datos['user_per_id_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_image_v",$datos['user_image_v'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_est_id_i",$datos['user_est_id_i'], PDO::PARAM_STR);
  			$stmt->bindParam(":user_a_registro",$datos['user_a_registro'], PDO::PARAM_STR);

  			if($stmt->execute()){
  				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error actualizando users.modelo.php => " . $stmt->errorInfo());
				return 'error';
			}
		}

		public static function deleteDatos($datos){
			$pdo  = Conexion::conectar();
			$stmt = $pdo->prepare("DELETE FROM users WHERE user_id   = :user_id  ");
			$stmt->bindParam(":user_id", $datos, PDO::PARAM_STR);
			if($stmt->execute()){
				$stmt = null;
				return 'ok';
			}else{
				self::logError('2404', "Error borrando users.modelo.php => " . $stmt->errorInfo());
				return 'error';
			}
		}
	}