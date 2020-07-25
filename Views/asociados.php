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

  <title>Asociados/as JOVESOLIDES</title>
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

  <!-- ======= Header ======= -->
    <header id="header">
    <?php
      include('Helpers/DataAccess.php');
      echo '<div id="topbar">
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
            <h3>Asociados/as.</h3>
            <p>Guarde nuevas personas asociadas al proyecto y visualice la lista de personas asociadas registradas.</p>
          </header>
          
          <div class="container col-8">
            <div class="text-center px-lg-5 float-left">
              <div class="form-group">
                <form name="frm-config" method="POST" class="was-validated">
                  <label for="NewUsers"><h4>Agregar nueva persona asociada</h4></label>
                  <input type="text" required name="Nombre" id="nombre" class="form-control mb-2 mr-sm-2 border-secondary" placeholder="Nombre:"><br>
                  <input type="text" required name="Apellido" id="apellido" class="form-control mb-2 mr-sm-2 border-secondary" placeholder="Apellido:"><br>
                  <input type="text" required name="Dui" id="dui" class="form-control mb-2 mr-sm-2 border-secondary" placeholder="DUI:"><br>

                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">Estado:</legend>
                      <div class="col-sm-2">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="estado1" value="1" checked>
                          <label class="form-check-label text-dark" for="estado1">Activo</label>
                          <input class="form-check-input" type="radio" name="gridRadios" id="estado2" value="2">
                          <label class="form-check-label  text-dark" for="estado2">Inactivo</label>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <br>
                  <input type="submit" required value="Registrar" name="Enviar" id="enviar" class="btn btn-dark">
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
                    <th scope="col">Asociados</th>
                  </tr>
                </thead>
                <tbody>';

                  //Llenando la tabla con los usuarios definidos por defecto.
                  /*for ($i=0; $i < count(LocalData::$Asociados); $i++) { 
                    echo '<tr><th scope="row">'.LocalData::$Asociados[$i]->id.'</th>';
                    echo '<td>'.LocalData::$Asociados[$i]->Nombre.' '.LocalData::$Asociados[$i]->Apellido.'</td></tr>';
                  }*/
                  $Data = array('Id_Asociado', 'nombre');
                  //ExtractaAssociated();
                  ExtractTablesView('asociados', $Data);
                echo '</tbody>
              </table>
      
            </div>
            </div>
            </div> 
          </div>
          
        </div> 
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg" style="margin-top: 8cm;">

      <div class="container">
        <div class="copyright">
          <strong>Jovesolides El Salvador</strong> &copy; Derechos Reservados 2020
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>';

    if(isset($_POST['Enviar']))
    {
      if(!preg_match("/^[0-9]{8}-[0-9]{1}$/", $_POST['Dui'])){
        echo '<script type="text/javascript">alert("DUI ingresado incorrectamente.");</script>';
      }
      else{
        
        $data = array($_POST['Nombre'], $_POST['Apellido'], $_POST['Dui'], $_POST['gridRadios'],'');
        InsertData('asociados', $data, true);
        //$Num: Numero comprobante de ingreso; La funcion LocalDefaul::LoadDefaulData() ingresa 3
        //Por tanto, si no se ejecuta la insersion $Num = 3
        //Si se ejecuta la insersion insersion $Num = 4
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