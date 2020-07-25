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

  <title>Crear Expediente JOVESOLIDES</title>
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
    //require 'Helpers/Clases.php';
    include('Helpers/DataAccess.php');
    //LocalData::LoadDefaultData();
    $idBec;

    if(isset($_GET['Bec'])){
      $idBec = $_GET['Bec'];
      //HTML si se modificara algun dato
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
          <div class="container px-lg-5 pb-5 d-flex justify-content-center" style="margin-top: 4cm;">
            <div class="row mx-lg-n5 center-block " style="width:1250px;">
              <div class="col py-3 px-lg-5  bg-light" style="width: auto; height: auto;">
                <form method="POST">';
                  LoadScholarView($idBec);
                    echo '<button type="submit" name="Modif" id="modif" class="btn btn-warning btn-lg" value="modificar">Modificar</button>';
                    //<button type="submit" name="Delete" id="delete" class="btn btn-danger btn-lg" value="eliminar">Eliminar</button>
                  echo '</form>
                </div>
              </div>
            </div>
          </div>
          
        </section>
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
    }
    //HTML sin modificar datos
    else{
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
            <h1 class="text-light"><a href="index.php" class="scrollto"><span>JOVESOLIDES<span></a></h1>
            <!-- <a href="#header" class="scrollto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
          </div>';
          include 'menu.php';
          echo '<!-- .main-nav -->
        </div>
      </header><!-- #header -->

      <main id="main">
          <div class="container px-lg-5 pb-5 d-flex justify-content-center" style="margin-top: 4cm;">
            <div class="row mx-lg-n5 center-block " style="width:1250px;">
              <div class="col py-3 px-lg-5  bg-light" style="width: auto; height: auto;">
                <form method="POST">
                  <div class="form-group" >
                    <label>Nombres y Apellidos:</label><br>
                    <input required type="text" class="form-control mr-4 float-left border-secondary" id="nombre" name="Name"  minlength="1" pattern="[a-zA-z][[:space:]]" required maxlength="30" placeholder="Nombres" style= "width:190px;">
                    <input required type="text" class="form-control mr-4 float-none border-secondary" id="apellido" name="LastName" minlength="1" pattern="[a-zA-z][[:space:]]" required  maxlength="30" placeholder="Apellidos" style= "width:190px;">
                  </div>
                  <div class="form-group">
                    <label for="correo">Correo y Telefono:</label><br>
                    <input required type="email" class="form-control mr-4 float-left border-secondary" id="correo" name="Mail" placeholder="name@example.com" style= "width:235px;">
                    <input required type="numeric" class="form-control mr-4 float-none border-secondary" id="tel" name="Phone"  minlength="1" maxlength="8" placeholder="79563215" style= "width:145px;">
                  </div>
                  <div class="form-group">
                    <label for="dep">Departamento y Municipio:</label><br>
                    <select required class="form-control mr-3 border border-secondary" id="dep" name="Dep" style="width: 195px; float:left">';
                      
                      $DepData = array('Id_Departamento', 'Nombre');
                      ExtractElements('departamento', $DepData);
                    echo '</select>
                    <select required class="form-control ml-3 border border-secondary" id="seccion" name="Mun" style="width: 195px; float:none;">';
                      
                      $MunData = array('Id_Municipio','Nombre');
                      ExtractElements('municipio', $MunData);
                    echo '</select>
                  </div> <br>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">Sexo:</legend>
                      <div class="col-sm-1">
                        <select required class="form-control ml-3 border border-secondary" id="seccion" name="Sex" style="width: 195px; float:none;">';
                          /*for ($i=0; $i < count(LocalData::$Sexos); $i++) { 
                          $value = $i + 1;
                          echo '<option value="'.$value.'">'.LocalData::$Sexos[$i].'</option>';
                          }*/
                          $SexData = array('Id_Sexo', 'Nombre');
                          ExtractElements('sexo', $SexData);
                        echo '</select>
                      </div>
                    </div>
                  </fieldset> <br>
                  <div class="form-group">
                    <label for="dep">Universidad y Carrera:</label>
                    <br>
                    <select required class="form-control mr-3 border border-secondary" id="university" name="U" style="width: 195px; float:left">';
                      /*for ($i=0; $i < count(LocalData::$Universidades); $i++) { 
                      $value = $i + 1;
                      echo '<option value="'.$value.'">'.LocalData::$Universidades[$i].'</option>';
                      }*/
                      $UData = array('Id_Universidad', 'Nombre');
                      ExtractElements('universidad', $UData);
                    echo '</select>
                    <select required class="form-control ml-3 border border-secondary" id="carrera" name="Career" style="width: 195px; float:none;">';
                      /*for ($i=0; $i < count(LocalData::$Carreras); $i++) { 
                      $value = $i + 1;
                      echo '<option value="'.$value.'">'.LocalData::$Carreras[$i].'</option>';
                      }*/
                      $CarrerData = array('Id_Carrera', 'Nombre');
                      ExtractElements('carrera', $CarrerData);
                    echo '</select>
                  </div> <br>
                  <div class="form-group">
                    <label for="beca">Estado de beca:</label><br>
                    <select required class="form-control mr-3 border border-secondary" id="beca" name="StateBec" style="width: 215px;">';
                      /*for ($i=0; $i < count(LocalData::$Estados); $i++) { 
                      $value = $i + 1;
                      echo '<option value="'.$value.'">'.LocalData::$Estados[$i].'</option>';
                      }*/
                      $StatesData = array('Id_Estado', 'Nombre');
                      ExtractElements('estado', $StatesData);
                    echo '</select>
                  </div>
                  <div class="col py-3 px-lg-5  bg-light" style="width: auto; height: auto;">
                    <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                      <div class="form-group">
                        <label for="beca">Patrocinador:</label>
                        <br>
                        <select required class="form-control mr-3 border border-secondary" id="patr" name="Sponsor" style="width: 215px;">';
                          /*for ($i=0; $i < count(LocalData::$Patrocinadores); $i++) { 
                          $value = $i + 1;
                          echo '<option value="'.$value.'">'.LocalData::$Patrocinadores[$i]->Nombre.'</option>';
                          }*/
                          $SponsorData = array('Id_Patrocinador', 'Nombre');
                          ExtractElements('patrocinador', $SponsorData);
                        echo '</select>
                      </div>
                      <div class="form-group">
                        <label for="">Fecha de ingreso a la RU</label>
                        <input required type="date" class="form-control border-secondary" id="fechaIn" name="DateIn">
                      </div>
                      <div class="form-group">
                        <label for="">Fecha de egreso de la RU</label>
                        <input required type="date" class="form-control border-secondary" id="fechaOut" name="DateOut">
                      </div>
                      <div class="form-group">
                        <label for="">Fecha de graduación</label>
                        <input required type="date" class="form-control border-secondary" id="fechaGrad" name="Grad">
                      </div>
                      <div class="form-group">
                        <label for="dep">Empresa y departamento donde labora:</label><br>
                        <input required type="text" class="form-control mr-3 float-left border-secondary" id="empresa" name="Company"  minlength="3" required maxlength="30" placeholder="Nestle" style= "width:195px;">
                        <select required class="form-control mr-3 border border-secondary" id="carrera" name="DepCo" style="width: 195px; float:none;">';
                          /*for ($i=0; $i < count(LocalData::$Departamentos); $i++) {
                          $value = $i + 1;
                          echo '<option value="'.$value.'">'.LocalData::$Departamentos[$i].'</option>';
                          }*/
                          ExtractElements('departamento', $DepData);
                        echo '</select>
                      </div>
                      <!--<div class="form-group">
                      <label for="nota">Observaciones:</label>
                      <textarea class="form-control" id="nota" rows="2"></textarea>
                    </div>-->
                    <button type="submit" class="btn btn-dark px-5 btn-lg" id="enviar" name="Enviar" style="margin-left: 30%;">Registrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <br>
        </section>
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
    }
    if(isset($_POST['Modif'])){
      $ShipParams = array((int)$_POST['Sponsor'], (int)$_POST['StateBec'], $_POST['DateIn'], $_POST['DateOut']);
      ModifyData('beca', $idBec, $ShipParams);
      $AcadParams = array((int)$_POST['U'], (int)$_POST['Career'], $_POST['Grad']);
      ModifyData('formacion_academica', $idBec, $AcadParams);
      $WorkParams = array($_POST['Company'], (int)$_POST['DepCo']);
      ModifyData('trabajo', $idBec, $WorkParams);
      $ScholarParams = array($_POST['Name'], $_POST['LastName'], (int)$_POST['Sex'], $_POST['Mail'], $_POST['Phone'], (int)$_POST['Dep'], (int)$_POST['Mun']);
      ModifyData('becario', $idBec, $ScholarParams);
    }
    /*if(isset($_POST['Delete'])){
      unset(LocalData::$Becas[LocalData::$Becarios[$idBec]->id_Beca-1]);
      unset(LocalData::$FormacionesAcademicas[LocalData::$Becarios[$idBec]->id_Estudio-1]);
      unset(LocalData::$Trabajos[LocalData::$Becarios[$idBec]->id_Trabajo-1]);
      unset(LocalData::$Becarios[$idBec]);
      unset(LocalData::$Expedientes[$idBec]);
      $Num = count(LocalData::$Becarios);
      echo'<script type="text/javascript">alert("Becario eliminador. Becarios totales = '.$Num.'");</script>';
    }*/
    if(isset($_POST['Enviar'])){
      $ShipParams = array((int)$_POST['Sponsor'], (int)$_POST['StateBec'], $_POST['DateIn'], $_POST['DateOut']);
      InsertData('beca', $ShipParams, false);
      $AcadParams = array((int)$_POST['U'], (int)$_POST['Career'], $_POST['Grad']);
      InsertData('formacion_academica', $AcadParams, false);
      $WorkParams = array($_POST['Company'], (int)$_POST['DepCo']);
      InsertData('trabajo', $WorkParams, false);
      //Obteniendo el id de la formacion academica
      $IdStudy = GetLastId('formacion_academica','Id_estudio');
      echo'<script type="text/javascript">alert("Formacion academica id: '.$IdStudy.'");</script>';
      //Obteniendo id de la beca
      $IdShip = GetLastId('beca', 'Id_Beca');
      echo'<script type="text/javascript">alert("Beca id: '.$IdShip.'");</script>';
      //Obteniendo id de trabajo
      $IdWork = GetLastId('trabajo','Id_Trabajo');
      echo'<script type="text/javascript">alert("Trabajo id: '.$IdWork.'");</script>';

      $ScholarParams = array($IdStudy, $IdShip, $IdWork, 'Photo', $_POST['Name'], $_POST['LastName'], $_POST['Sex'], $_POST['Mail'], $_POST['Phone'], $_POST['Dep'], $_POST['Mun'],'');
      InsertData('becario', $ScholarParams, false);
      $Param = array(GetLastId('becario', 'Id_Becario'));
      InsertData('expediente', $Param, true);
      /*$Becs = count(LocalData::$Becas)+1;
      $Forms = count(LocalData::$FormacionesAcademicas)+1;
      $Works = count(LocalData::$Trabajos)+1;
      $idNewBec = count(LocalData::$Becarios)+1;
      Helpers::addScholarship($Becs, $_POST['Sponsor'], $_POST['StateBec'], $_POST['DateIn'], $_POST['DateOut']);
      Helpers::addAcadTraining($Forms, $_POST['U'], $_POST['Career'], $_POST['Grad']);
      Helpers::addWorks($Works, $_POST['Company'], $_POST['DepCo']);
      Helpers::addScholar($idNewBec, $Forms, $Becs, 'Photo', $_POST['Name'], $_POST['LastName'], $_POST['Sex'], $_POST['Mail'], $_POST['Phone'], $_POST['Dep'], $_POST['Mun']);
      Helpers::addReport(count(LocalData::$Expedientes)+1, $idNewBec);
      $TotalBec = count(LocalData::$Becarios);
      echo'<script type="text/javascript">alert("Becario registrado. Hay "'.$TotalBec.'" Becarios);</script>';*/
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