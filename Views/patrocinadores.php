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

  <title>Patrocinadores JOVESOLIDES</title>
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
    include('Helpers/DataAccess.php');
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
        </div>

        <!--<nav class="main-nav float-right d-none d-lg-block">
          <ul>
            <li class="active"><a href="index.html">Inicio</a></li>
            <li><a href="expedientes.html">Expedientes</a></li>
            <li><a href="patrocinadores.html">Patrocinadores</a></li>
            <li><a href="users.html">Usuarios</a></li>
            <li class="drop-down"><a href="index.html">Reportes</a>
              <ul>
                <li><a href="#">Carreras</a></li>
                <li><a href="#">Bolsa de trabajo</a></li>
                <li><a href="#">Departamentos</a></li>
                <li><a href="#">Universidades</a></li>
                <li><a href="#">Desarrollo comunitario</a></li>
                <li><a href="asociados.html">Asociados/as</a></li>
              </ul>
            </li>
            <li id="logout"><a href="login.html">Cerrar sesión</a></li>
          </ul>
        </nav>-->';
        include 'menu.php';
        echo '<!-- .main-nav -->

      </div>
    </header><!-- #header -->

    <main id="main">

      <!-- ======= Section ======= -->
      <section id="services" class="services section-bg">
        <div class="container">

          <header class="section-header"> 
            <h3>Patrocinadores</h3>
            <p>Guarde nuevos patrocinadores y visualice la lista de patrocinadores registrados.</p>
          </header>
          
          <div class="container col-8">
            <div class="text-center px-lg-5 float-left" style="width: auto; margin-left: auto;">
              <div class="form-group mx-sm-3">
                <form action="" name="frm-config" method="post" class="was-validated">
                  <label for="NewUsers"><h4>Agregar un nuevo patrocinador</h4></label>
                  <input type="text" required name="Pat" id="patro" class="form-control mb-2 mr-sm-2 border-secondary" placeholder="Patrocinador"><br>
                  <input type="text" required name="Nit" id="nit" class="form-control mb-2 mr-sm-2 border-secondary" placeholder="NIT"><br>
                  <input type="text" required name="Dir" id="direc" class="form-control mb-2 mr-sm-2 border-secondary" placeholder="Dirección"><br>
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
                    <th scope="col">Patrocinador</th>
                  </tr>
                </thead>
                <tbody>';

                  //Llenando la tabla con los patrocinadores definidos por defecto.
                  /*for ($i=0; $i < count(LocalData::$Patrocinadores); $i++) { 
                    echo '<tr><th scope="row">'.LocalData::$Patrocinadores[$i]->id_Patrocinador.'</th>';
                    echo '<td>'.LocalData::$Patrocinadores[$i]->Nombre.'</td></tr>';
                  }*/
                  $Data = array('Id_Patrocinador', 'nombre');
                  ExtractTablesView('patrocinador', $Data);
                echo '</tbody>
              </table>
      
            </div>
            </div>
            </div> 
          </div>
          
        </div>  <br><br><br><br><br><br>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg" style="margin-top: 2cm;">

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

    if(isset($_POST['Enviar']))
    {
      if(!preg_match("/^[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}$/",$_POST['Nit'])){
        echo '<script type="text/javascript">alert("NIT ingresado incorrectamente.");</script>';
      }
      else{

        $Data = array($_POST['Pat'], $_POST['Nit'], $_POST['Dir']);
        InsertData('patrocinador', $Data, true);
        /*$CurrentId = count(LocalData::$Patrocinadores) + 1;
        Helpers::addSponsor($CurrentId, $_POST['Pat'], $_POST['Nit'], $_POST['Dir']);

        //$Num: Numero comprobante de ingreso; La funcion LocalDefaul::LoadDefaulData() ingresa 3
        //Por tanto, si no se ejecuta la insersion $Num = 3
        //Si se ejecuta la insersion insersion $Num = 4
        $Num = count(LocalData::$Patrocinadores);
        echo '<script type="text/javascript">alert("Patrocinador '.$Num.' ingresado exitosamente.");</script>';*/
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