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

  <title>Expedientes JOVESOLIDES</title>
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

  <!-- =======================================================
  * Template Name: Rapid - v2.0.0
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php
  require 'Helpers/Clases.php';
  include('Helpers/DataAccess.php');
  LocalData::LoadDefaultData();
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

    <main id="main" method="POST">

      <!-- ======= Section ======= -->
      <section id="services" class="services section-bg">
        <div class="container">

          <header class="section-header"> 
            <h3>Expedientes Residencia Universitaria Jovesolides</h3>
            <p>Lista de becarios registrados, para visualizar el expediente, dar click en <b>>></b></p>
          </header>
        
          <div class="container">
          <div class="row table-responsive-lg float-left" >
          <div style="width: 900px; height: auto;">
          
          <table class="table table-striped text-center">
            <thead class="thead-dark text-white">
              <tr> <!--Primera fila con 4 encabezados-->
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Departamento</th>
                <th scope="col">Universidad</th>
                <th scope="col">Ver</th>
              </tr>
            </thead>
            <tbody>';
              /*for ($i=0; $i < count(LocalData::$Becarios); $i++) {
                $depId = LocalData::$Becarios[$i]->id_Departamento - 1;
                $IdU = LocalData::$FormacionesAcademicas[LocalData::$Becarios[$i]->id_Estudio - 1]->id_Universidad -1;
                echo '<tr><th scope="row">'.LocalData::$Becarios[$i]->id_Becario.'</th>';
                echo '<td>'.LocalData::$Becarios[$i]->Nombres.', '.LocalData::$Becarios[$i]->Apellidos.'</td>';
                echo '<td>'.LocalData::$Departamentos[$depId].'</td>';
                echo '<td>'.LocalData::$Universidades[$IdU].'</th>';
                echo '<td><a href="becario.php?Bec='.$i.'" name="View">>></a></td></tr>';
              }*/
              ExtractRecordsTableView();
            echo '</tbody>
            </table><br>
    
    
          </div>
          </div>
          </div> 
    
          <div class="text-center float-none" style="margin-bottom: 12%;">
            <a href="becario.php" class="btn btn-success btn-md active" role="button" aria-pressed="true">Nuevo expediente</a>
          </div>
        </div>
        </section>
      </main> <br><br><!-- End #main -->
    
      <!-- ======= Footer ======= -->
      <footer id="footer" class="section-bg" style="margin-top: 1.5cm;">
    
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