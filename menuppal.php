<?php
   require_once('sesion.php');
   //require_once('logout.php');
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        if (!isset($_SESSION['login_user'])){
          header('Location: index.php');
          exit();
        }
    } 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>Simulador Hipotecario - Menu Principal</title>
      <link rel="stylesheet" type="text/css" href="css/topnav.css">
      <link rel="stylesheet" href="css/skel-noscript.css" />
  </head>
   
   <body>
        <!-- Header -->
        <div id="header">
          <div class="container">
         
            <!-- Logo -->
            <div id="logo">
              <img src="images/logo_miniatura.jpg"/> <h1>COOPERATIVA FINANCIERA CENTRO ANDINA</a></h1>
              <h2>Ayudamos a tu progreso</h2>
              <h2 align="right">Bienvenido <?php echo $_SESSION['user_names']?>!</h2> 
            </div>
          </div>
        </div>
      <div class="topnav" id="menu">
      <?php
        $sesion = new sesion();  
        $stmt = $sesion->ejecutarConsulta('select * from menu where id_tipo='.$_SESSION['user_type'].' order by id');
        echo '<ul>';
        foreach ($stmt as $row) {
        $id_menu = $row["id"];
        $stmt2 = $sesion->ejecutarConsulta('select link, submenu from submenu where id_menu='.$id_menu);
           echo '<li><a href="'.$row["link"].'">'.$row["menu"].'</a>';
           echo '<ul>';
          foreach ($stmt2 as $row2){
            echo '<li><a href="'.$row2["link"].'">'.$row2["submenu"].'</a></li>';
          }
          echo '</ul>';
          echo '</li>';
    }
      ?>
      </div>

      <div id="featured">
      <div class="container">
        <div class="row">

          <div class="3u" width="276" height="183">
            <section>
              <a href="#" class="image full"><img src="images/credito.jpg" width="276" height="183"></a>
              <header>
                <h2>Vivienda</h2>
              </header>
              <p>Si aún no cuentas con el dinero necesario para tener tu casa propia, te prestamos para que inviertas en el sueño de tu familia.</p>       
            </section>
          </div>

          <div class="3u" width="284" height="222">
            <section>
              <a href="#" class="image full"></a>
              <header>
                <p><img src="images/Clase.png" width="284" height="222"></p>
                <h2>Educacion</h2>
              </header width="284" height="222">
              <p>Encuentra en nuestras modalidades de Crédito de Estudio diferentes opciones para financiar tus estudios de pregrado y posgrado. Alcanza la meta de ser lo que sueñas.</p>        
            </section>
          </div>

          <div class="3u" width="283" height="230">
            <section>
              <a href="#" class="image full"><img src="images/ahorro en calefacción.jpg" width="283" height="230"></a>
              <header>
                <h2>Ahorro</h2>
              </header width="283" height="230">
              <p>Con el amplio portafolio de Cuentas de Ahorro puedes manejar tus recursos de forma fácil, eficiente y segura.</p>        
            </section>
          </div>

          <div class="3u" width="287" height="261">
            <section>
              <a href="#" class="image full"><img src="images/3d-white-people-green-teamwork-27706753.jpg" width="287" height="261"></a>
              <header>
                <h2>Confianza</h2>
              </header width="287" height="261">
              <p>Puedes confiar en nosotros todas tus necesidades financieras de ahorro y crédito para el logro de todas tus metas.</p>        
            </section>
          </div>

        </div>
      </div>
    </div>
    </body>
   
</html>