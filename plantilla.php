<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WebApps</title> 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSS... -->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css"> -->
  <script src="https://kit.fontawesome.com/a3a749bde6.js" crossorigin="anonymous"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="vistas/css/custom.css">
<!-- PLUGINS DE JAVASCRIPT -->
  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> 

  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  

</head>
<!-- CUERPO DEL DOCUMENTO -->
<body class="hold-transition skin-blue sidebar-mini login-page" >    <!-- sidebar-collapse -->

  <!-- Site wrapper -->
  <?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

    // <!-- Site wrapper -->
    echo '<div class="wrapper">';

    include "modulos/encabezado.php";
    include "modulos/menulateral.php";

    if(isset($_GET["ruta"])){

      if(
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "crear-usuario" ||
        $_GET["ruta"] == "editar-usuario" ||

        $_GET["ruta"] == "clientes" ||
        
        $_GET["ruta"] == "salir"
        
        ){
        
        include "modulos/".$_GET["ruta"].".php";
        }
        else{
          include "modulos/error404.php";
        }

      }

    else {
      
      include "modulos/inicio.php";

    }

    include "modulos/piedepagina.php";

    echo '</div>'; 
    // <!-- ./wrapper -->
  } else{

    include "modulos/login.php";


  }
?>
  <!-- ./wrapper -->

  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/usuarios.js"></script>
  
</body>
</html>