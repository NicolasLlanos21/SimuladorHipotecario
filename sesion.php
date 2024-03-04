<?php
		
     class sesion{

      public $mysql_user = 'root';
      public $mysql_password = '';
      public $pdo;

      public function conexionBD(){
       try{
        $pdo = new PDO('mysql:host=172.31.4.43;dbname=simulador', $this->mysql_user, $this->mysql_password);
      }catch(PDOException $ex){
             die('Unable to connect');
       } 
       return $pdo;
       }

       public function simulacionesUsuario($user){
            $pdo = $this->conexionBD();
            $stmt = $pdo->prepare('SELECT * FROM simulacion where id_usuario = ?');
            $stmt->bindValue(1, $user, PDO::PARAM_INT); 
            $stmt->execute();
            return $stmt;
       }

       public function simulacionesPorFechas($fh_ini, $fh_fin){
            $pdo = $this->conexionBD();
            $stmt = $pdo->prepare('SELECT * FROM simulacion WHERE Fecha between ? and ?');
            $stmt->bindValue(1, $fh_ini, PDO::PARAM_STR); 
            $stmt->bindValue(2, $fh_fin, PDO::PARAM_STR); 
            $stmt->execute();
            return $stmt;
       }

       public function simulacionesUsuarioPorFechas($user,$fh_ini, $fh_fin){
            $pdo = $this->conexionBD();
            $stmt = $pdo->prepare('SELECT * FROM simulacion WHERE id_usuario= ? AND Fecha between ? and ?');
            $stmt->bindValue(1, $user, PDO::PARAM_INT); 
            $stmt->bindValue(2, $fh_ini, PDO::PARAM_STR); 
            $stmt->bindValue(3, $fh_fin, PDO::PARAM_STR); 
            $stmt->execute();
            return $stmt;
       }

      public function simulacionPorId($id_sim){
            $pdo = $this->conexionBD();
            $stmt = $pdo->prepare('SELECT * FROM simulacion WHERE id = ?');
            $stmt->bindValue(1, $id_sim, PDO::PARAM_STR); 
            $stmt->execute();
            return $stmt;
       }

       public function actualizarArchivoSim($nomArc, $idSim){
            $pdo = $this->conexionBD();
            $stmt = $pdo->prepare('UPDATE simulacion SET archivo=? WHERE id= ?');
            $stmt->bindValue(1, $nomArc, PDO::PARAM_STR); 
            $stmt->bindValue(2, $idSim, PDO::PARAM_INT); 
            $stmt->execute();
            return $stmt;
       }

      public function countSimulaciones($user){
            $pdo = $this->conexionBD();
            $stmt = $pdo->prepare('SELECT count(*) FROM simulacion where id_usuario = ?');
            $stmt->bindValue(1, $user, PDO::PARAM_STR); 
            $stmt->execute();
            //$result = $stmt->fetchColumn();
            $contar = $stmt->rowCount();
            return $contar;
            //return $stmt;
       }

      public function todosUsuarios(){
            $pdo = $this->conexionBD();
            $stmt = $pdo->prepare('SELECT id_usuario, nombres, apellidos FROM usuario where id_tipo=1');
            $stmt->execute();
            return $stmt;
       }

       public function validarUsuario($user, $pass){
       	$pdo = $this->conexionBD();
       	$stmt = $pdo->prepare('SELECT * FROM usuario where username like ? and password like ?');
      	$stmt->bindValue(1, $user, PDO::PARAM_STR); 
      	$stmt->bindValue(2, $pass, PDO::PARAM_STR); 
      	$stmt->execute();
     	$count =$stmt->rowCount();
     	return $count;
       }

	   public function ejecutarConsulta($query){
       	$pdo = $this->conexionBD();
       	$stmt = $pdo->prepare($query);
      	$stmt->execute();
     	      return $stmt;
       }       

       public function modificarParametro($id, $valor){
	       	$pdo = $this->conexionBD();
	       	$stmt = $pdo->prepare('UPDATE parametros SET valor=?, inicio_vigencia=CURDATE() WHERE id=?');
	      	$stmt->bindValue(1, $valor, PDO::PARAM_STR); 
	      	$stmt->bindValue(2, $id, PDO::PARAM_INT); 
	      	$stmt->execute();
       }

       public function crearParametroHistorico($id,$valor,$inicio_vig){
                  $pdo = $this->conexionBD();
                  $stmt = $pdo->prepare('INSERT INTO parametros_historicos(id, id_parametro, valor, fecha_inicio_vigencia,fecha_final_vigencia) VALUES (NULL,?,?,?,CURDATE())');
                  $stmt->bindValue(1, $id, PDO::PARAM_INT); 
                  $stmt->bindValue(2, $valor, PDO::PARAM_INT); 
                  $stmt->bindValue(3, $inicio_vig, PDO::PARAM_STR);
                  $stmt->execute();
       }

       public function crearSimulacion($id_usu,$valor_inm,$vlr_cred,$plazo){
                  $pdo = $this->conexionBD();
                  $stmt = $pdo->prepare('INSERT INTO simulacion(id, archivo, Fecha, id_usuario,Valor_inmueble, Valor_credito,Plazo) VALUES (NULL,NULL,CURDATE(),?,?,?,?)');
                  $stmt->bindValue(1, $id_usu, PDO::PARAM_INT); 
                  $stmt->bindValue(2, $valor_inm, PDO::PARAM_INT); 
                  $stmt->bindValue(3, $vlr_cred, PDO::PARAM_INT);
                  $stmt->bindValue(4, $plazo, PDO::PARAM_INT);
                  $stmt->execute();
                  return $stmt; 
       }

      public function getIdUltSimulacion($user){
                  $pdo = $this->conexionBD();
                  $stmt = $pdo->prepare('SELECT id FROM simulacion WHERE id_usuario= ? ORDER BY id DESC LIMIT 1');
                  $stmt->bindValue(1, $user, PDO::PARAM_INT); 
                  $stmt->execute();
                  $result = $stmt->fetchColumn();
                  return $result;
       }

       public function getEdadUsuario($user){
                  $pdo = $this->conexionBD();
                  $stmt = $pdo->prepare('SELECT edad FROM usuario WHERE id_usuario= ?');
                  $stmt->bindValue(1, $user, PDO::PARAM_INT); 
                  $stmt->execute();
                  $result = $stmt->fetchColumn();
                  return $result;
       }

       public function getIngresosUsuario($user){
                  $pdo = $this->conexionBD();
                  $stmt = $pdo->prepare('SELECT ingreso_familiar FROM usuario WHERE id_usuario= ?');
                  $stmt->bindValue(1, $user, PDO::PARAM_INT); 
                  $stmt->execute();
                  $result = $stmt->fetchColumn();
                  return $result;
       }

       public function crearResultadoSimulacion($id_sim,$num_cou,$int_cou,$capital,$subs,$vlr_cuo_sin_sub,$vlr_cuo_con_sub,$saldocap){
                  $pdo = $this->conexionBD();
                  $stmt = $pdo->prepare('INSERT INTO resultado_simulacion (id, id_simulacion, numero_cuota, interes_cuota,abono_capital,subsidio,vlrcuotasinsub,vlrcoutaconsub,saldocapital) VALUES (NULL,?,?,?,?,?,?,?,?)');
                  $stmt->bindValue(1, $id_sim, PDO::PARAM_INT); 
                  $stmt->bindValue(2, $num_cou, PDO::PARAM_INT); 
                  $stmt->bindValue(3, $int_cou, PDO::PARAM_INT);
                  $stmt->bindValue(4, $capital, PDO::PARAM_INT);
                  $stmt->bindValue(5, $subs, PDO::PARAM_INT);
                  $stmt->bindValue(6, $vlr_cuo_sin_sub, PDO::PARAM_INT);
                  $stmt->bindValue(7, $vlr_cuo_con_sub, PDO::PARAM_INT);
                  $stmt->bindValue(8, $saldocap, PDO::PARAM_INT);
                  $stmt->execute();
                  return $stmt;
       }

       public function getTipoUsuario($user){
       		$pdo = $this->conexionBD();
       		$stmt = $pdo->prepare('SELECT Id_tipo FROM usuario where username like ?');
      		$stmt->bindValue(1, "%$user%", PDO::PARAM_STR); 
      		$stmt->execute();
      		$result = $stmt->fetchColumn();
      		return $result;
       }
       public function getIdUsuario($user){
                  $pdo = $this->conexionBD();
                  $stmt = $pdo->prepare('SELECT id_usuario FROM usuario where username like ?');
                  $stmt->bindValue(1, "%$user%", PDO::PARAM_STR); 
                  $stmt->execute();
                  $row =  $stmt->fetch(PDO::FETCH_ASSOC);
                  $result = $row['id_usuario'];
                  $pdo = null; 
                  return $result;
       }

	   public function getTasaPorEdad($edad){
       		$pdo = $this->conexionBD();
       		$stmt = $pdo->prepare('SELECT tasa FROM Seguro_Vida where edad = ?');
      		$stmt->bindValue(1, $edad, PDO::PARAM_STR); 
                  $stmt->execute();
                  $result = $stmt->fetchColumn();
                  return $result;
      }
	   
	   public function getNombresApellidos($user){
       		$pdo = $this->conexionBD();
       		$stmt = $pdo->prepare('SELECT nombres, apellidos FROM usuario where username like ?');
      		$stmt->bindValue(1, "%$user%", PDO::PARAM_STR); 
      		$stmt->execute();
       		$row =  $stmt->fetch(PDO::FETCH_ASSOC);
      		$result = $row['nombres'].' '.$row['apellidos'];
       		$pdo = null; 
      		return $result;
       }

      public function getInfoUsuarioSimulacion($user){
                  $pdo = $this->conexionBD();
                  $stmt = $pdo->prepare('SELECT id, nombres, apellidos, edad, ingreso_familiar FROM usuario where username like ?');
                  $stmt->bindValue(1, $user, PDO::PARAM_STR); 
                  $stmt->execute();
                  return $stmt;
       }
         public function getParametros(){
                  $pdo = $this->conexionBD();
                  $stmt = $pdo->prepare('SELECT id, nombre, valor FROM parametros');
                  $stmt->execute();
                  return $stmt;
       }



       public function getUser(){
       		return $this->mysql_user;
       }	
       public function getPassword(){
       		return $this->mysql_password;
       }	
       public function phpAlert($msg) {
    		echo '<script type="text/javascript">alert("' . $msg . '")</script>';
       }
 }
?>
