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
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Simulador Hipotecario</title>
    <link rel="stylesheet" type="text/css" href="css/topnav.css">
    <link rel="stylesheet" href="css/skel-noscript.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-desktop.css" />
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
         <!-- Header -->
        <div id="header">
          <div class="container">
         
            <!-- Logo -->
            <div id="logo">
              <img src="images/logo_miniatura.jpg"/> <h4><a href="#" class="Estilo1">COOPERATIVA FINANCIERA CENTRO ANDINA</a></h4>
              <h4><a href="#" class="Estilo1">Ayudamos a tu progreso</h4>
              <br>
            </div>
          </div>
        </div>
<br />
<br />
<br />
<br />
<div>
    <form name="loginform" action="" method="post">
    <table width="400" border="0" align="center" cellpadding="2" cellspacing="5" bgcolor="#CCCDD6">
      <tr border="0">
        <td><div align="right" style="font-weight:bold">Nombre de Usuario:</div></td>
        <td><input name="username" type="text" /></td>
      </tr>
      <tr>
        <td><div align="right" style="font-weight:bold">Password:</div></td>
        <td><input name="password" type="password" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input name="" type="submit" value="Enviar" /></td>
      </tr>
    </table>
    </form>
</div>
    </body>
    </html>