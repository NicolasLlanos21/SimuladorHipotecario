<?php
	require_once('sesion.php');
      if(!isset($_SESSION)) 
      { 
        session_start(); 
        if (!isset($_SESSION['login_user'])){
        	header('Location: index.php');
        	exit();
        }
      } 
  	 function phpAlert($msg) {
    	echo '<script type="text/javascript">alert("' . $msg . '")</script>';
     }
    $smmlvant=0;
    $minsubsant=0;
    $maxsubsant = 0;
    $tasaIntAnt=0;
    $inicio_vigenciasmmlv= date('Y-m-d');
    $inicio_vigenciamin= date('Y-m-d');
    $inicio_vigenciamax= date('Y-m-d');
    $inicio_vigenciatasa= date('Y-m-d');
	 	$sesion = new sesion(); 
		$stmt = $sesion->ejecutarConsulta('select * from parametros');
		foreach ($stmt as $row) {
      			switch($row['id']){
      				case 1:
      					$smmlvant=$row['valor'];
      					$inicio_vigenciasmmlv=$row['inicio_vigencia'];
      					break;
      				case 2:
      					$minsubsant=$row['valor'];
      					$inicio_vigenciamin=$row['inicio_vigencia'];
      					break;
      				case 3:
      					$maxsubsant=$row['valor'];
      					$inicio_vigenciamax=$row['inicio_vigencia'];
      					break;
      				case 4:
      					$tasaIntAnt=$row['valor'];
      					$inicio_vigenciatasa=$row['inicio_vigencia'];
      					break;
      			}
      		 }	
  		if($_SERVER["REQUEST_METHOD"] != "POST") {
      		$mensaje2='Configurar Parametros Simulacion - Valores actuales\n';
      		$mensaje2=$mensaje2.'*******************************************\n';
      		$mensaje2 = $mensaje2.'SMMLV: '.$smmlvant.'\n';
      		$mensaje2 = $mensaje2.'Numero minimo SMMLV para subsidio: '.$minsubsant.'\n';
			$mensaje2 = $mensaje2.'Numero maximo SMMLV para subsidio: '.$maxsubsant.'\n';
			$mensaje2 = $mensaje2.'Tasa de interés de crédito hipotecario: '.$tasaIntAnt.'\n';
			$mensaje2=$mensaje2.'*******************************************\n';
			phpAlert($mensaje2);
	  }		
      if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
	      $sesion = new sesion();  

	      $smmlv = $_POST['smmlv'];
	      $minsubs = $_POST['minSMMLV'];
	      $maxsubs = $_POST['maxSMMLV'];
	      $tasaInt = $_POST['tasaInt'];

	      $c=0;
	      $mensaje='Configurar Parametros Simulacion\n';
		  $mensaje=$mensaje.'*******************************************\n';
	      $mensaje=$mensaje.'Se han modificado los siguientes parametros:\n';
	       if (empty($smmlv) and empty($minsubs) and empty($maxsubs) and empty($tasaInt)){
          	phpAlert("Por favor digite el valor de al menos un campo para modificar");
	      }else{ 
	      	if(!empty($smmlv)){
	      		 $sesion->modificarParametro(1,$smmlv);
	      		 $sesion->crearParametroHistorico(1,$smmlv,$inicio_vigenciasmmlv);
	      		 $mensaje = $mensaje.'SMMLV paso de: '.$smmlvant.' a '.$smmlv.'\n';
	      		 $c++;
	      	}
	      	if(!empty($minsubs)){
	      		 $sesion->modificarParametro(2,$minsubs);
	      		 $sesion->crearParametroHistorico(2,$minsubs,$inicio_vigenciamin);
	      		 $mensaje = $mensaje.'Numero minimo SMMLV para subsidio paso de: '.$minsubsant.' a '.$minsubs.'\n';
	      		 $c++;
	      	}
	      	if(!empty($maxsubs)){
	      		 $sesion->modificarParametro(3,$maxsubs);
	      		 $sesion->crearParametroHistorico(3,$maxsubs,$inicio_vigenciamax);
	      		 $mensaje = $mensaje.'Numero maximo SMMLV para subsidio paso de: '.$maxsubsant.' a '.$maxsubs.'\n';
	      		 $c++;
	      	}
	      	if(!empty($tasaInt)){
	      		 $sesion->modificarParametro(4,$tasaInt);
	      		 $sesion->crearParametroHistorico(4,$tasaInt,$inicio_vigenciatasa);
	      		 $mensaje = $mensaje.'Tasa de interés de crédito hipotecario paso de : '.$tasaIntAnt.' a '.$tasaInt.'\n';
	      		 $c++;
	      	}
	         $mensaje=$mensaje.'*******************************************\n';
	      	 $mensaje = $mensaje.'Se han modificado '.$c.' parametros!\n';
	      	 $mensaje=$mensaje.'*******************************************\n';
	      	phpAlert($mensaje);
	      }
      }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Simulador Hipotecario - Configurar Parametros Simulacion</title>
    <link rel="stylesheet" type="text/css" href="css/topnav.css">
    <style type="text/css">
    <!--
    .style1 {
    	font-size: 36px;
    	font-weight: bold;
    }
    -->
    </style>
    </head>
     
    <body>
 	<table>
         <tr align="left" height="1%" width="1%">
             <td><img src="images/logo_miniatura.jpg"/>   </td>
             <td><h2 align="right">SIMULADOR HIPOTECARIO - CONFIGURAR PARAMETROS SIMULACION</h2></td>
         </tr>
     </table>
		<br />
		<div class="topnav" id="menu">
        <ul>
        <li><a href="menuppal.php">Regresar al Menú Principal</a></li>
        <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
      </div>
		<br />
		<br />
		<br />
		<form name="loginform" action="" method="post">
	    <table width="600" border="0" align="center" cellpadding="2" cellspacing="5" >
	      <tr border="0">
	        <td><div width="430" align="left">Salario Minimo Mensual Legal Vigente (SMMLV) actual:</div></td>
	        <td><input name="smmlv" width="170" type="text" /></td>
	      </tr>
	      <tr>
	        <td><div align="left">VaLor mínimo del inmueble (en SMMLV) que aplica subsidio:</div></td>
	        <td><input name="minSMMLV" type="text" /></td>
	      </tr>
	      <tr>
	        <td><div align="left">VaLor maximo del inmueble (en SMMLV) que aplica subsidio:</div></td>
	        <td><input name="maxSMMLV" type="text" /></td>
	      </tr>
	      <tr>
	        <td><div align="left">Tasa de interés actual para crédito hipotecario (%E.A.):</div></td>
	        <td><input name="tasaInt" type="text" /></td>
	      </tr>
	      <tr>
	        <td><div align="right"></div></td>
	        <td><input name="" type="submit" value="Enviar" /></td>
	      </tr>
	    </table>
    </form>
    </body>
    </html>