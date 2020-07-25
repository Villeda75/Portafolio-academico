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

  <title>Reporte Carreras JOVESOLIDES</title>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script> 
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">

  <div id="topbar">
      <div class="container">
      <!-- Menu para redes sociales -->
      <?php  
        include 'menuSocials.php'; 
        require_once('Helpers/Conn.php');
      ?>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="main.php" class="scrollto"><span>JOVESOLIDES<span></a></h1>
      </div>

      <!-- Menu de navegacion principal -->
      <?php  
        include 'menu.php';
      ?>

    </div>
  </header><!-- Termina header -->

  <main id="main">

    <!-- ======= Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <header class="section-header"> 
          <h3>Reporte de Carreras</h3>
          <p>Visualice la cantidad de becarios por carrera.</p>
        </header>
        
        <div class="text-center">
          <canvas id="myChart" width="52" height="15"></canvas>
        </div>

        <script>
          var ctx = document.getElementById('myChart').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                      labels: [
                      <?php
                        $sql = "SELECT Nombre AS carrera FROM carrera"; //obtenemos todas las carreras
                        $consulta = mysqli_query(strConnection(),$sql);
                        while( $registros = mysqli_fetch_array($consulta) )
                        {
                      ?>
                        '<?php echo $registros["carrera"]?>',
                      <?php
                        }
                      ?>
                  ], //barras o categorías
                  datasets: [{
                      label: '# de becarios por carrera', //titulo del graáfico
                      data: 
                      <?php
                        $sql = "SELECT Nombre AS carrera FROM carrera"; //obtenemos todas las carreras
                        $consulta = mysqli_query(strConnection(),$sql);
                      ?>
                      [
                        <?php 
                          while( $registros = mysqli_fetch_array($consulta) )
                          {
                              $sql1 = "SELECT COUNT(*) as cant FROM ((becario 
                              INNER JOIN formacion_academica ON formacion_academica.Id_estudio = becario.Id_estudio) 
                              INNER JOIN carrera ON carrera.Id_Carrera = formacion_academica.Id_Carrera) 
                              WHERE carrera.Nombre = '" .$registros['carrera'] . "'"; //consulta por cada carrera

                              $consulta1 = mysqli_query(strConnection(),$sql1);
                              $cantidad = mysqli_fetch_assoc($consulta1); //cantidad de becarios por cada carrera
                        ?>

                        <?php echo $cantidad['cant'] ?>,
                        <?php
                          }
                        ?>
                      ], //frecuencia
                      
                      backgroundColor: [
                          'rgba(54, 162, 235)',
                          'rgba(255, 206, 86)',
                          'rgba(75, 192, 192)',
                          'rgba(54, 162, 235)',
                          'rgba(255, 206, 86)',
                          'rgba(75, 192, 192)',
                          'rgba(54, 162, 235)',
                          'rgba(255, 206, 86)',
                          'rgba(75, 192, 192)',
                          'rgba(54, 162, 235)',
                          'rgba(255, 206, 86)',
                          'rgba(75, 192, 192)',
                          'rgba(54, 162, 235)',
                          'rgba(255, 159, 64)'
                      ],
                      borderColor: [
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                      
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true //corrección para que empiecen de 0 las barras
                          }
                      }],

                      xAxes:[{
                          barPercentage: 0.4,
                          gridLines: {
                          display:false
                          }
                      }]

                      
                  }
              }
          });
        </script>
        
      </div> </section> <br>
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

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

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