<?php //manejo de sesiones
session_start();
	if (!isset($_SESSION['usuario'])) { //si el usuario no está autenticado
		header('Location: ../index.php'); // Redirecciona a la pagina de inicio
	}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Usuarios JOVESOLIDES</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <!--<link href="assets/img/favicon.png" rel="icon">-->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
</head>

<body>
  <?php
    include('Helpers/DataAccess.php');
    //LocalData::LoadDefaultData();
    echo '<!-- ======= Header ======= -->
    <header id="header">

      <div id="topbar">
        <div class="container">';
          include 'menuSocials.php';
        echo '</div>
      </div>

      <div class="container">

        <div class="logo float-left">
          <!-- Uncomment below if you prefer to use an image logo -->
          <h1 class="text-light"><a href="main.php" class="scrollto"><span>JOVESOLIDES<span></a></h1>
          <!-- <a href="#header" class="scrollto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
        </div>';
        include 'menu.php';
        echo '<!-- .main-nav -->

      </div>
    </header><!-- #header -->

    <main id="main">

      <!-- ======= Section ======= -->
      <section id="services" class="services section-bg">
        <div class="container">

          <header class="section-header"> 
            <h3>Usuarios</h3>
            <p>Guarde nuevos usuarios y visualice la lista de usuarios registrados.</p>
          </header>
          
          <div class="container col-8">
            <div class="text-center px-lg-5 float-left" style="width: auto; margin-left: auto;">
              <div class="form-group mx-sm-3">
                <form name="frm-config" method="GET" action="users.php" class="was-validated">
                  <label for="NewUsers"><h4>Agregar un nuevo usuario</h4></label>
                  <input type="text" required name="User" id="user" class="form-control mb-2 mr-sm-2 border-secondary" placeholder="usuario"><br>
                  <input type="email" required name="Mail" id="mail" class="form-control mb-2 mr-sm-2 border-secondary" placeholder="correo"><br>
                  <input type="password" required name="Pass" id="pass" class="form-control mb-2 mr-sm-2 border-secondary" placeholder="contraseña"><br>
                  <input type="password" required name="Confpass" id="confpass" class="form-control mb-2 mr-sm-2 border-secondary" placeholder="confirmar contraseña"><br>
                  <input type="submit" required value="Registrar" name="Enviar" id="enviar" class="btn btn-dark"><br>
              </form>
              </div>
            </div> <br>
    
            <div class="container float-none">
              <div class="row table-responsive-lg " >
              <div style="width: 200px; height: auto;">
              
              <table class="table table-striped text-left">
                <thead class="thead-dark text-white">
                  <tr> <!--Primera fila con 4 encabezados-->
                    <th scope="col">Id</th>
                    <th scope="col">Usuario</th>
                  </tr>
                </thead>
                <tbody>';
                
                //Llenando la tabla con los usuarios definidos por defecto.
                /*for ($i=0; $i < count(LocalData::$Usuarios); $i++) { 
                  echo '<tr><th scope="row">'.LocalData::$Usuarios[$i]->id.'</th>';
                  echo '<td>'.LocalData::$Usuarios[$i]->Nombre.'</td></tr>';
                }*/
                //ExtractUser();
                $Data = array('Id_usuario', 'usuario');
                ExtractTablesView('usuario', $Data);
                echo '</tbody>
              </table>
      
            </div>
            </div>
            </div> 
          </div>
          
        </div>  <br><br><br> <br><br><br> <br><br><br><br><br>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg">

      <div class="container">
        <div class="copyright">
          <strong>Jovesolides El Salvador</strong> &copy; Derechos Reservados 2020
        </div>
        <div class="credits">
          <!--
          All the links in the footer should remain intact.
          Licensing information: https://bootstrapmade.com/license/
        -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>';

    if(isset($_GET['Enviar'])) //envio y validacion de nuevo usuario
    { 
      if(trim($_GET['Pass']) == trim($_GET['Confpass'])){
        $Data = array($_GET['User'], $_GET['Mail'], $_GET['Pass']);
        InsertData('usuario',$Data,true);
        
      }
      else{
        echo'<script type="text/javascript">alert("¡Las contraseñas no coinciden!");</script>';
      }

    }
  ?>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/mobile-nav/mobile-nav.js"></script>
  <script src="assets/vendor/wow/wow.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>