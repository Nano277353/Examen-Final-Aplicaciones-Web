<div class="login-box">
  <div class="login-logo">
    EXAMEN 2DO PARCIAL 
    <img src="vistas/img/CINEMA.png" height = "200" px width= "275" px>
  </div>
  <div class="login-box-body">
    <h4><p class="login-box-msg">Iniciar sesión</p></h4>
    <form method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Correo" name="txtCorreo" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="txtPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Ingresar</button>
        </div>
      </div>
      
      <?php
     
        if (isset($_POST["txtCorreo"]) && isset($_POST["txtPassword"])) {
            
          require_once "controladores/usuarios.controlador.php";
          require_once "controladores/plantilla.controlador.php";
          require_once "vistas/modulos/usuarios.modelo.php";
          $login = new ControladorUsuarios();
          $login -> ctrLogin();
        }

      ?>

      <link rel="stylesheet" href="vistas/css/cambios.css">
    </form>
  </div>
</div>