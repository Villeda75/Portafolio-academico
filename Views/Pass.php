<?php //manejo de sesiones
session_start();

if(isset($_SESSION['usuario'])){ //si el usuario estaba autenticado 
	session_destroy(); //cerramos la sesion
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
 

  <title>Login Page</title>

  <!-- Bootstrap CSS -->
  <link href="Views/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="Views/assets/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="Views/assets/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="Views/assets/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="Views/assets/css/style.css" rel="stylesheet">
  <link href="Views/assets/css/style-responsive.css" rel="stylesheet" />

</head>

<body class="login-img3-body">
  <?php
    echo '<div class="container">

      <form class="login-form" method="POST">
        <div class="login-wrap">
          <p class="login-img"><i class="icon_lock_alt"></i></p>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_profile"></i></span>
            <input type="text" name="User" class="form-control" placeholder="Username" autofocus>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input type="password" name="Pass" class="form-control" placeholder="Password">
          </div>
          <label class="checkbox">
                  <input type="checkbox" value="remember-me"> Remember me
                  <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
              </label>
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="Entrar">Login</button>
        </div>
      </form>
      <div class="text-right">
        <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
      </div>
    </div>';

    include('Views/Helpers/DataAccess.php');
    //LocalData::LoadDefaultData();
    if(isset($_POST['Entrar']))
    {
      if(strlen($_POST['User']) > 1 && strlen($_POST['Pass']) > 1)
      {
        if(LoginVal($_POST['User'], $_POST['Pass']) == true){
          //creacion de variables de sesion
          //crear la cookie
          $cookie_name = "usuario";
          $cookie_value = $_POST['User'];
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 día
          print($_COOKIE["usuario"]);
      
          session_start();
				  $_SESSION['usuario'] = 'administrador'; //crea sesion
          header("Location: Views/main.php"); //login exitoso
        }
        else{
          echo'<script type="text/javascript">alert("Verifique sus credenciales.");</script>';
        }
      }
      else{
        echo'<script type="text/javascript">alert("Ingrese datos.");</script>';
      }
    }
  ?>
</body>

</html>