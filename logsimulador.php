    <?php
	
    	require_once('sesion.php');
      if(!isset($_SESSION)) 
      { 
        session_start(); 
      } 
      if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $sesion = new sesion();  
      $myusername = $_POST['username'];
      $mypassword = $_POST['password'];
      if (empty($myusername) or empty($mypassword)){
          phpAlert("Por favor digite el usuario y password para ingresar!");
      }else{ 
       // If result matched $myusername and $mypassword, table row must be 1 row
      $count = $sesion->validarUsuario($myusername,$mypassword);
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $idtipo = $sesion->getTipoUsuario($myusername);
         $_SESSION['user_type'] = $idtipo;
         $nombres=$sesion->getNombresApellidos($myusername);
         $_SESSION['user_names'] = $nombres;
         $idUser = $sesion->getIdUsuario($myusername);
         $_SESSION['user_id'] = $idUser;
         header("Location: menuppal.php");
      }else {
        phpAlert("Usuario y/o password incorrecto. Por favor validelo!");
         //$error = "Your Login Name or Password is invalid";
      }
    }
   }

   function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
<!--
	Autonomy by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
	<head>
		<title>CENTRO ANDINA</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<style type="text/css">
<!--
@import url("css/style.css");
.Estilo5 {font-size: 24px; color: #FFFFFF; font-weight: bold;}
-->
        </style>
	    <style type="text/css">
<!--
@import url("css/style-desktop.css");
.Estilo7 {font-size: 18px}
.Estilo8 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 24pt;
}
-->
        </style>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
		<div id="header">
			<div class="container">

				<!-- Logo -->
				<div id="logo">
                  <h1><span class="Estilo5 Estilo7"><a href="#">COOPERATIVA FINANCIERA CENTRO ANDINA</a></span></h1>
				  <h1 align="center" class="Estilo5 Estilo9">Ayudamos a tu progreso</h1>
				  <p>&nbsp;</p>
			  </div>
				<!-- Nav -->
			  <nav id="nav">
				  <ul>
					  <li><a href="index.html">Inicio</a></li>
					  <li><a href="mision.html">Mision</a></li>
					  <li><a href="politica.html">Politicas</a></li>
					  <li class="active"><a href="logsimulador.php">Calculador hipotecario</a></li>
				  </ul>
			  </nav>
		  </div>
		</div>
		<!-- Header -->

	

		<div id="featured">
			<div class="container">
				<div class="row">
					<div class="12u">
					  <section>
							<header>
								<h2>Calculador hipotecario</h2>
							</header>
							<div>
    <form name="loginform" action="" method="post">
      <p>&nbsp;</p>
      
        
            <div align="center">
              <p>&nbsp;</p>
              <table width="377" height="127" border="0" align="center" cellpadding="2" cellspacing="5" bgcolor="#CCCDD6">
                <tr border="0">
                  <td width="182"><div align="right" style="font-weight:bold">Nombre de Usuario:</div></td>
                    <td width="209"><input name="username" type="text" /></td>
                  </tr>
                <tr>
                  <td><div align="right" style="font-weight:bold">Password:</div></td>
                    <td><input name="password" type="password" /></td>
                  </tr>
                <tr>
                  <td colspan="2" align="center"><input name="" type="submit" value="Enviar" /></td>
                  </tr>
                </table>
              <p>&nbsp;</p>
            </div>
            <p align="center">&nbsp;</p>
    </form>
    <p>&nbsp;</p>
						</div>
					  </section>
					</div>		
				</div>
			</div>
		</div>
		<div id="main">
			<div class="container">
				<div class="row">
					<div class="8u">
						<section>
						  <header>
							  <h2>&nbsp;</h2>
						  </header></section>
					</div>
				</div>
			</div>
		</div>

		<!-- Copyright -->
		

	</body>
</html>